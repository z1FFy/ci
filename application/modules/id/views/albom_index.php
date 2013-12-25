
<!-- <div id="polosa"></div> -->
<div id="right_user">

	<p class="titl">Мои работы  
<?php 

$id_al='';
	$sel='';
	if (isset($_GET['id_albom'])) {
$id_al = $_GET['id_albom'];
	}
	echo '<select style="width:100px" onchange="top.location=this.value">';

	echo '<option value="'.$this->config->site_url().'id'.$url_id.'">Все</a> </option> ';
?> </p>  <?php
	$i=0;

	foreach ($albom_data as $item){ 
		$i++;
		if ($item->id_albom==$id_al) {
				$sel='selected';
		}else {
			$sel='';
		}
	echo '<option '.$sel.' value="'.$this->config->site_url().'id'.$url_id.'/?id_albom='.$item->id_albom.'">'.$item->albom_name.'</a> </option> ';
} ?>
</select>
	<?php if($whopage == "my") { echo '<input type="button" class="styler" id="create_albom" value="Создать альбом"><input   type="button" class="upload_foto styler" value="Загрузить работу">';} ?>
<br>

<!-- vse foto -->
<div>
<!-- <div id="show_img"></div> -->
<?php $i=0; foreach ($photo_data as $item){ 
		$photos_name=$item->photos_name;
		$id_albom=$item->id_albom;

		$i++;
		if (empty($id_al)) {
			echo '<div class="block_photo"><a  class="phota"  href="'.$this->config->site_url().'id'.$url_id.'/albom/view_photo?id='.$i.'&id_orig='.$item->id_photos.'">
			<div class="photo" style="background-image:url('.$this->config->site_url().'uploads/photos/'.$item->url_photo.');">';
			$style='';
			if (empty($photos_name)) {
				$style='visibility: hidden;';
			}else {
				$style='visibility:visible';
			}
			echo '<div style="'.$style.'" class="pod_photo">'.$text = htmlspecialchars($photos_name, ENT_QUOTES).'</div>';
			echo '</div></a></div>';
} else {
	if ($id_al==$id_albom) {
		echo '<div class="block_photo"><a  class="phota"  href="'.$this->config->site_url().'id'.$url_id.'/albom/view_photo?id='.$i.'&id_orig='.$item->id_photos.'">
			<div class="photo" style="background-image:url('.$this->config->site_url().'uploads/photos/'.$item->url_photo.');"><div class="pod_photo">'.$text = htmlspecialchars($photos_name, ENT_QUOTES).'</div></div></a></div>';

	}
}

		}	?>
		
</div>
<?php 
if (!empty($video_data)) {
	foreach ($video_data as $item) {
		$kod=$item->kod;
		$thumbUrl = "http://img.youtube.com/vi/".$kod."/0.jpg";
		echo '<div class="block_photo">

		<a class="phota"  href="'.$this->config->site_url().'id'.$url_id.'/albom/view_video?id_vid='.$item->id_videos.'">
		<div class="photo" style="background-image:url('.$thumbUrl.')">
		<div class="pod_photo"><div style="position:absolute"> <img src="'.$this->config->site_url().'/images/play.png"> </div>'.$text = htmlspecialchars($item->video_name, ENT_QUOTES).'</div></div></a></div>';
	}
}
 ?>
</div>

