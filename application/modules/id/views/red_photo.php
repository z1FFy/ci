 


 <script>

(function($) {  
$(function() {  
  
  $('input, select, button, file, text').styler();  
  
})  
})(jQuery)  
         $(".delete_photos").on("click", function(){

        delete_photos = $(this).attr("link");
      $.post(site_full+"/id/delete_photos",
         { delete_photos : delete_photos,
              },
         onAjaxSuccess
         );
      function onAjaxSuccess(data)
      {
  window.location.replace(site_full+"/id");

      };
      });
 </script>
<!-- Добавление в альбом -->
Редактирование <br><br>
 <div class="block" style="background-color:#a5c1d3">

<form action="<?php echo $this->config->site_url()?>id<?php echo $user_id?>/albom/do_img_to_albom" method="post" accept-charset="utf-8">
<input type="text" class="styler" name="photos_name"  width="200px" value="<?php echo $photos_name; ?> ">
<input type="submit" class="styler" value="Переименовать">
<input type="hidden" name="id_photos" value="<?php echo $id_photo; ?>">
</form> 
 </div>
  <div class="block" style="background-color:#a5c1d3;margin-top:-20px;">

 <form action="<?php echo $this->config->site_url()?>id<?php echo $user_id?>/albom/do_img_to_albom" method="post" accept-charset="utf-8">
Переместить в альбом: 
<select name = "id_albom"  style="width: 200px;">
<?php 
echo '<option value="all">Все</a> </option> ';
	foreach ($albom_data as $item){  ?>
	<option value="<?php echo $item->id_albom ?>" >
		<?php 
		//var_dump($item);
		 echo $item->albom_name; ?>
	</option>
	<?php } ?>
</select>
<input type="submit" class="styler" value="Ок">
<input type="hidden" name="id_photos" value="<?php echo $id_photo; ?>">

</form> 
</div>
 <div class="block" style="background-color:#82b1cc;margin-top:-20px;">
	 <input type="button" style="color:red" class="delete_photos styler" value="Удалить" link='<?php echo $id_photo; ?>'> 
</div>