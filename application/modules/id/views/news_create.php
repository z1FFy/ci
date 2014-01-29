
<script type="text/javascript">
  $(document).ready(function() {
$('.photo_c').click(function() {
  photo = $(this).attr("link");
  data = '<input id="res" class="styler" type="hidden" name="url" value="'+photo+'"/>'    
  $('#res').html(data);
     
});



 $('.news_send').click(function() {
 	messages = $("#messages").val();
    url_id = $("input[name='url_id']").val();
    url = $("input[name='url']").val();
      $.post(site_full+"/id/news/send_create_news",
         { 
          messages : messages,
          url_id: url_id,
          url: url
              },
         onAjaxSuccess
         );
      function onAjaxSuccess(data)
      {
  location.reload();
      };
});



});



function showElement(layer){
var myLayer = document.getElementById(layer);
if(myLayer.style.display=="none"){
 myLayer.style.display="block";
 myLayer.backgroundPosition="top";
 } else { 
 myLayer.style.display="none";
 }
}
</script>
<?php
//echo '<a href="'.$this->config->site_url().'id/upload?who=photos">Загрузить работу</a>'

?>



<div id="res"><input id="res" class="styler" type="hidden" name="url" value="1"/></div>
<input id="res" class="styler" type="hidden" name="url_id" value="<?php echo $url_id; ?>"/>
<textarea  style="width: 95%; height:100px;" class="styler" placeholder="Сообщение" name="messages" id="messages" maxlength="200"></textarea><br>
<input type="button" class="news_send  styler"  value="Опубликовать">







<a href="#" class="button" onclick="javascript:showElement('v-menu')">Прикрепить Работу</a>
<div id="v-menu" class="v-menu" style="display:none;">
<!-- <div id="show_img"></div> -->
<?php $i=0; foreach ($photo_data as $item){ 
		$photos_name=$item->photos_name;
		$id_albom=$item->id_albom;

		$i++;
		if (empty($id_al)) {

			echo '<div class="block_photo">';
			?> <a class="phota photo_c"  href="#" link="<?php echo $item->url_photo; ?>" onclick="javascript:showElement('v-menu')"><?php
			echo '<div class="photo" style="background-image:url('.$this->config->site_url().'uploads/photos/'.$item->url_photo.');">';
			$style='';
			if (empty($photos_name)) {
				$style='visibility: hidden;';
			}else {
				$style='visibility:visible';
			}
			echo '<div style="'.$style.'" class="pod_photo">'.$text = htmlspecialchars($photos_name, ENT_QUOTES).'</div>';
			echo '</div></a></div>';
} else {
	if ($id_al==$id_albom) {
		echo '<div class="block_photo"><a  class="phota"  href="'.$this->config->site_url().'id'.$url_id.'/albom/view_photo'.$item->id_photos.'/'.$i.'">
			<div class="photo" style="background-image:url('.$this->config->site_url().'uploads/photos/'.$item->url_photo.');"><div class="pod_photo">'.$text = htmlspecialchars($photos_name, ENT_QUOTES).'</div></div></a></div>';

	}
}

		}	?>
		

<?php 
if (empty($id_al)) {
if (!empty($video_data)) {
	foreach ($video_data as $item) {
		$kod=$item->kod;
		$thumbUrl = "http://img.youtube.com/vi/".$kod."/0.jpg";
		echo '<div class="block_photo">';

		?> <a class="phota photo_c"  href="#" link="<?php echo $item->kod; ?>" onclick="javascript:showElement('v-menu')"><?php
		echo '<div class="photo" style="background-image:url('.$thumbUrl.')">
		<div class="pod_photo"><div style="position:absolute"> <img src="'.$this->config->site_url().'/images/play.png"> </div>'.$text = htmlspecialchars($item->video_name, ENT_QUOTES).'</div></div></a></div>';
	}
}
}
 ?>
</div>