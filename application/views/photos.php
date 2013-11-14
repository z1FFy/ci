	<meta charset="utf-8">

	Фото <br>
<?php 

		foreach ($user_data as $item){ 
				echo '<img src="uploads/'.$item->url_photo.'">';
		}
?>

