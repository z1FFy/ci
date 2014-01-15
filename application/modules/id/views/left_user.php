 
  <?php
  $my_id=$this->session->userdata('user_id');
  foreach ($user_data as $item){ 
      $name=$item->name;
      $login= $item->login;
      if ($name=='') {
        $name=$login;
      }
      $famil=$item->famil;
      $user_id=$item->user_id;
      $avatar_url=$item->avatar;
      $spec=$item->spec_user;
      $acc1=$item->account;
      $lastactivity = $item->lastactivity;
    }
    $acc='';
    foreach ($acc_data as $item){ 
      $acc=$item->account;
    }
    if ($acc1=='pro') {
      $acc_t='<font style="color:red;font-weight:bold">Pro</font>';
    } else {
      $acc_t='';
    }
  
    if ($whopage=='my') {
      $whostring='Я';
      $whostring_title="Моя";
      $exit='<a href="'.$this->config->site_url().'site/vyhod">выйти</a>';

    } else {
       $whostring='';
    }
      //echo '<div  class="block"  id="left_user">';

      echo '<div style="background-color:rgba(219, 219, 219, 0.72)" class="block"  id="left_user">';
      echo '<br><div style="margin-top: -20px;margin-left:23px" class="frame"><img id="ava" width="200"  src="'.$this->config->site_url().'uploads/avatars/small/'.$avatar_url.'" ></div>';
            if ($whopage=='my') {
          echo ' <input type="button" id="upload_ava" class="styler" style="margin-left:57px;" value="Изменить аватар">';
      }
 $t = time() - $lastactivity;
      if($t > 300){
        $last_activity = '';
      }else{
        $last_activity = '<p class="status" >online</p>';
      }
 echo '<br><p style="text-align:center">'.$whostring.' '.$text = htmlspecialchars($name, ENT_QUOTES).' '.$text = htmlspecialchars($famil, ENT_QUOTES).'  '.$acc_t.'</p>'.'<p style="font-size:13px;text-align:center">( '.$spec.' )';
     echo '<br>'.$last_activity.'</p>';

echo '<p style="padding-left:45px">';
    if ($whopage == 'my') {
          if(!empty($unread)){
            if ($unread==1) {
              $m_text='Новое сообщение';
            } else {
              $m_text='Новых сообщений';
            }

      echo '<a style="color:#757534" href="'.$this->config->site_url() .'id'.$url_id.'/friends/friends_view">'.$unread.' '.$m_text.'<img width="25" src="'.$this->config->site_url().'/images/message.png"></a><br>';
    }
    echo "<br><a  href='".$this->config->site_url() ."id".$url_id."/profile'>Обо мне</a>";
    echo "<br><a  href='".$this->config->site_url() ."id".$url_id."'>Мои работы</a>";
   echo '<br><a href="'.$this->config->site_url() .'id'.$url_id.'/friends/friends_view">Мои сообщения</a>';
   echo '<br><a href="'.$this->config->site_url() .'id'.$url_id.'/albom/view_audio">Мои аудиозаписи</a>';
    // echo '<br><a class="upload_foto">Загрузить работу</a>';
    echo '<br>  <a href="'.$this->config->site_url() .'id'.$url_id.'/news">Лента новостей</a>';
    if ($acc=='pro') {
    echo '<br><a href="'.$this->config->site_url() .'id'.$url_id.'/statistic">Статистика</a>';
  }
   // echo '<br>'.$exit;
    echo '<p style="font-size:12px;text-align:center"><br><br>Ссылка на портфолио:<br><i><a href="'.$this->config->site_url() .'id'.$url_id.'">'.$this->config->site_url() ."id".$url_id.'</i></a></p>';

    }else{    
   echo "<br><a  href='".$this->config->site_url() ."id".$url_id."'>Мои работы</a>";
      echo "<br><a  href='".$this->config->site_url() ."id".$url_id."/profile'>Обо мне</a>";
      if ($logged == TRUE) {
        echo "<br><a  href='".$this->config->site_url() ."id".$my_id."/friends".$url_id."'>Отправить сообщение</a>";
        
        if (isset($subscribe_user)) {
        if($subscribe_user == 'subscribe'){
         echo "<br><a  href='".$this->config->site_url() ."id".$url_id."/friends/dell_subscribe?friend_id=".$url_id."'>Отписаться</a>";
        }
        if(empty($subscribe_user)){
          echo "<br><a  href='".$this->config->site_url() ."id".$url_id."/friends/subscribe?friend_id=".$url_id."'>Подписаться</a>";
        }
        }
      }
echo '</p>';

}
  if ($acc!='pro') {
      echo '<br><hr><br><a class="banner"><img src="'.$this->config->site_url().'uploads/banners/250x400.gif"></a>';
    }

echo '</div>';

?>
