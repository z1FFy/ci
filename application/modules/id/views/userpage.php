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
      <script>
		$(document).ready(function() {
			$('#upload_foto').click(function() { 
				var src = "http://localhost/ci/id/upload?who=photos";
				upload(src);
			 }); 
			$('#upload_ava').click(function() { 
				var src = "http://localhost/ci/id/upload?who=avatars";
				upload(src);
			 }); 

			function upload (src) {
					$.modal('<iframe src="' + src + '" height="350" width="430"  scrolling="no" style="border:0">', {
					closeHTML:"",
					containerCss:{
						backgroundColor:"#fff", 
						borderColor:"#fff", 
						height:470, 
						padding:0, 
						width:550
					},
					overlayClose:true
				});
			}

		}); 
      </script>
</head>
<body>

<div id="container">
<?php 
		if ($logged != TRUE) {
		 	echo "вы не авторизованы<br>";
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
		echo '<br>	<a id="upload_ava">Закачать аватар</a>';
		echo '<br><a id="upload_foto">Закачать фотку</a>';
		echo "<br><a href='".$this->config->site_url() ."id".$user_id."/photos'>Мой Альбом</a>";
	}
	$this->load->view('albom_index',$user_data);
?>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>