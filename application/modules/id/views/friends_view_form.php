<meta http-equiv="content-type" content="text/html; charset=utf-8">

<?php
		if(!$friends_data_friend){
			echo 'Вы не с кем не переписывались!';
		}
				$user_id = $this->session->userdata('user_id');
				$kol=0;
				$i=0;
		foreach ($last_msg as $key => $item2) {
					$kol++;
					$msg[$kol]= $item2->messages;			
				}
		
		foreach ($friends_data_friend as $item){ 
			if($item->name == '' || $item->famil == ''){
				$name = $item->login;
			}else{
				$name = $item->name.' '.$item->famil;
			}
			$i++;
			
				$friend = $item->user_id;
			 echo '<div style="background-color:#EDF7FD;box-shadow: 0 0 1px rgba(0,0,0,0.5);"><img src="'.$this->config->site_url().'uploads/avatars/small/'.$item->avatar.'" width="50"/>
			
		  <p style="margin-left: 60px;margin-top: -40px;position: absolute;"> '.$name.'<a href="'.$this->config->site_url().'id/friends?friend_id='.$item->user_id.'"><br>Написать</a></p><br>';
			echo '<div style="padding:10px;"><i>'.$msg[$i].'</i></div>';
			echo '</div>';




			?> </div><br>  
			<?php


		}

		?>