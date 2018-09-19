<?php 

// DB CONNECTION
require('config.php');
require('database.php');
$link = db_connect();

require('models/films.php');

if (array_key_exists('add-film', $_POST)) {

	// Обработка ошибок
	if ( $_POST['name'] == '' ) {
		$errors[] = "Необходимо ввести название фильма!";
	}
	if ( $_POST['kind'] == '' ) {
		$errors[] = "Необходимо ввести жанр фильма!";
	}
	if ( $_POST['year'] == '' ) {
		$errors[] = "Необходимо ввести год фильма!";
	}

	// Запись данных в БД если нет  ошибок
	if ( empty($errors)) {
		
		$result = film_new($link, $_POST['name'], $_POST['kind'], $_POST['year'], $_POST['description']);

		if ( $result ) {
			$resultSuccess = "Фильм был успешно добавлен!";
		} else {
			$resultError = "Что-то пошло не так!";
		}
	}		
}

include('views/head.tpl');
include('views/notification.tpl');
include('views/new-film.tpl');
include('views/footer.tpl');

?>