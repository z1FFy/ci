<style>	#content {
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

	}
	#middle-pol {
		padding-top: 0px;
		width: 100%;
		height: 0px;
		background-image: url('images/middle-bg.png');
		visibility: hidden;

	}
</style>  
<div align="center">
  <p style="font-size:30px;color:#fff">Регистрация </p>

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
