
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
 
$('.like_photos').click(function() { 
        like_photos = $(this).attr("link");
         //$(this).toggleClass("highlight");
         $(".like_photos1").removeClass("like_photos");
      $.post(site_full+"/id/like_photos",
         { like_photos : like_photos
              },
         onAjaxSuccess
         );
      });

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
  $('.like_photos1').addClass('.like_photos');   	 
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

	<?php 
  $id=$_GET['id'];
    $count=count($photos_data);
    if ($id>$count) {
    $id=1;
  
  }

  $i=0;
  $id=$id-1;
        $url_id = $this->uri->segment(1);
    $url_id = trim($url_id, " \id.");
  	foreach ($photos_data  as $key => $item){
  $i++;
  if ($key == $id){
    
	$photos_name=$item->photos_name;

$photo =$item->url_photo;
  $id_photos = $_GET['id_photos'];
  $id_user = $_GET['id_user'];
  $img_path = $this->config->site_url().'uploads/photos/'.$photo;
  $arr = GetImageSize($img_path);
  $width=$arr[0]; // ширина
  $height=$arr[1]; // высота
  $i=$i+1;
echo '<p style="text-align:center">'.$photos_name.'<br><a  href="'.$this->config->site_url().'id'.$url_id.'/albom/view_photo?photo='.$item->url_photo.'&id_photos='.$item->id_photos.'&id_user='.$item->id_user.'&id='.$i.'">next</a></p>';

   echo '<div  width="500px" align="center"><img r_width="'.$width.'"r_height="'.$height.'" id="photo" style="" src="'.$img_path.'" width="80%"></div>'; 

 echo '<p style="text-align:center"><a class="batn" href="'.$img_path.'">на полный экран</a>';

}
	}
	
  if ($whopage=='my') {
    if ($logged==TRUE) {
        		echo '  <a class="delete_photos batn" link='.$item->id_photos.'>Удалить</a>';
    }
}
if ($logged == TRUE) {
echo ' <a class="like_photos like_photos1 batn" link='.$item->id_photos.'>LIKE</a>  '.$item->like_photos.'';

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


<input type="hidden" name="id_photos" value="<?php echo $id_photos; ?>">
<input type="hidden" name="id_user" value="<?php echo $id_user; ?>">
<textarea name="messages" id="messages" maxlength="200"></textarea>

<br /><br />

<input type="submit" class="send_com" value="Отправить" />
<?php }
echo "</p>";
 ?>

