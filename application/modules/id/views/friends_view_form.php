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
		if(!$friends_data_friend){
			echo 'Вы не с кем не переписывались!';
		}
				$user_id = $this->session->userdata('user_id');
	
		
		foreach ($friends_data_friend as $item){ 
			if($item->name == '' || $item->famil == ''){
				$name = $item->login;
			}else{
				$name = $item->name.' '.$item->famil;
			}
			$friend = $item->user_id;
			echo '<div class="friend_block"><img src="'.$this->config->site_url().'uploads/avatars/small/'.$item->avatar.'" width="50"/>			
		  	<p class="friend_text"> '.$name.'<a href="'.$this->config->site_url().'id/friends?friend_id='.$item->user_id.'"><br>Написать</a></p><br>';
			//echo '<div style="padding:10px;"><i>'.$msg[$i].'</i></div>';
			?> </div><br>  
			<?php
		}
		?>
		</div>