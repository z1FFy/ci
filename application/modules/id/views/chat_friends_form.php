<style>
    #middle-pol {
    padding-top: 0px;
    width: 100%;
    height: 0px;
    visibility: hidden;

  }
  #content {
    padding-left: 20%;
    padding-right: 20%;

  }
  #menu {
    height: 39px;
  }
  </style>
<meta http-equiv="content-type" content="text/html; charset=utf-8">

<script>
$(document).ready(function() {
 


$('.btn').click(function() { 

messages= $("textarea[name='messages']").val();
friend_id= $("input[name='friend_id']").val();
//alert(chat_name);
	$.post("friends/send_friends_messages",
     { messages : messages, friend_id : friend_id
          },
     onAjaxSuccess
   );

});

function onAjaxSuccess(data)
      {
    location.reload();
    //alert("Like добавлен!");
      };

});

</script>



<?php 
//var_dump($this->session);
$friend_id = $_GET['friend_id'];
date_default_timezone_set('Europe/Moscow');
		foreach ($messages_data as $item){ 
			if($item->name == ''){
				$name = $item->login;
			}else{
				$name = $item->name.' '.$item->famil;
			}
			//var_dump($item);
  echo '<div style="background-color:#EDF7FD;box-shadow: 0 0 1px rgba(0,0,0,0.5);"><img src="'.$this->config->site_url().'uploads/avatars/small/'.$item->avatar.'" width="50"/>'
      .$name.' - '.$text = htmlspecialchars($item->messages, ENT_QUOTES).' '.date("d.m.y H:i:s" ,$item->message_date);
      //$friend_id = $item->adresat;
      ?></div> <br>  
      <?php

		
		}?>
<br>


<!-- <form action="<?php echo $this->config->site_url() ?>id/chat/send_messages" method="post" accept-charset="utf-8"> -->
<input type="hidden" name="friend_id" value="<?php echo $friend_id ?>" />
<textarea name="messages" size="20"></textarea>

<br /><br />


<input type="submit" class="btn" value="Отправить" />
