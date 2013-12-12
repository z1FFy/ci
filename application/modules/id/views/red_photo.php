  <meta charset="utf-8">
<!-- Добавление в альбом -->

 <form action="<?php echo $this->config->site_url()?>id<?php echo $user_id?>/albom/do_img_to_albom" method="post" accept-charset="utf-8">
<input type="submit" class="btn" value="добавить в альбом"><select name = "id_albom"  size="1">
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
<input type="hidden" name="id_photos" value="<?php echo $id_photo; ?>">

</form> 

<br>
	 <a class="delete_photos" link='<?php echo $id_photo; ?>'>Удалить</a>
