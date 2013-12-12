<html>
<head>
<title>Форма загрузки</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
</head>
<body>

<?php
$who = '';
if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
$who = $_GET['who']; 
}
echo $error;
if ($who == 'avatars') {
	echo "<p style='font-size:17px'>Выберите фотографию для аватара</p>";
}
if ($who == 'photos') {
	echo "<p style='font-size:17px'>Выберите работу с жесткого диска</p>";
}
?>

<form action="<?php echo $this->config->site_url() ?>id/upload/do_upload" method="post" accept-charset="utf-8" enctype="multipart/form-data">
<?php if ($who=='photos') {?>
<input type="text" name="photos_name" maxlength="20" placeholder="Имя" />
 <?php } ?>
<br><input type="file" name="userfile" size="20" />
 <input type="hidden" name="who" value="<?php echo $who; ?>">
<br /><br />

<input  type="submit" value="Загрузить" />

</form>

</body>
</html>