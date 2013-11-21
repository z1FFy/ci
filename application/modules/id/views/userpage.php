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
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $whostring_title.' Страница - '.  $login; ?></title>
  <link rel="stylesheet" href="/ci/default.css" type="text/css" />
    <script type="text/javascript" src="<?php echo $this->config->site_url() ?>jquery-1.7.2.js"></script>
      <script type="text/javascript" src="<?php echo $this->config->site_url() ?>jquery.simplemodal.1.4.4.min.js"></script>
  <script type="text/javascript" src="<?php echo $this->config->site_url() ?>core.js"></script>
</head>
<body>
<header>
<div align="center">
<a href="<?php echo $this->config->site_url() ?>"><img id="logo" src="
<?php echo $this->config->site_url() ?>images/logo.png"></a>

</div>
</header>
<div align="center" id="menu">
   <?php if ($logged != TRUE) { ?>
  <input type="text" name="login-entry" onkeypress='validate(event)' class="auth" maxlength="20" placeholder="Email">
  <input type="password" name ="password-entry" onkeypress='validate(event)' class="auth"maxlength="20" placeholder="Пароль">

  <button type="submit" class="btn">Войти</button>
<?php } ?>

</div>
<!-- <div id="middle-pol" align="center"><img style="" src="images/byd.png"></div> -->

<div align="center" id="content">
  
<br>
<?php 
    if ($logged != TRUE) {
      echo "вы не авторизованы<br>";
      ?>
      <a href="site/reg" class="but"><h1>Регистрация</h1></a><br> <?php
      $exit='';
     } else {
      echo 'вы авторизованы';
      $exit='<a href="'.$this->config->site_url().'site/vyhod">Exit</a>';
      echo '   '.$exit;
      if ($podtvr == 0) {
        echo '<p style="color:red">Вы не подтвердили ваш Email</p>';
      }
      else {
        echo '<br style="color:green">Ваш Email подтвержден';
      } 
     }

      echo 'Имя пользователя этой страницы - '.$login;
      echo '<br><img src="'.$this->config->site_url().'uploads/avatars/'.$avatar_url.'" width="300">';
?>
  <h1>Вы находитесь на <?php echo $whostring;?> cтранице</h1>
    <?php if ($whopage == 'my') {
    echo '<br>  <a id="upload_ava">Закачать аватар</a>';
    echo '<br><a id="upload_foto">Закачать фотку</a>';
    echo "<br><a href='".$this->config->site_url() ."id".$user_id."/photos'>Мой Альбом</a>";
    echo "<br><a href='".$this->config->site_url() ."id".$user_id."/profile'>Профиль</a>";
    echo "<br><a id='red-prof' >Редактировать профиль</a>";
   $this->load->view('albom_index',$user_data); 
}

?>
  <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
<!-- Профиль! -->
  Профиль <br>

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


</div>
<footer> </footer>
</body>
</html>
	
</div>

</body>
</html>