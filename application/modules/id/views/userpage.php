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
    padding-left: 0%;
    padding-right: 0%;
/*    display: table;*/
  }
  #left_user {
float: left;
}
.block {
 
  padding-bottom: 8px;
}
  #menu {
    height: 39px;
  }
  .block_photo {
    width:16%;
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

       $this->load->view('left_user',$user_data); 

   $this->load->view('albom_index',$user_data); 
  

?>

<!-- Профиль! -->
 
