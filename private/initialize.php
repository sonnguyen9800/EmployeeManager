<?php
ob_start();


define("PRIVATE_PATH", dirname(__FILE__));
define("PROJECT_PATH", dirname(PRIVATE_PATH));
define("PUBLIC_PATH", PROJECT_PATH . '/public');
define("SHARED_PATH", PUBLIC_PATH . '/shared');

$public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 12;
$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
define("ROOT", $doc_root);

require_once('functions.php');
require_once('database.php');
require_once('db_query.php');

/* $db = db_connect();*/
?>
