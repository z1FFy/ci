<html>
<head>
<title>Форма загрузки</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
</head>
<body>

<h3>Ваш файл был успешно загружен!</h3>

<ul>
<?php foreach ($upload_data as $item => $value):?>
<li><?php echo $item;?>: <?php echo $value;?></li>
<?php endforeach; ?>
</ul>

<p><?php echo anchor('upload', 'Загрузить другой файл!'); ?></p>
<?php
		$user_id=$this->session->userdata('user_id');

$name_photo = $upload_data['file_name'];
	header ("Location:db_upload?user_id=".$user_id."&name=".$name_photo);

?>

























</body>
</html>