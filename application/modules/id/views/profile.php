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


?>
 


<?php
   foreach ($profile_data as $item) {
$podtvr=$item->podtvr;
      $login=$item->login;
      $user_id=$item->user_id;
      $avatar_url=$item->avatar;
      $email=$item->mail;
      }
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  $send_key=$_POST['send_key'];
if ($send_key == '1') {
  echo send_mime_mail('PortfoliOnline.ru',
               'about@portfolionline.ru',
               'Получатель',
               $email,
               'UTF-8',"CP1251", // кодировка, в которой будет отправлено письмо
               "PortfoliOnline.ru / Подтверждение email",
               $podtvr);
}

}
if (isset($_GET['key'])) {
  $key=$_GET['key'];
if ($key == $podtvr) {
  header ("Location:profile_podtvr");
}
}



?>

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
  }
  #menu {
    height: 39px;
  }

</style>


<?php
$whostring_title='';

    if ($whopage=='my') {
$whostring='Я';
$whostring_title="Моя";
}
echo '<div id="left_user">';
echo '<br><div class="frame"><img id="ava" width="200"  src="'.$this->config->site_url().'uploads/avatars/small/'.$avatar_url.'" ></div>';
?>
</div>
<div id="polosa"></div>
<div id="right_user">
  <p style="font-size:19px">Профиль</p> <br>
<ul>

	<li>Фамилия: <?php echo $item->famil;?></li>  
	<li>Имя: <?php echo $item->name;?> </li>
	<li>Отчество: <?php echo $item->otchestvo;?></li>
	<li>Почта: <?php echo $item->mail;?></li>
  <li>Пол: <?php echo $item->sex;?></li>
	<li>Дата Рождения: <?php echo $item->birthday;?></li>
	<li>Дата регистрации: <?php echo $item->date;?></li>
	<li>Специализация: <?php echo $item->spec_user;?></li>
  <li>Образование:</li>
  <ul>
  <li>Уровень образования: <?php echo $item->education_level;?></li>
  <li>Наименование учебного заведения: <?php echo $item->education_basic;?></li>
  <li>Факультет: <?php echo $item->facultet;?></li>
  <li>Закончил: <?php echo $item->education_end;?></li>
  <li>Гражданство: <?php echo $item->citizenship;?></li>
  <li>Разрешено работать: <?php echo $item->work_permit;?></li>
  <li>Знание языков: <?php echo $item->language;?></li>
  </ul>
<?php

if ($whopage == 'my') {
if ($podtvr == 0) {
?>
  <form action="profile" method="post" >
      <input type="hidden" id="send_key" value="1" name="send_key" />
      <input type="hidden" id="key" value="0" name="key" />
      <input type="submit" value="Выслать код подтверждения на Email"  />
    </form>


<?php
} 

 echo "<br><a id='red-prof' link='".$this->config->site_url() ."id".$user_id."/profile' >Редактировать профиль</a>";


}

    if($podtvr == 'yes') {
        echo '<br>Ваш Email подтвержден';
      } 


?>
</ul>
<br><br><br><br><br><br><br><br><br><br>
</div>