
<?php

class graph_monthly_growth
{
    public function getWidget()
    {
        global $CACHE_PATH, $ui;

        // --- Monthly Sales ---
        $cacheMSfile = $CACHE_PATH . File::pathFixer('/monthlySales.temp');
        if (file_exists($cacheMSfile) && time() - filemtime($cacheMSfile) < 43200) {
            $monthlySales = json_decode(file_get_contents($cacheMSfile), true);
        } else {
            $results = ORM::for_table('tbl_transactions')
                ->select_expr('MONTH(recharged_on)', 'month')
                ->select_expr('SUM(price)', 'total')
                ->where_raw("YEAR(recharged_on) = YEAR(CURRENT_DATE())")
                ->where_not_equal('method', 'Customer - Balance')
                ->where_not_equal('method', 'Recharge Balance - Administrator')
                ->where_in('type', ['Hotspot', 'PPPOE'])
                ->group_by_expr('MONTH(recharged_on)')
                ->find_many();

            $monthlySales = [];
            foreach ($results as $result) {
                $monthlySales[$result->month] = [
                    'month' => $result->month,
                    'totalSales' => $result->total
                ];
            }

            for ($m = 1; $m <= 12; $m++) {
                if (!isset($monthlySales[$m])) {
                    $monthlySales[$m] = ['month' => $m, 'totalSales' => 0];
                }
            }

            ksort($monthlySales);
            $monthlySales = array_values($monthlySales);
            file_put_contents($cacheMSfile, json_encode($monthlySales));
        }

        // --- Monthly Registered Customers ---
        $cacheMRfile = $CACHE_PATH . File::pathFixer('/monthlyRegistered.temp');
        if (file_exists($cacheMRfile) && time() - filemtime($cacheMRfile) < 3600) {
            $monthlyRegistered = json_decode(file_get_contents($cacheMRfile), true);
        } else {
            $results = ORM::for_table('tbl_customers')
                ->select_expr('MONTH(created_at)', 'month')
                ->select_expr('COUNT(*)', 'count')
                ->where_raw('YEAR(created_at) = YEAR(NOW())')
                ->group_by_expr('MONTH(created_at)')
                ->find_many();

            $monthlyRegistered = [];
            foreach ($results as $row) {
                $monthlyRegistered[$row->month] = ['month' => $row->month, 'count' => $row->count];
            }

            for ($m = 1; $m <= 12; $m++) {
                if (!isset($monthlyRegistered[$m])) {
                    $monthlyRegistered[$m] = ['month' => $m, 'count' => 0];
                }
            }

            ksort($monthlyRegistered);
            $monthlyRegistered = array_values($monthlyRegistered);
            file_put_contents($cacheMRfile, json_encode($monthlyRegistered));
        }

        // Assign both datasets to the template
        $ui->assign('monthlySales', $monthlySales);
        $ui->assign('monthlyRegistered', $monthlyRegistered);

        return $ui->fetch('widget/graph_monthly_growth.tpl');
    }
}
