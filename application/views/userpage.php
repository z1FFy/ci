<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to UserPage</title>
  <link rel="stylesheet" href="/ci/default.css" type="text/css" />
    <script type="text/javascript" src="<?php echo $this->config->site_url() ?>jquery-1.7.2.js"></script>
</head>
<body>

<div id="container">
<?php 
if ($whopage=='my') {
$whostring='своей';
foreach ($user_data as $item){ 
			$login=$item->login;
			$podtvr=$item->podtvr;
			$user_id=$item->user_id;
		}
} else {
	$whostring='чужой';
}
		if ($logged != TRUE) {
		 	echo "вы не авторизованы<br>";
		 	$exit='';
		 } else {
		 	echo "вы авторизованы";
		 	$exit='<a href="site/vyhod">Exit</a>';
		 	if ($podtvr == 0) {
		 		echo '<br style="color:red">Вы не подтвердили ваш Email</br>';
		 	}
		 	else {
		 		echo '<br style="color:green">Ваш Email подтвержден';
		 	} 
		 }
		 	echo '   '.$exit;

			echo '<br>Имя пользователя этой страницы - '.$login;
?>
	<h1>Вы находитесь на <?php echo $whostring;?> cтранице</h1>
		<?php if ($whopage == 'my') {
		echo '<a href="'.$this->config->site_url() .'upload">Закачать фотку</a>';
		echo "<br><a href='".$this->config->site_url() ."id".$user_id."/photos'>Мои изображения</a>";
		echo "<br><a href='".$this->config->site_url() ."id".$user_id."/albom_success'>Альбомы</a>";
		
	}
?>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>