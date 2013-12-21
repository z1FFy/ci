
<style>
body{
background-color:#fff;
}


    #middle-pol {
    padding-top: 0px;
    width: 100%;
    height: 0px;
    visibility: hidden;

  }
  #content {
    padding-left: 10%;
    padding-right: 10%;
    display: table;
  }
  #menu {
    height: 39px;
  }
    .spi{
    margin: 4px;
  }

</style>


  <?php $this->load->view('left_user',$user_data);  ?>

<div id="polosa"></div>
<div id="right_user">
<p class="titl"> Лента новостей</p>
<!-- <form> -->
 <?php
if (empty($news_photos_data)) {
  echo "Нет новостей";
}
foreach ($news_photos_data as $item) { //в переменные заносим все нужные данные для вложенного форича
  $url_photo = $item->url_photo;
  $name_photo = $item->photos_name;
  $photos_date = $item->photos_date;
  $id_photos = $item->id_photos;
  $id_user = $item->id_user;
  $i=0;                               // что бы вложенный форич не выкладывал несколько раз одну и ту же фотку
  foreach ($subscribe_users_data as $item) {
    if($i==0){
        if($item->friend_id == $id_user){
          if($photos_date >= $item->subscribe_date ){ // если дата добавления фотки больше даты создания подписи эхаем все говно
              if($item->name == ''){
              $name = $item->login;
              }else{
                $name = $item->name.' '.$item->famil;
              }
              echo '<div class="block" >';
              echo htmlspecialchars($name, ENT_QUOTES).'  <div style="margin-top:-18px" class="date_msg">'.date("d.m.y H:i:s" ,htmlspecialchars($photos_date, ENT_QUOTES)).'</div>';
              echo '<img width="400" src="'.$this->config->site_url().'uploads/photos/'.$url_photo.'"/">';
              echo '</div><br>';
              $i++;
          }
        }
      
    }
    
  }


}




 ?>




 <!-- </form> -->
</div>
