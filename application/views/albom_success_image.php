<meta charset="utf-8">

	Альбом <br>

<?php 
		foreach ($user_data as $item){ 
				//var_dump($item);
			echo '<img src="../uploads/'.$item->url_photo.'" width="400">';
			?><br><?php
				//'<img src="uploads/'.$item->url_photo.'" width="400">';
		}

?>