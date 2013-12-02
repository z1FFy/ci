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
  }
  #menu {
    height: 39px;
  }

</style>


<?php
$whostring_title='';

		if ($whopage=='my') {
$whostring='Я';
$whostring_title="Моя";
}
echo '<div id="left_user">';
   foreach ($profile_data as $item) {
   				$avatar_url=$item->avatar;
   			}
      echo '<br><div class="frame"><img id="ava" width="200"  src="'.$this->config->site_url().'uploads/avatars/small/'.$avatar_url.'" ></div>';
?>
</div>
<div id="polosa"></div>
<div id="right_user">
	<p style="font-size:19px">Профиль</p> <br>
<ul>
<?php 
   foreach ($profile_data as $item) {
$podtvr=$item->spec_user;
			$login=$item->login;
			$user_id=$item->user_id;
			$avatar_url=$item->avatar;
?>
	<li>Фамилия: <?php echo $item->famil;?></li>  
	<li>Имя: <?php echo $item->name;?> </li>
	<li>Отчество: <?php echo $item->otchestvo;?></li>
	<li>Почта: <?php echo $item->mail;?></li>
	<li>Дата Рождения: <?php echo $item->birthday;?></li>
	<li>Дата регистрации: <?php echo $item->date;?></li>
	<li>Специализация: <?php echo $item->spec_user;?></li>

<?php

if ($whopage == 'my') {
 echo "<br><a id='red-prof' link='".$this->config->site_url() ."id".$user_id."/profile' >Редактировать профиль</a>";


if ($podtvr == 0) {
        echo '<br>Вы не подтвердили ваш Email';
      }
    if($podtvr == 1) {
        echo '<br>Ваш Email подтвержден';
      } 

}
}
?>
</ul>
<br><br><br><br><br><br><br><br><br><br>
</div>