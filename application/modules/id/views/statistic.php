
<style>

    .spi{
    margin: 4px;
  }

</style>

<script type="text/javascript">
function showElement(layer){
var myLayer = document.getElementById(layer);
if(myLayer.style.display=="none"){
 myLayer.style.display="block";
 myLayer.backgroundPosition="top";
 } else { 
 myLayer.style.display="none";
 }
}

function showElement1(layer){
var myLayer = document.getElementById(layer);
if(myLayer.style.display=="none"){
 myLayer.style.display="block";
 myLayer.backgroundPosition="top";
 } else { 
 myLayer.style.display="none";
 }
}

function showElement2(layer){
var myLayer = document.getElementById(layer);
if(myLayer.style.display=="none"){
 myLayer.style.display="block";
 myLayer.backgroundPosition="top";
 } else { 
 myLayer.style.display="none";
 }
}


</script>


<?php
$logged = $this->session->userdata('logged_in');
foreach ($user_data as $item) {
      $login=$item->login;
      $user_id=$item->user_id;
      $avatar_url=$item->avatar;
      $email=$item->mail;
      }



   ?>



<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{}
      $this->load->view('left_user',$user_data); 
  ?>

<div id="right_user">

  <p class="titl" id="user_text_color">Статистика</p> <br>

<?php 
$day = time() - 86400;
$d=0;
$week = time() - 86400*7;
$w=0;
$month = time() - 86400*30;
$m=0;
  echo '<div style="
width: 240px;
" class="block"><p id="user_text_color">Просматривали:</p>';
foreach ($guests_data as $item) {
   echo '<img style="width:50px;height:50px;" class="frame" src="'.$this->config->site_url().'uploads/avatars/small/'.$item->avatar.'"> ';
}
?></div>
<?php

foreach ($visit_data as $item) {
  if($item->visit_date >= $day){
    $d++;
  }
  if($item->visit_date >= $week){
    $w++;
  }
  if($item->visit_date >= $month){
    $m++;
  }
}
?>
<a href="#" class="button" onclick="javascript:showElement('v-menu')">
 <span><?php echo 'Колличество просмотров(за все время): '.count($visit_data).'<br>';  ?></span>
</a>
<ul id="v-menu" class="v-menu" style="display:none;">
<?php
echo '<li id="user_text_color">За месяц: '.$m.'<br>';
echo '<li id="user_text_color">За неделю: '.$w.'<br>';
echo '<li id="user_text_color">За сутки: '.$d.'<br>';
echo '</ul>';
?>
<a href="#" class="button" onclick="javascript:showElement1('v-menu1')">
 <span><?php echo 'Всего работ: '.$kol_works = count($kol_user_photos)+count($kol_user_videos)+count($kol_user_audios).'/30<br>';  ?></span>
</a>
<ul id="v-menu1" class="v-menu1" style="display:none;">
<?php
echo '<li id="user_text_color">Изображений: '.count($kol_user_photos).'<br>';
echo '<li id="user_text_color">Видеозаписей: '.count($kol_user_videos).'<br>';
echo '<li id="user_text_color">Аудиозаписей: '.count($kol_user_audios).'<br>';
echo '</ul>';
echo '<p id="user_text_color">Колличество поставленных вами лайков(за все время): '.$like_data.'</p>';
$kol_photos_like='';
$kol_audios_like='';
$kol_videos_like='';
foreach ($kol_user_photos as $item) {
  $kol_photos_like = $kol_photos_like + $item->like_photos;
  # code...
}
foreach ($kol_user_videos as $item) {
  $kol_videos_like = $kol_videos_like + $item->like_video;
  # code...
}

foreach ($kol_user_audios as $item) {
  $kol_audios_like = $kol_audios_like + $item->like_audio;
  # code...
}
?>
<!-- <a href="#" class="button" onclick="javascript:showElement1('v-menu2')"> -->
<?php
$kol_all_like = $kol_photos_like+$kol_videos_like+$kol_audios_like;
echo '<p id="user_text_color">Колличество полученных лайков(за все время): '.$kol_photos_like.'</p>';

?>
<!-- </a> -->
<ul id="v-menu2" class="v-menu2" style="display:none;">
<?php
echo '<li>Изображений: '.$kol_photos_like.'<br>';
echo '<li>Видеозаписей: '.$kol_videos_like.'<br>';
echo '<li>Аудиозаписей: '.$kol_audios_like.'<br>';
?>
</ul>
</div>
