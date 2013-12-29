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
.block_msg {
background-color: #D7DBDD;
padding: 7px;
border-radius: 7px;
width: 83%;
min-width: 500px;
margin-bottom: -5px;
height: 80px;
}
  </style>
<meta http-equiv="content-type" content="text/html; charset=utf-8">

       <?php

        $this->load->view('left_user',$user_data); ?>
        <div id="polosa"></div>
<div id="right_user">
<p class="titl">Мои сообщения:</p><br>
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
				$last_activity = '<font style="color: red;" >offline</font>';
			}else{
				$last_activity = '<font style="color: rgb(66, 177, 106);" >online</font>';
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
			$kol='<img style="margin-top: -5px;" width="25" src="'.$this->config->site_url().'/images/message.png">'.$i;
		}
		$last_mess='Вам еще не писали!';
		foreach ($mess_data as $item) {
				if($friend == $item->user_id || $friend == $item->adresat){
				$last_mess = $item->messages;
				}
				}

						echo '<div class="block_msg"><a href="'.$this->config->site_url().'id'.$friend.'">
			<img style="width:80px;height:80px;border-radius: 10px 0 0 10px;" class="frame" src="'.$this->config->site_url().'uploads/avatars/small/'.$avatar.'" /></a>			
		  	 <p style="position: absolute;
margin-top: -81px;
margin-left: 90px;">'.$name.'   '.$kol.' '.$last_activity.'</p> <a href="'.$this->config->site_url().'id'.$url_id.'/friends?friend_id='.$friend.'"><p class="friend_text"><br> '.$last_mess.'</p><br></a>
		  <br>';
			//echo '<div style="padding:10px;"><i>'.$msg[$i].'</i></div>';
			?> </div><br>  
			<?php
		}
		//var_dump($mess_data);
		?>
		