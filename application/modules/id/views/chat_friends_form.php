<html>
<head>
<title>Форма Чата</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<script type="text/javascript" src="<?php echo $this->config->site_url() ?>jquery-1.7.2.js"></script>

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

</head>
<body>


<?php 
//var_dump($this->session);
$friend_id = $_GET['friend_id'];
		foreach ($messages_data as $item){ 
			if($item->name == ''){
				$name = $item->login;
			}else{
				$name = $item->name.' '.$item->famil;
			}
			//var_dump($item);
			echo '<img src="'.$this->config->site_url().'uploads/avatars/small/'.$item->avatar.'" width="50"/>'
			.$name.' - '.$item->messages.' '.$item->message_date;
			//$friend_id = $item->adresat;
			?> <br>  
			<?php

		
		}?>
<br>


<!-- <form action="<?php echo $this->config->site_url() ?>id/chat/send_messages" method="post" accept-charset="utf-8"> -->
<input type="hidden" name="friend_id" value="<?php echo $friend_id ?>" />
<textarea name="messages" size="20"></textarea>

<br /><br />


<input type="submit" class="btn" value="Отправить" />

<!-- </form>
 -->
</body>
</html>