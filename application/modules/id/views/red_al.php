 


 <script>

(function($) {  
$(function() {  
  
  $('input, select, button, file, text').styler();  
  
})  
})(jQuery)  
         $(".delete_al").on("click", function(){
        delete_al= $('#id_al').val();
      $.post(site_full+"/id/delete_albom",
         { delete_al : delete_al,
              },
         onAjaxSuccess
         );
      function onAjaxSuccess(data)
      {
  window.location.replace(site_full+"/id");
      };
      });


 </script>
<?php 
$id_al= $_GET['id_al'];
foreach ($albom_data as $item) {
  if ($item->id_albom == $id_al) {
    $al_name=$item->albom_name;
  }
}
?>
Редактирование альбома<br><br>
 <div class="block" style="background-color:#a5c1d3">


<form action="<?php echo $this->config->site_url()?>id<?php echo $user_id?>/albom/edit_albom" method="post" accept-charset="utf-8">

<input type="text" class="styler" name="al_name"  width="200px" value="<?php echo $al_name; ?>">
<input type="submit" class="styler" value="Переименовать">
<input type="hidden" name="id_al" id="id_al" value="<?php echo $id_al; ?>">
</form> 
 </div>

 <div class="block" style="background-color:#82b1cc;margin-top:-20px;">
	 <input type="button" style="color:red" class="delete_al styler" value="Удалить" link='<?php echo $id_al; ?>'> 
</div>