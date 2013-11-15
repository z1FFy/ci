<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to UserPage</title>
  <link rel="stylesheet" href="/ci/default.css" type="text/css" />
    <script type="text/javascript" src="<?php echo $this->config->site_url() ?>jquery-1.7.2.js"></script>
      <script type="text/javascript" src="<?php echo $this->config->site_url() ?>jquery.simplemodal.1.4.4.min.js"></script>
      <script>
		$(document).ready(function() {
			$('#upload_foto').click(function() { 
				var src = "http://localhost/ci/upload";
				$.modal('<iframe src="' + src + '" height="150" width="230"  scrolling="no" style="border:0">', {
					closeHTML:"",
					containerCss:{
						backgroundColor:"#fff", 
						borderColor:"#fff", 
						height:170, 
						padding:0, 
						width:250
					},
					overlayClose:true
				});
			 }); 
		}); 
      </script>
</head>
<body>

<div id="container">
<?php 
foreach ($user_data as $item){ 
			$login=$item->login;
			$user_id=$item->user_id;
		}
		echo $login.' ';
if ($whopage=='my') {
$whostring='своей';
foreach ($user_data as $item){ 
			$podtvr=$item->podtvr;
		}
} else {
	$whostring='чужой';
}
		if ($logged != TRUE) {
		 	echo "вы не авторизованы<br>";
		 	$exit='';
		 } else {
		 	echo "вы авторизованы";
		 	$exit='<a href="'.$this->config->site_url().'site/vyhod">Exit</a>';
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
		echo '<a id="upload_foto">Закачать фотку</a>';
		echo "<br><a href='".$this->config->site_url() ."id".$user_id."/photos'>Мой Альбом</a>";
	}
?>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>