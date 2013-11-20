<meta charset="utf-8">

	Альбом <br>

<?php 
		foreach ($albom_data as $item){ 
				//var_dump($item);
			echo '<br><img src="'.$this->config->site_url().'uploads/photos/'.$item->url_photo.'" width="400">'
			?><br><?php
				//'<img src="uploads/'.$item->url_photo.'" width="400">';
		}

?>