	<meta charset="utf-8">

	ФОТОГРАФИИ <br>

<?php 

		foreach ($user_data as $item){ 
				echo '<img src="'.$this->config->site_url().'/uploads/'.$item->url_photo.'" width="400">';
		}
?>
