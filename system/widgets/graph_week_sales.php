<?php

class graph_week_sales
{
    public function getWidget()
    {
        global $CACHE_PATH, $ui;

        // Define cache file
        $cacheWSfile = $CACHE_PATH . File::pathFixer('/weeklySales.temp');

        // Define Monday–Sunday range of current week
        $monday = date('Y-m-d', strtotime('monday this week'));
        $sunday = date('Y-m-d', strtotime('sunday this week'));

        // Regenerate cache every Monday (or every 12 hours for safety)
        $needRefresh = true;
        if (file_exists($cacheWSfile)) {
            $cacheData = json_decode(file_get_contents($cacheWSfile), true);
            if (isset($cacheData['week_start']) && $cacheData['week_start'] === $monday
                && time() - filemtime($cacheWSfile) < 43200) {
                $needRefresh = false;
                $weeklySales = $cacheData['data'];
            }
        }

        if ($needRefresh) {
            // Query to retrieve data from Monday to Sunday of current week
            $results = ORM::for_table('tbl_transactions')
                ->select_expr('DATE(recharged_on)', 'day')
                ->select_expr('SUM(price)', 'total')
                ->where_raw("DATE(recharged_on) BETWEEN '$monday' AND '$sunday'")
                ->where_not_equal('method', 'Customer - Balance')
                ->where_not_equal('method', 'Recharge Balance - Administrator')
                ->group_by_expr('DATE(recharged_on)')
                ->order_by_asc('day')
                ->find_many();

            // Prepare full week structure (Monday → Sunday)
            $weeklySales = [];
            $period = new DatePeriod(
                new DateTime($monday),
                new DateInterval('P1D'),
                (new DateTime($sunday))->modify('+1 day') // include Sunday
            );

            foreach ($period as $date) {
                $formatted = $date->format('Y-m-d');
                $weeklySales[$formatted] = [
                    'day' => $formatted,
                    'weekday' => $date->format('l'), // Monday, Tuesday...
                    'totalSales' => 0
                ];
            }

            // Fill with actual totals
            foreach ($results as $result) {
                $day = $result->day;
                if (isset($weeklySales[$day])) {
                    $weeklySales[$day]['totalSales'] = (float) $result->total;
                }
            }

            // Reindex
            $weeklySales = array_values($weeklySales);

            // Save cache with week start info
            $cacheSave = [
                'week_start' => $monday,
                'data' => $weeklySales
            ];
            file_put_contents($cacheWSfile, json_encode($cacheSave));
        }

        // Assign to template
        $ui->assign('weeklySales', $weeklySales);
        return $ui->fetch('widget/graph_week_sales.tpl');
    }
}
