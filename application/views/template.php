<?php 
$fon='';
if (!empty($user_data)){
  if($whopage=='my'){
    foreach ($user_data as $item) {
      $fon=$item->fon;
    }
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
  body,#content,#wrapper {
    <?php 
      if ($fon=='grey'){
        echo 'background-color: #D6D6D6;';
      }
            if ($fon=='white'){
        echo 'background-color: #fff;';
      }
                  if ($fon=='img1'){
        echo 'background-image: url("'.$this->config->site_url().'/images/bg/1.jpg");background-size: cover;color:#054E7C;background-repeat:no-repeat;
background-attachment:fixed;';
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
 <div style="padding-left: 32px;
height: 53px;
width: 200px;
position: absolute;
padding-right: 38px;
background-color: #336aa8;"><a href="<?php echo $this->config->site_url() ?>"><img id="logo" src="
<?php echo $this->config->site_url() ?>images/logo.png"></a></div>  
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
<div id="middle-pol" align="center"><img style="" src="<?php echo $this->config->site_url() ?>images/byd.png"></div>
<div  id="content">
<?php echo $page_content; ?>
</div>
     
</div>
<div id="footer">
  <?php echo '<div id="teh"> <img style="margin-top: -5px;
position: absolute;" src="'.$this->config->site_url().'/images/help.png"><a style="color:#fff;padding-left:40px">Техническая Поддержка</a></div>';
?><p style="text-align:center">copyright 2013 PortfoliOnline.ru<br>
<small>Авторские права на все материалы опубликованные
на сайте принадлежат их авторам.</small>
<div align="right">
<a class=' iptotop' href='#'>
<span></span>
</a>
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

</p>
 </div>
</body>
</html>