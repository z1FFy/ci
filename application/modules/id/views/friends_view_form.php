<style>
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

  </style>
<meta http-equiv="content-type" content="text/html; charset=utf-8">

       <?php

        $this->load->view('left_user',$user_data); ?>
        <div id="polosa"></div>
<div id="right_user">
<p class="titl">Мои контакты:</p><br>
<?php
//$i=0;
		if(!$friends_data_friend){
			echo 'Вы не с кем не переписывались!';
		}
				$user_id = $this->session->userdata('user_id');
	
		//var_dump($unread_data);
		foreach ($friends_data_friend as $item){ 
			if($item->name == '' || $item->famil == ''){
				$name = $item->login;
			}else{
				$name = $item->name.' '.$item->famil;
			}
			$avatar = $item->avatar;
			$friend = $item->user_id;

			$user_id = $item->user_id;
			$t = time() - $item->lastactivity;
			if($t > 300){
				$last_activity = '<img width="50px" src="'.$this->config->site_url().'images/offline.png">';
			}else{
				$last_activity = '<img width="50px" src="'.$this->config->site_url().'images/online.png">';
			}
			

			$i=0;
			foreach ($unread_data as $item) {
			if($friend == $item->user_id){
				$i++;
			}
			}
			if ($i<1) {
				$kol=' ';
		}	else {
			$kol='<img width="25" src="'.$this->config->site_url().'/images/message.png">'.$i;
		}
		$last_mess='Вам еще не писали!';
		foreach ($mess_data as $item) {
				if($friend == $item->user_id || $friend == $item->adresat){
				$last_mess = $item->messages;
				}
				}

						echo '<div class="friend_block"><a href="'.$this->config->site_url().'id'.$friend.'">
			<img style="width:80px;height:80px;border-radius: 10px 0 0 10px;" class="frame" src="'.$this->config->site_url().'uploads/avatars/small/'.$avatar.'" /></a>			
		  	<p class="friend_text"> '.$name.'   '.$kol.' '.$last_activity.' <br>Последнее сообщение: '.$last_mess.'<br><a href="'.$this->config->site_url().'id'.$url_id.'/friends?friend_id='.$friend.'">Переписка</a>
		  	<a href="'.$this->config->site_url().'id'.$friend.'"> Посмотреть</a></p><br>';
			//echo '<div style="padding:10px;"><i>'.$msg[$i].'</i></div>';
			?> </div><br>  
			<?php
		}
		//var_dump($mess_data);
		?>
		