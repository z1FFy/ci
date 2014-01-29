 
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
      $acc_t='<div id="acc_pro"></div>';
    } else {
      $acc_t='<div id="acc_free"></div>';
    }
  
    if ($whopage=='my') {
      $whostring='Я';
      $whostring_title="Моя";
      $exit='<a href="'.$this->config->site_url().'site/vyhod">выйти</a>';
      if(count($contacts_not_pod) > 0){
      $contacts_podtvr = '<p class="kruglyashok">'.count($contacts_not_pod).'</p>';
    }else{$contacts_podtvr = '';}

    } else {
       $whostring='';
    }
      //echo '<div  class="block"  id="left_user">';

      echo '<div   id="left_user">
      <div id="ava_n_spec">'.$acc_t;
      echo '<br><div style="margin-left:23px" class="frame"><img id="ava" width="200"  src="'.$this->config->site_url().'uploads/avatars/small/'.$avatar_url.'" ></div>';
            if ($whopage=='my') {
          echo ' <input type="button" id="upload_ava" class="upload_ava styler" value="Изменить аватар">';
      }
 $t = time() - $lastactivity;
      if($t > 300){
        $last_activity = '';
      }else{
        $last_activity = '<p class="status" >online</p>';
      }
 echo '<br><div id="name_spec"> <p style="text-align:center">'.$whostring.' '.$text = htmlspecialchars($name, ENT_QUOTES).' '.$text = htmlspecialchars($famil, ENT_QUOTES).'  '.'</p>'.'<p style="font-size:15px;text-align:center">( '.$spec.' )';
     echo '
     '.$last_activity.'</p></div></div>
     ';

echo '<p>';
    if ($whopage == 'my') {
          
    echo "<ul class='left_menu_ul'>
    <a  href='".$this->config->site_url() ."id".$url_id."/profile'><li><img class='pad_rig' src='".$this->config->site_url()."images/user_m.png'>Обо мне</li></a>";
    echo "<a  href='".$this->config->site_url() ."id".$url_id."'><li><img class='pad_rig' src='".$this->config->site_url()."images/rabot_m.png'>Мои работы</li></a>";
       echo '<a  href="'.$this->config->site_url() .'id'.$url_id.'/albom/view_audio"><li><img class="pad_rig" src="'.$this->config->site_url().'images/audio_m.png">Мои аудиозаписи</li></a>';
   echo '<a  href="'.$this->config->site_url() .'id'.$url_id.'/friends/friends_view"><li><img class="pad_rig" src="'.$this->config->site_url().'images/msg_m.png">Мои сообщения';
if(!empty($unread)){
  

      echo '<p class="kruglyashok">'.$unread.'</p>';
    }

 echo '  </li></a>';
       echo '<a  href="'.$this->config->site_url() .'id'.$url_id.'/friends/contacts"><li><img class="pad_rig" src="'.$this->config->site_url().'images/kontakt_m.png">Мои контакты'.$contacts_podtvr.'</li></a>';
        if ($acc=='pro') {
    echo '<a  href="'.$this->config->site_url() .'id'.$url_id.'/statistic"><li><img class="pad_rig" src="'.$this->config->site_url().'images/stat_m.png">Моя статистика</li></a>';
  }
    echo ' <a  href="'.$this->config->site_url() .'id'.$url_id.'/news"><li><img class="pad_rig" src="'.$this->config->site_url().'images/news_m.png">Моя книга новостей</li></a>';
    echo ' <a  href="'.$this->config->site_url() .'id'.$url_id.'/profile_update_form"><li><img class="pad_rig" src="'.$this->config->site_url().'images/set_m.png">Мои настройки</li></a>';
   if ($acc!='pro') {
echo ' <a  href="'.$this->config->site_url() .'id'.$url_id.'/pay"><li><img class="pad_rig" src="'.$this->config->site_url().'images/star.png">Улучшить аккаунт</li></a>';
 }
    echo '<p style="font-size:12px;text-align:center"><br><br>Ссылка на портфолио:<br><i><a href="'.$this->config->site_url() .'id'.$url_id.'">'.$this->config->site_url() ."id".$url_id.'</i></a></li></p>';

    }else{    
          echo "<ul class='left_menu_ul'>
    <a  href='".$this->config->site_url() ."id".$url_id."/profile'><li><img class='pad_rig' src='".$this->config->site_url()."images/user_m.png'>Обо мне</li></a>";  
          echo "<a  href='".$this->config->site_url() ."id".$url_id."'><li><img class='pad_rig' src='".$this->config->site_url()."images/rabot_m.png'>Мои работы</li></a>";
            echo '<a  href="'.$this->config->site_url() .'id'.$url_id.'/albom/view_audio"><li><img class="pad_rig" src="'.$this->config->site_url().'images/audio_m.png">Мои аудиозаписи</li></a>';


      if ($logged == TRUE) {
echo '<a  href="'.$this->config->site_url() .'id'.$my_id.'/friends"><li><img class="pad_rig" src="'.$this->config->site_url().'images/msg_out.png">Отправить сообщение</li></a>';
        //подписка
        if (isset($subscribe_user)) {
        if($subscribe_user == 'subscribe'){
         echo '<a  href="'.$this->config->site_url() .'id'.$url_id.'/friends/dell_subscribe?friend_id='.$url_id.'"><li><img class="pad_rig" src="'.$this->config->site_url().'images/podp_m.png">Отписаться</li></a>';
        }
        if(empty($subscribe_user)){
          echo '<a  href="'.$this->config->site_url() .'id'.$url_id.'/friends/subscribe?friend_id='.$url_id.'"><li><img class="pad_rig" src="'.$this->config->site_url().'images/podp_m.png">Подписаться</li></a>';
        }
        }
        //мои контакты
        if (isset($contacts_user)) {
        if($contacts_user == 'not_send'){
          echo '<a  href="'.$this->config->site_url() .'id'.$url_id.'/friends/contacts_send?contacts_id='.$url_id.'"><li><img class="pad_rig" src="'.$this->config->site_url().'images/to-kon_m.png">Добавить в контакты</li></a>';
        }
        }



      }
echo '</p>';

}
  // if ($acc!='pro') {
  //     echo '<br><hr><br><a class="banner"><img src="'.$this->config->site_url().'uploads/banners/250x400.gif"></a>';
  //   }

echo '</div>';

?>
