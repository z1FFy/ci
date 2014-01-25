<?php


function send_mime_mail($name_from, // имя отправителя
                        $email_from, // email отправителя
                        $name_to, // имя получателя
                        $email_to, // email получателя
                        $data_charset, // кодировка переданных данных
                        $send_charset, // кодировка письма
                        $subject, // тема письма
                        $body, // текст письма
                        $html = FALSE, // письмо в виде html или обычного текста
                        $reply_to = FALSE
                        ) {
  $to = mime_header_encode($name_to, $data_charset, $send_charset)
                 . ' <' . $email_to . '>';
  $subject = mime_header_encode($subject, $data_charset, $send_charset);
  $from =  mime_header_encode($name_from, $data_charset, $send_charset)
                     .' <' . $email_from . '>';
  if($data_charset != $send_charset) {
    $body = iconv($data_charset, $send_charset, $body);
  }
  $headers = "From: $from\r\n";
  $type = ($html) ? 'html' : 'plain';
  $headers .= "Content-type: text/$type; charset=$send_charset\r\n";
  $headers .= "Mime-Version: 1.0\r\n";
  if ($reply_to) {
      $headers .= "Reply-To: $reply_to";
  }
  return mail($to, $subject, $body, $headers);
}

function mime_header_encode($str, $data_charset, $send_charset) {
  if($data_charset != $send_charset) {
    $str = iconv($data_charset, $send_charset, $str);
  }
  return '=?' . $send_charset . '?B?' . base64_encode($str) . '?=';
}


if (isset($_GET['mail_contacts'])) {
	$user_name = $_GET['user_name'];
	$email_to = $_GET['mail_contacts'];
		$name_to = $_GET['name'];
		//$user_id = $item->user_id;
$name_from = 'PortfoliOnline.ru';
		$email_from = 'support@portfolionline.ru';
		//$name_to = 'Получатель';
		//$email_to = 'tailz440@mail.ru';
		$data_charset = 'UTF-8';
		$send_charset = "CP1251";
		$subject = "PortfoliOnline.ru / Оповещение";

  $body= $user_name.'хочет добавить вас в контакты!';
  echo send_mime_mail($name_from,
$email_from,
$name_to,
$email_to,
$data_charset,
$send_charset,
$subject,
$body);

}



?>





<div style="display:table"  id="right_user">

	<p class="titl" id='user_text_color'>Мои работы  
<?php 

$id_al='';
	$sel='';
	if (isset($_GET['id_albom'])) {
$id_al = $_GET['id_albom'];
	}

	echo '<select style="width:100px" onchange="top.location=this.value">';

	echo '<option value="'.$this->config->site_url().'id'.$url_id.'">Все</a> </option> ';
?> </p>  <?php
	$i=0;
	$albom_name='';
	foreach ($albom_data as $item){ 
		$i++;
		if ($item->id_albom==$id_al) {
				$sel='selected';
				$albom_name= $item->albom_name;
		}else {
			$sel='';
		}
	echo '<option '.$sel.' value="'.$this->config->site_url().'id'.$url_id.'/?id_albom='.$item->id_albom.'">'.$item->albom_name.'</a> </option> ';
} ?>
</select>
	<?php if($whopage == "my") { 
		if (isset($_GET['id_albom'])) {
		echo '<input id_al="'.$id_al.'" type="button" class="styler" id="red_albom" value="Редактировать альбом">';
		}
		echo '<input type="button" class="styler" link='.$url_id.' id="create_albom" value="Создать альбом">';
	echo '<input   type="button" class="upload_foto styler" value="Загрузить работу">';} 
$acc='';
foreach ($acc_data as $item) {
	$acc = $item->account;
}
// if($acc != 'pro'){
// 	echo '<a class="banner"><img style="position: absolute; top: 65px;" src="'.$this->config->site_url().'uploads/banners/900x70.gif" width="900" height="70"></a><br><br>';
// }
	
	?>

<br>

<!-- vse foto -->
<div>
<!-- <div id="show_img"></div> -->
<?php $i=0; foreach ($photo_data as $item){ 
		$photos_name=$item->photos_name;
		$id_albom=$item->id_albom;

		$i++;
		if (empty($id_al)) {
			echo '<div class="block_photo"><a  class="phota"  href="'.$this->config->site_url().'id'.$url_id.'/albom/view_photo'.$item->id_photos.'/'.$i.'">
			<div class="photo" style="background-image:url('.$this->config->site_url().'uploads/photos/'.$item->url_photo.');">';
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
		
</div>
<?php 
if (empty($id_al)) {
if (!empty($video_data)) {
	foreach ($video_data as $item) {
		$kod=$item->kod;
		$thumbUrl = "http://img.youtube.com/vi/".$kod."/0.jpg";
		echo '<div class="block_photo">

		<a class="phota"  href="'.$this->config->site_url().'id'.$url_id.'/albom/view_video?id_vid='.$item->id_videos.'">
		<div class="photo" style="background-image:url('.$thumbUrl.')">
		<div class="pod_photo"><div style="position:absolute"> <img src="'.$this->config->site_url().'/images/play.png"> </div>'.$text = htmlspecialchars($item->video_name, ENT_QUOTES).'</div></div></a></div>';
	}
}
}
 ?>
</div>

