<style>

    #middle-pol {
    padding-top: 0px;
    width: 100%;
    height: 0px;
    visibility: hidden;

  }
  #content {
 padding-left: 0px;
padding-right: 0px;
width: 100%;
display: table;
  }
  #menu {
    height: 39px;
  }
body {
	background-color: #fff;
}
#polosa {
  background-color: #fff;
}
#left_user{
position: absolute;

top: 183px;
background-color: #EDF7FD;
box-shadow: 0 0 3px rgba(0,0,0,5);

}
#right_user {
  padding-top: 10px;
height: 100%;
min-height: 600px;
margin-bottom: 40px;
}
.frame_com {
  height: 50px;
  width: 50px;
}
</style>
<script>
  $(document).ready(function() {
     $('#left_user').hide();

  });
  window.onload = function() {
        var photo = $("#photo");
      photo_w=parseInt(photo.width());
      r_photo_w=$('#photo').attr('r_width');
      photo_h=parseInt(photo.height());
      // p_ph_h=-photo_h/100*50;
      // $('#ph_prev,#ph_next').css({'top': p_ph_h});
      r_photo_h=$('#photo').attr('r_height');
      if (photo_w>r_photo_w) {
        $('#photo').attr('width', r_photo_w);
      }
  }
</script>
<?php
foreach ($user_data as $item){ 
      $name=$item->name;
      $famil=$item->famil;
    }
      ?>
<div id="showmenu"><?php echo $text = htmlspecialchars($name, ENT_QUOTES).' '.$text = htmlspecialchars($famil, ENT_QUOTES); ?></div>
	<?php 
       $this->load->view('left_user',$user_data); 
  $id=$_GET['id'];

    $user_id=$this->session->userdata('user_id');
    $count=count($photos_data);
      if ($id!=0){
      $id=$id-1;
    }
$count=$count-1;

        $idn=$id+1;
      if ($id==$count) {
    $id=$count;
    $idn=0;
  }

    $idp=$id-1; 

         if ($idp<0) {
      $idp=$count;
    }
        if ($idn>$count) {
      $idn=1;
    }
  $i=0;

        $url_id = $this->uri->segment(1);
    $url_id = trim($url_id, " \id.");


  	foreach ($photos_data  as $key => $item){
        $i++;
    if ($key == $idn) {
  $photo_n =$item->url_photo;
  $img_path_n = $this->config->site_url().'uploads/photos/'.$photo_n;
  $idnext=$idn+1;
  $id_photos_n = $item->id_photos;
  }

  if ($key == $idp) {
  $idprev=$idp+1;
  $photo_p =$item->url_photo;
  $img_path_p = $this->config->site_url().'uploads/photos/'.$photo_p;
  $id_photos_p = $item->id_photos;
  }

  if ($key == $id){
	$photos_name=$item->photos_name;
$id_photos = $item->id_photos;
$photo =$item->url_photo;
  $img_path = $this->config->site_url().'uploads/photos/'.$photo;
  $arr = GetImageSize($img_path);
  $width=$arr[0]; // ширина
  $height=$arr[1]; // высота
  //  $proc=$width/100*55;
  // $proc=$width-$proc;
  // echo $proc;
  //  if ($width<700) {

  // $p_h=-$height/100*50; }
  $i=$i+1;
}

	}
  echo '<div id="polosa"><br></div>';
echo '<div align="center" id="right_user">
<div style="position: relative;margin-bottom: -45px;"><a  href="'.$this->config->site_url().'id'.$url_id.'/albom/view_photo?id='.$idprev.'&id_orig='.$id_photos_p.'"><img src="'.$this->config->site_url().'images/prev.png"></a>
<a style="margin-left: 435px" href="'.$this->config->site_url().'id'.$url_id.'/albom/view_photo?id='.$idnext.'&id_orig='.$id_photos_n.'"><img src="'.$this->config->site_url().'images/next.png"></a>
</div><p style="text-align:center;padding: 10px">'.$text = htmlspecialchars($photos_name, ENT_QUOTES).' </p>
'; 
 

//<img class="pn_photo" src="'.$img_path_p.'" width="150px"  height="150px">
   echo '<div id="ph_main" ><a class="ph_main"   href="'.$this->config->site_url().'id'.$url_id.'/albom/view_photo?id='.$idnext.'&id_orig='.$id_photos_n.'"><img  id="photo"  r_width="'.$width.'"r_height="'.$height.'"  style="" src="'.$img_path.'" width="55%"></div></a>'; 
//<img class="pn_photo" src="'.$img_path_n.'" width="150px" height="150px">
 echo '<p style="margin-top:10px;text-align:center;padding:10px"><a class="batn" href="'.$img_path.'">на полный экран</a>';


	

if ($logged == TRUE) {
echo ' <a class="like_photos like_photos1 batn" link='.$item->id_photos.'>LIKE</a>  '.$item->like_photos.'';
}  if ($whopage=='my') {
    if ($logged==TRUE) {
          //  echo '  <a class="delete_photos batn" link='.$item->id_photos.'>Удалить</a>';
              echo '  <a class="red_photo batn" link='.$item->id_photos.'>Редактировать</a>';

    }
}
?>
<div style="display:inline-block">
<?php
$i=0; foreach ($photos_data as $item){ 
    $photos_name=$item->photos_name;
$i++;
$sel='';
if ($i==$id+1) {
  $sel='background-color:#386E8F;';
}
      echo '<div style="height: 100px;'.$sel.'" class="block_photo"><a  class="phota"  href="'.$this->config->site_url().'id'.$url_id.'/albom/view_photo?id='.$i.'&id_orig='.$item->id_photos.'">
<div class="photo" style="height: 100px;width:100px;background-image:url('.$this->config->site_url().'uploads/photos/'.$item->url_photo.');"></div></a></div>';
// if ($i == 4) {
//  echo "<br>";
// }

    } 
?>
</div>
<br>
<div align="center">
<a id="show_com" class="batn" style="display: block;width: 300px;">Комментарии(показать)</a></div>
<div id="comments" style="display:none">
<?php 
date_default_timezone_set('Europe/Moscow');
		foreach ($message_data as $item){ 

      if($item->name == ''){
        $name = $item->login;
      }else{
        $name = $item->name.' '.$item->famil;
      }
			 echo '<div><div style="display:inline" class="block1"><img src="'.$this->config->site_url().'/uploads/avatars/'.$item->avatar.'" class="frame_com" width="100"></div><div style="display:inline" class="block2">'
       .$text = htmlspecialchars($name, ENT_QUOTES).' - ';
       echo $text = htmlspecialchars($item->messages, ENT_QUOTES).' : '; echo date("d.m.y H:i:s" ,$item->message_date).'</div>';

			?> </div> 
			<?php
}
		
		?>
<br>


<input type="hidden" name="id_photos" value="<?php echo $id_photos; ?>">
<input type="hidden" name="id_user" value="<?php echo $user_id; ?>">
<textarea name="messages" id="messages" maxlength="200"></textarea>

<br /><br />

<input type="submit" class="send_com" value="Отправить" />
<?php 
echo "</p></div></div>";
 ?>

