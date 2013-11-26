<style>
    #middle-pol {
    padding-top: 0px;
    width: 100%;
    height: 0px;
    visibility: hidden;

  }
</style>

<?php
$whostring_title='';
foreach ($user_data as $item){ 
			$login=$item->login;
			$user_id=$item->user_id;
			$avatar_url=$item->avatar;
		}
		if ($whopage=='my') {
$whostring='своей';
$whostring_title="Моя";
foreach ($user_data as $item){ 
			$podtvr=$item->podtvr;
		}
} else {
	$whostring='чужой';
}

    if ($logged != TRUE) {
      echo 'вы не авторизованы<br>';
      ?>
      <a href="site/reg" class="but"><h1>Регистрация</h1></a><br> <?php
      $exit='';
     } else {
      echo 'вы авторизованы';
      $exit='<a href="'.$this->config->site_url().'site/vyhod">Exit</a>';
      echo '   '.$exit;
      if ($podtvr == 0) {
        echo '<br>Вы не подтвердили ваш Email';
      }
    if($podtvr == 1) {
        echo '<br>Ваш Email подтвержден';
      } 
     }

      echo '<br>Имя пользователя этой страницы - '.$login;
      echo '<br><img src="'.$this->config->site_url().'uploads/avatars/'.$avatar_url.'" width="300">';
?>
  <h1>Вы находитесь на <?php echo $whostring;?> cтранице</h1>
 <br>Профиль <br>

<ul>
<?php foreach ($profile_data as $item):?>


  <li>Фамилия: <?php echo $item->famil;?></li>  
  <li>Имя: <?php echo $item->name;?> </li>
  <li>Отчество: <?php echo $item->otchestvo;?></li>
  <li>Почта: <?php echo $item->mail;?></li>
  <li>Дата Рождения: <?php echo $item->birthday;?></li>
  <li>Дата регистрации: <?php echo $item->date;?></li>
  <li>Специализация: <?php echo $item->spec_user;?></li>

<?php endforeach; ?>
</ul>

    <?php if ($whopage == 'my') {
    echo '<br>  <a id="upload_ava">Закачать аватар</a>';
    echo '<br><a id="upload_foto">Закачать фотку</a>';
    echo "<br><a href='".$this->config->site_url() ."id".$user_id."/photos'>Мой Альбом</a>";
    echo "<br><a href='".$this->config->site_url() ."id".$user_id."/profile'>Профиль</a>";
    echo "<br><a id='red-prof' >Редактировать профиль</a>";

}
   $this->load->view('albom_index',$user_data); 
?>
<!-- Профиль! -->
 
