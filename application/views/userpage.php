<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to UserPage</title>
  <link rel="stylesheet" href="default.css" type="text/css" />
    <script type="text/javascript" src="<?php echo $this->config->site_url() ?>jquery-1.7.2.js"></script>
</head>
<body>

<div id="container">
<?php 
if ($whopage=='my') {
$whopage='своей';
} else {
	$whopage='чужой';
}

		if ($logged != TRUE) {
		 	echo "вы не авторизованы<br>";
		 	$exit='';
		 } else {
		 	echo "вы авторизованы";
		 	$exit='<a href="site/vyhod">Exit</a>';
		 }
		 	echo '   '.$exit;

foreach ($user_data as $item){ 
			echo '<br>Имя пользователя этой страницы - '.$item->login;
		}
?>
	<h1>Вы находитесь на <?php echo $whopage;?> cтранице</h1>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>