<?php 

include_once('functions/login-functions.php');  
 
define('MYSQL_SERVER', 'localhost');
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', '');
define('MYSQL_DB', 'WD04-filmoteka-andreev');
define('HOST', 'http://' . $_SERVER['HTTP_HOST'] . '/');
define('ROOT', dirname(__FILE__) . '/');

session_start();
?>