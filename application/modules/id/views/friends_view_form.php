<meta http-equiv="content-type" content="text/html; charset=utf-8">

<?php 
//var_dump($this->session);
		foreach ($friends_data as $item){ 
			if($item->name == '' || $item->famil == ''){
				$name = $item->login;
			}else{
				$name = $item->name.' '.$item->famil;
			}
			//var_dump($item);
			 echo '<img src="'.$this->config->site_url().'uploads/avatars/small/'.$item->avatar.'" width="50"/>
			 '.$name.
			 '<a href="'.$this->config->site_url().'id/friends?friend_id='.$item->friend_id.'">Отправить сообщение</a>';

			?> </div><br>  
			<?php

		
		}?>