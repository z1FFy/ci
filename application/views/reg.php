<!DOCTYPE html>
<html>
<head>
  <title>Registraition</title>
    <meta charset="utf-8">

  <link rel="stylesheet" href="<?php echo $this->config->site_url() ?>default.css" type="text/css" />

  <script type="text/javascript" src="<?php echo $this->config->site_url() ?>jquery-1.7.2.js"></script>
  <script>   

 function validate(evt) {
var el = $('#mail');
if (el.is(":focus")){
    regex =  /[0-9a-zA-Z_@.]/;
   
} else {
 regex = /[0-9a-zA-Z_]/;
  }
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
  key = String.fromCharCode( key );
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}


  
  $(document).ready(function() {
 


$('.btn').click(function() { 
// i=0;
// notnull=0;
// a='';
// value='';
//     while (i<3) {
//      i++;
//      option='#p'+i;
//      if ( $(option).prop("checked") )  {
//         notnull=1;
//         if (i==1) {a+='Композитор ';};
//         if (i==2) {a+='Дизайнер ';};
//         if (i==3) {a+='Долбаеб ';};
//       } 
      
//      }

   login = $("input[name='login']").val();
  email = $("input[name='email']").val();
  pass = $("input[name='pass']").val();
  pass2 = $("input[name='password2']").val();
  spec_user = $("select[name='spec_user']").val();
    if (login.length >= 3 && pass.length >= 3) {
  if (pass == pass2) {
  $.post("sendreg",
     {
     login : login, email : email, pass : pass, spec_user : spec_user, },
     onAjaxSuccess
   );
   } else {
$('#pad').html('пароли не совпадают');
}   
}else
{
$('#pad').html('минимальное значение любого поля - 3 символа');
}

   function onAjaxSuccess(data)
   {
       
 if (data== 'yzhe') {
 $('#pad').html('такой юзер есть');
 } else {
  if (data=='xren') {
     $('#pad').html('символы не те');
  }else{

     location.href='/ci';


}
 }
          };
          
   
   
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

  <input type="text" name="login-entry" onkeypress='validate(event)' class="input-small" maxlength="20" placeholder="Email">
  <input type="password" name ="password-entry" onkeypress='validate(event)' class="input-small"maxlength="20" placeholder="Пароль">

  <button type="submit" class="btn">Войти</button>


</div>
<div id="middle-pol" align="center"><img style="" src="<?php echo $this->config->site_url() ?>images/byd.png"></div>

<div align="center" id="content">
  
  <h1>Регистрация !</h1>

  <div id="body">



<select name="spec_user" size="1">
<option value="Менеджмент">Менеджмент</option>
<option selected="selected" value="Разработка сайтов">Разработка сайтов</option>
<option value="Дизайн">Дизайн</option>
<option value="Арт">Арт</option>
<option value="Программирование">Программирование</option>
<option value="Поисковая оптимизация SEO">Поисковая оптимизация SEO</option>
<option value="Полиграфия">Полиграфия</option>
<option value="Флеш">Флеш</option>
<option value="Тексты<">Тексты</option>
<option value="Переводы">Переводы</option>
<option value="3D Графика">3D Графика</option>
<option value="Анимация/Мультипликация">Анимация/Мультипликация</option>
<option value="Фотография">Фотография</option>
<option value="Аудио/Видео">Аудио/Видо</option>
<option value="Реклама/Маркейтинг">Реклама/Маркейтинг</option>
<option value="Разработка игр">Разработка игр</option>
<option value="Арихитектура/Интерьер">Арихитектура/Интерьер</option>
<option value="Инжиниринг">Инжиниринг</option>
<option value="Консалтинг">Консалтинг</option>
<option value="Обучение">Обучение</option>
<option value="Мобильные приложения">Мобильные приложения</option>
<option value="Сети и информационные системы">Сети и информационные системы</option>
<option value="Обслуживание клиентов">Обслуживание клиентов</option>
<option value="Маркейтинг и продажи">Маркейтинг и продажи</option>
<option value="Бизнес-услуги">Бизнес-услуги</option>
<option value="Административная поддержка">Административная поддержка</option>
<option value="Репетиторы/Преподаватели">Репетиторы/Преподаватели</option>
<option value="Другое">Другое</option>
</select>

 <br>
  <input type="text" name ="login" onkeypress='validate(event)' maxlength="20" class="input-small" placeholder="Логин" ><br>
<input type="text" id="mail"  name="email" onkeypress='validate(event)' maxlength="40" class="input-small" placeholder="Email"><br>
  <input type="password" name ="pass" onkeypress='validate(event)' maxlength="20" class="input-small" placeholder="Пароль"><br>
    <input type="password" name ="password2" onkeypress='validate(event)' maxlength="20" class="input-small" placeholder="Повторите Пароль">
 <br> <label style="margin-left: 30px;
height: 20px;
width:  170px;" id="pad">  </label> 

 <br> <button  class="btn">Зарегестрироваться</button>

</div>
<footer> </footer>
</body>
</html>