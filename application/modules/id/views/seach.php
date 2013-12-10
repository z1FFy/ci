<html>
<head>
<title>Поиск людей</title>
	  <link rel="stylesheet" href="<?php echo $this->config->site_url() ?>default.css" type="text/css" />
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />

<style>
body{
background-color:#fff;
}


    #middle-pol {
    padding-top: 0px;
    width: 100%;
    height: 0px;
    visibility: hidden;

  }
  #content {
    padding-left: 10%;
    padding-right: 10%;
    display: table;
  }
  #menu {
    height: 39px;
  }

</style>


</head>
<body>

<?php
$logged = $this->session->userdata('logged_in');
foreach ($user_data as $item) {
      $login=$item->login;
      $user_id=$item->user_id;
      $avatar_url=$item->avatar;
      $email=$item->mail;
      }


       $this->load->view('left_user',$user_data); 
   ?>

<div id="polosa"></div>
<div id="right_user">
  <p class="titl">Поиск людей</p> <br>

<div style="background-color:#EDF7FD;box-shadow: 0 0 1px rgba(0,0,0,0.5);">
<form action="<?php echo $this->config->site_url() ?>id<?php echo $user_id ?>/seach_user" method="post" accept-charset="utf-8" enctype="multipart/form-data">

<input type="text" name="seach" maxlength="50" placeholder="Поиск" />
<input  type="submit" value="Найти" />

</form>

<br>
<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	if($text == ''){
		foreach ($seach_data as $item) {
			//var_dump($item);
			echo '<div style="background-color:#EDF7FD;box-shadow: 0 0 1px rgba(0,0,0,0.5);"><img src="'.$this->config->site_url().'/uploads/avatars/small/'.$item->avatar.'" width="50"><a href="'.$this->config->site_url().'id'.$item->user_id.'">'.$item->name.' '.$item->famil.'</a></div><br>';	
			# code...
		}
	}else{
		echo $text;
	}

}
?>
</div>
</body>
</html>