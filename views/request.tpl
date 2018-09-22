<h1>Укажите ваши данные</h1>

<form action="request.php" method="POST" class="mb-50">
 	 
 		<label class="label-title">Ваше имя</label>
 		<input class="input" name="user-name" type="text" placeholder="Введите имя"/>

 		<label class="label-title">Ваш город</label>
 		<input class="input" name="user-city" type="text" placeholder="Введите город"/>

 		<input class="button" name="user-submit" type="submit" value="Сохранить"/>
 	</form>


 	<form action="unset-cookie.php" method="POST"> 
 		 		
 		   <input type="submit" class="button" name="user-unset"   value="Удалить данные"/>
 	</form>