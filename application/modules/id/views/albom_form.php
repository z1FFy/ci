<html>
<head>
<title>Форма Создания Альбома</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
</head>
<body>

<form action="<?php echo $this->config->site_url() ?>id/albom/do_albom" method="post" accept-charset="utf-8">

<input class="styler" placeholder="Название альбома" type="text" name="albom_name" size="20" />

<br /><br />

<input class="styler" type="submit" value="Создать" />

</form>

</body>
</html>