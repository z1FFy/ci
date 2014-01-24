
<style>

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
  <?php $this->load->view('left_user',$user_data);  ?>
<div id="right_user">
<!-- <form> -->
      <input class="styler" type="password" name="old_pass" placeholder="Старый пароль" /><br>
      <input  class="styler" type="password" name="new_pass" placeholder="Новый пароль" /><br>
      <input  class="styler"type="password" name="new_pass1" placeholder="Повторите пароль" /><br>
      <input class="styler" type="submit" class='pass_update' value="Изменить"  />
 <!-- </form> -->
</div>

</html>