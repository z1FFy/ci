 <script type="text/javascript" src="<?php echo $this->config->site_url() ?>jquery-1.7.2.js"></script>
  <script type="text/javascript" src="<?php echo $this->config->site_url() ?>core.js"></script>
        <script type="text/javascript" src="<?php echo $this->config->site_url() ?>jquery.simplemodal.1.4.4.min.js"></script>
<link rel="stylesheet" href="<?php echo $this->config->site_url() ?>default.css" type="text/css" />
<style>
body{
background-color:#fff;
}
</style>
<meta charset="utf-8">

	Профиль <br>

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
 echo "<br><a id='red-prof' link='".$this->config->site_url() ."id".$user_id."/profile' >Редактировать профиль</a>";

if ($podtvr == 0) {
        echo '<br>Вы не подтвердили ваш Email';
      }
    if($podtvr == 1) {
        echo '<br>Ваш Email подтвержден';
      } 

}
?>
</ul>