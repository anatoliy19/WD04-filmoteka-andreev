<!-- Разные миксины по одному, которые понадобятся. Для логотипа, бейджа, и т.д.-->
<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8" />
	<title>Анатолий Андреев - Фильмотека</title>
	<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"/><![endif]-->
	<meta name="keywords" content="" />
	<meta name="description" content="" /><!-- build:cssVendor css/vendor.css -->
	<link rel="stylesheet" href="libs/normalize-css/normalize.css" />
	<link rel="stylesheet" href="libs/bootstrap-4-grid/grid.min.css" />
	<link rel="stylesheet" href="libs/jquery-custom-scrollbar/jquery.custom-scrollbar.css" /><!-- endbuild -->
	<!-- build:cssCustom css/main.css -->
	<link rel="stylesheet" href="./css/main.css" /><!-- endbuild -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800&amp;subset=cyrillic-ext" rel="stylesheet">
	<!--[if lt IE 9]><script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script><![endif]-->
</head>

<?php 
$link = mysqli_connect('localhost','root','','WD04-filmoteka-andreev');
if (mysqli_connect_error()){
	die("ошибка подключения к базе данных");
} 
 
/*echo "<pre>";
print_r($_GET);
echo "</pre>";*/

//Удаление фильма
if ( $_GET['action'] == 'delete'){
	$query = "DELETE FROM movies WHERE id ='".mysqli_real_escape_string($link,$_GET['id'])."'LIMIT 1"; 

	mysqli_query($link, $query);

if ( mysqli_affected_rows($link) > 0) {
		$resultInfo = "<p>Фильм был удален</p>";
} else {
	 $resulError = "<p>Что-то пошло не так</p>";
}
}

$query = "SELECT * From movies"; 
$movies = array();
if ($result = mysqli_query($link,$query)){	
    while ($row = mysqli_fetch_array($result)){
    		$movies[] = $row;    	 
    }
}

//добавить фильмы в БД
	if ( array_key_exists('add-movie', $_POST)){  
		if ( $_POST['name'] == ''){
			echo "<p>Надо ввести название</p>";
		}
		else if ( $_POST['kind'] == ''){
			echo "<p>Надо ввести жанр</p>";
		}
		else if ( $_POST['year'] == ''){
			echo "<p>Надо ввести год</p>";
		} else {
			$query = "INSERT INTO `movies` (`name`, `kind`, `year`) VALUES (
			'".mysqli_real_escape_string($link, $_POST['name'])."',
			'".mysqli_real_escape_string($link, $_POST['kind'])."',
			'".mysqli_real_escape_string($link, $_POST['year'])."' )";

			if ( mysqli_query($link, $query) ){
				echo "<p>Фильм был добавлен</p>";	
			} else {
				echo "<p>Фильм не был добавлен</p>";
			}
		}
	}
?>
<body class="index-page">
	<div class="container user-content section-page">
<?php if ( $resultSuccess != '') {?>
					<div class="info-success"><?=$resultSuccess?></div>
<?php  } ?>

<?php if ( $resultInfo != '') {?>
					<div class="info-notification"><?=$resultInfo?></div>
<?php  } ?>

<?php if ( $resultError != '') {?>
					<div class="error"><?=$resultError?></div>
<?php  } ?>

		<div class="title-1">Фильмотека</div>
<?php 
  foreach ($movies as $key => $value) {
  	?> 
		<div class="card mb-20">
  <div class="card__header"> 
			<h4 class="title-4"><?php echo $movies[$key]['name'] ?></h4>
			<div class="buttons">
   <a  href="edit.php?id=<?=$value['id']?>" class="button button--delete">Редактировать</a> 		
   <a  href="index.php?action=delete&id=<?=$value['id']?>" class="button button--delete">Удалить</a> 
   </div>
		</div>
?>
		<div class="card mb-20">
			<h4 class="title-4"><?php echo $movies[$key]['name'] ?></h4>
			<div class="badge"><?php echo $movies[$key]['kind'] ?></div>
			<div class="badge"><?php echo $movies[$key]['year'] ?></div>
		</div>
<?php 
  }
  ?>

		
		<div class="panel-holder mt-80 mb-40">
			<div class="title-3 mt-0">Добавить фильм</div>
			<form action="index.php" method="POST">
				<div class="notify notify--error mb-20">Название фильма не может быть пустым.</div>
				<div class="form-group"><label class="label">Название фильма<input class="input" name="name" type="text" placeholder="Введите название" /></label></div>
				<div class="row">
					<div class="col">
						<div class="form-group"><label class="label">Жанр<input class="input" name="kind" type="text" placeholder="Введите жанр фильма" /></label></div>
					</div>
					<div class="col">
						<div class="form-group"><label class="label">Год<input class="input" name="year" type="text" placeholder="Введите год" /></label></div>
					</div>
				</div><input class="button" type="submit" name="add-movie" value="Добавить" />
			</form>
		</div>
	</div><!-- build:jsLibs js/libs.js -->
	<script src="libs/jquery/jquery.min.js"></script><!-- endbuild -->
	<!-- build:jsVendor js/vendor.js -->
	<script src="libs/jquery-custom-scrollbar/jquery.custom-scrollbar.js"></script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIr67yxxPmnF-xb4JVokCVGgLbPtuqxiA"></script><!-- endbuild -->
	<!-- build:jsMain js/main.js -->
	<script src="js/main.js"></script><!-- endbuild -->
	<script defer="defer" src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
</body>

</html>