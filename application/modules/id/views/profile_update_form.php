<html>
<head>
	<title></title>
	  <link rel="stylesheet" href="<?php echo $this->config->site_url() ?>default.css" type="text/css" />
<style>
	body {
		background-color: #fff;
	}
</style>
</head>
<body>

<meta charset="utf-8">

	<p>Редактирование профиля</p> <br>

<form action="<?php echo $this->config->site_url() ?>id/profile_update_send" method="post" accept-charset="utf-8">
	

<?php foreach ($profile_data as $item):?>


	Фамилия: <input type="text" name="famil" size="20" maxlength="20" value="<?php echo $item->famil;?>"/> <br>
	Имя: <input type="text" name="name" size="20" maxlength="20" value="<?php echo $item->name;?>"/> <br>
	Отчество: <input type="text" name="otchestvo"  size="20" maxlength="20"  value="<?php echo $item->otchestvo;?>"/>
	<br>
	Почта: <input type="text" name="mail" size="20" maxlength="50" value="<?php echo $item->mail;?>"/><br>
	<?php 
	$sel='';
	$sel1='';
	if($item->sex == 'Мужской'){$sel='selected';}
	if($item->sex == 'Женский'){$sel1='selected';}
	
	 ?>
	Пол:
	<select name="sex"> 
	<option value="не выбран">не выбран</option>
	<option <?php echo $sel; ?> value="Мужской">Мужской</option>
	<option <?php echo $sel1; ?> value="Женский">Женский</option>
	</select>
	<br>
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

<select name="spec_user"> 
<option value="<?php echo $item->spec_user; ?>"><?php echo $item->spec_user; ?></option>
<option value="Менеджмент">Менеджмент</option>
<option value="Разработка сайтов">Разработка сайтов</option>
<option value="Дизайн">Дизайн</option>
<option value="Арт">Арт</option>
<option value="Программирование">Программирование</option>
<option value="Поисковая оптимизация SEO">Поисковая оптимизация SEO</option>
<option value="Полиграфия">Полиграфия</option>
<option value="Флеш">Флеш</option>
<option value="Тексты">Тексты</option>
<option value="Переводы">Переводы</option>
<option value="3D Графика">3D Графика</option>
<option value="Анимация/Мультипликация">Анимация/Мультипликация</option>
<option value="Фотография">Фотография</option>
<option value="Аудио/Видео">Аудио/Видо</option>
<option value="Реклама/Маркейтинг">Реклама/Маркейтинг</option>
<option value="Разработка игр">Разработка игр</option>
<option value="Арихитектура/Интерьер">Арихитектура/Интерьер</option>
<option value="Инжиниринг">Инжиниринг</option>
<option value="Консалтинг">Консалтинг</option>
<option value="Обучение">Обучение</option>
<option value="Мобильные приложения">Мобильные приложения</option>
<option value="Сети и информационные системы">Сети и информационные системы</option>
<option value="Обслуживание клиентов">Обслуживание клиентов</option>
<option value="Маркейтинг и продажи">Маркейтинг и продажи</option>
<option value="Бизнес-услуги">Бизнес-услуги</option>
<option value="Административная поддержка">Административная поддержка</option>
<option value="Репетиторы/Преподаватели">Репетиторы/Преподаватели</option>
</select>
<br>

<h4>Образование:</h4>
Уровень 
<select name="education_level"> 
<option value="<?php echo $item->education_level; ?>"><?php echo $item->education_level; ?></option>
<option value="Высшее">Высшее</option>
<option value="Бакалавр">Бакалавр</option>
<option value="Магистр">Магистр</option>
<option value="Кандидат наук">Кандидат наук</option>
<option value="Доктор наук">Доктор наук</option>
<option value="Неоконченное высшее">Неоконченное высшее</option>
<option value="Среднее специальное">Среднее специальное</option>
<option value="Среднее">Среднее</option>
</select>

<br>Наименование учебного заведения <input type="text" name="education_basic" size="20" maxlength="80" value="<?php echo $item->education_basic;?>"/> 
<br>Факультет <input type="text" name="facultet" size="20"  value="<?php echo $item->facultet;?>"/> 
<br>Год окончания 
<select name="education_end" size="1">
	<?php for ($i = 1900; $i <= 2015; $i++){
	if ($i== $item->education_end){
	echo '<option selected value="'.$i.'">' .$i.' </option>';
	}else{

		echo '<option value="'.$i.'">' .$i.' </option>';

	}
	}?>
	</select>


<br>Знание языков <input type="text" name="language" size="20" maxlength="80" value="<?php echo $item->language;?>"/> 

<h4>Гражданство:</h4>
<br>Гражданство <input type="text" name="citizenship" size="20" maxlength="80" value="<?php echo $item->citizenship;?>"/> 
<br>Разрешение на работу: <input type="text" name="work_permit" size="20" maxlength="80" value="<?php echo $item->citizenship;?>"/> 
<!-- 	<input type="text" name="spec_user" size="20"  value="<?php echo $item->spec_user;?>" />
  -->
<?php endforeach; ?>

<br><input type="submit" value="Сохранить" />

</form>

</body>
</html>