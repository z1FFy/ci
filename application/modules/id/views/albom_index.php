<div id="polosa"><br></div>
<div id="right_user">
	<p style="font-size:19px">Мои работы</p>
	<?php if ($whopage=='my') { ?>
<!-- Добавление в альбом -->
<!-- <form action="<?php echo $this->config->site_url()?>id<?php echo $url_id?>/albom/do_img_to_albom" method="post" accept-charset="utf-8">
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
</form> -->
<?php }?>
<!-- Просмотр  альбома -->


<?php 
	echo "Альбомы:  ";
	foreach ($albom_data as $item){ 
	echo '<a href="'.$this->config->site_url().'id'.$url_id.'/albom/photos_in_albom?id_albom='.$item->id_albom.'">'.$item->albom_name.'</a>  ,  ';
} ?>

<br>
<br>

<!-- vse foto -->
<div>
<?php $i=0; foreach ($photo_data as $item){ 
$i++;
			echo '<a class="phot" href="'.$this->config->site_url().'id'.$url_id.'/albom/view_photo?photo='.$item->url_photo.'&id_photos='.$item->id_photos.'&id_user='.$item->id_user.'">
<div style="border:4px solid #EDF7FD;float:left;background-size: cover;background-image:url('.$this->config->site_url().'uploads/photos/'.$item->url_photo.'); width:150px; height:150px"></div></a>';
// if ($i == 4) {
// 	echo "<br>";
// }

		}	?>
		
</div>
</div>

