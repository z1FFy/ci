<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
		<title>Регистрация / PortfoliOnline</title>
	<link href="<?php echo $this->config->site_url() ?>images/new/style.css" rel="stylesheet">
	  <link rel="stylesheet" href="<?php echo $this->config->site_url() ?>jquery.formstyler.css" type="text/css" />
<link rel="shortcut icon" href="<?php echo $this->config->site_url() ?>favicon.ico">
   <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script> 
   <script type="text/javascript" src="<?php echo $this->config->site_url() ?>core.js"></script>
  <script type="text/javascript" src="<?php echo $this->config->site_url() ?>jquery.formstyler.min.js"></script>
        <script type="text/javascript" src="<?php echo $this->config->site_url() ?>jquery.simplemodal.1.4.4.min.js"></script>
<meta name="keywords" content="онлайн портфолио,бесплатное онлайн портфолио,портфолио онлайн бесплатно,портфолио сделать онлайн,портфолио создать онлайн,детское портфолио онлайн бесплатно,создать портфолио онлайн бесплатно,сделать бесплатно онлайн портфолио,детское портфолио сделать онлайн,портфолио,сделать детское портфолио онлайн бесплатно,портфолио школьника создать онлайн,создать детское портфолио онлайн бесплатно,портфолио +для мальчика онлайн,портфолио ребенка онлайн,портфолио онлайн бесплатно,портфолио смотреть онлайн,онлайн создание портфолио,портфолио заполнить онлайн,портфолио онлайн бесплатно +для детей,онлайн портфолио дизайнера,portfolionline,po ,gjhnajkbj jykfqy ,gjhnajkbjjykfqy ,tcgkfnyj,portfolio free,portfolio online free,portfolioonline free,portfolioonline free,portfolionline free,онлайн портфолио фотографа,онлайн портфолио модели ,онлайн портфолио модели бесплатно,портфолио онлайн фотограф,онлайн портфолио бесплатно" />
<META NAME="z-payment.label" CONTENT="z-payment label 89A5BBE876A300ADBFB9E3AA3D6EF4C3">
<meta name="interkassa-verification" content="3b63f53503c90f52695402dc6019f79c" />
   <!--[if IE]>
      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
      <![endif]-->
<script>
  $(document).ready(function() {

 	$('.soglchek').click(function() {
 		$('#reg').removeAttr('disabled');
 	});
  });
</script>
<style>
#v_head {
	background-color: #404c53;
}
	.w  {
		width: 200px;
		margin: 4px;
	}


</style>  
</head>

<body>
<font id="v_text">ОНЛАЙН СЕРВИС ДЛЯ СОЗДАНИЯ ПЕРСОНАЛЬНОГО БЕСПЛАТНОГО ПОРТФОЛИО</font>
	<div id="v_head">
	<a href="<?php echo $this->config->site_url() ?>"><img src="<?php echo $this->config->site_url() ?>images/new/logo.png" id="logo"></a>
	</div>
	<div class="wrapper">

	<main  style="min-height:500px;" class="content">
<div align="center">
  <br><p style="font-size:30px;color:#404c53">Регистрация </p>
<br>

<script language ="JavaScript"> 

function selChange(seln) { 
selNum = seln.spec_user.selectedIndex; 
Isel = seln.spec_user.options[selNum].text; 


if (Isel == 'Другое'){
document.getElementById('div1').innerHTML='<input type="text" name ="spec_user1" onkeypress="validate(event)" maxlength="20" class="w styler" placeholder="Введите специализацию" ><br>';
}else{
	document.getElementById('div1').innerHTML='';
}


} 
 
</script> 

<form>
<div style=""><select class="styler" id="regsel"  name="spec_user" onChange="selChange(this.form)">
<option selected="selected" value="Специализация">Специализация</option>
<option value="Менеджмент">Менеджмент</option>
<option  value="Разработка сайтов">Разработка сайтов</option>
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
<option value="Реклама/Маркетинг">Реклама/Маркетинг</option>
<option value="Разработка игр">Разработка игр</option>
<option value="Арихитектура/Интерьер">Арихитектура/Интерьер</option>
<option value="Инжиниринг">Инжиниринг</option>
<option value="Консалтинг">Консалтинг</option>
<option value="Обучение">Обучение</option>
<option value="Мобильные приложения">Мобильные приложения</option>
<option value="Сети и информационные системы">Сети и информационные системы</option>
<option value="Обслуживание клиентов">Обслуживание клиентов</option>
<option value="Маркетинг и продажи">Маркетинг и продажи</option>
<option value="Бизнес-услуги">Бизнес-услуги</option>
<option value="Административная поддержка">Административная поддержка</option>
<option value="Репетиторы/Преподаватели">Репетиторы/Преподаватели</option>
<option value="Другое">Другое</option>

</select></div>
</form>
<label id="div1"></label>
 <br>
 

<!--  <input  type="text" name ="famil" onkeypress='validate(event)' maxlength="20" class="w styler" placeholder="Фамилия" ><br>
  <input type="text" name ="name" onkeypress='validate(event)' maxlength="20" class="w styler" placeholder="Имя" ><br>
 -->
  <input type="text" name ="login" onkeypress='validate(event)' maxlength="20" class="w styler" placeholder="Логин" ><br>
<input type="text" id="mail"  name="email" onkeypress='validate(event)' maxlength="40" class="w styler" placeholder="Email"><br>
  <input type="password" name ="pass" onkeypress='validate(event)' maxlength="20" class="w styler" placeholder="Пароль"><br>
    <input type="password" name ="password2" onkeypress='validate(event)' maxlength="20" class="w styler" style="margin-left: 6px;" placeholder="Повторите Пароль">
 <br> <label style="margin-left: 30px;
height: 20px;
width:  170px;" id="pad">  </label> 
<br> <div><a  href="/site/licension" target="_blank">Пользовательское соглашение</a><br></div><input  class="soglchek styler" type="checkbox">С правилами ознакомлен(а)
 <br> <button class="styler" disabled="true" id="reg"  class="btn">Зарегистрироваться</button>
</div>
	</main><!-- .content -->

</div><!-- .wrapper -->
</div>
<footer class="footer">
	<div class="rekl">
		<p class="f_title">Реклама на сайте</p>
		<br><img src="<?php echo $this->config->site_url() ?>images/new/adress.png">
			<p class="f_text">По всем вопросам размещения
			рекламы на сайте пишите на наш
			электронный адрес: <br>
			E-mail: pr@portfolionline.ru</p>
	</div>	
	<div style="margin-left:70px;" class="rekl">
	<p class="f_title">Информация для
правообладателей</p>
<a style="color:#fff;margin-left:110px;font-size:15px;" href="/id/info">Подробнее</a>
</div>
	<div style="margin-left:70px;" class="rekl">
		<p class="f_title">Служба технической поддержки</p>
		<form  action="<?php echo $this->config->site_url() ?>id/support" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	<br>	<input style="width:70px" class="styler" type="text" name="support_name" maxlength="40" placeholder="Ваше имя" />
		<input style="width:80px" class="styler" type="text" name="support_mail" maxlength="40" placeholder="Email" />
		<br>
		<textarea style="width:174px;" class="styler" name="support_message" placeholder="Ваше сообщение"></textarea>
		<br>
		<input style="margin-left: 104px" class="styler" type="submit" value="Отправить" />

</form>
	</div>
</footer><!-- .footer -->
	<div id="m_footer">Copyright 2013  portfolionline.ru. All rights reserved.</div>
</body>
</html>