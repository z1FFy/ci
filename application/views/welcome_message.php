<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>PortfioliOnline</title>

	  <link rel="stylesheet" href="default.css" type="text/css" />
	  <script type="text/javascript" src="<?php echo $this->config->site_url() ?>jquery-1.7.2.js"></script>
  <script>   
  function validate(evt) {
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
  key = String.fromCharCode( key );
  var regex = /[0-9a-zA-Z_]/;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}
  $(document).ready(function() {
 


$('.btn').click(function() { 
	login = $("input[name='login']").val();
	pass = $("input[name='password']").val();

		
	
	if (login.length >= 3 || pass.length >= 3) {
	$.post("site/entry",
     {
       login : login, pass : pass,
     },
     onAjaxSuccess
   );

   function onAjaxSuccess(data)
   {
 console.log(data);
	  	  location.reload(true);
   
          };
    } else {
	console.log('bolwe davai');
	}          

   
}); 

      $("input").keypress(function (e) {

      if (e.which == 13) {
	  $('.btn').click();
	  }

 
 
  });
}); 
  </script>
</head>
<body>

<div id="container">
	<h1>Welcome Portfolionline BETA</h1>
<h2 style="padding:10px"><b><a href ="site/reg">Регистрация</a></b></h2>
	<div id="body">

<input type="text" name="login" onkeypress='validate(event)' class="input-small" maxlength="20" placeholder="Email">
  <input type="password" name ="password" onkeypress='validate(event)' class="input-small"maxlength="20" placeholder="Пароль">
  <label class="checkbox">
    <input type="checkbox"> Запомнить меня
  </label>
  <button type="submit" class="btn">Войти</button>

	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>