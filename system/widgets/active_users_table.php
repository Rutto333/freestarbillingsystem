<?php


class active_users_table
{
    public function getWidget()
    {
        global $ui;

        $current_date = date('Y-m-d');
        $current_time = date('H:i:s');

        $active_users = ORM::for_table('tbl_user_recharges')
            ->where_raw("( (`expiration` > '$current_date') OR (`expiration` = '$current_date' AND `time` >= '$current_time') )")
            ->where('status', 'on')
            ->find_many();

        $ui->assign('active_users', $active_users);

        return $ui->fetch('widget/active_users_table.tpl');
    }
}