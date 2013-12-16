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
	$access='da';
}
if ($who == 'photos') {
	if($photo_data >= 30){
		$access='no';		echo 'Достигнут лимит фотографий для вашего аккаунта!';
		
	}else{
echo "<p style='font-size:17px'>Выберите работу с жесткого диска</p>";
$access='da';
	}

}
if ($access=='da') {

echo '<form action="'.$this->config->site_url().'id/upload/do_upload" method="post" accept-charset="utf-8" enctype="multipart/form-data">';
if ($who=='photos') {
echo '<input class="styler" type="text" name="photos_name" maxlength="20" placeholder="Имя" />';
 }
echo '<br><input class="styler" type="file" name="userfile" size="20" />
 <input type="hidden" name="who" value="'.$who.'">
<br /><br />

<input class="styler" type="submit" value="Загрузить" />

</form>
';
}
?>
</body>
</html>