<h1 class="title-1">Добавить новый фильм</h1>
 <div class="panel-holder mt-30 mb-100">
 	<div class="title-3 mt-0">Добавить фильм</div>

 	<form action="new.php" method="POST">
 	<!-- Показываем ошибки если поля не заполнены -->
 		<?php  
 			if ( !empty($errors)) {
 				foreach ($errors as $key => $value) {
 					echo '<div class="notify notify--error mb-20">'.$value.'</div>';
 				}
 			}
 		?>

 		<div class="form-group"><label class="label">Название фильма<input class="input" name="name" type="text" placeholder="Введите название" /></label></div>
 		<div class="row">
 			<div class="col">
 				<div class="form-group"><label class="label">Жанр<input class="input" name="kind" type="text" placeholder="Введите жанр" /></label></div>
 			</div>
 			<div class="col">
 				<div class="form-group"><label class="label">Год<input class="input" name="year" type="text" placeholder="Введите год" /></label></div>
 			</div>		
 		</div>
 		<textarea class="textarea mb-20" name="description" placeholder="Введите описание фильма"></textarea>
 		<input class="button" type="submit" name="add-film" value="Добавить" />
 	</form>
 </div>
 </div>