 <style>

    #middle-pol {
    padding-top: 0px;
    width: 100%;
    height: 0px;
    visibility: hidden;

  }
 #left_user{
float: left;

}
  #content {
 padding-left: 0px;
padding-right: 0px;
width: 100%;

  }</style>
  <?php     $this->load->view('left_user',$user_data); 
echo '<div  id="right_user">

<div style="margin-right: 20%;">';

$id_al='';
  $sel='';
  if (isset($_GET['id_albom'])) {
$id_al = $_GET['id_albom'];
  }
  echo '<select style="width:100px" onchange="top.location=this.value">';
  echo '<option value="'.$this->config->site_url().'id'.$url_id.'/albom/view_audio">Все</a> </option> ';
?> </p>  <?php
  $i=0;

  foreach ($albom_data as $item){ 
    $i++;
    if ($item->id_albom==$id_al) {
        $sel='selected';
    }else {
      $sel='';
    }
  echo '<option '.$sel.' value="'.$this->config->site_url().'id'.$url_id.'/albom/view_audio?id_albom='.$item->id_albom.'">'.$item->albom_name.'</a> </option> ';
} 



if($whopage == "my") { echo '<input type="button" class="styler" id="create_audio_albom" link='.$url_id.' value="Создать альбом"><input type="button" class="upload_foto styler" value="Загрузить работу">';}
//$id_aud=$_GET['id_aud'];
if (isset($_GET['albom_create'])) {
echo '<br><p style="font-size: 20px;
  color: rgb(124, 124, 124);">'.$_GET['albom_create'].'</p>';
  }
foreach ($audio_data as $item) {
  $id_albom=$item->id_albom;
 // var_dump($item);
        //if ($id_aud==$item->id_audios){
  if (empty($id_al)) {

        echo '<br><p>'.$item->audio_name.'</p><audio controls >
        <source src="'.$this->config->site_url().'uploads/audios/'.$item->url_audio.'" type="audio/mp3; codecs=vorbis">
        <source src="'.$this->config->site_url().'uploads/audios/'.$item->url_audio.'" type="audio/ogg; codecs=vorbis"; codecs=vorbis">
        Тег audio не поддерживается вашим браузером. 
        <a href="upload/audios/'.$item->url_audio.'">Скачайте музыку</a>.  
        </audio><a href="'.$this->config->site_url().'uploads/audios/'.$item->url_audio.'" download="'.$item->url_audio.'"> Скачайте музыку</a>';

?>
 <?php if ($whopage=='my') {
  ?>

 <input type="button" style="color:red" class="delete_audio styler" value="Удалить" link='<?php echo $item->id_audios; ?>'> 
 <input type="button" class="red_audio batn styler" audio_name="<?php echo $item->audio_name; ?>" link='<?php echo $item->id_audios; ?>' value="Редактировать">

<?php
}

} else {
  if ($id_al==$id_albom) {
    echo '<br><p>'.$item->audio_name.'</p><audio controls >
        <source src="'.$this->config->site_url().'uploads/audios/'.$item->url_audio.'" type="audio/mp3; codecs=vorbis">
        <source src="'.$this->config->site_url().'uploads/audios/'.$item->url_audio.'" type="audio/ogg; codecs=vorbis"; codecs=vorbis">
        Тег audio не поддерживается вашим браузером. 
        <a href="upload/audios/'.$item->url_audio.'">Скачайте музыку</a>  
        </audio>';
if ($whopage=='my') {
  ?>

 <input type="button" style="color:red" class="delete_audio styler" value="Удалить" link='<?php echo $item->id_audios; ?>'> 
 <input type="button" class="red_audio batn styler" audio_name="<?php echo $item->audio_name; ?>" link='<?php echo $item->id_audios; ?>' value="Редактировать">

<?php
}

}


}

}

?>






</div>
</div>