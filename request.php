<?php  
include_once('functions/login-functions.php');  
require('config.php');

if ( isset($_POST['user-submit']) ){

		$userName = $_POST['user-name'];
		$userCity = $_POST['user-city'];

		$expire   = time() + 60*60*24*30;
		setcookie('user-name',$userName,  $expire);
  setcookie('user-city',$userCity,  $expire);

}


include('views/head.tpl');
include('views/request.tpl');
include('views/footer.tpl');

?>