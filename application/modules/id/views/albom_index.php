<html>
<head>
<title>Форма загрузки</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
</head>
<body>
<br>
	<h1>Альбомы</h1>
<br>
	<?php if ($whopage=='my') { ?>
<!-- Добавление в альбом -->
<form action="<?php echo $this->config->site_url()?>id<?php echo $url_id?>/albom/do_img_to_albom" method="post" accept-charset="utf-8">
<select name = "id_albom"  size="1">
<?php 
	foreach ($albom_data as $item){  ?>
	<option value="<?php echo $item->id_albom ?>" >
		<?php 
		//var_dump($item);
		 echo $item->albom_name; ?>
	</option>
	<?php } ?>
</select>
<select name="id_photos"  size="1">

	<?php 
	foreach ($photo_data as $item){  ?>
	<option value="<?php echo $item->id_photos ?>">
		<?php 
		//var_dump($item);
		 echo $item->url_photo; ?>
	</option>
	<?php } ?>

<p><input type="submit" class="btn" value="добавить в альбом"></p>
</select>
</form>
<?php }?>
<!-- Просмотр  альбома -->
<form action="<?php echo $this->config->site_url()?>id<?php echo $url_id?>/albom/photos_in_albom" method="post" accept-charset="utf-8">
<select name = "id_albom"  size="1">
<?php 
	foreach ($albom_data as $item){  ?>
	<option value="<?php echo $item->id_albom ?>" >
		<?php 
		//var_dump($item);
		 echo $item->albom_name; ?>
	</option>
	<?php } ?>
<p><input type="submit" class="btn" value="Показать альбом"></p>
</select>
</form>

<!-- vse foto -->
<?php foreach ($photo_data as $item){ 
			echo $item->url_photo.'<br><a class="photo" link="'.$this->config->site_url().'id/view_photo?photo='.$item->url_photo.'&id_photos='.$item->id_photos.'&id_user='.$item->id_user.'">
			<img src="'.$this->config->site_url().'uploads/photos/'.$item->url_photo.'" width="400"></a>';
		}	?>





</body>
</html>