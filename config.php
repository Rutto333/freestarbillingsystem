<?php

define('APP_URL', 'https://dev.umejipangasolutions.co.ke');
$_app_stage = 'Live';

// Database XtremeBilling Config
$db_host = 'localhost';
$db_user = 'phpnuxbill';
$db_pass = '12A45b78';
$db_name = 'dev';

if ($_app_stage != 'Live') {
    error_reporting(E_ERROR);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
} else {
    error_reporting(E_ERROR);
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
}