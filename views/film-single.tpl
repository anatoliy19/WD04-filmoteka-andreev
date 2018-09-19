<div class="title-1">Информация о фильме</div>

			<div class="card mb-20">

				<div class="row">
					<div class="col">
						<img src="<?=HOST?>data/films/14349.jpg" alt="<?=$film['name']?>">
					</div>
					<!-- /.col -->
					<div class="col">
						<div class="card__header">
							<h4 class="title-4"><?=$film['name']?></h4>
							<div class="buttons">
								<a href="edit.php?id=<?=$film['id']?>" class="button button--edit mr-20">Редактировать</a>
								<a href="index.php?action=delete&id=<?=$film['id']?>" class="button button--remove">Удалить</a>
							</div>	
						</div>
					</div>
					<!-- /.col -->
				</div>
				<!-- .row -->

				
				<div class="badge"><?=$film['kind']?></div>
				<div class="badge"><?=$film['year']?></div>
				<div class="user-content">
					<p><?=$film['description']?></p></div>
			</div>	
