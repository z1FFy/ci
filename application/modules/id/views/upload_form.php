<script>
	(function($) {  
$(function() {  
  
  $('input, select, button, file, text').styler();  
  
})  
})(jQuery)  
  $(document).ready(function() {
  	$("textarea[name='kod']").hide();
 $("select[name='type']").change(function () {
 	val=($(this).val());
 	if (val=='Видео(YouTube)') {
	 	$(".jq-file__name").hide('fast');
	 	$("textarea[name='kod']").show('fast');
	 	$("input[name='who']").val('video');
 	}
 	if (val=='Изображение') {
 	$(".jq-file__name").show('fast');
 		$("textarea[name='kod']").hide('fast');
 		$("input[name='who']").val('photos');
 	}
 	if (val=='Аудио') {
 	$(".jq-file__name").show('fast');
 		$("textarea[name='kod']").hide('fast');
 		$("input[name='who']").val('audio');
 	}
 	});
 });
</script>

<?php
$who = '';
$access='';
if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
$who = $_GET['who']; 
}
echo $error;
if ($who == 'avatars') {
	echo "<p style='font-size:17px'>Выберите фотографию для аватара</p>";
	$access='da';
}
if ($who == 'photos') {

	if($photo_data >= 30){
				foreach ($user_data as $item) {		
			$acc=$item->account;
		}
		if ($acc=='pro') {
			$access='yes';
		} else {
		$access='no';		
		echo 'Достигнут лимит фотографий для вашего аккаунта!';
		}
	}else{
echo "<p style='font-size:17px'>Выберите работу с жесткого диска</p>";
$access='da';
	}

}

if ($access=='da') {

echo '<form action="'.$this->config->site_url().'id/upload/do_upload" method="post" accept-charset="utf-8" enctype="multipart/form-data">';
if ($who=='photos') {
echo '	<br>Тип файла: <select name="type" class="styler" style="width:140px">
	<option name="photo">Изображение</option>
	<option name="video">Видео(YouTube)</option>
	<option name="audio">Аудио</option>
	</select>
	';
 }


echo '<br><br><input  class="styler" type="file" name="userfile" size="20" />
 <textarea name="kod" class="styler" cols="40" rows = "5" maxlength="70" placeholder="Ссылка на видео с YouTube"></textarea>
<br><br><input class="styler" type="text" name="photos_name" maxlength="70" placeholder="Имя" />
 <input type="hidden" name="who" value="'.$who.'">
<br /><br />

<input class="styler" type="submit" value="Загрузить" />

</form>
';
}
?>
