<div id="polosa"><br></div>
<div id="right_user">
	<p class="titl">Мои работы  
	<?php if($whopage == "my") { echo '<button class="upload_foto">Загрузить работу</button><br>';} ?> </p>
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

<!-- 
<?php 

	echo "Альбомы:  ";
	foreach ($albom_data as $item){ 
	echo '<a href="'.$this->config->site_url().'id'.$url_id.'/albom/photos_in_albom?id_albom='.$item->id_albom.'">'.$item->albom_name.'</a>  ';
} ?>

<br>
<br>
 -->
<!-- vse foto -->
<div>
<!-- <div id="show_img"></div> -->
<?php $i=0; foreach ($photo_data as $item){ 
		$photos_name=$item->photos_name;
if ($photos_name=='""') {
	$photos_name='';
}
$i++;
			echo '<div class="block_photo"><a  class="phota"  href="'.$this->config->site_url().'id'.$url_id.'/albom/view_photo?id='.$i.'&id_orig='.$item->id_photos.'">
<div class="photo" style="background-image:url('.$this->config->site_url().'uploads/photos/'.$item->url_photo.');"><div class="pod_photo">'.$photos_name.'</div></div></a></div>';
// if ($i == 4) {
// 	echo "<br>";
// }

		}	?>
		
</div>
</div>

