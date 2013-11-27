<html>
<head>
	<title>Фото:</title>
<script type="text/javascript" src="<?php echo $this->config->site_url() ?>jquery-1.7.2.js"></script> 
<script>
$(document).ready(function() {
 


$('.btn').click(function() { 
    messages = $("#messages").val();
    id_photos= $("input[name ='id_photos']").val();
    id_user= $("input[name ='id_user']").val();
   //alert(messages);



	$.post("chat/send_messages",
     { messages : messages, id_photos : id_photos,
          },
     onAjaxSuccess
   );
 });

function onAjaxSuccess(data)
   {
     	 
//alert("ololo");
	location.reload();

          };


});

</script>
</head>
<body>
<div class="block3">
<meta charset="utf-8">
	<?php 
	$photo = $_GET['photo'];
	$id_photos = $_GET['id_photos'];
	$id_user = $_GET['id_user'];

	echo '<div width="500px" align="center"><img style="max-width:100%;max-height:100%" src="'.$this->config->site_url().'uploads/photos/'.$photo.'" width="80%"></div>'; 
	?>
<br>
<?php 
//var_dump($this->session);
		foreach ($message_data as $item){ 
			
			 echo '<div class="block1"><img src="'.$this->config->site_url().'/uploads/avatars/'.$item->avatar.'" width="100"></div><div class="block2">'.$item->famil.' '; echo $item->name.' - ';echo $item->messages.' : '; echo $item->message_date;

			?> </div><br>  
			<?php

		
		}?>
<br>

<!-- <form action="<?php echo $this->config->site_url() ?>id/chat/send_messages" method="post" accept-charset="utf-8"> -->

<input type="hidden" name="id_photos" value="<?php echo $id_photos; ?>">
<input type="hidden" name="id_user" value="<?php echo $id_user; ?>">
<textarea name="messages" id="messages" maxlength="200"></textarea>

<br /><br />

<input type="submit" class="btn" value="Отправить" />

<!-- </form> -->
</div>
</body></html>