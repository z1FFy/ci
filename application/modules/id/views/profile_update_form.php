

<style>



    #middle-pol {
    padding-top: 0px;
    width: 100%;
    height: 0px;
    visibility: hidden;

  }
  #content {
    padding-left: 0%;
    padding-right: 0%;
    display: table;
  }

 .styler {
 	margin: 4px;
 }
</style>



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

<ul class="spi">

	<li>Фамилия: <input class="styler" type="text" name="famil" size="20" maxlength="20" value="<?php echo $text = htmlspecialchars($item->famil, ENT_QUOTES);?>"/> <br>
	</li><li>Имя: <input class="styler" type="text" name="name" size="20" maxlength="20" value="<?php echo $text = htmlspecialchars($item->name, ENT_QUOTES);?>"/> <br>
	</li><li>Отчество: <input class="styler" type="text" name="otchestvo"  size="20" maxlength="20"  value="<?php echo $text = htmlspecialchars($item->otchestvo, ENT_QUOTES);?>"/>

	</li><br>
	<li>Почта: <input class="styler" type="text" name="mail" size="20" maxlength="50" value="<?php echo $item->mail;?>"/><br>
	</li>
	<?php 
	$sel='';
	$sel1='';
	if($item->sex == 'Мужской'){$sel='selected';}
	if($item->sex == 'Женский'){$sel1='selected';}
	
	 ?>
	<li>Пол:
	<select style="width: 100px;" name="sex"> 
	<option value="не выбран">не выбран</option>
	<option <?php echo $sel; ?> value="Мужской">Мужской</option>
	<option <?php echo $sel1; ?> value="Женский">Женский</option>
	</select>
	<br></li><li>
	Дата Рождения: 


	<select style="width: 100px;" name="birthday1" >
	<option value="day">день</option>
	<?php for ($i = 1; $i <= 31; $i++){
	if ($i<10){
	echo '<option value="0'.$i.'">0' .$i.' </option>';
	}else{

		echo '<option value="'.$i.'">' .$i.' </option>';

	}
	
	}?>
	</select>


	<select style="width: 100px;" name="birthday2" >
		<option value="month">месяц</option>
	<?php for ($i = 1; $i <= 12; $i++){
	if ($i<10){
	echo '<option value="0'.$i.'">0' .$i.' </option>';
	}else{

		echo '<option value="'.$i.'">' .$i.' </option>';

	}
	}?>
	</select>


	<select style="width: 100px;" name="birthday3" >
		<option value="year">год</option>
	<?php for ($i = 1800; $i <= 2015; $i++){
	echo '<option value="'.$i.'">' .$i.' </option>';
	}?>
	</select>


<br></li><li>Город <input class="styler" type="text" name="sity" size="20" maxlength="20" value="<?php echo $text = htmlspecialchars($item->sity, ENT_QUOTES);?>"/> 

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

<select  class="batn" id="regsel" name="spec_user" onChange="selChange(this.form)">

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
<option value="Аудио/Видео">Аудио/Видео</option>
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


<h4>Контакты:</h4></li><ul class="spi"><li>

Телефон: <input class="styler" type="text" name="telephone" size="20" maxlength="20" value="<?php echo $text = htmlspecialchars($item->telephone, ENT_QUOTES);?>"/> 
<br></li><li>Дополнительный телефон: <input  class="styler" type="text" name="dop_telephone" size="20" maxlength="80" value="<?php echo $text = htmlspecialchars($item->dop_telephone, ENT_QUOTES);?>"/> 
<br></li><li>Skype: <input  class="styler" type="text" name="skype" size="20" maxlength="20" value="<?php echo $text = htmlspecialchars($item->skype, ENT_QUOTES); ?>"/> 
<br></li><li>Личный сайт: <input  class="styler" type="text" name="website" size="30" maxlength="40" value="<?php echo $text = htmlspecialchars($item->website, ENT_QUOTES);?>"/> 


</li></ul>






<li><h4>Образование:</h4></li><ul class="spi"><li>
Уровень 
<select name="education_level"> 
<option value="<?php echo $item->education_level; ?>"><?php echo $text = htmlspecialchars($item->education_level, ENT_QUOTES); ?></option>
<option value="Высшее">Высшее</option>
<option value="Бакалавр">Бакалавр</option>
<option value="Магистр">Магистр</option>
<option value="Кандидат наук">Кандидат наук</option>
<option value="Доктор наук">Доктор наук</option>
<option value="Неоконченное высшее">Неоконченное высшее</option>
<option value="Среднее специальное">Среднее специальное</option>
<option value="Среднее">Среднее</option>
</select>


<br></li><li>Наименование учебного заведения <input class="styler" type="text" name="education_basic" size="20" maxlength="80" value="<?php echo $text = htmlspecialchars($item->education_basic, ENT_QUOTES);?>"/> 
<br></li><li>Факультет <input class="styler" type="text" name="facultet" size="20"  value="<?php echo $text = htmlspecialchars($item->telephone, ENT_QUOTES);echo $text = htmlspecialchars($item->facultet, ENT_QUOTES);?>"/> 

<br></li><li>Год окончания 
<select name="education_end" style="width: 100px;">
	<?php for ($i = 1900; $i <= 2015; $i++){
	if ($i== $item->education_end){
	echo '<option selected value="'.$i.'">' .$i.' </option>';
	}else{

		echo '<option value="'.$i.'">' .$i.' </option>';

	}
	}?>
	</select>


<br></li><li>Знание языков <input class="styler" type="text" name="language" size="20" maxlength="80" value="<?php echo $item->language;?>"/> 
</li></ul>
<li><b>Интересы:</b> <br>
<textarea class="styler" name="interests" cols="40" rows = "10" maxlength = "250"> <?php echo $item->interests; ?> </textarea> <br>
<?php
foreach ($acc_data as $item) {
	$acc = $item->account;
}
if($acc=='pro'){
?>
</li><li>Фон: <br></li>
<select style="width:160px" id="typefon" name="typefon" class="styler">
	<option value="color">Сплошной цвет</option>
	<option value="bg">Изображение</option>
	</select>
	<div id="color_t">
Цвет:<select style="width:100px" id="fon" name="fon" class="styler">
	<option value="white">Белый</option>
	<option value="grey">Серый</option>

</select></div>
<div id="bg_t">
Изображение:
<style>
	.bge {
		border: 3px solid #bbb;
	}
</style>
<div id="preview" style="width:500px;height:1200px;">
	<input type="hidden" name="bg" value="0">
	<img class="bge" name="img1" width="100" height="100" src="<?php echo $this->config->site_url().'images/bg/1.jpg'?>">
	<img class="bge" name="img2" width="100" height="100" src="<?php echo $this->config->site_url().'images/bg/2.jpg'?>">
	<img class="bge" name="img3" width="100" height="100" src="<?php echo $this->config->site_url().'images/bg/3.jpg'?>">
	<img class="bge" name="img4" width="100" height="100" src="<?php echo $this->config->site_url().'images/bg/4.jpg'?>">
	<img class="bge" name="img5" width="100" height="100" src="<?php echo $this->config->site_url().'images/bg/5.jpg'?>">
	<img class="bge" name="img6" width="100" height="100" src="<?php echo $this->config->site_url().'images/bg/6.jpg'?>">
	<img class="bge" name="img7" width="100" height="100" src="<?php echo $this->config->site_url().'images/bg/7.jpg'?>">
	<img class="bge" name="img8" width="100" height="100" src="<?php echo $this->config->site_url().'images/bg/8.jpg'?>">
	<img class="bge" name="img9" width="100" height="100" src="<?php echo $this->config->site_url().'images/bg/9.jpg'?>">
	<img class="bge" name="img10" width="100" height="100" src="<?php echo $this->config->site_url().'images/bg/10.jpg'?>">
	<img class="bge" name="img11" width="100" height="100" src="<?php echo $this->config->site_url().'images/bg/11.jpg'?>">
	<img class="bge" name="img12" width="100" height="100" src="<?php echo $this->config->site_url().'images/bg/12.jpg'?>">
	<img class="bge" name="img13" width="100" height="100" src="<?php echo $this->config->site_url().'images/bg/13.jpg'?>">
	<img class="bge" name="img14" width="100" height="100" src="<?php echo $this->config->site_url().'images/bg/14.jpg'?>">
	<img class="bge" name="img15" width="100" height="100" src="<?php echo $this->config->site_url().'images/bg/15.jpg'?>">
	<img class="bge" name="img16" width="100" height="100" src="<?php echo $this->config->site_url().'images/bg/16.jpg'?>">
	<img class="bge" name="img17" width="100" height="100" src="<?php echo $this->config->site_url().'images/bg/17.jpg'?>">
	<img class="bge" name="img18" width="100" height="100" src="<?php echo $this->config->site_url().'images/bg/18.jpg'?>">
	<img class="bge" name="img19" width="100" height="100" src="<?php echo $this->config->site_url().'images/bg/19.jpg'?>">
	<img class="bge" name="img20" width="100" height="100" src="<?php echo $this->config->site_url().'images/bg/20.jpg'?>">
	<img class="bge" name="img21" width="100" height="100" src="<?php echo $this->config->site_url().'images/bg/21.jpg'?>">
	<img class="bge" name="img22" width="100" height="100" src="<?php echo $this->config->site_url().'images/bg/22.jpg'?>">
	<img class="bge" name="img23" width="100" height="100" src="<?php echo $this->config->site_url().'images/bg/23.jpg'?>">
	<img class="bge" name="img24" width="100" height="100" src="<?php echo $this->config->site_url().'images/bg/24.jpg'?>">
	<img class="bge" name="img25" width="100" height="100" src="<?php echo $this->config->site_url().'images/bg/25.jpg'?>">
	<img class="bge" name="img26" width="100" height="100" src="<?php echo $this->config->site_url().'images/bg/26.jpg'?>">
	<img class="bge" name="img27" width="100" height="100" src="<?php echo $this->config->site_url().'images/bg/27.jpg'?>">
	<img class="bge" name="img28" width="100" height="100" src="<?php echo $this->config->site_url().'images/bg/28.jpg'?>">
	<img class="bge" name="img29" width="100" height="100" src="<?php echo $this->config->site_url().'images/bg/29.jpg'?>">
	<img class="bge" name="img30" width="100" height="100" src="<?php echo $this->config->site_url().'images/bg/30.jpg'?>">
	<img class="bge" name="img31" width="100" height="100" src="<?php echo $this->config->site_url().'images/bg/31.jpg'?>">
	<img class="bge" name="img32" width="100" height="100" src="<?php echo $this->config->site_url().'images/bg/32.jpg'?>">
	<img class="bge" name="img33" width="100" height="100" src="<?php echo $this->config->site_url().'images/bg/33.jpg'?>">
	<img class="bge" name="img34" width="100" height="100" src="<?php echo $this->config->site_url().'images/bg/34.jpg'?>">
	<img class="bge" name="img35" width="100" height="100" src="<?php echo $this->config->site_url().'images/bg/35.jpg'?>">
	<img class="bge" name="img36" width="100" height="100" src="<?php echo $this->config->site_url().'images/bg/36.jpg'?>">
	<img class="bge" name="img37" width="100" height="100" src="<?php echo $this->config->site_url().'images/bg/37.jpg'?>">
	<img class="bge" name="img38" width="100" height="100" src="<?php echo $this->config->site_url().'images/bg/38.jpg'?>">
	<img class="bge" name="img39" width="100" height="100" src="<?php echo $this->config->site_url().'images/bg/39.jpg'?>">
	<img class="bge" name="img40" width="100" height="100" src="<?php echo $this->config->site_url().'images/bg/40.jpg'?>">
	<img class="bge" name="img41" width="100" height="100" src="<?php echo $this->config->site_url().'images/bg/41.jpg'?>">
	<img class="bge" name="img42" width="100" height="100" src="<?php echo $this->config->site_url().'images/bg/42.jpg'?>">
	

</div>
</div>
</ul>
<?php } endforeach; ?>

<br><input style="font-size:19px;" class="styler" type="submit" id="prof-upd" value="Сохранить" />

</form>
</div>
