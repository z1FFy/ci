<style>
  body {
    background-color: #fff;
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
<script>
 //    $(window).load(function() {
 //      var ava = $("#ava");
 //      ava_w=parseInt(ava.width());
 //      ava_h=parseInt(ava.height());
 //      if (ava_h>=ava_w) {
 //        $('#ava').attr('height', '');
 //      } else {
 //        $('#ava').attr('height', '200');
 //        $('#ava').attr('width', '150%');
 //        $('#ava').css('margin-left',"-20%");
 //      }
 // });
</script>
<?php
$whostring_title='';
foreach ($user_data as $item){ 
			$name=$item->name;
			$user_id=$item->user_id;
			$avatar_url=$item->avatar;
		}
		if ($whopage=='my') {
$whostring='Я';
$whostring_title="Моя";
foreach ($user_data as $item){ 
		}
} else {
	$whostring='';
}
echo '<div id="left_user">';
    if ($logged != TRUE) {
     // echo 'вы не авторизованы<br>';
      ?>
     <!--  <a href="site/reg">Регистрация</a><br>  -->

     <?php

      $exit='';
     }

      echo '<br>'.$whostring.' '.$name;
      echo '<br><div class="frame"><img id="ava" width="200"  src="'.$this->config->site_url().'uploads/avatars/small/'.$avatar_url.'" ></div>';
?>



    <?php if ($whopage == 'my') {
    echo '<br>  <a id="upload_ava">Загрузить аватар</a>';
    echo '<br><a id="upload_foto">Загрузить фотку</a>';
  echo "<br><a  href='".$this->config->site_url() ."id".$url_id."/profile'>Обо мне</a>";

    echo "<br><a id='friends_view' link='".$url_id."'>Мои сообщения</a>";



}else{    echo "<br><a  href='".$this->config->site_url() ."id".$url_id."/profile'>Обо мне</a>";
echo "<br><a id='friends' link='".$url_id."'>Добавить в друганы</a>";
echo "<br><a  href='".$this->config->site_url() ."id".$url_id."/friends?friend_id=".$url_id."'>Отправить сообщение</a>";
}

echo '</div>';
   $this->load->view('albom_index',$user_data); 
?>
<!-- Профиль! -->
 
