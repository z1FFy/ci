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
  $logged = $this->session->userdata('logged_in');

   foreach ($user_data as $item) {
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
  $podtvr=$this->config->site_url() .'id'.$user_id.'/profile?key='.$podtvr;
   send_mime_mail('PortfoliOnline.ru',
               'about@portfolionline.ru',
               'Получатель',
               $email,
               'UTF-8',"CP1251", // кодировка, в которой будет отправлено письмо
               "PortfoliOnline.ru / Подтверждение email",
               $podtvr);
   echo 'Подтверждение отправлено на ваш email';
}

}
if (isset($_GET['key'])) {
  if ($logged!=TRUE) {
    echo 'Авторизируйтесь, на сайте';
  }
  else {
  $key=$_GET['key'];
if ($key == $podtvr) {
  header ("Location:profile_podtvr");
}
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
    display: table;
  }
  #menu {
    height: 39px;
  }

</style>


<?php

       $this->load->view('left_user',$user_data); 
   ?>

<div id="polosa"></div>
<div id="right_user">
  <p class="titl"><?php if ($whopage=='my') {
    echo "Мой ";
  } ?>Профиль</p> <br>
<ul>
  
  <?php if($item->famil != ''){ ?>
	<li>Фамилия: <?php echo $text = htmlspecialchars($item->famil, ENT_QUOTES);?></li>  <?php } ?>
   
   <?php if($item->name != ''){ ?>
	<li>Имя: <?php echo $text = htmlspecialchars($item->name, ENT_QUOTES);?> </li> <?php } ?>
	 
   <?php if($item->otchestvo != ''){ ?>
  <li>Отчество: <?php echo $text = htmlspecialchars($item->otchestvo, ENT_QUOTES);?></li><?php } ?>
   
   <?php if($item->mail != ''){ ?>
	<li>Почта: <?php echo $text = htmlspecialchars($item->mail, ENT_QUOTES);?></li><?php } ?>
  
  <li>Пол: <?php echo $text = htmlspecialchars($item->sex, ENT_QUOTES);?></li>
   <?php if($item->birthday != ''){ ?>
	<li>Дата Рождения: <?php echo $text = htmlspecialchars($item->birthday, ENT_QUOTES);?></li><?php } ?>
	<li>Дата регистрации: <?php echo $text = htmlspecialchars($item->date, ENT_QUOTES);?></li>
  
   <?php if($item->sity != ''){ ?>
  <li>Родной город: <?php echo $text = htmlspecialchars($item->sity, ENT_QUOTES);?></li><?php } ?>

  <?php if(($item->telephone != '') || ($item->dop_telephone != '') || ($item->skype != '') || ($item->website != '')){ ?>  
  <li>Контакты:</li> <?php } ?>
    <ul>
    
     <?php if($item->telephone != ''){ ?>  
    <li>Мобильный телефон: <?php echo $text = htmlspecialchars($item->telephone, ENT_QUOTES);?></li> <?php } ?>

     <?php if($item->dop_telephone != ''){ ?>
    <li>Дополнительный телефон: <?php echo $text = htmlspecialchars($item->dop_telephone, ENT_QUOTES);?></li><?php } ?>

     <?php if($item->skype != ''){ ?>
    <li>Skype: <?php echo $text = htmlspecialchars($item->skype, ENT_QUOTES);?></li><?php } ?>

     <?php if($item->website != ''){ ?>
    <li>Личный сайт: <?php echo '<a href="'.$text = htmlspecialchars($item->website, ENT_QUOTES).'">'.$text = htmlspecialchars($item->website, ENT_QUOTES).'</a>'; ?></li> <?php } ?>
    </ul>
  <li>Образование:</li>
    <ul>
    <li>Уровень образования: <?php echo $text = htmlspecialchars($item->education_level, ENT_QUOTES);?></li>
    
    <?php if($item->education_basic != ''){ ?>
    <li>Наименование учебного заведения: <?php echo $text = htmlspecialchars($item->education_basic, ENT_QUOTES);?></li><?php } ?>
    
    <?php if($item->facultet != ''){ ?>
    <li>Факультет: <?php echo $text = htmlspecialchars($item->facultet, ENT_QUOTES);?></li><?php } ?>

    <li>Закончил: <?php echo $text = htmlspecialchars($item->education_end, ENT_QUOTES);?></li>

    <?php if($item->language != ''){ ?>
     <li>Знание языков: <?php echo $text = htmlspecialchars($item->language, ENT_QUOTES);?></li><?php } ?>
    </ul>
     
    <?php if($item->interests != ''){ ?>
     <li>Интересы: <br>
   <textarea class="styler" cols="40" rows = "10" readonly = "readonly" maxlength = "4" disabled = "disabled"><?php echo $item->interests;?><?php } ?></textarea>
    <li>Специализация: <?php echo $item->spec_user;?></li>

  
<?php

if ($whopage == 'my') {
      if($podtvr == 'okay') {
        echo '<br>Ваш Email подтвержден';
      } else {
        echo "<br>Ваш email не подтвержден";
?>
  <form action="profile" method="post" >
      <input type="hidden" id="send_key" value="1" name="send_key" />
      <input type="hidden" id="key" value="0" name="key" />
      <input class="styler" type="submit" value="Выслать код подтверждения на Email"  />
    </form>


<?php
} 

 echo "<br><a href='".$this->config->site_url() ."id".$user_id."/profile_update_form' >Редактировать профиль</a>";

 echo "<br><a href='".$this->config->site_url() ."id".$user_id."/dell_form' >Удалить страницу</a>";


}




?>
</ul>

</div>