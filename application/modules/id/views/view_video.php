 <style>

    #middle-pol {
    padding-top: 0px;
    width: 100%;
    height: 0px;
    visibility: hidden;

  }
 #left_user{

width: 250px;
margin-right: 0px;
float: left;
background-color: #EDF7FD;
/*box-shadow: 0 0 3px rgba(0,0,0,5);*/

}
#right_user {
  padding-top: 10px;
height: 100%;
min-height: 600px;
margin-bottom: 40px;
margin-left: 250px;
}
  #content {
 padding-left: 0px;
padding-right: 0px;
width: 100%;

  }</style>
  <?php     $this->load->view('left_user',$user_data); 
echo '<div align="center" id="right_user">
<div style="margin-right: 20%;">
';
$id_vid=$_GET['id_vid'];
foreach ($video_data as $item) {
	if ($id_vid==$item->id_videos){
	echo '<iframe width="70%" height="415" src="//www.youtube.com/embed/'.$item->kod.'" frameborder="0" allowfullscreen></iframe>';
?>
 <?php if ($whopage=='my') {
  ?>
 <br><input type="button" style="color:red" class="delete_video styler" value="Удалить" link='<?php echo $id_vid; ?>'> 
<?php
}
}
}

?>

<div align="center"><br><br>
<button id="show_com" class="batn styler" style="display: block;width: 200px" >
Комментарии
<div style="position: absolute;margin-left: 80px;margin-top: 14px;">
<img width="15px" src="
<?php echo $this->config->site_url().'images/down.png' ?>
"> </div> </button></div>
  <div id="comments"  style="display:none">
  <p style="color:#054E7C"> Комментарии </p>
<?php 
date_default_timezone_set('Europe/Moscow');
    foreach ($message_data as $item){ 

      if($item->name == ''){
        $name = $item->login;
      }else{
        $name = $item->name.' '.$item->famil;
      }
       echo '
       <div style="width: 60%;
" class="block">
       <div style="display:inline" class="block1">
       <img style="width:50px;height:50px" src="'.$this->config->site_url().'/uploads/avatars/'.$item->avatar.'" class="frame" width="100"></div>
       <div style="display:inline" class="block2">'.htmlspecialchars($name, ENT_QUOTES);
        echo '<div class="date_msg">Дата/Время: '.date("d.m.y H:i:s" ,$item->message_date).'</div></div><br>';
       echo '<div class="text_msg">'.$text = htmlspecialchars($item->messages, ENT_QUOTES).'</div>';
echo "</div>";

}
    
    ?>
<br>
<div class="block" style="text-align:center;background-color:#336AA8;width:300px">
<p style="color:#fff;text-shadow:1px 1px 0px #7C7C7C;">Написать:</p>
<input type="hidden" name="id_video" value="<?php echo $id_vid; ?>">
<input type="hidden" name="id_user" value="<?php echo $user_id; ?>">
<textarea placeholder="Комментарий" class="styler" style="width:250px" name="messages" id="messages" maxlength="300"></textarea>

<br /><br />

<input type="submit" class="send_com_v styler" value="Отправить" />
</div>




</div>
</div>