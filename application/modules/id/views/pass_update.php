
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
      <input type="password" name="old_pass" placeholder="Старый пароль" /><br>
      <input type="password" name="new_pass" placeholder="Новый пароль" /><br>
      <input type="password" name="new_pass1" placeholder="Повторите пароль" /><br>
      <input type="submit" class='pass_update' value="Изменить"  />
 <!-- </form> -->
</div>
</body>
</html>