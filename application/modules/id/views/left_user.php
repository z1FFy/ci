 
  <?php
  $my_id=$this->session->userdata('user_id');
  foreach ($user_data as $item){ 
      $name=$item->name;
      $famil=$item->famil;
      $user_id=$item->user_id;
      $avatar_url=$item->avatar;
      $spec=$item->spec_user;

    }
    //var_dump($unread);
    
  
    if ($whopage=='my') {
      $whostring='Я';
      $whostring_title="Моя";
      $exit='<a href="'.$this->config->site_url().'site/vyhod">выйти</a>';

    } else {
       $whostring='';
    }
      echo '<div style="" class="block" id="left_user">';
      echo '<br><div style="margin-top: -20px;margin-left:23px" class="frame"><img id="ava" width="200"  src="'.$this->config->site_url().'uploads/avatars/small/'.$avatar_url.'" ></div>';
 $t = time() - $item->lastactivity;
      if($t > 300){
        $last_activity = '';
      }else{
        $last_activity = '<img width="80px" src="'.$this->config->site_url().'images/online.png">';
      }
 echo '<br><p style="text-align:center">'.$whostring.' '.$text = htmlspecialchars($name, ENT_QUOTES).' '.$text = htmlspecialchars($famil, ENT_QUOTES).'</p>'.'<p style="font-size:13px;text-align:center">( '.$spec.' )';
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
    echo '<br>  <a id="upload_ava">Изменить аватар</a>';
    echo '<br><a class="upload_foto">Загрузить работу</a>';
    echo '<br>  <a href="'.$this->config->site_url() .'id'.$url_id.'/news">Лента новостей</a>';
    echo '<br><a href="'.$this->config->site_url() .'id'.$url_id.'/statistic">Статистика</a>';
    echo '<br>'.$exit;
    echo '<p style="font-size:12px;text-align:center"><br><br>Ссылка на портфолио:<br><i><a href="'.$this->config->site_url() .'id'.$url_id.'">'.$this->config->site_url() ."id".$url_id.'</i></a></p>';

    }else{    
   echo "<br><a  href='".$this->config->site_url() ."id".$url_id."'>Мои работы</a>";
      echo "<br><a  href='".$this->config->site_url() ."id".$url_id."/profile'>Обо мне</a>";
      if ($logged == TRUE) {
        echo "<br><a  href='".$this->config->site_url() ."id".$my_id."/friends?friend_id=".$url_id."'>Отправить сообщение</a>";
        echo '<br>  <a id="subscribe" link = '.$url_id.'>Подписаться</a>';

      }
echo '</p>';

}

echo '</div>';

?>
