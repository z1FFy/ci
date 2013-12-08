<style>
  body {
    background-color: #fff;
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

<?php
$whostring_title='';
foreach ($user_data as $item){ 
			$name=$item->name;
      $famil=$item->famil;
			$user_id=$item->user_id;
			$avatar_url=$item->avatar;
      $spec=$item->spec_user;
		}
		if ($whopage=='my') {
      $whostring='Я';
      $whostring_title="Моя";
      $exit='<a href="'.$this->config->site_url().'site/vyhod">выйти</a>';

    } else {
  	   $whostring='';
    }
       $this->load->view('left_user',$user_data); 
   $this->load->view('albom_index',$user_data); 

?>
<!-- Профиль! -->
 
