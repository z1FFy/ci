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
  .block_msg {
  background-color: #D7DBDD;
  padding: 7px;
  border-radius: 7px;
  width: 83%;
  min-width: 500px;
  margin-bottom: -5px;
}
  </style>
<meta http-equiv="content-type" content="text/html; charset=utf-8">

<script>
$(document).ready(function() {
 


$('.btn').click(function() { 
//alert('zazaazaz');
messages= $("textarea[name='messages']").val();
friend_id= $("input[name='friend_id']").val();
site_url= $("input[name='site_url']").val();
//alert(chat_name);
	$.post(site_url+"id/friends/send_friends_messages",
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
  $this->load->view('left_user',$user_data); 
          ?><div id="polosa"></div>
<div id="right_user">
<?php
  foreach ($messages_data as $item){ 
 $name_f='';
 // if ($item->user_id==$url_id) {
 //        //$name_f=$item->adresat;
 //      }else {
 //        $name_f=$name;
 //      }
      if($item->name == ''){
        $name = $item->login;
      }else{
        $name = $item->name.' '.$item->famil;
      }
    
  }
echo '<p class="titl">Переписка  </p><br>';

  $friend_id = preg_replace("/[^0-9]/", '', $this->uri->segment(2));
  date_default_timezone_set('Europe/Moscow');
		foreach ($messages_data as $item){ 
			if($item->name == ''){
				$name = $item->login;
			}else{
				$name = $item->name.' '.$item->famil;
			}
			//var_dump($item);
    
  echo '<div class="block_msg"><img src="'.$this->config->site_url().'uploads/avatars/small/'.$item->avatar.'" width="50"/>'
      .htmlspecialchars($name, ENT_QUOTES);
      echo '<div class="date_msg">Дата/Время: ';
      echo date("d.m.y H:i:s" ,$item->message_date);
      echo '</div>';
      echo '<div class="text_msg">'.htmlspecialchars($item->messages, ENT_QUOTES).'</div>';
      //$friend_id = $item->adresat;
      ?></div> <br>  
      <?php

		
		}echo $this->pagination->create_links();?>
<br>


<!-- <form action="<?php echo $this->config->site_url() ?>id/chat/send_messages" method="post" accept-charset="utf-8"> -->
<input  type="hidden" name="friend_id" value="<?php echo $friend_id ?>" />
<input  type="hidden" name="site_url" value="<?php echo $this->config->site_url() ?>" />
<textarea class="styler" placeholder="Сообщение" name="messages" size="20"></textarea>

<br /><br />


<input  type="submit" class="btn styler"  value="Отправить" />
</div>
