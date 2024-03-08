<?php 
ob_start(); 
@session_start(); 
@error_reporting(E_ALL & ~E_NOTICE);
@error_reporting(E_ERROR | E_WARNING | E_PARSE);
@ini_set('display_errors','ON');
@ini_set('error_reporting',1);

define('HOSTNAME','localhost');
define('DB_USERNAME','cpoilcanadatest_db');
define('DB_PASSWORD','TDviLl?Lm6nP');

define('DB_DATABASE','cpoilcanadatest_db');
define('SITE_URL','http://103.154.2.115/~cpoilcanadatest');
define('WEBSITE',"Centre Professionnel Oeil d'Experts");
define('CURRENCY','USDT ');

define('EMAIL','gunjan@maxtratechnologies.net');
define('TABLE_PREFIX','');
define('FRONTEND_PATH','admin/action_control/');
define('ADMIN_PATH','action_control/');
include('autoload.inc.php');

?>


