<?php


$link = mysqli_connect('localhost','root','','WD04-filmoteka-andreev');



if (mysqli_connect_error()){


	die("ошибка подключения к базе данных");
} 

//добавить фильмы в БД
	print_r($_POST);  

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

$query = "SELECT * From movies";
 
$movies = array();

if ($result = mysqli_query($link,$query)){

	
    while ($row = mysqli_fetch_array($result)){
    		$movies[] = $row;    	 
    }
}




?>

   

    <h1> Таблица с фильмами</h1>

		<table border="1">
    		
    		<thead>
    			<tr>
    				<th>ID</th>
    				<th>Название</th>
    				<th>Жанр</th>
    				<th>Год</th>
    			</tr>
    		</thead>
    		<tbody>

    			<?php 

    			foreach ($movies as $key => $value) {
    			?>
    				<tr>
    				 
    				<td><?php echo $movies[$key]['id'] ?></td>
    				<td><?php echo $movies[$key]['name'] ?></td>
    				<td><?php echo $movies[$key]['kind'] ?></td>
    				<td><?php echo $movies[$key]['year'] ?></td>
    				</tr>
    		<?php
    			}

    		?> 	 
	   		</tbody>
    	</table>

     <h2>Форма добавления фильмов</h2>

     <form action="index.php" method="POST">
     	
     	<input type="text" placeholder="Введите название" name="name">
     	<input type="text" placeholder="Введите жанр" name="kind">
     	<input type="password" placeholder="Введите год" name="year">
     	<input type="submit" placeholder="Добавить фильм" name="add-movie">
     </form>

 

 
 

