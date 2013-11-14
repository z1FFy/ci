	<meta charset="utf-8">

	ФОТОГРАФИИ <br>
<?php 

		foreach ($user_data as $item){ 
				echo '<img src="uploads/'.$item->url_photo.'">';
		}
?>

