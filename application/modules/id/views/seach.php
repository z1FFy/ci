<html>
<head>
<title>Поиск людей</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">

</head>
<body>

<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	if($text == ''){
		foreach ($seach_data as $item) {
			//var_dump($item);
			echo '<img src="'.$this->config->site_url().'/uploads/avatars/small/'.$item->avatar.'" width="50"><a href="'.$this->config->site_url().'id'.$item->user_id.'">'.$item->name.' '.$item->famil.'</a><br>';	
			# code...
		}
	}else{
		echo $text;
	}

}
?>

<form action="<?php echo $this->config->site_url() ?>id/seach_user" method="post" accept-charset="utf-8" enctype="multipart/form-data">

<input type="text" name="seach" maxlength="50" placeholder="Поиск" />
 
<br /><br />



<input  type="submit" value="Найти" />

</form>

</body>
</html>