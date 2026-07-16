<?php

class plans_chart
{
    public function getWidget()
    {
        global $CACHE_PATH, $ui, $config;

        $cachePlansFile = $CACHE_PATH . File::pathFixer('/PlansChart.temp');
        $cacheExpire = 600; // cache 10 min

        // Reset day setting
        $reset_day = isset($config['reset_day']) && $config['reset_day'] > 0 ? $config['reset_day'] : 1;

        // Calculate first day of current cycle
        if (date("d") >= $reset_day) {
            $start_date = date('Y-m-' . str_pad($reset_day, 2, "0", STR_PAD_LEFT));
        } else {
            $start_date = date('Y-m-' . str_pad($reset_day, 2, "0", STR_PAD_LEFT), strtotime("-1 month"));
        }
        $end_date = date('Y-m-d');

        // Load from cache if still fresh
        if (file_exists($cachePlansFile) && time() - filemtime($cachePlansFile) < $cacheExpire) {
            $data = json_decode(file_get_contents($cachePlansFile), true);
        } else {
            // Get all plans
            $plans = ORM::for_table('tbl_plans')->select('name_plan')->find_array();

            $hotspotData = [];
            $pppoeData = [];

            foreach ($plans as $plan) {
                $planName = $plan['name_plan'];

                // Count Hotspot sales
                $hotspotCount = ORM::for_table('tbl_transactions')
                    ->where('type', 'Hotspot')
                    ->where('plan_name', $planName)
                    ->where_raw("recharged_on >= ? AND recharged_on <= ?", [$start_date, $end_date])
                    ->count();

                // Count PPPoE sales
                $pppoeCount = ORM::for_table('tbl_transactions')
                    ->where('type', 'PPPoE')
                    ->where('plan_name', $planName)
                    ->where_raw("recharged_on >= ? AND recharged_on <= ?", [$start_date, $end_date])
                    ->count();

                if ($hotspotCount > 0) {
                    $hotspotData[] = ['label' => $planName, 'value' => $hotspotCount];
                }
                if ($pppoeCount > 0) {
                    $pppoeData[] = ['label' => $planName, 'value' => $pppoeCount];
                }
            }

            $data = [
                'hotspot' => $hotspotData,
                'pppoe'   => $pppoeData,
                'start'   => $start_date,
                'end'     => $end_date
            ];

            file_put_contents($cachePlansFile, json_encode($data));
        }

        // Assign to template
        $ui->assign('plans_chart', $data);

        return $ui->fetch('widget/plans_chart.tpl');
    }
}
