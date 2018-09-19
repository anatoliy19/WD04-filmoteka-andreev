<div class="title-1">Фильмотека</div>
		<!-- Вывод фильмов из базы данных -->
		<?php foreach ($films as $key => $film) { ?>
			<div class="card mb-20">

				<div class="row">
					<div class="col-auto">
						<img height="200" src="<?=HOST?>data/films/min/<?=$film['photo']?>" alt="<?=$film['name']?>">
					</div>
					<!-- /.col-auto -->
					<div class="col">
						<div class="card__header">
							<h4 class="title-4"><?=$film['name']?></h4>
							<div class="buttons">
								<a href="edit.php?id=<?=$film['id']?>" class="button button--edit mr-20">Редактировать</a>
								<a href="?action=delete&id=<?=$film['id']?>" class="button button--remove">Удалить</a>
							</div>	
						</div>
						<div class="badge"><?=$film['kind']?></div>
						<div class="badge"><?=$film['year']?></div>
						<div class="mt-20"></div>
						<a href="single.php?id=<?=$film['id']?>" class="button">Подробнее</a>
					</div>  
					<!-- /.col -->
				</div>
				<!-- /.row -->
			</div>	
		<?php	} ?>