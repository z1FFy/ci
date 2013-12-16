




<script>


  $(document).ready(function() {
 	$('.soglchek').click(function() {
 		$('#reg').removeAttr('disabled');
 	});
  });
</script>
<style>
	#content {
padding-left: 20%;
padding-right: 20%;
text-align: left;
padding-top: 1px;
padding-bottom: 40px;
	background: #336aa8; /* Old browsers */
background: -moz-linear-gradient(top, #336aa8 0%, #054e7c 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#336aa8), color-stop(100%,#054e7c)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top, #336aa8 0%,#054e7c 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top, #336aa8 0%,#054e7c 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top, #336aa8 0%,#054e7c 100%); /* IE10+ */
background: linear-gradient(to bottom, #336aa8 0%,#054e7c 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#336aa8', endColorstr='#054e7c',GradientType=0 ); /* IE6-9 */
display: block;
	}
body {
	background: #054e7c; /* Old browsers */

}
	#middle-pol {
		padding-top: 0px;
		width: 100%;
		height: 0px;
		visibility: hidden;

	}
	input {
		width: 200px;
	}
</style>  
<div align="center">
  <p style="font-size:30px;color:#fff">Регистрация </p>
<br>

<script language ="JavaScript"> 

function selChange(seln) { 
selNum = seln.spec_user.selectedIndex; 
Isel = seln.spec_user.options[selNum].text; 
//alert("Выбрано: "+Isel);

if (Isel == 'Другое'){
 //document.getElementById("div1").innerHTML="<input type="text" name ="spec_user" onkeypress='validate(event)' maxlength="20" class="input-small" placeholder="Введите свою специализацию" ><br>";
document.getElementById('div1').innerHTML='<input type="text" name ="spec_user1" onkeypress="validate(event)" maxlength="20" class="input-small" placeholder="Введите свою специализацию" ><br>';
}else{
	document.getElementById('div1').innerHTML='';
}


} 
 
</script> 

<form> 
<div style=""><select class="styler" id="regsel"  name="spec_user" onChange="selChange(this.form)">
<option selected="selected" value="Выберите Вашу специализацию">Специализация</option>
<option value="Менеджмент">Менеджмент</option>
<option  value="Разработка сайтов">Разработка сайтов</option>
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
<option value="Аудио/Видео">Аудио/Видео</option>
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

</select></div>

<div id="div1">

 </div>
</form> 

 <br>
 

 <input  type="text" name ="famil" onkeypress='validate(event)' maxlength="20" class="w styler" placeholder="Фамилия" ><br>
  <input type="text" name ="name" onkeypress='validate(event)' maxlength="20" class="w styler" placeholder="Имя" ><br>

  <input type="text" name ="login" onkeypress='validate(event)' maxlength="20" class="w styler" placeholder="Логин" ><br>
<input type="text" id="mail"  name="email" onkeypress='validate(event)' maxlength="40" class="w styler" placeholder="Email"><br>
  <input type="password" name ="pass" onkeypress='validate(event)' maxlength="20" class="styler" placeholder="Пароль"><br>
    <input type="password" name ="password2" onkeypress='validate(event)' maxlength="20" class="styler" style="margin-left: 6px;" placeholder="Повторите Пароль">
 <br> <label style="margin-left: 30px;
height: 20px;
width:  170px;" id="pad">  </label> 
<br> <div id="sogl"><a style="color:white" href="#">Пользовательское соглашение</a><br></div><input  class="soglchek styler" type="checkbox">С правилами ознакомлен(а)
 <br> <button class="styler" disabled="true" id="reg"  class="btn">Зарегистрироваться</button>
</div>