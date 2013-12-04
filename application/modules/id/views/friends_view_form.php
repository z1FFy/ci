<meta http-equiv="content-type" content="text/html; charset=utf-8">

<?php
		if(!$friends_data_friend){
			echo 'Вы не с кем не переписывались!';
		}
		foreach ($friends_data_friend as $item){ 
			if($item->name == '' || $item->famil == ''){
				$name = $item->login;
			}else{
				$name = $item->name.' '.$item->famil;
			}
			// if($item->friend_id == $this->session->userdata('user_id')){
			// 	$friend = $item->user_id;
			// }else{
			// 	$friend = $item->friend_id;
			// }
			//var_dump($item);
			 echo '<img src="'.$this->config->site_url().'uploads/avatars/small/'.$item->avatar.'" width="50"/>
			 '.$name.
			 '<a href="'.$this->config->site_url().'id/friends?friend_id='.$item->user_id.'">Отправить сообщение</a>';

			?> </div><br>  
			<?php

		
		}?>