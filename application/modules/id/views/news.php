
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
if (empty($subscribe_users_data)) {
  echo "Подписывайтесь под другим пользователем, что бы видеть сдесь последние обновления";
}


   
  
      echo '<div style="
width: 240px;
" class="block">Подписчики:<br>';
foreach ($subscribe_users_data as $item) {
  echo '<img style="width:50px;height:50px;" class="frame" src="'.$this->config->site_url().'uploads/avatars/small/'.$item->avatar.'">';
}

echo '</div>';
echo '<a href="'.$this->config->site_url().'id'.$item->user_id.'/news?vies=0">Фото</a>'.'  '.'<a href="'.$this->config->site_url().'id'.$item->user_id.'/news?vies=1">Видео</a>';

if (isset($_GET['vies'])) {
  $vies = $_GET['vies'];
}else{$vies = '';}

if($vies==0){
  foreach ($news_photos_data as $item) { //в переменные заносим все нужные данные для вложенного форича
    $url_photo = $item->url_photo;
    $name_photo = $item->photos_name;
    $photos_date = $item->photos_date;
    $id_photos = $item->id_photos;
    $id_user = $item->id_user;
    $i=0;        
                   // что бы вложенный форич не выкладывал несколько раз одну и ту же фотку
    foreach ($subscribe_users_data as $item) {
      if($i==0){
          if($item->second_user == $id_user){
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

}

if($vies==1){
 foreach ($video_data as $item) {
    $kod=$item->kod;
    $thumbUrl = "http://img.youtube.com/vi/".$kod."/0.jpg";
    $video_date = $item->video_date;
    $video_name = $item->video_name;
    $id_user = $item->id_user;
    $i=0;        
                   // что бы вложенный форич не выкладывал несколько раз одну и ту же фотку
    foreach ($subscribe_users_data as $item) {
      if($i==0){
          if($item->second_user == $id_user){
            if($video_date >= $item->subscribe_date ){ // если дата добавления фотки больше даты создания подписи эхаем все говно
                if($item->name == ''){
                $name = $item->login;
                }else{
                  $name = $item->name.' '.$item->famil;
                }
               echo '<div class="block">';
              echo htmlspecialchars($name, ENT_QUOTES).'  <div style="margin-top:-18px" class="date_msg">'.date("d.m.y H:i:s" ,htmlspecialchars($video_date, ENT_QUOTES)).'</div>';
              echo '<div><iframe width="100%" height="400" src="//www.youtube.com/embed/'.$kod.'" frameborder="0" allowfullscreen></iframe>
              <div>'.$text = htmlspecialchars($video_name, ENT_QUOTES).'</div></div><br>';
                $i++;
            }
          }
        
      }
      
    }

}
}


 ?>




 <!-- </form> -->
</div>
<!-- foreach ($subscribe_users_data as $item) {
  echo '<a href="'.$this->config->site_url().'id'.$item->user_id.'/news?id_news='.$item->second_user.'"><img style="width:50px;height:50px;" class="frame" src="'.$this->config->site_url().'uploads/avatars/small/'.$item->avatar.'"></a>';
}

echo '</div>';
//var_dump($news_photos_data);
//var_dump($video_data);
//$id_news ='';
if (isset($_GET['id_news'])) {

  $id_news = $_GET['id_news'];
}else{$id_news = '';} -->








