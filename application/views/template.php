<?php 
$fon='';
$colortext='';
if (!empty($user_data)){
    foreach ($user_data as $item) {
      $fon=$item->fon;
      $acc=$item->account;
      $colortext=$item->colortext;

  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title><?php echo $title; ?></title>
    <meta charset="utf-8">
  <link rel="stylesheet" href="<?php echo $this->config->site_url() ?>default.css?v=2" type="text/css" />
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
<style>
<?php
if ($acc!='pro') {
  echo '#right_user {
    min-height: 700px;
  }';
}
 ?>
  body,#content,#wrapper {
    <?php 
      if ($fon=='grey'){

        echo 'background-color: #D6D6D6;';
      }
            if ($fon=='white'){
        echo 'background-color: #fff;';
      }
      
      
      if ($fon!='' && strlen($fon)>5){
  
        echo 'background-image: url("'.$this->config->site_url().'uploads/photos/'.$fon.'");background-size: cover;background-repeat:no-repeat;background-attachment:fixed';
      }else{
      $fon= preg_replace("/[^0-9]/", '', $fon);
      if ($fon!='' && strlen($fon)<5){

        echo 'background-image: url("'.$this->config->site_url().'/images/bg/'.$fon.'.jpg");background-size: cover;background-repeat:no-repeat;background-attachment:fixed';
      }
      }                  

      ?>


  }
  <?php 
  if ($fon=='img1' || $fon=='img2' || $fon=='img3' || $fon=='img4' || $fon=='img5') {
        echo '#simplemodal-data {color:#000;}.text_msg {color:#000;';}
        ?>
  #user_text_color,.name{
<?php
if ($colortext=='red'){

        echo 'color: red;';
      }
if ($colortext=='white'){

        echo 'color: white;';
      }
if ($colortext=='black'){

        echo 'color: black;';
      }
if ($colortext=='blue'){

        echo 'color: blue;';
      }
if ($colortext=='grey'){

        echo 'color: gray;';
      }
?>

  }
</style>
</head>
<body>
<div id="wrapper">
<!-- <header>
<div align="center" >

</div>
</header>
 -->
 <a href="<?php echo $this->config->site_url() ?>"><img width="240" id="logo" src="
<?php echo $this->config->site_url() ?>images/new/logo.png"></a> 
 <div align="left" id="menu">
   <?php if ($logged != TRUE) { ?>
   <div id="entry">
   <button   style="padding: 4px 11px;" class="styler">Войти</button>
   <button onclick="location.href='<?php echo $this->config->site_url(); ?>site/reg'"  style="padding: 4px 11px;" class="styler">Регистрация</button>
   </div>
 <div id="auth">
  <input style="width: 120px;" type="text" name="login-entry"  onkeypress='validate(event)' class="auth styler" maxlength="20" placeholder="Логин">
  <input style="width: 120px;" type="password" name ="password-entry"  onkeypress='validate(event)' class="auth styler"maxlength="20" placeholder="Пароль">
  <button  type="submit" style="padding: 4px 11px;" class="btn_entry styler">Войти</button>
  <font style="color:#fff;font-size:14px"><a href="<?php echo $this->config->site_url(); ?>site/lose_pass"><img alt="Восстановление пароля" title="Восстановление пароля" src="<?php echo $this->config->site_url().'/images/pass.png'; ?>"></a></font>
  <button onclick="location.href='<?php echo $this->config->site_url(); ?>site/reg'"  style="padding: 4px 11px;" class="styler">Регистрация</button>

  </div>
<?php } else {
      // echo '<a href="'.$this->config->site_url().'"">Главная</a>   ';
    echo '<a href="'.$this->config->site_url().'id'.$user_id.'"">Моя страница</a> ';
     echo '<a href="'.$this->config->site_url().'id'.$user_id.'/news"">Лента новостей</a> ';
       echo '<a href="'.$this->config->site_url().'id'.$user_id.'/profile"">Настройки</a>';
       echo ' <a href="'.$this->config->site_url().'id'.$user_id.'/seach"">Поиск</a>';
             $exit='<a href="'.$this->config->site_url().'site/vyhod">выйти</a>';
    echo ' '.$exit;

  }
  ?>

</div>

<div  id="content">
<?php echo $page_content; ?>
</div>
     
</div>
<footer class="footer">
  <div class="rekl">
    <p class="f_title">Реклама на сайте</p>
    <br><img src="<?php echo $this->config->site_url() ?>images/new/adress.png">
      <p class="f_text">По всем вопросам размещения
      рекламы на сайте пишите на наш
      электронный адрес: <br>
      E-mail: <a style="color:#fff" href="mailto:pr@portfolionline.ru">pr@portfolionline.ru</a></p>
  </div>  
  <div id="prav" style="margin-left:70px;" class="rekl">
  <p class="f_title">Информация для
правообладателей</p>
<a style="color:#fff;margin-left:110px;font-size:15px;" href="/id/info">Подробнее</a>
</div>
  <div style="margin-left:70px;" class="rekl">
    <p class="f_title">Служба технической поддержки</p>
    <form  action="<?php echo $this->config->site_url() ?>id/support" method="post" accept-charset="utf-8" enctype="multipart/form-data">
  <br>  <input style="width:70px" class="styler" type="text" name="support_name" maxlength="40" placeholder="Ваше имя" />
    <input style="width:80px" class="styler" type="text" name="support_mail" maxlength="40" placeholder="Email" />
    <br>
    <textarea style="width:174px;" class="styler" name="support_message" placeholder="Ваше сообщение"></textarea>
    <br>
    <input style="margin-left: 104px" class="styler" type="submit" value="Отправить" />

</form>
  </div>
</footer><!-- .footer -->
  <div id="m_footer">Copyright 2013  portfolionline.ru. All rights reserved.</div>
  <div style="position: absolute;
margin-top: -40px;
margin-left: 820px;">
<!-- Yandex.Metrika informer -->
<a href="http://metrika.yandex.ru/stat/?id=23092057&amp;from=informer"
target="_blank" rel="nofollow"><img src="//bs.yandex.ru/informer/23092057/3_0_2067FFFF_0047FFFF_1_pageviews"
style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" /></a>
<!-- /Yandex.Metrika informer -->

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
(function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter23092057 = new Ya.Metrika({id:23092057});
        } catch(e) { }
    });

    var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

    if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f, false);
    } else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/23092057" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
  </div>
</body>
</html>