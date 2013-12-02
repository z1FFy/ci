
<script type="text/javascript" src="<?php echo $this->config->site_url() ?>jquery-1.7.2.js"></script> 
  <script type="text/javascript" src="<?php echo $this->config->site_url() ?>core.js"></script>
<!--   <link rel="stylesheet" href="<?php echo $this->config->site_url() ?>default.css" type="text/css" /> -->

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
    width: 80%;
    padding-top: 10px;

  }
  #menu {
    height: 39px;
  }
body {
	background-color: #fff;
}
	.frame{
    display:inline-block;
    position:relative;
    overflow:hidden;
    width: 60px;
    height: 60px;
}
.frame>img{
    vertical-align:top;
}
.frame, .frame:before{
    -moz-border-radius:100em;
    border-radius:100em;
    
}
.frame>img{
    -webkit-border-radius:100em;   
}
.frame:before{
    content:'';
    display:block;
    position:absolute;
    left:0;
    right:0;
    width:100%;
    height:100%;
    margin:-10em;
    border:10em solid #333;
}
</style>
<script>
$(document).ready(function() {
 


$('.send_com').click(function() { 
    messages = $("#messages").val();
    id_photos= $("input[name ='id_photos']").val();
    id_user= $("input[name ='id_user']").val();
   //alert(messages);



	$.post(site_full+"/id/chat/send_messages",
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


    $(window).load(function() {
      var photo = $("#photo");
      photo_w=parseInt(photo.width());
      r_photo_w=$('#photo').attr('r_width');
      photo_h=parseInt(photo.height());
      r_photo_h=$('#photo').attr('r_height');
      if (photo_w>r_photo_w) {
        $('#photo').attr('width', r_photo_w);
    }
      // } else {
      //   $('#ava').attr('height', '200');
      // }
 });


</script>
</head>

	<?php 
	foreach ($photos_data as $item){ 
	$photos_name=$item->photos_name;
	}
	$photo = $_GET['photo'];
	$id_photos = $_GET['id_photos'];
	$id_user = $_GET['id_user'];
	$img_path = $this->config->site_url().'uploads/photos/'.$photo;
	$arr = GetImageSize($img_path);
	$width=$arr[0]; // ширина
	$height=$arr[1]; // высота
	echo $photos_name;
	echo '<div  width="500px" align="center"><img r_width="'.$width.'"r_height="'.$height.'" id="photo" style="" src="'.$img_path.'" width="80%"></div>'; 
					echo '<br><a class="like_photos" link='.$item->id_photos.'>LIKE</a>  '.$item->like_photos.'';
  if ($whopage=='my') {
    if ($logged==TRUE) {
  		echo '  <a class="delete_photos" link='.$item->id_photos.'>Удалить</a>';
    }
}
	?>

<br>
<?php 
//var_dump($this->session);
		foreach ($message_data as $item){ 

      if($item->name == ''){
        $name = $item->login;
      }else{
        $name = $item->name.' '.$item->famil;
      }
			 echo '<div class="block1"><img src="'.$this->config->site_url().'/uploads/avatars/'.$item->avatar.'" class="frame" width="100"><br></div><div class="block2">'.$name.' - ';echo $item->messages.' : '; echo $item->message_date;

			?> </div><br>  
			<?php

		
		}?>
<br>

<!-- <form action="<?php echo $this->config->site_url() ?>id/chat/send_messages" method="post" accept-charset="utf-8"> -->

<input type="hidden" name="id_photos" value="<?php echo $id_photos; ?>">
<input type="hidden" name="id_user" value="<?php echo $id_user; ?>">
<textarea name="messages" id="messages" maxlength="200"></textarea>

<br /><br />

<input type="submit" class="send_com" value="Отправить" />

<!-- </form> -->
