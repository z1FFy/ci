<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
		<title>PortfoliOnline BETA</title>
	<link href="images/new/style.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="images/new/slider.css">
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

</head>

<body>
<!-- <div id="bg_h"> -->

<font id="v_text">ОНЛАЙН СЕРВИС ДЛЯ СОЗДАНИЯ ПЕРСОНАЛЬНОГО БЕСПЛАТНОГО ПОРТФОЛИО</font>
	<div id="v_head">
<a href="<?php echo $this->config->site_url() ?>"><img src="<?php echo $this->config->site_url() ?>images/new/logo.png" id="logo"></a>

	</div>
	<div class="wrapper">

	<header class="header">

	<div id="a_auth">
	<div id="v_auth">Вход / Регистрация</div>
		<div id="c_auth">
			<?php if ($logged == TRUE) {
				echo '<p align="center">Вы уже авторизированны</p>';
				echo '<div style="float:right; width: 100px; " id="user_exit"  style="padding: 4px 11px;margin-top: 10px;" class="baatn">Выйти</div>
					  <div style=" width: 100px;" id="user_page" link='.$user_id.' style="padding: 4px 11px;margin-top: 10px;" class="baatn">Войти</div>';
			}else{
			 echo '
				  <input style="width: 230px;" type="text" name="login-entry"  onkeypress="validate(event)" class="auth styler" maxlength="20" placeholder="Логин">
				  <input style="width: 230px;" type="password" name ="password-entry"  onkeypress="validate(event)" class="auth styler"maxlength="20" placeholder="Пароль">
				 <br> <div    class="btn_entry baatn">Войти</div>';
				echo '<font style="color:#fff;font-size:14px;"><a id="loss_pass" href="'.$this->config->site_url().'site/lose_pass">Забыли пароль?</a></font>';
				} ?>
				<br><div style="width: 157px;padding-left: 80px" onclick="location.href='<?php echo $this->config->site_url(); ?>site/reg'"  style="padding: 4px 11px;margin-top: 10px;" class="baatn">Регистрация</div>
				  

		</div>
	</div>
</header><!-- .header-->
<!-- <div style="background-color: #404c53;
height: 330px;
position: absolute;
top: 0px;
width: 950px;"> -->
<div class="slider-wrapper" >
<ul id="pagi" class="s-thumbs">
			<li><a href="#slide-1"><img src="images/new/sl_pag.png" width="15"></a></li>
			<li><a href="#slide-2"><img src="images/new/sl_pag.png" width="15"></a></li>
		</ul>

<ul class="s-slides">
    <li id="slide-1" class="slideRight first"><div id="slider1"> </div></li>
    <li id="slide-2" class="slideRight"><div id="slider2"> </div></li>
</ul>
</div>
<!-- </div> -->
	<main class="content">
	<div id="m_a_bl">
		<div id="m_t_bl">ПОРТФОЛИО ОНЛАЙН?</div>
		<div id="m_c_bl">В России на стартапе низкие доходы начинающего фрилансера могут окончательно убить желание заниматься любимым
делом. <br>Особенно если причины неудачи не понятны, что же можно придумать в этой не легкой ситуации, чтобы исправить
положение текущих дел? <br>Причин и ошибок в этой области может быть очень много, заметим, что одной из самых часто
встречающихся является отсутствие онлайн-портфолио.<br>PortfoliOnline.ru является наилучшей демонстрацией ваших навыков
и примеров с Вашими работами. <br>Без нашего сервиса PortfoliOnline.ru вы не сможете показать потенциальному заказчику,
теперь Вам не придется ломать голову над вопросам как? Где? И кому? Показать свои работы. <br>PortfoliOnline.ru - это то, с чего
нужно начинать Вашу карьеру молодого или опытного фрилансера. <br>Неважно в какой именно области вы работаете:
дизайн сайтов, графический дизайн, музыка или фотография.<br>
Причин завести портфолио много. Остановимся на некоторых из них. <br>
<a class="banner"><img alt="Реклама" class="banner" src="images/new/728.png"></a>
	</div>
	</div>
	<div id="m_bg">
<div style="width: 100%;margin-left: 8.5%;">		
<div  class="m_bl">
<p  class="m_t_block" >1. Ваши клиенты</p><br>
<div class="m_t_text">Одна из самых полезных, которые может принести в вашу жизнь портфолио — это новые клиенты. Если ваш фриланс-бизнес застопорился, возможно, самое время завести убийственное портфолио у нас на сайте PortfoliOnline.ru, перед которым не сможет устоять никто. PortfoliOnline.ru продемонстрирует вашу креативность и уровень мастерства.
</div>
</div>
<div   class="m_bl">
<p  class="m_t_block" >2. Лицом к лицу</p><br>
<div class="m_t_text">Само наличие онлайн-портфолио подтверждает ваш профессионализм. Как правило у заказчика не возникает проблем с поиском исполнителей, однако выбрать среди них не так просто. В этом случае портфолио придет на помощь. Согласно статистике, выбирая между претендентами, у которых есть портфолио и теми, у кого его нет, работодатель отдает предпочтение первым. А причина в хорошем первом впечатлении.</div>
</div>
<div   class="m_bl">
<p  class="m_t_block" >3. Присутствие в Сети</p><br>
<div class="m_t_text">После создания портфолио на PortfoliOnline.ru Вы будете всегда на связи со своими заказчиками и друзьями 24/7/365. Вам остается только выбрать подходящий Вам аккаунт с различными инструментами, которые помогут показать Ваши работы всему миру!</div>
	</div>
</div>
</div>
		</main><!-- .content -->

</div><!-- .wrapper -->
<!-- BGH </div> -->
<footer class="footer">
	<div class="rekl">
		<p class="f_title">Реклама на сайте</p>
		<br><img src="images/new/adress.png">
			<p class="f_text">По всем вопросам размещения
			рекламы на сайте пишите на наш
			электронный адрес: <br>
			E-mail: <a  style="color:#fff;" href="mailto:pr@portfolionline.ru">pr@portfolionline.ru</a></p>
	</div>	
	<div id="prav" style="margin-left:70px;" class="rekl">
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