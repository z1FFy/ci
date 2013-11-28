<html>
<head>
<title>Форма загрузки</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
</head>
<body>

<?php echo $error;
$who = $_GET['who'];
?>

<form action="<?php echo $this->config->site_url() ?>id/upload/do_upload" method="post" accept-charset="utf-8" enctype="multipart/form-data">

<input type="text" name="photos_name" maxlength="20" />
<input type="file" name="userfile" size="20" />
 <input type="hidden" name="who" value="<?php echo $who; ?>">
<br /><br />

<input type="submit" value="Загрузить" />

</form>

</body>
</html>