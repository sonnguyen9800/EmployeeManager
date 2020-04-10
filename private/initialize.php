<?php
ob_start();

/* Define important path*/

define("PRIVATE_PATH", dirname(__FILE__));
define("PROJECT_PATH", dirname(PRIVATE_PATH));
define("PUBLIC_PATH", PROJECT_PATH . '/public');
define("SHARED_PATH", PRIVATE_PATH . '/shared');


$public_end = strpos($_SERVER['SCRIPT_NAME'], '/public/') + 12;
$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);


define("ROOT", $doc_root);

require_once('functions.php');
require_once('database.php');

/* $db = db_connect();*/
?>
