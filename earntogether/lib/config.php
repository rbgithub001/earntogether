<?php 
ob_start(); 
@session_start(); 
@error_reporting(E_ALL & ~E_NOTICE);
@error_reporting(E_ERROR | E_WARNING | E_PARSE);
@ini_set('display_errors','ON');
@ini_set('error_reporting',1);

define('HOSTNAME','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','root');

define('DB_DATABASE','max233earntogeth_db');
define('SITE_URL','http://103.154.2.116/~max233earntogeth/');
define('WEBSITE','Earn Together');
define('CURRENCY','INR');

define('EMAIL','gunjan@maxtratechnologies.net');
define('TABLE_PREFIX','');
define('FRONTEND_PATH','admin/action_control/');
define('ADMIN_PATH','action_control/');
include('autoload.inc.php');

?>


