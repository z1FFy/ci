<html>
<head>
<title>Форма Чата</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">

<script>
$(document).ready(function() {
 


$('.btn').click(function() { 

chat_name= $("textarea[name='chat_name']").val();
alert(chat_name);
	$.post("ci/id/chat/send_messages",
     { chat_name : chat_name
          },
     onAjaxSuccess
   );

}
}

</script>

</head>
<body>

<!-- <form action="<?php echo $this->config->site_url() ?>id/chat/send_messages" method="post" accept-charset="utf-8"> -->

<textarea name="chat_name" size="20"></textarea>

<br /><br />

<input type="submit" class="btn" value="Отправить" />

<!-- </form>
 -->
</body>
</html>