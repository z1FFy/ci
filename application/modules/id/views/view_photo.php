<style>

.frame_com {
  height: 50px;
  width: 50px;
}
.block_n {
  background-color: #D7DBDD;
  padding: 7px;
  border-radius: 7px;
}
.block_photo {
  width: auto;
  max-width: 200px;
}
</style>
<script>
  $(document).ready(function() {

</script>
<?php
foreach ($user_data as $item){ 
      $name=$item->name;
      $famil=$item->famil;
    }

    $id=$this->uri->segment(4);
       $id_orig=preg_replace("/[^0-9]/", '', $this->uri->segment(3));

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

  $min=$item->min;
  $mwidth='90%';
  if ($min == 'min') {
    $mwidth=$width;
  }
  $i=$i+1;
}

	}
  // echo '<div id="polosa"><br></div>';

//<a  href="'.$this->config->site_url().'id'.$url_id.'/albom/view_photo?id='.$idprev.'&id_orig='.$id_photos_p.'"><img src="'.$this->config->site_url().'images/prev.png"></a>
//<a style="margin-left: 435px" href="'.$this->config->site_url().'id'.$url_id.'/albom/view_photo?id='.$idnext.'&id_orig='.$id_photos_n.'"><img src="'.$this->config->site_url().'images/next.png"></a>
 $this->load->view('left_user',$user_data); 
echo '<div align="center" id="right_user">
<div >
';

//<img class="pn_photo" src="'.$img_path_p.'" width="150px"  height="150px">
   echo '<div id="ph_main" ><a class="ph_main"   href="'.$this->config->site_url().'id'.$url_id.'/albom/view_photo'.$id_photos_n.'/'.$idnext.'"><img  id="photo"  r_width="'.$width.'"r_height="'.$height.'"  style="max-width:'.$mwidth.'px" width="90%" src="'.$img_path.'" ></div></a>'; 
//<img class="pn_photo" src="'.$img_path_n.'" width="150px" height="150px">
echo '<div class="block" style="background-color: rgba(219, 219, 219, 0.72);
border-radius: 0px;
width: 88%;
text-align: center;
padding: 10px;
margin-bottom: 0px;">';
  if ( ($photos_name!=' ') && (!empty($photos_name))) {
    $mar='margin-top: -40px;';
echo '<small>Название:</small><br> '.$photos_name.'
';  
} else {
  $mar='margin-bottom: -40px;';
}
 echo '<div style="font-size: 10px;color: rgb(124, 124, 124);text-shadow: 1px 1px 0px white;text-align:right;'.$mar.'"><br>Дата/Время:<br> '.date("d.m.y H:i:s" ,$item->photos_date).'</div>';
  echo '<p style="margin-top:10px;text-align:center;padding:10px">';

 echo "<button class='batn styler' onclick=";
 echo "location.href='";
 echo $img_path."' >на полный экран</button>";


 foreach ($photos_data  as $item){ 
  if($item->id_photos == $id_orig){
    $like_photos=$item->like_photos;
  }
 }

if ($logged == TRUE) {
echo ' <input type="button" class="like_photos like_photos1 batn styler" value="LIKE '.$like_photos.'" link='.$id_orig.'>  ';
}  if ($whopage=='my') {
    if ($logged==TRUE) {
          //  echo '  <a class="delete_photos batn" link='.$item->id_photos.'>Удалить</a>';
              echo '  <input type="button" class="red_photo batn styler" photos_name="'.$photos_name.'" link='.$id_orig.' value="Редактировать">';

    }
}
?>
</div>
<div style="display:inline-block;">
<?php
$i=0; foreach ($photos_data as $item){ 
    $photos_name=$item->photos_name;
$i++;
$sel='';
if ($i==$id+1) {
  $sel='background-color:#386E8F;';
}
      echo '<div style="height: 100px;'.$sel.'" class="block_photo"><a  class="phota"  href="'.$this->config->site_url().'id'.$url_id.'/albom/view_photo'.$item->id_photos.'/'.$i.'">
<div class="photo" style="height: 100px;width:100px;background-image:url('.$this->config->site_url().'uploads/photos/'.$item->url_photo.');"></div></a></div>';
// if ($i == 4) {
//  echo "<br>";
// }

    } 
?>
</div>
<br>
<!-- <div align="center"><br><br>
<button id="show_com" class="batn styler" style="display: block;width: 200px" >
Комментарии
<div style="position: absolute;margin-left: 80px;margin-top: 14px;">
<img width="15px" src="
<?php echo $this->config->site_url().'images/down.png' ?>
"> </div> </button></div> -->


  <br><p class="textbox"> Комментарии </p>



  <div id="comments"  style="display:block;text-align: center;
margin: 0 auto;
width: 90%;
margin-top: 30px">

<?php 
date_default_timezone_set('Europe/Moscow');
    foreach ($message_data as $item){ 

      if($item->name == ''){
        $name = $item->login;
      }else{
        $name = $item->name.' '.$item->famil;
      }
       echo '
       <div class="block">
       <div style="display:inline" class="block1">
       <img style="width:50px;height:50px" src="'.$this->config->site_url().'/uploads/avatars/'.$item->avatar.'" class="frame" width="100"></div>
       <div style="display:inline" class="block2">'.htmlspecialchars($name, ENT_QUOTES);
        echo '<div class="date_msg">Дата/Время: '.date("d.m.y H:i:s" ,$item->message_date).'</div></div><br>';
       echo '<div class="text_msg">'.$text = htmlspecialchars($item->messages, ENT_QUOTES).'</div>';

echo "</div>";

}
    
echo $this->pagination->create_links();


    ?>
<br>
<div class="block" style="text-align:center;background-color:#336AA8;width:300px;margin: 0 auto">

<p style="color:#fff;text-shadow:1px 1px 0px #7C7C7C;">Написать:</p>
<input type="hidden" name="id_photos" value="<?php echo $id_photos; ?>">
<input type="hidden" name="id_user" value="<?php echo $user_id; ?>">
<textarea placeholder="Комментарий" class="styler" style="width:250px" name="messages" id="messages" maxlength="300"></textarea>

<br>

<input type="submit" class="send_com styler" value="Отправить" />
</div>

</div>
</div>


</div>







