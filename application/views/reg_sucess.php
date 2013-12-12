<?php
function send_mime_mail($name_from, // имя отправителя
                        $email_from, // email отправителя
                        $name_to, // имя получателя
                        $email_to, // email получателя
                        $data_charset, // кодировка переданных данных
                        $send_charset, // кодировка письма
                        $subject, // тема письма
                        $body, // текст письма
                        $html = FALSE, // письмо в виде html или обычного текста
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



  $body1='Ваше портфолио создано и его можно посмотреть перейдя по ссылке:'.$this->config->site_url().'id'.$user_id.'<br> Подтверждение регистрации:'.$this->config->site_url().'id'.$user_id.'/profile?key='.$body;
   send_mime_mail($name_from,
$email_from,
$name_to,
$email_to,
$data_charset,
$send_charset,
$subject,
$body1);

header ('Location:'.$this->config->site_url() .'site/entry?login='.$login.'&pass='.$pass);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Вход : PortfoliOnline</title>
    <meta charset="utf-8">

  <link rel="stylesheet" href="<?php echo $this->config->site_url() ?>default.css" type="text/css" />
<style>    #middle-pol {
    padding-top: 0px;
    width: 100%;
    height: 0px;
    visibility: hidden;

  }
  </style><link rel="shortcut icon" href="<?php echo $this->config->site_url() ?>favicon.ico"></link>
  <script type="text/javascript" src="<?php echo $this->config->site_url() ?>jquery-1.7.2.js"></script>
  <script type="text/javascript" src="<?php echo $this->config->site_url() ?>core.js"></script>
        <script type="text/javascript" src="<?php echo $this->config->site_url() ?>jquery.simplemodal.1.4.4.min.js"></script>
</head>
<body>
<div id="wrapper">
<header>
<div align="center">
<a href="<?php echo $this->config->site_url() ?>"><img id="logo" src="
<?php echo $this->config->site_url() ?>images/logo.png"></a>
</div>
</header>

<div  id="content">


<div align="center"><!-- <h2>Вы успешно зарегестрированы</h2> -->
<h3>Войдите на сайт: </h3>

  <input type="text" name="login-entry"  onkeypress='validate(event)' class="auth" maxlength="20" placeholder="Email">
  <input type="password" name ="password-entry"  onkeypress='validate(event)' class="auth"maxlength="20" placeholder="Пароль">

  <button type="submit" class="btn_entry">Войти</button>
  </div>




</div>
     
</div>
<div id="footer">
  <?php echo '<div id="teh"> <img style="margin-top: -5px;
position: absolute;" src="'.$this->config->site_url().'/images/help.png"><a style="color:#fff;padding-left:40px">Техническая Поддержка</a></div>';
?><p style="text-align:center">copyright 2013 PortfoliOnline.ru<br>
<small>Авторские права на все материалы опубликованные
на сайте принадлежат их авторам.</small>
<div align="right">
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