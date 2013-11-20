<!DOCTYPE html>
<html>
<head>
  <title>Portfolio Online</title>
    <meta charset="utf-8">

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

    
  
  if (login.length >= 3 && pass.length >= 3) {
  $.post("site/entry",
     {
       login : login, pass : pass,
     },
     onAjaxSuccess
   );

   function onAjaxSuccess(data)
   {
 console.log(data);
  if (data == 'no_pass') {
    $("#pad").html('Не правильный пароль');
  } else { location.reload(true); }
   
          };
    } else {
    $("#pad").html('Длина должна быть больше трех символов');
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
<header>
<div align="center">
<a href="<?php echo $this->config->site_url() ?>"><img id="logo" src="
<?php echo $this->config->site_url() ?>images/logo.png"></a>

</div>
</header>
<div align="center" id="menu">

  <input type="text" name="login" onkeypress='validate(event)' class="input-small" maxlength="20" placeholder="Email">
  <input type="password" name ="password" onkeypress='validate(event)' class="input-small"maxlength="20" placeholder="Пароль">

  <button type="submit" class="btn">Войти</button>


</div>
<div id="middle-pol" align="center"><img style="" src="images/byd.png"></div>

<div align="center" id="content">
  
<h2>СЕРВИС ДЛЯ СОЗДАНИЯ БЕСПЛАТНОГО ОНЛАЙН ПОРТФОЛИО</h2>
<a href="site/reg" class="but"><h1>Регистрация</h1></a>
<br>
<br>
PortfoliOnline.ru - это уникальный сервис для создания бесплатного портфолио.<br>
Если ты дизайнер, фотограф, модель или музыкант, то ты попал именно по адресу.<br>
Наша команда специалистов постаралась сделать для тебя простой, удобный
и полезный сервис.<br>
Возможность выбора аккаунта, открывает перед тобой безграничные
возможности сервиса PortfoliOnline.ru!<br>
Покажи себя всему Миру!<br>
Общайся онлайн, будь всегда на связи!<br>

</div>
<footer> </footer>
</body>
</html>