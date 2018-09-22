<?php

require('config.php');
include_once('functions/login-functions.php');  

if (isset($_POST['enter']) ){

  $userName = 'admin';
  $userPassword = '123456';

  if ($_POST['login'] == $userName){

     if ($_POST['password'] == $userPassword){

     		//session_start();
     		$_SESSION['user'] = 'admin';
     		header('Location: ' . HOST . 'index.php');

     }

  }


}


include('views/head.tpl');
include('views/login.tpl');
include('views/footer.tpl');


?>