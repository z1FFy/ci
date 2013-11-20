	<meta charset="utf-8">

	ФОТОГРАФИИ <br>

<?php 

		foreach ($user_data as $item){ 
			//var_dump($item);
			//var_dump($item);
				echo '<img src="'.$this->config->site_url().'/uploads/'.$item->url_photo.'" width="400">';
		}
?>
