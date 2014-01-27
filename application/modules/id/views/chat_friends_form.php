
<script language ="JavaScript"> 
  $(document).ready(function() {

$(window).on("scroll", scrolling);

function scrolling(){
//считывание текущей высоты контейнера
//alert($(window).scrollTop());
var currentHeight = $(window).height();
//проверка достежения конца прокрутки
if($(window).scrollTop() >= $("#wrapper").height()-currentHeight){
/*отключение вызова функции прокрутки
во избежание неоднократного вызова функции */
$(this).unbind("scroll");
//функция реализующая следующие два этапа

loader();
}}

//количество подгружаемых записей из бд
var count = 10;
//начиная с
var begin = 1;

function loader(){   
friend_id = $("input[name='friend_id']").val();      
// «теневой» запрос к серверу
$.ajax({

type:"POST",

url:site_full+"/id/friends/friends_scroll",

data:{
//передаем параметры
count: count,
begin: begin*count,
friend_id: friend_id
},
success:onAjaxSuccess
});
 
function onAjaxSuccess(data){
//добавляем полученные данные
//в конец контейнера
$("#right_user").append(data);
//$('#res').html(data);
//возвращение вызова функции при прокрутке
$(window).on("scroll", scrolling);
}
//увеличение тоски отсчета записей
begin++;
} 

});


 
</script> 


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
          ?>
<div id="right_user">
<?php
$friend_id = preg_replace("/[^0-9]/", '', $this->uri->segment(2));
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
?><input  type="hidden" name="friend_id" value="<?php echo $friend_id ?>" />
<input  type="hidden" name="site_url" value="<?php echo $this->config->site_url() ?>" />
<textarea  style="width: 82%; height:100px;" class="styler" placeholder="Сообщение" name="messages" maxlength="140"></textarea>

<br />


<input  type="submit" class="btn styler"  value="Отправить" /><?php
  
  date_default_timezone_set('Europe/Moscow');
    $user_id=$this->session->userdata('user_id');
    foreach ($messages_data as $item){ 
			if($item->name == ''){
				$name = $item->login;
			}else{
				$name = $item->name.' '.$item->famil;
			}
      if ($item->adresat==$user_id) {
        $style_bl= "background-color:#B4D1E2";
      } else {
         $style_bl= "bbackground-color: #D7DBDD;";
      }
			//var_dump($item);
  echo '<div style="'.$style_bl.'" class="block_msg"><img src="'.$this->config->site_url().'uploads/avatars/small/'.$item->avatar.'" width="50"/><a href="'.$this->config->site_url().'id'.$item->user_id.'">'
      .htmlspecialchars($name, ENT_QUOTES).'</a>';
      echo '<div class="date_msg">Дата/Время: ';
      echo date("d.m.y H:i:s" ,$item->message_date);
      echo '<br><a class="delete_message" link="'.$item->id_chat_friends.'">Удалить сообщение</a>';
      echo '</div>';
      echo '<div class="text_msg">'.htmlspecialchars($item->messages, ENT_QUOTES).'</div>';
      //$friend_id = $item->adresat;
      ?></div> <br>  
      <?php

		
		}?>



<!-- <form action="<?php echo $this->config->site_url() ?>id/chat/send_messages" method="post" accept-charset="utf-8"> -->

</div>