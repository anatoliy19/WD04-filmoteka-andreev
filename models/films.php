<?php 

// Getting All films from DB
function films_all($link) {
	$query = "SELECT * FROM movies";
	$films = array();
	$result = mysqli_query($link, $query);

 	if ( $result = mysqli_query($link, $query) ) {
		while ( $row = mysqli_fetch_array($result) ) {

	  $films[] = $row;  
		}
	}

	return $films;	
}

function film_new($link, $name, $kind, $year, $description) {
	// Save form data to DB
	$query = "INSERT INTO movies (name, kind, year, description) VALUES (
	'". mysqli_real_escape_string($link, $name)."',
	'". mysqli_real_escape_string($link, $kind)."',
	'". mysqli_real_escape_string($link, $year)."',
	'". mysqli_real_escape_string($link, $description)."'
	)";

if ( mysqli_query($link, $query) ) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}

function get_film($link, $id) {
	$query = "SELECT * FROM movies WHERE id = '" . mysqli_real_escape_string( $link, $id ) ."' LIMIT 1";
	$result = mysqli_query($link, $query);
	if ( $result = mysqli_query($link, $query) ) {
		$film = mysqli_fetch_array($result);  
	}
	return $film;
}

function film_update($link, $name, $kind, $year, $id, $description) {

	if ( isset($_FILES['photo']['name']) && $_FILES['photo']['tmp_name'] != '' ) {
		$fileName = $_FILES['photo']['name'];
		$fileTmpLoc = $_FILES['photo']['tmp_name'];
		$fileType = $_FILES['photo']['type'];
		$fileSize = $_FILES['photo']['size'];
		$fileErrorMsg = $_FILES['photo']['error'];
		$kaboom = explode(".", $fileName);
		$fileExt = end($kaboom);

		list($width, $height) = getimagesize($fileTmpLoc);
		if ($width < 10 || $height < 10) {
			$errors[] = 'That image has no dimensions';		
		}
		$db_file_name = rand(10000000, 99999999) . "." . $fileExt;

		if($fileSize > 10485760) {
			$errors[] = 'Your image file was larger than 10mb';
		} else if (!preg_match("/\.(gif|jpg|png|jpeg)$/i", $fileName) ) {
			$errors[] = 'Your image file was not jpg, jpeg, gif or png type';
		} else if ($fileErrorMsg == 1) {
			$errors[] = 'An unknown error occurred';
		}

		$photoFolderLocation = ROOT . 'data/films/full/';
		$photoFolderLocationMin = ROOT . 'data/films/min/';
		// $photoFolderLocationFull = ROOT . 'data/films/full/';
		
		$uploadfile = $photoFolderLocation . $db_file_name;
		$moveResult = move_uploaded_file($fileTmpLoc, $uploadfile);

		if ($moveResult != true) {
			$errors[] = 'File upload failed';
		}
		require_once( ROOT . "/functions/image_resize_imagick.php");
		$target_file = $photoFolderLocation . $db_file_name;
		$resized_file = $photoFolderLocationMin .$db_file_name;
		$wmax = 137;
		$hmax = 200;
		$img = createThumbnail($target_file, $wmax, $hmax);
		$img -> writeImage($resized_file);

	$query = "UPDATE movies 
						SET name = '". mysqli_real_escape_string($link, $name)."',
						 		kind = '". mysqli_real_escape_string($link, $kind)."', 
						 		year = '". mysqli_real_escape_string($link, $year)."',
						 		description = '". mysqli_real_escape_string($link, $description)."', 
						 		photo = '". mysqli_real_escape_string($link, $db_file_name)."' 
						WHERE id = " . mysqli_real_escape_string($link, $id) . " LIMIT 1 ";
						
	if ( mysqli_query($link, $query) ) {
		$result = true;
	} else {
			$result = false;	
	}
	return $result;				
		
	} 
	
}

function film_delete ($link, $id) {
	$query = "DELETE FROM movies WHERE id = '" . mysqli_real_escape_string( $link, $id ) ."' LIMIT 1";
	mysqli_query( $link, $query);

	if ( mysqli_affected_rows( $link ) > 0 ) {
	 	$result = true;
	} else {
		$result = false;
	}
	return $result;
}
 ?>