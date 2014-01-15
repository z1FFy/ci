
<style>
  #content {

    display: table;
  }
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

<div id="polosa"></div>
<div id="right_user">

  <p class="titl">Статистика</p> <br>

<?php 
$day = time() - 86400;
$d=0;
$week = time() - 86400*7;
$w=0;
$month = time() - 86400*30;
$m=0;
  echo '<div style="
width: 240px;
" class="block">Просматривали:<br>';
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
echo '<li>За месяц: '.$m.'<br>';
echo '<li>За неделю: '.$w.'<br>';
echo '<li>За сутки: '.$d.'<br>';
echo '</ul>';
?>
<a href="#" class="button" onclick="javascript:showElement1('v-menu1')">
 <span><?php echo 'Всего работ: '.$kol_works = count($kol_user_photos)+count($kol_user_videos)+count($kol_user_audios).'/30<br>';  ?></span>
</a>
<ul id="v-menu1" class="v-menu1" style="display:none;">
<?php
echo 'Изображений: '.count($kol_user_photos).'<br>';
echo 'Видеозаписей: '.count($kol_user_videos).'<br>';
echo 'Аудиозаписей: '.count($kol_user_audios).'<br>';
echo '</ul>';
echo 'Колличество поставленных вами лайков(за все время): '.$like_data.'<br>';
?>


</div>
