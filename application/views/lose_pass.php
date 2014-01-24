    <meta charset="utf-8">
<?php
if (isset($_GET['send'])) {
function send_mime_mail($name_from, // имя отправителя
                        $email_from, // email отправителя
                        $name_to, // имя получателя
                        $email_to, // email получателя
                        $data_charset, // кодировка переданных данных
                        $send_charset, // кодировка письма
                        $subject, // тема письма
                        $body, // текст письма
                        $html = TRUE, // письмо в виде html или обычного текста
                        $reply_to = FALSE
                        ) {
  $to = mime_header_encode($name_to, $data_charset, $send_charset)
                 . ' <' . $email_to . '>';
  $subject = mime_header_encode($subject, $data_charset, $send_charset);
  $from =  mime_header_encode($name_from, $data_charset, $send_charset)
                     .' <' . $email_from . '>';
  if($data_charset != $send_charset) {
    $body = iconv($data_charset, $send_charset, $body);
  }
  $headers = "From: $from\r\n";
  $type = ($html) ? 'html' : 'plain';
  $headers .= "Content-type: text/$type; charset=$send_charset\r\n";
  $headers .= "Mime-Version: 1.0\r\n";
  if ($reply_to) {
      $headers .= "Reply-To: $reply_to";
  }
  return mail($to, $subject, $body, $headers);
}

function mime_header_encode($str, $data_charset, $send_charset) {
  if($data_charset != $send_charset) {
    $str = iconv($data_charset, $send_charset, $str);
  }
  return '=?' . $send_charset . '?B?' . base64_encode($str) . '?=';
}

  

     $body2='Ваш пароль на сайте portfolionline.ru:<br> Логин: '.$login.'<br>Пароль: '.$pass;
     echo 'Проверьте почту!';
    $data_charset = 'UTF-8';
    $send_charset = "CP1251";


//$headers .= "Content-type: text/html; charset=$send_charset\r\n";


 send_mime_mail('PortfoliOnline',
'support@portfolionline.ru',
'user',
$email,
$data_charset,
$send_charset,
'Восстановление пароля',
$body2);
 }
 else {
?>
<!DOCTYPE html>
<html>
<head>
  <title>Восстановление пароля</title>
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

<style>
#v_head {
  background-color: #404c53;
}
  .w  {
    width: 200px;
    margin: 4px;
  }
body {
  background-color: #336aa8;
  background-image: none;
  color:#000;
}

</style>  
</head>

<body>
<div id="v_polosa"></div>
  <div id="v_head">
  <a href="<?php echo $this->config->site_url() ?>"><img src="<?php echo $this->config->site_url() ?>images/new/logo.png" id="logo"></a>
<font id="v_text">ОНЛАЙН СЕРВИС ДЛЯ СОЗДАНИЯ ПЕРСОНАЛЬНОГО БЕСПЛАТНОГО ПОРТФОЛИО</font>
  </div>
  <div class="wrapper">

  <main  class="content"><div id="info">

<div align="center">

<?php 
echo '<p style="font-size: 24px;
height: 40px;
padding-top: 20px;
background-color: #fff;
color: #336aa8;
margin-bottom: 20px;" align="center">Восстановление пароля:</p><br>Введите email<br>
<form action="lose_pass" >
<input type="text" name="email" class="styler">
<input type="hidden" name="send" value="1">
<input type="submit" class="styler" value="Отправить">
</form><br>
<p style="font-size:12px"><i>
*Письмо с паролем придет на вашу почту</i></p>
';
?>
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
      E-mail: <a style="color:#fff" href="mailto:pr@portfolionline.ru">pr@portfolionline.ru</a></p>
  </div>  
  <div style="margin-left:70px;" class="rekl">
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
<?php } ?>