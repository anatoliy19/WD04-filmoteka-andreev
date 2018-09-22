<?php 

/* $_SESSION['name'] = 'Anatoly';
 $_SESSION['city'] = 'Moscow';*/


 //echo $_SESSION['name'];

 //unset($_SESSION['name']);

 //reset($_SESSION['name']);
 
 //session_destroy();



// DB CONNECTION
require('config.php');
require('database.php');
$link = db_connect();

require('models/films.php');
include_once('functions/login-functions.php');  


// Удаление фильма
if ( @$_GET['action'] == 'delete') {
	$result = film_delete($link, $_GET['id']);
	if ( $result ) {
	 	$resultInfo = "Фильм был удален!";
	 } else {
	 	 $resultError = "Что-то пошло не так!";
	 }
}

$films = films_all($link);

include('views/head.tpl');
include('views/notification.tpl');
include('views/index.tpl');
include('views/footer.tpl');

?>