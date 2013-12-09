<html>
<head>
<title>Служба поддержки</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
</head>
<body>

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


if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

  $body1='Ваше портфолио создано и его можно посмотреть перейдя по ссылке:'.$this->config->site_url().'id'.$user_id.'<br> Подтверждение регистрации:'.$this->config->site_url().'id/regmail?key='.$body;
  echo send_mime_mail($name_from,
$email_from,
$name_to,
$email_to,
$data_charset,
$send_charset,
$subject,
$body1);

}

if (isset($_GET['key'])) {
  $key=$_GET['key'];
if ($key == $body) {
  header ("Location:profile_podtvr");
}
?>





<form action="<?php echo $this->config->site_url() ?>id/support" method="post" accept-charset="utf-8" enctype="multipart/form-data">
<input type="text" name="support_mail" maxlength="40" placeholder="Введите свою почту" />
<br><br>
<textarea name="support_message" placeholder="Опишите проблему"></textarea>
 <br>

<input type="submit" value="Отправить" />

</form>

</body>
</html>