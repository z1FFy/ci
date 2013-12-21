
<html>
<head>
<title>Изменение пароля</title>
<link rel="stylesheet" href="<?php echo $this->config->site_url() ?>default.css" type="text/css" />
<script type="text/javascript" src="<?php echo $this->config->site_url() ?>jquery-1.7.2.js"></script>
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
    .spi{
    margin: 4px;
  }

</style>
</head>
<body>

  <?php
$logged = $this->session->userdata('logged_in');
foreach ($user_data as $item) {
      $login=$item->login;
      $user_id=$item->user_id;
      $avatar_url=$item->avatar;
      $email=$item->mail;
      }

   ?>

  <?php $this->load->view('left_user',$user_data);  ?>

<script language ="JavaScript"> 
  $(document).ready(function() {
$('.pass_update').click(function() { 
  old_pass = $("input[name='old_pass']").val();
  new_pass = $("input[name='new_pass']").val();
  new_pass1 = $("input[name='new_pass1']").val();
  if (new_pass == new_pass1) {
  //alert('xyi');
  $.post(site_full+"/id/pass_update",
     {
       old_pass : old_pass, new_pass : new_pass,
     },
     onAjaxSuccess
   );
    } else {
    alert('Пароли не совпадают');
  } 
   function onAjaxSuccess(data)
   {
      alert(data);
   
          };    
});
});

</script>
<div id="polosa"></div>
<div id="right_user">
<!-- <form> -->
<h1>Новости:</h1>
 <?php

foreach ($news_photos_data as $item) { //в переменные заносим все нужные данные для вложенного форича
  $url_photo = $item->url_photo;
  $name_photo = $item->photos_name;
  $photos_date = $item->photos_date;
  $id_photos = $item->id_photos;
  $id_user = $item->id_user;
  $i=0;                               // что бы вложенный форич не выкладывал несколько раз одну и ту же фотку
  foreach ($subscribe_users_data as $item) {
    if($i==0){
        if($item->friend_id == $id_user){
          if($photos_date >= $item->subscribe_date ){ // если дата добавления фотки больше даты создания подписи эхаем все говно
              if($item->name == ''){
              $name = $item->login;
              }else{
                $name = $item->name.' '.$item->famil;
              }
              echo '<div align = "center">';
              echo htmlspecialchars($name, ENT_QUOTES).' добавил/a изображение '.date("d.m.y H:i:s" ,htmlspecialchars($photos_date, ENT_QUOTES)).'<br>';
              echo '<img src="'.$this->config->site_url().'uploads/photos/'.$url_photo.'"/">';
              echo '</div><br>';
              $i++;
          }
        }
      
    }
    
  }


}




 ?>




 <!-- </form> -->
</div>
</body>
</html>