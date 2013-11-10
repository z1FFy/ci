<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
  <link rel="stylesheet" href="default.css" type="text/css" />
</head>
<body>

<div id="container">
	<h1>Регистрация !</h1>

	<div id="body">
<form class="form-inline" action="site/entry" method="POST">
  <input type="text" name ="login" class="input-small" placeholder="login">
<input type="text" name="email" class="input-small" placeholder="Email">
  <input type="password" name ="password" class="input-small" placeholder="Пароль">
    <input type="password" name ="password2" class="input-small" placeholder="Повторите Пароль">

  <button type="submit" class="btn">Зарегестрироваться</button>
</form>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>