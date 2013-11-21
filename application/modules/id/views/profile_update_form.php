<html>
<head>
	<title></title>
</head>
<body>

<meta charset="utf-8">

	Профиль <br>

<form action="<?php echo $this->config->site_url() ?>id/profile_update_send" method="post" accept-charset="utf-8">
	

<?php foreach ($profile_data as $item):?>


	Фамилия: <input type="text" name="famil" size="20"  value="<?php echo $item->famil;?>"/> <br>
	Имя: <input type="text" name="name" size="20"  value="<?php echo $item->name;?>"/> <br>
	Отчество: <input type="text" name="otchestvo" size="20"  value="<?php echo $item->otchestvo;?>"/>
	<br>
	Почта: <input type="text" name="mail" size="20"  value="<?php echo $item->mail;?>"/><br>
	Дата Рождения: 


	<select name="birthday1" size="1">
	<?php for ($i = 1; $i <= 31; $i++){
	if ($i<10){
	echo '<option value="0'.$i.'">0' .$i.' </option>';
	}else{

		echo '<option value="'.$i.'">' .$i.' </option>';

	}
	
	}?>
	</select>


	<select name="birthday2" size="1">
	<?php for ($i = 1; $i <= 12; $i++){
	if ($i<10){
	echo '<option value="0'.$i.'">0' .$i.' </option>';
	}else{

		echo '<option value="'.$i.'">' .$i.' </option>';

	}
	}?>
	</select>


	<select name="birthday3" size="1">
	<?php for ($i = 1800; $i <= 2015; $i++){
	echo '<option value="'.$i.'">' .$i.' </option>';
	}?>
	</select>


	<!-- <input type="text" name="birthday" size="20"  value="<?php echo $item->birthday;?> " />
	 --><br>
	Специализация: 

<select name="spec_user" size="1">
<option value="Менеджмент">Менеджмент</option>
<option selected="selected" value="Разработка сайтов">Разработка сайтов</option>
<option value="Дизайн">Дизайн</option>
<option value="Арт">Арт</option>
<option value="Программирование">Программирование</option>
<option value="Поисковая оптимизация SEO">Поисковая оптимизация SEO</option>
<option value="Полиграфия">Полиграфия</option>
<option value="Флеш">Флеш</option>
<option value="Тексты<">Тексты</option>
<option value="Переводы">Переводы</option>
<option value="3D Графика">3D Графика</option>
</select>

<!-- 	<input type="text" name="spec_user" size="20"  value="<?php echo $item->spec_user;?>" />
  -->
<?php endforeach; ?>

<input type="submit" value="Сохранить" />

</form>

</body>
</html>