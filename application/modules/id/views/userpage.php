<style>
  body {
    background-color: #fff;
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
  }
  #menu {
    height: 39px;
  }

</style>

<?php
$whostring_title='';
foreach ($user_data as $item){ 
			$name=$item->name;
      $famil=$item->famil;
			$user_id=$item->user_id;
			$avatar_url=$item->avatar;
      $spec=$item->spec_user;
		}
		if ($whopage=='my') {
      $whostring='Я';
      $whostring_title="Моя";
      $exit='<a href="'.$this->config->site_url().'site/vyhod">выйти</a>';

    } else {
  	   $whostring='';
    }
      echo '<div id="left_user">';
      echo '<p style="text-align:center">'.$whostring.' '.$name.' '.$famil.'</p>'.'<p style="font-size:13px;text-align:center">( '.$spec.' )</p>';
      echo '<br><div style="margin-left:23px" class="frame"><img id="ava" width="200"  src="'.$this->config->site_url().'uploads/avatars/small/'.$avatar_url.'" ></div>';


echo '<p style="padding-left:30px">';
    if ($whopage == 'my') {
    echo '<br>  <a id="upload_ava">Изменить аватар</a><br>';
    echo "<br><a  href='".$this->config->site_url() ."id".$url_id."/profile'>Обо мне</a>";
    echo "<br><a id='friends_view' link='".$url_id."'>Мои сообщения</a>";
    echo '<br><a class="upload_foto">Загрузить работу</a>';
    echo '<br>'.$exit;
    }else{    echo "<br><a  href='".$this->config->site_url() ."id".$url_id."/profile'>Обо мне</a>";
      if ($logged == TRUE) {
        echo "<br><a  href='".$this->config->site_url() ."id".$url_id."/friends?friend_id=".$url_id."'>Отправить сообщение</a>";
      }
echo '</p>';

}

echo '</div>';
   $this->load->view('albom_index',$user_data); 
?>
<!-- Профиль! -->
 
