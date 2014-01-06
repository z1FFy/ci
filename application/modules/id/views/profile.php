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
$pod=$podtvr;
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
  header ("Location:profile_podtvr?k=".$key."&p=".$pod);
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
    padding-left: 0%;
    padding-right: 0%;
    display: table;
  }

    .tbl {
      border: 0px solid #bbb;
 /*     border-radius: 10px;*/
      padding: 10px;
/*      background-color: #F0F6FD;*/
      font-size: 17px;
    }
    .name,.val {
      color: #888;
      border: 1px solid #bbb;
      border-radius: 10px 0px 0px 10px;
      padding: 5px;
      margin-top: 15px;
      border: 0px;
      text-align: center;
      font-size: 14px;
      width: 100px;
    }
    .val {
            font-size: 17px;
      text-align: left;
      width: 130px;
      color: #000;
      border-radius: 0px;
      background-color: #fff;
      border: 1px solid #bbb;
    }
    .item {
  padding: 44px;
  border: 10px solid #000;
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
    <div style="float:left">
  Личная Информация:
<table  cellspacing="1" cellpadding="0" class="tbl" border="1">
  <?php if($item->famil != ''){ ?>
    <tr class="item">
	 <td class="name">Фамилия: </td>
   <td class="val"><?php echo $text = htmlspecialchars($item->famil, ENT_QUOTES);?></td>   </tr>  <?php } ?>
   <?php if($item->name != ''){ ?>
     <tr class="item">
	<td class="name">Имя:</td> 
   <td class="val"><?php echo $text = htmlspecialchars($item->name, ENT_QUOTES);?> </td> </tr> <?php } ?>
	 
   <?php if($item->otchestvo != ''){ ?>
       <tr class="item">
  <td class="name">Отчество: </td>
   <td class="val"><?php echo $text = htmlspecialchars($item->otchestvo, ENT_QUOTES);?> </td> </tr><?php } ?>
   
   <?php if($item->mail != ''){ ?>
          <tr class="item">
  <td class="name">
Почта: </td>   <td class="val"><?php echo $text = htmlspecialchars($item->mail, ENT_QUOTES);?></td></tr> <?php } ?>

     <tr class="item">
  <td class="name">Пол:</td>  <td class="val"><?php echo $text = htmlspecialchars($item->sex, ENT_QUOTES);?></td></tr>
   <?php if($item->birthday != ''){ ?>
	  <tr class="item">
  <td class="name">Дата Рождения:</td><td class="val"> <?php echo $text = htmlspecialchars($item->birthday, ENT_QUOTES);?></td></tr><?php } ?>
 <tr class="item">
  <td class="name">Дата регистрации: </td>  <td class="val"><?php echo date("d.m.y H:i:s" , htmlspecialchars($item->date, ENT_QUOTES));?></td></tr>
  
   <?php if($item->sity != ''){ ?>
   <tr class="item">
  <td class="name">Родной город:</td>  <td class="val"> <?php echo $text = htmlspecialchars($item->sity, ENT_QUOTES);?></td></tr><?php } ?>
</table>
  <?php if(($item->telephone != '') || ($item->dop_telephone != '') || ($item->skype != '') || ($item->website != '')){ ?>  
  Контакты: 
    <table  cellspacing="1" cellpadding="0" class="tbl" border="1">
  <?php } ?>

     <?php if($item->telephone != ''){ ?>  
       <tr class="item">
  <td class="name">Мобильный телефон:</td>  <td class="val">  <?php echo $text = htmlspecialchars($item->telephone, ENT_QUOTES);?></td></tr> <?php } ?>

     <?php if($item->dop_telephone != ''){ ?>
           <tr class="item">
  <td class="name">Дополнительный телефон:</td>  <td class="val">  <?php echo $text = htmlspecialchars($item->dop_telephone, ENT_QUOTES);?></td></tr><?php } ?>

     <?php if($item->skype != ''){ ?>
               <tr class="item">
  <td class="name">Skype:</td><td class="val"> <?php echo $text = htmlspecialchars($item->skype, ENT_QUOTES);?></tr></td><?php } ?>

     <?php if($item->website != ''){ ?>
                   <tr class="item">
  <td class="name">Личный сайт:</td><td class="val"> <?php echo '<a href="'.$text = htmlspecialchars($item->website, ENT_QUOTES).'">'.$text = htmlspecialchars($item->website, ENT_QUOTES).'</a>'; ?></td></tr> 
</table>
  <?php } ?>

  Образование:
    <table  cellspacing="1" cellpadding="0" class="tbl" border="1">
                       <tr class="item">
  <td class="name">Уровень образования: </td><td class="val"> <?php echo $text = htmlspecialchars($item->education_level, ENT_QUOTES);?></td></tr>
    
    <?php if($item->education_basic != ''){ ?>
    <tr class="item">
  <td class="name">Наименование учебного заведения: </td><td class="val">  <?php echo $text = htmlspecialchars($item->education_basic, ENT_QUOTES);?> </td></tr>  <?php } ?>
    
    <?php if($item->facultet != ''){ ?>
       <tr class="item">
  <td class="name">Факультет:</td><td class="val">  <?php echo $text = htmlspecialchars($item->facultet, ENT_QUOTES);?></td></tr><?php } ?>

           <tr class="item">
  <td class="name">Закончил:</td><td class="val"> <?php echo $text = htmlspecialchars($item->education_end, ENT_QUOTES);?></td></tr>

    <?php if($item->language != ''){ ?>
               <tr class="item">
  <td class="name">Знание языков:</td><td class="val"> <?php echo $text = htmlspecialchars($item->language, ENT_QUOTES);?></td></tr><?php } ?>
 </table>
  
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

 echo "<br><a href='".$this->config->site_url() ."id".$user_id."/pass_update_form' >Изменить пароль</a>";
 echo "<br><a href='".$this->config->site_url() ."id".$user_id."/dell_form' >Удалить страницу</a>";


}




?>
</div>
    <?php if($item->interests != ''){ ?>

    <div style="float:left">
Интересы:<br>
            
   <textarea class="styler" cols="40" rows = "10" readonly = "readonly" maxlength = "4" disabled = "disabled"><?php echo $item->interests;?><?php } ?></textarea>
         <table  cellspacing="1" cellpadding="0" class="tbl" border="1"> 
       <tr class="item">
  <td class="name">Специализация: </td><td class="val"> <?php echo $item->spec_user;?></td></tr></table>

 
</div>

</div>