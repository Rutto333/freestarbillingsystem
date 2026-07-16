<?php

class revenue
{
    public function getWidget()
    {
        global $ui, $current_date, $start_date;

        // Current day
        $iday = ORM::for_table('tbl_transactions')
            ->where('recharged_on', $current_date)
            ->sum('price');
        if ($iday == '') {
            $iday = '0.00';
        }
        $ui->assign('iday', $iday);

        // Previous day
        $previous_day = date('Y-m-d', strtotime($current_date . ' -1 day'));
        $lday = ORM::for_table('tbl_transactions')
            ->where('recharged_on', $previous_day)
            ->sum('price');
        if ($lday == '') {
            $lday = '0.00';
        }
        $ui->assign('lday', $lday);

        // Current week - Monday to Sunday
        $week_start = date('Y-m-d', strtotime('monday this week', strtotime($current_date)));
        $week_end   = date('Y-m-d', strtotime('sunday this week', strtotime($current_date)));
        $iweek = ORM::for_table('tbl_transactions')
            ->where_gte('recharged_on', $week_start)
            ->where_lte('recharged_on', $week_end)
            ->sum('price');
        if ($iweek == '') {
            $iweek = '0.00';
        }
        $ui->assign('iweek', $iweek);

        // Previous week - Monday to Sunday
        $prev_week_start = date('Y-m-d', strtotime('monday last week', strtotime($current_date)));
        $prev_week_end   = date('Y-m-d', strtotime('sunday last week', strtotime($current_date)));
        $lweekly = ORM::for_table('tbl_transactions')
            ->where_gte('recharged_on', $prev_week_start)
            ->where_lte('recharged_on', $prev_week_end)
            ->sum('price');
        if ($lweekly == '') {
            $lweekly = '0.00';
        }
        $ui->assign('lweekly', $lweekly);

        // Current month
        $imonth = ORM::for_table('tbl_transactions')
            ->where_gte('recharged_on', $start_date)
            ->where_lte('recharged_on', $current_date)
            ->sum('price');
        if ($imonth == '') {
            $imonth = '0.00';
        }
        $ui->assign('imonth', $imonth);

        // Previous month
        $prev_month_start = date('Y-m-d', strtotime('first day of previous month', strtotime($current_date)));
        $prev_month_end = date('Y-m-d', strtotime('last day of previous month', strtotime($current_date)));
        $lmonth = ORM::for_table('tbl_transactions')
            ->where_gte('recharged_on', $prev_month_start)
            ->where_lte('recharged_on', $prev_month_end)
            ->sum('price');
        if ($lmonth == '') {
            $lmonth = '0.00';
        }
        $ui->assign('lmonth', $lmonth);
        return $ui->fetch('widget/revenue.tpl');
    }
}
