<?php

class top_widget
{
    public function getWidget()
    {
        global $ui, $current_date, $start_date;

        // --- DAILY TOTAL ---
        $iday = ORM::for_table('tbl_transactions')
            ->where('recharged_on', $current_date)
            ->sum('price');
        if ($iday == '') {
            $iday = '0.00';
        }
        $ui->assign('iday', $iday);

        // --- MONTHLY TOTAL ---
        $imonth = ORM::for_table('tbl_transactions')
            ->where_gte('recharged_on', $start_date)
            ->where_lte('recharged_on', $current_date)
            ->sum('price');
        if ($imonth == '') {
            $imonth = '0.00';
        }
        $ui->assign('imonth', $imonth);

        // --- WEEKLY TOTAL (Mondayâ€“Sunday) ---
        // Get Monday of current week
        $monday = date('Y-m-d', strtotime('monday this week'));
        // Get Sunday of current week
        $sunday = date('Y-m-d', strtotime('sunday this week'));

        $iweek = ORM::for_table('tbl_transactions')
            ->where_gte('recharged_on', $monday)
            ->where_lte('recharged_on', $sunday)
            ->sum('price');
        if ($iweek == '') {
            $iweek = '0.00';
        }
        $ui->assign('iweek', $iweek);

        // --- ACTIVEHOTSPOT USERS ---
        $u_act_h = ORM::for_table('tbl_user_recharges')
        ->where('status', 'on')
        ->where('type','Hotspot')
        ->count();
        if (empty($u_act_h)) {
            $u_act_h = '0';
        }
        $ui->assign('u_act_h', $u_act_h);

        // --- ACTIVE PPPOE USERS ---
        $u_act_e = ORM::for_table('tbl_user_recharges')
        ->where('status', 'on')
        ->where('type','PPPOE')
        ->count();
        if (empty($u_act_e)) {
            $u_act_e = '0';
        }
        $ui->assign('u_act_e', $u_act_e);

        // --- TOTAL USERS (ALL RECHARGES) ---
        $u_all = ORM::for_table('tbl_user_recharges')->count();
        if (empty($u_all)) {
            $u_all = '0';
        }
        $ui->assign('u_all', $u_all);

        // --- TOTAL CUSTOMERS ---
        $c_all = ORM::for_table('tbl_customers')->count();
        if (empty($c_all)) {
            $c_all = '0';
        }
        $ui->assign('c_all', $c_all);

        return $ui->fetch('widget/top_widget.tpl');
    }
}
