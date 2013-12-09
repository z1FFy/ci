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
	<li>Фамилия: <?php echo $item->famil;?></li>  <?php } ?>
   
   <?php if($item->name != ''){ ?>
	<li>Имя: <?php echo $item->name;?> </li> <?php } ?>
	 
   <?php if($item->otchestvo != ''){ ?>
  <li>Отчество: <?php echo $item->otchestvo;?></li><?php } ?>
   
   <?php if($item->mail != ''){ ?>
	<li>Почта: <?php echo $item->mail;?></li><?php } ?>
  
  <li>Пол: <?php echo $item->sex;?></li>
	<li>Дата Рождения: <?php echo $item->birthday;?></li>
	<li>Дата регистрации: <?php echo $item->date;?></li>
  
   <?php if($item->sity != ''){ ?>
  <li>Родной город: <?php echo $item->sity;?></li><?php } ?>

  <?php if(($item->telephone != '') || ($item->dop_telephone != '') || ($item->skype != '') || ($item->website != '')){ ?>  
  <li>Контакты:</li> <?php } ?>
    <ul>
    
     <?php if($item->telephone != ''){ ?>  
    <li>Мобильный телефон: <?php echo $item->telephone;?></li> <?php } ?>

     <?php if($item->dop_telephone != ''){ ?>
    <li>Дополнительный телефон: <?php echo $item->dop_telephone;?></li><?php } ?>

     <?php if($item->skype != ''){ ?>
    <li>Skype: <?php echo $item->skype;?></li><?php } ?>

     <?php if($item->website != ''){ ?>
    <li>Личный сайт: <?php echo '<a href="'.$item->website.'">'.$item->website.'</a>'; ?></li> <?php } ?>
    </ul>
  <li>Образование:</li>
    <ul>
    <li>Уровень образования: <?php echo $item->education_level;?></li>
    
    <?php if($item->education_basic != ''){ ?>
    <li>Наименование учебного заведения: <?php echo $item->education_basic;?></li><?php } ?>
    
    <?php if($item->facultet != ''){ ?>
    <li>Факультет: <?php echo $item->facultet;?></li><?php } ?>

    <li>Закончил: <?php echo $item->education_end;?></li>

    <?php if($item->language != ''){ ?>
     <li>Знание языков: <?php echo $item->language;?></li><?php } ?>
    </ul>
     
     <?php if(($item->citizenship != '') || ($item->work_permit != '')){ ?>  
     <li>Гражданство:</li> <?php } ?>
    <ul>
     <?php if($item->citizenship != ''){ ?>
     <li>Гражданство: <?php echo $item->citizenship;?></li><?php } ?>

     <?php if($item->work_permit != ''){ ?>
     <li>Разрешено работать: <?php echo $item->work_permit;?></li><?php } ?>

    </ul> 
    
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
      <input type="submit" value="Выслать код подтверждения на Email"  />
    </form>


<?php
} 

 echo "<br><a id='red-prof' link='".$this->config->site_url() ."id".$user_id."/profile' >Редактировать профиль</a>";

 echo "<br><a href='".$this->config->site_url() ."id".$user_id."/dell_form' >Удалить страницу</a>";


}




?>
</ul>

</div>