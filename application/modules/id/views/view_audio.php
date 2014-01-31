

 <script src="<?php echo $this->config->site_url() ?>audioplayer.js"></script>
<script>
$(document).ready(function() {
    $( function()
    {
        $( 'audio' ).audioPlayer();
    });



  });
</script>

<script type="text/javascript">
$('#player1').click(function() {
  player = $(this).attr("link");
  data = '<audio preload="auto" controls>
  <source src="'+player+'" />
</audio>';
$('#res').html(data);
});

</script>

 <style>
#player{color: #fff; background: #333;}
.audioplayer { height: 2.5em; color: #fff; width:100%; background: #333; position: relative;  }
.audioplayer-mini { width: 2.5em; margin: 0 auto; } 
.audioplayer > div { position: absolute; }
.audioplayer-playpause { width: 2.5em; /* 40 */ height: 100%; text-align: left; text-indent: -9999px; cursor: pointer; z-index: 2; top: 0; left: 0; } 
.audioplayer-mini .audioplayer-playpause { width: 100%; } 
.audioplayer-playpause:hover, .audioplayer-playpause:focus { background-color: #222; } 
.audioplayer-playpause a { display: block; } /* "play" icon when audio is not being played */ 
.audioplayer:not(.audioplayer-playing) .audioplayer-playpause a { width: 0; height: 0; border: 0.5em solid transparent;  border-right: none; border-left-color: #fff; content: ''; position: absolute; top: 50%; left: 50%; margin: -0.5em 0 0 -0.25em; }
.audioplayer-playing .audioplayer-playpause a { width: 0.75em; /* 12 */ height: 0.75em; /* 12 */ position: absolute; top: 50%; left: 50%; margin: -0.375em 0 0 -0.375em; /* 6 */ } 
.audioplayer-playing .audioplayer-playpause a:before, .audioplayer-playing .audioplayer-playpause a:after { width: 40%; height: 100%; background-color: #fff; content: ''; position: absolute; top: 0; } 
.audioplayer-playing .audioplayer-playpause a:before { left: 0; } 
.audioplayer-playing .audioplayer-playpause a:after { right: 0; }
.audioplayer-time { width: 4.375em; /* 70 */ height: 100%; line-height: 2.5em;text-align: center; z-index: 2; top: 0; } 
.audioplayer-time-current { border-left: 1px solid #111; left: 2.5em;  } 
.audioplayer-time-duration { right: 2.5em;  } 
.audioplayer-novolume .audioplayer-time-duration { border-right: 0; right: 0; }
.audioplayer-volume { width: 2.5em; /* 40 */ height: 100%; border-left: 1px solid #111; text-align: left; text-indent: -9999px; cursor: pointer; z-index: 2; top: 0; right: 0; } 
.audioplayer-volume:hover, .audioplayer-volume:focus { background-color: #222; } 
.audioplayer-volume-button { width: 100%; height: 100%; } /* "volume" icon */ 
.audioplayer-volume-button a { width: 0.313em; /* 5 */ height: 0.375em; /* 6 */ background-color: #fff; display: block; position: relative; z-index: 1; top: 40%; left: 35%; } 
.audioplayer-volume-button a:before, .audioplayer-volume-button a:after { content: ''; position: absolute; } 
.audioplayer-volume-button a:before { width: 0; height: 0; border: 0.5em solid transparent; /* 8 */ border-left: none; border-right-color: #fff; z-index: 2; top: 50%; right: -0.25em; margin-top: -0.5em; /* 8 */ } 
.audioplayer:not(.audioplayer-mute) .audioplayer-volume-button a:after { width: 0.313em; /* 5 */ height: 0.313em; /* 5 */ border: 0.25em double #fff; /* 4 */ border-width: 0.25em 0.25em 0 0; /* 4 */ left: 0.563em; /* 9 */ top: -0.063em; /* 1 */ -webkit-border-radius: 0 0.938em 0 0; /* 15 */ -moz-border-radius: 0 0.938em 0 0; /* 15 */ border-radius: 0 0.938em 0 0; /* 15 */ -webkit-transform: rotate( 45deg ); -moz-transform: rotate( 45deg ); -ms-transform: rotate( 45deg ); -o-transform: rotate( 45deg ); transform: rotate( 45deg ); } /* volume adjuster */ .audioplayer-volume-adjust { width: 100%; height: 6.25em; /* 100 */ cursor: default; position: absolute; left: 0; top: -9999px; background: #222; } .audioplayer-volume:not(:hover) .audioplayer-volume-adjust { opacity: 0; } .audioplayer-volume:hover .audioplayer-volume-adjust { top: auto; bottom: 100%; } .audioplayer-volume-adjust > div { width: 40%; height: 80%; background-color: #555; cursor: pointer; position: relative; z-index: 1; margin: 30% auto 0; } .audioplayer-volume-adjust div div { width: 100%; height: 100%; position: absolute; bottom: 0; left: 0; background: #007fd1; } .audioplayer-novolume .audioplayer-volume { display: none; }
      .audioplayer-bar
      {
        height: 0.875em; /* 14 */
        background-color: #222;
        cursor: pointer;
        z-index: 1;
        top: 50%;
        right: 6.875em; /* 110 */
        left: 6.875em; /* 110 */
        margin-top: -0.438em; /* 7 */
      }
        .audioplayer-novolume .audioplayer-bar
        {
          right: 4.375em; /* 70 */
        }
        .audioplayer-bar div
        {
          width: 0;
          height: 100%;
          position: absolute;
          left: 0;
          top: 0;
        }
        .audioplayer-bar-loaded
        {
          background-color: #333;
          z-index: 1;
        }
        .audioplayer-bar-played
        {
          background: #007fd1;
          z-index: 2;
        }



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
echo '<div  id="right_user">';



$id_al='';
$sel='';
if (isset($_GET['id_albom'])) {
$id_al = $_GET['id_albom'];
}
echo '<select style="width:100px" onchange="top.location=this.value">';
echo '<option value="'.$this->config->site_url().'id'.$url_id.'/albom/view_audio">Все</a> </option> ';
?> </p> <?php
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

echo '</select>';
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


        echo '<br><p id="user_text_color">'.$item->audio_name.'</p><audio preload="none" controls >
        <source src="'.$this->config->site_url().'uploads/audios/'.$item->url_audio.'" type="audio/mp3; codecs=vorbis">
        <source src="'.$this->config->site_url().'uploads/audios/'.$item->url_audio.'" type="audio/ogg; codecs=vorbis"; codecs=vorbis">
        Тег audio не поддерживается вашим браузером. 
        <a href="upload/audios/'.$item->url_audio.'">Скачайте музыку</a>.  
        </audio><a href="'.$this->config->site_url().'uploads/audios/'.$item->url_audio.'" download><input type="button"  class="save_audio styler" value="Скачать" link='.$this->config->site_url().'uploads/audios/'.$item->url_audio.'></a>';


?>
<?php if ($whopage=='my') {
?>

<input type="button" style="color:red" class="delete_audio styler" value="Удалить" link='<?php echo $item->id_audios; ?>'> 
<input type="button" class="red_audio batn styler" audio_name="<?php echo $item->audio_name; ?>" link='<?php echo $item->id_audios; ?>' value="Редактировать">

<?php
}

} else {

  if ($id_al==$id_albom) {
    echo '<br><p id="user_text_color">'.$item->audio_name.'</p><audio preload="none" controls >
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

