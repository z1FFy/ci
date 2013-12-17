 
  <?php
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
      echo '<div id="left_user">';
      echo '<br><div style="margin-top: -20px;margin-left:23px" class="frame"><img id="ava" width="200"  src="'.$this->config->site_url().'uploads/avatars/small/'.$avatar_url.'" ></div>';
 echo '<p style="text-align:center">'.$whostring.' '.$text = htmlspecialchars($name, ENT_QUOTES).' '.$text = htmlspecialchars($famil, ENT_QUOTES).'</p>'.'<p style="font-size:13px;text-align:center">( '.$spec.' )</p>';
     

echo '<p style="padding-left:45px">';
    if ($whopage == 'my') {
    echo "<br><a  href='".$this->config->site_url() ."id".$url_id."/profile'>Обо мне</a>";
    echo "<br><a  href='".$this->config->site_url() ."id".$url_id."'>Мои работы</a>";
    echo '<br><a href="'.$this->config->site_url() ."id".$url_id.'/friends_view">Мои контакты</a>';
    if(!empty($unread)){
      echo ' '.$unread;
    }
    echo '<br>  <a id="upload_ava">Изменить аватар</a>';
    echo '<br><a class="upload_foto">Загрузить работу</a>';
    echo '<br>'.$exit;
    echo '<p style="font-size:12px;text-align:center"><br><br>Ссылка на портфолио:<br><i><a href="'.$this->config->site_url() .'id'.$url_id.'">'.$this->config->site_url() ."id".$url_id.'</i></a></p>';
    }else{    
   echo "<br><a  href='".$this->config->site_url() ."id".$url_id."'>Мои работы</a>";
      echo "<br><a  href='".$this->config->site_url() ."id".$url_id."/profile'>Обо мне</a>";
      if ($logged == TRUE) {
        echo "<br><a  href='".$this->config->site_url() ."id".$url_id."/friends?friend_id=".$url_id."'>Отправить сообщение</a>";
      }
echo '</p>';

}

echo '</div>';
?>