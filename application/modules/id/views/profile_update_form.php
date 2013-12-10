<html>
<head>
	<title></title>
	  <link rel="stylesheet" href="<?php echo $this->config->site_url() ?>default.css" type="text/css" />
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />

<style>
body{
background-color:#fff;
}


    #middle-pol {
    padding-top: 0px;
    width: 100%;
    height: 0px;
    visibility: hidden;

  }
  #content {
    padding-left: 10%;
    padding-right: 10%;
    display: table;
  }
  #menu {
    height: 39px;
  }

</style>
</head>
<body>


<?php
$logged = $this->session->userdata('logged_in');
foreach ($user_data as $item) {
      $login=$item->login;
      $user_id=$item->user_id;
      $avatar_url=$item->avatar;
      $email=$item->mail;
      }


       $this->load->view('left_user',$user_data); 
   ?>

<div id="polosa"></div>
<div id="right_user">
  <p class="titl"><?php if ($whopage=='my') {
    echo "Мое ";
  } ?>Редактирование профиля</p> <br>
	
<form action="<?php echo $this->config->site_url() ?>id/profile_update_send" method="post" accept-charset="utf-8">
	

<?php foreach ($user_data as $item):?>

<ul>
	<li>Фамилия: <input type="text" name="famil" size="20" maxlength="20" value="<?php echo $item->famil;?>"/> <br>
	</li><li>Имя: <input type="text" name="name" size="20" maxlength="20" value="<?php echo $item->name;?>"/> <br>
	</li><li>Отчество: <input type="text" name="otchestvo"  size="20" maxlength="20"  value="<?php echo $item->otchestvo;?>"/>
	</li><br>
	<li>Почта: <input type="text" name="mail" size="20" maxlength="50" value="<?php echo $item->mail;?>"/><br>
	</li>
	<?php 
	$sel='';
	$sel1='';
	if($item->sex == 'Мужской'){$sel='selected';}
	if($item->sex == 'Женский'){$sel1='selected';}
	
	 ?>
	<li>Пол:
	<select name="sex"> 
	<option value="не выбран">не выбран</option>
	<option <?php echo $sel; ?> value="Мужской">Мужской</option>
	<option <?php echo $sel1; ?> value="Женский">Женский</option>
	</select>
	<br></li><li>
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

<br></li><li>Город <input type="text" name="sity" size="20" maxlength="20" value="<?php echo $item->sity;?>"/> 

	<!-- <input type="text" name="birthday" size="20"  value="<?php echo $item->birthday;?> " />
	 --><br>
	</li><li>Специализация: 

<script language ="JavaScript"> 

function selChange(seln) { 
selNum = seln.spec_user.selectedIndex; 
Isel = seln.spec_user.options[selNum].text; 
//alert("Выбрано: "+Isel);

if (Isel == 'Другое'){
 //document.getElementById("div1").innerHTML="<input type="text" name ="spec_user" onkeypress='validate(event)' maxlength="20" class="input-small" placeholder="Введите свою специализацию" ><br>";
document.getElementById('div1').innerHTML='<input type="text" name ="spec_user1" onkeypress="validate(event)" maxlength="20" placeholder="Введите свою специализацию" ><br>';
}else{
	document.getElementById('div1').innerHTML='';
}


} 
 
</script> 

<select class="batn" id="regsel" name="spec_user" onChange="selChange(this.form)">

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
<option value="Другое">Другое</option>

</select>

<div id="div1">
 
 </div>

<br></li><li>


<h4>Контакты:</h4></li><ul><li>
Телефон: <input type="text" name="telephone" size="20" maxlength="20" value="<?php echo $item->telephone;?>"/> 
<br></li><li>Дополнительный телефон: <input type="text" name="dop_telephone" size="20" maxlength="80" value="<?php echo $item->dop_telephone;?>"/> 
<br></li><li>Skype: <input type="text" name="skype" size="20" maxlength="20" value="<?php echo $item->skype; ?>"/> 
<br></li><li>Личный сайт: <input type="text" name="website" size="30" maxlength="40" value="<?php echo $item->website;?>"/> 

</li></ul>






<li><h4>Образование:</h4></li><ul><li>
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

<br></li><li>Наименование учебного заведения <input type="text" name="education_basic" size="20" maxlength="80" value="<?php echo $item->education_basic;?>"/> 
<br></li><li>Факультет <input type="text" name="facultet" size="20"  value="<?php echo $item->facultet;?>"/> 
<br></li><li>Год окончания 
<select name="education_end" size="1">
	<?php for ($i = 1900; $i <= 2015; $i++){
	if ($i== $item->education_end){
	echo '<option selected value="'.$i.'">' .$i.' </option>';
	}else{

		echo '<option value="'.$i.'">' .$i.' </option>';

	}
	}?>
	</select>


<br></li><li>Знание языков <input type="text" name="language" size="20" maxlength="80" value="<?php echo $item->language;?>"/> 
</li></ul>
<li>Интересы: <br>
<textarea name="interests" cols="40" rows = "10" maxlength = "250"> <?php echo $item->interests; ?> </textarea> <br>

</li>
</ul>
<?php endforeach; ?>

<br><input type="submit" id="prof-upd" value="Сохранить" />

</form>
</div>
</body>
</html>