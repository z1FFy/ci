<div id="polosa"><br></div>
<div id="right_user">
	<p class="titl">Мои работы  
	<?php if($whopage == "my") { echo '<button class="upload_foto">Загрузить работу</button><br>';} ?> </p> 
<?php 
$id_al='';
	$sel='';
	if (isset($_GET['id_albom'])) {
$id_al = $_GET['id_albom'];
	}
	echo "Альбомы:  ";
	echo '<select onchange="top.location=this.value">';
	echo '<option value="'.$this->config->site_url().'id'.$url_id.'">Все</a> </option> ';

	$i=0;
	foreach ($albom_data as $item){ 
		$i++;
		if ($i==$id_al) {
				$sel='selected';
		}else {
			$sel='';
		}
	echo '<option '.$sel.' value="'.$this->config->site_url().'id'.$url_id.'/?id_albom='.$item->id_albom.'">'.$item->albom_name.'</a> </option> ';
} ?>
</select>
<br>
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
			<div class="photo" style="background-image:url('.$this->config->site_url().'uploads/photos/'.$item->url_photo.');"><div class="pod_photo">'.$text = htmlspecialchars($photos_name, ENT_QUOTES).'</div></div></a></div>';
} else {
	if ($id_al==$id_albom) {
		echo '<div class="block_photo"><a  class="phota"  href="'.$this->config->site_url().'id'.$url_id.'/albom/view_photo?id='.$i.'&id_orig='.$item->id_photos.'">
			<div class="photo" style="background-image:url('.$this->config->site_url().'uploads/photos/'.$item->url_photo.');"><div class="pod_photo">'.$text = htmlspecialchars($photos_name, ENT_QUOTES).'</div></div></a></div>';

	}
}

		}	?>
		
</div>
</div>

