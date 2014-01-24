<script src="http://api-maps.yandex.ru/2.0-stable/?load=package.standard&lang=ru-RU" type="text/javascript"></script>



<script>
// $('#friends').click(function() { 
//         friend_id = $(this).attr("link");
//         //alert(friend_id);
//       $.post(site_full+"/id/friends_insert",
//          { friend_id : friend_id,
//               },
//          onAjaxSuccess
//          );
//       });

ymaps.ready(init);

function init() {
    var myMap = new ymaps.Map('map', {
        center: [55.753994, 37.622093],
        zoom: 9,
        behaviors: ['default', 'scrollZoom']
    });
    map = $("#sity_map").attr("value");
    //alert(map);
    // Поиск координат центра Нижнего Новгорода.
    ymaps.geocode(map, {

        /**
         * Опции запроса
         * @see http://api.yandex.ru/maps/doc/jsapi/2.x/ref/reference/geocode.xml
         */
        // boundedBy: myMap.getBounds(), // Сортировка результатов от центра окна карты
        // strictBounds: true, // Вместе с опцией boundedBy будет искать строго внутри области, указанной в boundedBy
        results: 1 // Если нужен только один результат, экономим трафик пользователей
    }).then(function (res) {
            // Выбираем первый результат геокодирования.

            var firstGeoObject = res.geoObjects.get(0),
                // Координаты геообъекта.
                coords = firstGeoObject.geometry.getCoordinates(),
                // Область видимости геообъекта.

                bounds = firstGeoObject.properties.get('boundedBy');
                //alert(bounds);
            // Добавляем первый найденный геообъект на карту.
            myMap.geoObjects.add( new ymaps.Placemark(
            coords,
            {
                // В балуне: страна, город, регион.
                iconContent: firstGeoObject.properties.get('text'),
                 // balloonContentHeader: firstGeoObject.properties.get('description'),
                 // balloonContent: firstGeoObject.properties.get('name'),
                // balloonContentFooter: geolocation.region
            }, {
            // Опции.
            // Иконка метки будет растягиваться под размер ее содержимого.
            preset: 'twirl#redStretchyIcon',
            // Метку можно перемещать.
            //draggable: true
        }
        ));
            // Масштабируем карту на область видимости геообъекта.
            myMap.setBounds(bounds, {
                checkZoomRange: true // проверяем наличие тайлов на данном масштабе.
            });
           //alert(firstGeoObject.properties.get('metaDataProperty.GeocoderMetaData.precision')); 
            
console.log('Название объекта: %s', firstGeoObject.properties.get('name'));
            console.log('Описание объекта: %s', firstGeoObject.properties.get('description'));
            console.log('Полное описание объекта: %s', firstGeoObject.properties.get('text'));
            
        });
}

</script>


<?php
function send_mime_mail($name_from, // имя отправителя
                        $email_from, // email отправителя
                        $name_to, // имя получателя
                        $email_to, // email получателя
                        $data_charset, // кодировка переданных данных
                        $send_charset, // кодировка письма
                        $subject, // тема письма
                        $body, // текст письма
                        $html = FALSE, // письмо в виде html или обычного текста
                        $reply_to = FALSE
                        ) {
  $to = mime_header_encode($name_to, $data_charset, $send_charset)
                 . ' <' . $email_to . '>';
  $subject = mime_header_encode($subject, $data_charset, $send_charset);
  $from =  mime_header_encode($name_from, $data_charset, $send_charset)
                     .' <' . $email_from . '>';
  if($data_charset != $send_charset) {
    $body = iconv($data_charset, $send_charset, $body);
  }
  $headers = "From: $from\r\n";
  $type = ($html) ? 'html' : 'plain';
  $headers .= "Content-type: text/$type; charset=$send_charset\r\n";
  $headers .= "Mime-Version: 1.0\r\n";
  if ($reply_to) {
      $headers .= "Reply-To: $reply_to";
  }
  return mail($to, $subject, $body, $headers);
}

function mime_header_encode($str, $data_charset, $send_charset) {
  if($data_charset != $send_charset) {
    $str = iconv($data_charset, $send_charset, $str);
  }
  return '=?' . $send_charset . '?B?' . base64_encode($str) . '?=';
}


?>
 


<?php
  $logged = $this->session->userdata('logged_in');

   foreach ($user_data as $item) {
$podtvr=$item->podtvr;
$pod=$podtvr;
      $login=$item->login;
      $user_id=$item->user_id;
      $avatar_url=$item->avatar;
      $email=$item->mail;
      }
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  $send_key=$_POST['send_key'];
if ($send_key == '1') {
  $podtvr=$this->config->site_url() .'id'.$user_id.'/profile?key='.$podtvr;
   send_mime_mail('PortfoliOnline.ru',
               'about@portfolionline.ru',
               'Получатель',
               $email,
               'UTF-8',"CP1251", // кодировка, в которой будет отправлено письмо
               "PortfoliOnline.ru / Подтверждение email",
               $podtvr);
   echo 'Подтверждение отправлено на ваш email';
}

}
if (isset($_GET['key'])) {
  if ($logged!=TRUE) {
    echo 'Авторизируйтесь, на сайте';
  }
  else {
  $key=$_GET['key'];
if ($key == $podtvr) {
  header ("Location:profile_podtvr?k=".$key."&p=".$pod);
}
}
}


?>

<style>

    .tbl {
      border: 0px solid #bbb;
 /*     border-radius: 10px;*/
      padding: 10px;
/*      background-color: #F0F6FD;*/
      font-size: 17px;
    }

    .name,.val {
      border: 1px solid #bbb;
      border-radius: 10px 0px 0px 10px;
      padding: 5px;
      margin-top: 15px;
      border: 0px;
      text-align: center;
      font-size: 14px;
      width: 100px;
    }
    .val {color: #888;
            font-size: 17px;
      text-align: left;
      width: 130px;
      /*color: #000;*/
      border-radius: 0px;
      background-color: #fff;
      border: 1px solid #bbb;
    }
    .item {
  padding: 44px;
  border: 10px solid #000;
    }
</style>


<?php

       $this->load->view('left_user',$user_data); 
   ?>

<div id="right_user">

 


  <p class="titl" id='user_text_color'><?php if ($whopage=='my') {
    echo "Мой ";
  } ?>Профиль</p>

<?php
if ($whopage == 'my') {
   echo "<br><a href='".$this->config->site_url() ."id".$user_id."/profile_update_form' ><input type='button' class='styler' value='Редактировать профиль'></a>";

      if($podtvr == 'okay') {
        $podtvr_str='<br>Ваш Email подтвержден';
      } else {
        $podtvr_str='<br>Ваш email не подтвержден';
?>
  <form action="profile" method="post" >
      <input type="hidden" id="send_key" value="1" name="send_key" />
      <input type="hidden" id="key" value="0" name="key" />
      <div >
      <?php echo $podtvr_str;?><br>
      <input  class="styler" type="submit" value="Выслать код подтверждения на Email"  />
      </div>
    </form>
<?php }
  }
?>


  <br><h3 id='user_text_color'>Личная Информация:</h3>
<table  cellspacing="1" cellpadding="0" class="tbl" border="1">
  <?php if($item->famil != ''){ ?>
    <tr class="item">
   <td class="name">Фамилия: </td>
   <td class="val"><?php echo $text = htmlspecialchars($item->famil, ENT_QUOTES);?></td>   </tr>  <?php } ?>
   <?php if($item->name != ''){ ?>
     <tr class="item">
  <td class="name">Имя:</td> 
   <td class="val"><?php echo $text = htmlspecialchars($item->name, ENT_QUOTES);?> </td> </tr> <?php } ?>
   
   <?php if($item->otchestvo != ''){ ?>
       <tr class="item">
  <td class="name">Отчество: </td>
   <td class="val"><?php echo $text = htmlspecialchars($item->otchestvo, ENT_QUOTES);?> </td> </tr><?php } ?>
   
   <?php if($item->mail != ''){ ?>
          <tr class="item">
  <td class="name">
Почта: </td>   <td class="val"><?php echo $text = htmlspecialchars($item->mail, ENT_QUOTES);?></td></tr> <?php } ?>

     <tr class="item">
  <td class="name">Пол:</td>  <td class="val"><?php echo $text = htmlspecialchars($item->sex, ENT_QUOTES);?></td></tr>
   <?php if($item->birthday != ''){ ?>
    <tr class="item">
  <td class="name">Дата Рождения:</td><td class="val"> <?php echo $text = htmlspecialchars($item->birthday, ENT_QUOTES);?></td></tr><?php } ?>
 <tr class="item">
  <td class="name">Дата регистрации: </td>  <td class="val"><?php echo date("d.m.y H:i:s" , htmlspecialchars($item->date, ENT_QUOTES));?></td></tr>
  
   <?php if($item->sity != ''){ ?>
   <tr class="item">
  <td class="name">Родной город:</td>  <td class="val"> <?php echo $text = htmlspecialchars($item->sity, ENT_QUOTES);?></td></tr><?php } ?>

</table>
  <?php if(($item->telephone != '') || ($item->dop_telephone != '') || ($item->skype != '') || ($item->website != '')){ ?>  
  <p id="user_text_color">Контакты: </p>
    <table  cellspacing="1" cellpadding="0" class="tbl" border="1">
  <?php } ?>

     <?php if($item->telephone != ''){ ?>  
       <tr class="item">
  <td class="name">Мобильный телефон:</td>  <td class="val">  <?php echo $text = htmlspecialchars($item->telephone, ENT_QUOTES);?></td></tr> <?php } ?>

     <?php if($item->dop_telephone != ''){ ?>
           <tr class="item">
  <td class="name">Дополнительный телефон:</td>  <td class="val">  <?php echo $text = htmlspecialchars($item->dop_telephone, ENT_QUOTES);?></td></tr><?php } ?>

     <?php if($item->skype != ''){ ?>
               <tr class="item">
  <td class="name">Skype:</td><td class="val"> <?php echo $text = htmlspecialchars($item->skype, ENT_QUOTES);?></tr></td><?php } ?>

     <?php if($item->website != ''){ ?>
                   <tr class="item">
  <td class="name">Личный сайт:</td><td class="val"> <?php echo '<a href="'.$text = htmlspecialchars($item->website, ENT_QUOTES).'">'.$text = htmlspecialchars($item->website, ENT_QUOTES).'</a>'; ?></td></tr> 

  <?php } ?>

  
    <table  cellspacing="1" cellpadding="0" class="tbl" border="1"><p id="user_text_color">Образование:</p>
                       <tr class="item">
  <td class="name">Уровень образования: </td><td class="val"> <?php echo $text = htmlspecialchars($item->education_level, ENT_QUOTES);?></td></tr>
    
    <?php if($item->education_basic != ''){ ?>
    <tr class="item">
  <td class="name">Наименование учебного заведения: </td><td class="val">  <?php echo $text = htmlspecialchars($item->education_basic, ENT_QUOTES);?> </td></tr>  <?php } ?>
    
    <?php if($item->facultet != ''){ ?>
       <tr class="item">
  <td class="name">Факультет:</td><td class="val">  <?php echo $text = htmlspecialchars($item->facultet, ENT_QUOTES);?></td></tr><?php } ?>

           <tr class="item">
  <td class="name">Закончил:</td><td class="val"> <?php echo $text = htmlspecialchars($item->education_end, ENT_QUOTES);?></td></tr>

    <?php if($item->language != ''){ ?>
               <tr class="item">
  <td class="name">Знание языков:</td><td class="val"> <?php echo $text = htmlspecialchars($item->language, ENT_QUOTES);?></td></tr><?php } ?>
 </table>
    <?php if($item->interests != ''){ ?>

<div  style="float: left;
position: absolute;
margin-left: 300px;
top: 285px;">
<p id="user_text_color">Интересы:</p><br>
            
   <textarea class="styler" cols="40" rows = "10" readonly = "readonly" maxlength = "4" disabled = "disabled">
   <?php echo $item->interests;?> </textarea><?php } ?>
         <table  cellspacing="1" cellpadding="0" class="tbl" border="1"> 
       <tr class="item">
  <td class="name">Специализация: </td><td class="val"> <?php echo $item->spec_user;?></td></tr></table>
</div>

<!-- ######################################### -->

<?php if($item->sity != ''){ ?>
  <table  cellspacing="1" cellpadding="0" class="tbl" border="1">
   <tr class="item">
  <td class="name">Город на карте:</td>  <td class="val">
<?php echo '<input type="hidden" id="sity_map" value="'.htmlspecialchars($item->sity, ENT_QUOTES).'">' ?> 
<div id="map" style="width: 350px; height: 300px"></div> 
</td>
</tr></table>
</td></tr><?php } ?>
<!-- ######################################### -->
</div>


