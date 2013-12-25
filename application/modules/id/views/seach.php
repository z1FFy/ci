
<style>


    #middle-pol {
    padding-top: 0px;
    width: 100%;
    height: 0px;
    visibility: hidden;

  }
  #content {
    display: table;
  }
  #menu {
    height: 39px;
  }
    .spi{
    margin: 4px;
  }

</style>

<script language ="JavaScript"> 
  $(document).ready(function() {
    $('#search').click(function() {
     birthday1 = $("select[name='birthday1']").val();
         birthday2 = $("select[name='birthday2']").val();
             birthday3 = $("select[name='birthday3']").val();
                 spec_user = $("select[name='spec_user']").val();
                 seach = $("input[name='seach']").val();
      $.post(site_full+"/id/seach_user",
         { 
          birthday1 : birthday1,
           birthday2 : birthday2,
            birthday3 : birthday3,
             spec_user : spec_user,
              seach : seach,
              },
         onAjaxSuccess
         );
      function onAjaxSuccess(data)
      {
  $('#res').html(data);
      };
});
});

function selChange(seln) { 
selNum = seln.spec_user.selectedIndex; 
Isel = seln.spec_user.options[selNum].text; 
//alert("Выбрано: "+Isel);

if (Isel == 'Другое'){
 //document.getElementById("div1").innerHTML="<input type="text" name ="spec_user" onkeypress='validate(event)' maxlength="20" class="input-small" placeholder="Введите свою специализацию" ><br>";
document.getElementById('div1').innerHTML='<input type="text" name ="spec_user1" onkeypress="validate(event)" maxlength="20" placeholder="Специализация" ><br>';
}else{
  document.getElementById('div1').innerHTML='';
}


} 
 
</script> 



<?php
$logged = $this->session->userdata('logged_in');
foreach ($user_data as $item) {
      $login=$item->login;
      $user_id=$item->user_id;
      $avatar_url=$item->avatar;
      $email=$item->mail;
      }



   ?>



<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	if($text == ''){
		foreach ($seach_data as $item) {
			//var_dump($item);
			echo '<div style="background-color:#EDF7FD;box-shadow: 0 0 1px rgba(0,0,0,0.5);"><img src="'.$this->config->site_url().'/uploads/avatars/small/'.$item->avatar.'" width="50"><a href="'.$this->config->site_url().'id'.$item->user_id.'">'.' '.htmlspecialchars($item->name, ENT_QUOTES).' '.htmlspecialchars($item->famil, ENT_QUOTES).'</a></div><br>';	
		}
	}else{
		echo $text;
	}
} else {
      $this->load->view('left_user',$user_data); 
  ?>

<div id="polosa"></div>
<div id="right_user">

  <p class="titl">Поиск людей</p> <br>

<form action="<?php echo $this->config->site_url() ?>id<?php echo $user_id ?>/seach_user" method="post" accept-charset="utf-8" enctype="multipart/form-data">
<tr>
Дата рождения:
<select class="spi" style="width:90px" name="birthday1" size="1">
  <option value="day">день</option>
  <?php for ($i = 1; $i <= 31; $i++){
  if ($i<10){
  echo '<option value="0'.$i.'">0' .$i.' </option>';
  }else{

    echo '<option value="'.$i.'">' .$i.' </option>';

  }
  
  }?>
  </select>

  <select class="spi" style="width:90px" name="birthday2" size="1">
    <option value="month">месяц</option>
  <?php for ($i = 1; $i <= 12; $i++){
  if ($i<10){
  echo '<option value="0'.$i.'">0' .$i.' </option>';
  }else{

    echo '<option value="'.$i.'">' .$i.' </option>';

  }
  }?>
  </select>


  <select class="spi" style="width:90px" name="birthday3" size="1">
    <option value="year">год</option>
  <?php for ($i = 1800; $i <= 2015; $i++){
  echo '<option value="'.$i.'">' .$i.' </option>';
  }?>
  </select>
  <br>
<!-- spec_user -->

<?php
  echo '
  Специализация:

<select class="batn spi" id="regsel" name="spec_user" onChange="selChange(this.form)">
<option selected="selected" value="">Не выбрано</option>
<option value="Менеджмент">Менеджмент</option>
<option value="Разработка сайтов">Разработка сайтов</option>
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

</select>

<div id="div1">
 
 </div>


<br>
<!-- seach -->
<input type="text"  class="styler" name="seach" maxlength="50" placeholder="Имя пользователя" />
<input id="search"  class="styler spi" type="button" value="Найти" />

</form>
<div id="res"> </div>
<br></div>';

}
?>

