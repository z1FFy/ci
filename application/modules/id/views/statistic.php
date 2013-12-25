<html>
<head>
<title>Поиск людей</title>
	  <link rel="stylesheet" href="<?php echo $this->config->site_url() ?>default.css" type="text/css" />
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
echo 'Колличество просмотров(за все время): '.count($visit_data).'<br>';
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
echo 'Колличество просмотров(за месяц): '.$m.'<br>';
echo 'Колличество просмотров(за неделю): '.$w.'<br>';
echo 'Колличество просмотров(за сутки): '.$d.'<br>';

?>


</div>

</body>
</html>