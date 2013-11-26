<html>
<head>
	<title>Фото:</title>


</head>
<body>
<div class="block3">
<meta charset="utf-8">
	<?php 
	$photo = $_GET['photo'];
	$id_photos = $_GET['id_photos'];
	$id_user = $_GET['id_user'];
	echo '<div align="center"><img src="'.$this->config->site_url().'uploads/photos/'.$photo.'" width="70%"></div>'; 
	?>
<br>
<?php 

		foreach ($message_data as $item){ 
				// var_dump($item);
			
			 echo '<div class="block1"><img src="'.$this->config->site_url().'/uploads/avatars/'.$item->avatar.'" width="100"></div><div class="block2">'.$item->famil.' '; echo $item->name.' - ';echo $item->messages; 

			?> </div><br>  
			<?php

		
		}?>
<br>

<form action="<?php echo $this->config->site_url() ?>id/chat/send_messages" method="post" accept-charset="utf-8">

<input type="hidden" name="id_photos" value="<?php echo $id_photos; ?>">
<input type="hidden" name="id_user" value="<?php echo $id_user; ?>">
<textarea name="messages" maxlength="200"></textarea>

<br /><br />

<input type="submit" value="Отправить" />

</form>
</div>
</body></html>