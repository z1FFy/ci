<html>
<head>
<title>Форма Чата</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
</head>
<body>

<form action="<?php echo $this->config->site_url() ?>id/chat/send_messages" method="post" accept-charset="utf-8">

<textarea name="chat_name" size="20"></textarea>

<br /><br />

<input type="submit" value="Отправить" />

</form>

</body>
</html>