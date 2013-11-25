<meta charset="utf-8">

	Альбом <br>

<?php 
		foreach ($albom_data as $item){ 
				var_dump($item);
			echo '<br><a href="'.$this->config->site_url().'id/view_photo?photo='.$item->url_photo.'&id_photos='.$item->id_photos.'&id_user='.$item->id_user.'">
			<img src="'.$this->config->site_url().'uploads/photos/'.$item->url_photo.'" width="400"></a>'
			?><br><?php
				//'<img src="uploads/'.$item->url_photo.'" width="400">';
		}

?>