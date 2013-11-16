<html>
<head>
<title>Форма загрузки</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
</head>
<body>

	Альбомы <br>
<!-- 1 -->
<form action="<?php echo $this->config->site_url() ?>albom/do_img_to_albom" method="post" accept-charset="utf-8">
<select name = "id_albom"  size="1">
<?php 

	foreach ($user_data as $item){  ?>
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

<!-- 2 forma -->
<form action="<?php echo $this->config->site_url() ?>albom/do_img_view_albom" method="post" accept-charset="utf-8">
<select name = "id_albom"  size="1">
<?php 

	foreach ($user_data as $item){  ?>
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

<?php 

		foreach ($photo_data as $item){ 
			//var_dump($item);
				echo $item->url_photo.'<br><img src="'.$this->config->site_url().'/uploads/'.$item->url_photo.'" width="400">
				<form>
					
				</form>

				';
		}


		
?>

</body>
</html>