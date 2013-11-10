<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>PortfioliOnline</title>

	  <link rel="stylesheet" href="default.css" type="text/css" />
</head>
<body>

<div id="container">
	<h1>Welcome Portfolionline BETA</h1>
<h2 style="padding:10px"><b><a href ="site/reg">Регистрация</a></b></h2>
	<div id="body">
<form class="form-inline" action="site/entry" method="POST">
<input type="text" name="login" class="input-small" placeholder="Email">
  <input type="password" name ="password" class="input-small" placeholder="Пароль">
  <label class="checkbox">
    <input type="checkbox"> Запомнить меня
  </label>
  <button type="submit" class="btn">Войти</button>
</form>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>