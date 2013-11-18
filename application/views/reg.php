<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Registraition</title>
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
  famil = $("input[name='famil']").val();
  name = $("input[name='name']").val();
  otchestvo = $("input[name='otchestvo']").val();
  spec_user = $("select[name='spec_user']").val();;
  birthday= $("input[name='birthday']").val();
  avatar= $("input[name='avatar']").val();
	if (login.length >= 3 && pass.length >= 3) {
	if (pass == pass2) {
	$.post("sendreg",
     {
     login : login, email : email, pass : pass, famil : famil, name : name,
       otchestvo : otchestvo, birthday : birthday, avatar : avatar, spec_user : spec_user, },
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
<<<<<<< 1f83031beabbeba109d679a44febad99f752220c
  // if(notnull==0){
  //     $('#pad').html('Выберите тип страницы.');
  // }else {
     location.href='/ci';
  // }
=======
  if(notnull==0){
      $('#pad').html('Выберите тип страницы.');
  }else {
  //   location.href='/ci';
  }
>>>>>>> 7ab5e4a5f64d6f2e82cc1bc7a801d9ddeb01b6cb
}
 }
          };
          
   
   
}); 
 

 
 
 });
  </script>
</head>
<body>

<div id="container">
	<h1>Регистрация !</h1>

	<div id="body">

<!-- <label class="checkbox">
    <input type="checkbox" name="spec_user" id="p1" value="Композитор"> Композитор <br>
    <input type="checkbox" name="spec_user" id="p2" value="Фотограф"> Фотограф <br>
    <input type="checkbox" name="spec_user" id="p3" value="Долбоеб"> Долбоеб <br>
</label> -->

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
</select>


    <input type="text" name ="famil" maxlength="20" class="input-small" placeholder="Фамилия"><br>
    <input type="text" name ="name"  maxlength="20" class="input-small" placeholder="Имя"><br>
    <input type="text" name ="otchestvo"  maxlength="20" class="input-small" placeholder="Отчество"><br>
    <input type="text" name ="birthday"  maxlength="20" class="input-small" placeholder="Дата рождения"><br>
    <input type="text" name ="avatar" onkeypress='validate(event)' maxlength="20" class="input-small" placeholder="Аватар"><br>

  <input type="text" name ="login" onkeypress='validate(event)' maxlength="20" class="input-small" placeholder="Логин" ><br>
<input type="text" id="mail"  name="email" onkeypress='validate(event)' maxlength="40" class="input-small" placeholder="Email"><br>
  <input type="password" name ="pass" onkeypress='validate(event)' maxlength="20" class="input-small" placeholder="Пароль"><br>
    <input type="password" name ="password2" onkeypress='validate(event)' maxlength="20" class="input-small" placeholder="Повторите Пароль">
	<div style="margin-left: 30px;
height: 20px;
width: 270px;" id="pad">  </div> 

  <button  class="btn">Зарегестрироваться</button>

	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>