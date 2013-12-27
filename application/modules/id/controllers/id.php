<?php

	class Id extends CI_Controller {
		public function __construct() {
    	parent::__construct();
    		$this->load->model('db_module');
	}

	private function _get_url_id() {
	  	$url_id = $this->uri->segment(1);
		$url_id = trim($url_id, " \id.");
		return $url_id;
	}
	private function _get_whopage($url_id,$user_id) {
		$whopage='none';
			if ($user_id == $url_id) {
				$whopage='my';
			}
			return $whopage;
	}

	function index() {
			$subscribe_user ='';
			$time='';
			$visit_date='';
		$url_id= $this->_get_url_id();
		$unread = $this->db_module->get_unread($url_id);
	 	$user_id=$this->session->userdata('user_id');
	 	$session_id=$this->session->userdata('session_id');
	 	
	 	$this ->db_module->last_activity($user_id);

	 		//var_dump($this->session);
	 	$logged = $this->session->userdata('logged_in');
	 	if ($this->uri->segment(1) == 'id') {
	 		if ($logged == TRUE){
	 		//$url_id=$user_id;
	 		header ("Location:". $this->config->site_url().'id'.$user_id); 
	 		} else {
	 				header ("Location:". $this->config->site_url()); 
	 		}
	 	}
	 	$data_user = $this->db_module->get_user_by_id($url_id);
		$podtvr=0;
		$whopage= $this->_get_whopage($url_id,$user_id);
		if ($logged == TRUE) {
			$podtvr = $this->db_module->get_podtvr($url_id);
		}

		$visit_repeat = $this->db_module->view_visit_num($url_id);
				foreach ($visit_repeat as $item) {
				if($item->session_id == $session_id){
					$time = time() - $item->visit_date;
					$visit_date = $item->visit_date;
					$user_id1 = $item->user_id;	
				}
				}
				if($time > 3 || $visit_date ==''){
					if($url_id != '' && $url_id != $user_id){
						$this->db_module->visit_insert($url_id, $user_id, $session_id);	//Добавляем посещение гостя
					}
				}
		$subscribe_data = $this->db_module->subscribe_user($user_id, $url_id); 
		//var_dump($subscribe_data);
		foreach ($subscribe_data as $item) {
			if($item->second_user == $url_id && $item->user_id == $user_id){
				$subscribe_user = 'subscribe';
			}else{
				$subscribe_user = 'not_subscribe';
			}
		}
		$photo_data = $this->db_module->get_user_photos($url_id);
		$video_data = $this->db_module->get_user_videos($url_id);
		$albom_data = $this->db_module->get_albom_photos($url_id);
		$profile_data = $this->db_module->get_user_by_id($url_id);
		$unread = $this->db_module->get_unread($url_id);
		$last_activity =$this->db_module->get_last_activity($url_id);
		
		$title='userpage';
$i=0;

		foreach ($profile_data as $item){ 
			$title=$item->name.' '.$item->famil.' / PortfolioOnline';
		}


	


				$data = array(
	               'user_data' => $data_user,
	               'whopage' => $whopage,
	               'logged' => $logged,
	               'podtvr' => $podtvr,
	               'albom_data' => $albom_data,
	               'photo_data' => $photo_data ,
	               'video_data' => $video_data ,
	               'url_id' => $url_id,
	               'user_id' => $user_id,
	               'profile_data' => $profile_data,

	               'unread' => $unread,
	               'last_activity' => $last_activity,
	               'subscribe_user' => $subscribe_user,
	                       );
				$page_content = $this->load->view('userpage', $data, true);
				$data['page_content'] = $page_content;
				$data['title'] = $title;
	                       
		if (empty($data_user)){
			echo "user not found";
		} else {
			$this->load->view('template',$data);
		}
	}

	function profile() {

		$title='Профиль';
		$user_id=$this->session->userdata('user_id');
		$this ->db_module->last_activity($user_id);
		$url_id= $this->_get_url_id();
		$unread = $this->db_module->get_unread($url_id);
		$whopage= $this->_get_whopage($url_id,$user_id);
		$logged = $this->session->userdata('logged_in');
		$user_data = $this->db_module->get_user_by_id($url_id);
		$user_data_arr = array( 'user_data' => $user_data, 'whopage' => $whopage,'url_id' => $url_id,'logged' => $logged,'unread' => $unread);
		$page_content = $this->load->view('profile', $user_data_arr, true);
		$user_id='';
		if ($logged == TRUE) {
		 	$user_id=$this->session->userdata('user_id');
		 }
		$page = array(
           'title' => $title,
           'page_content' => $page_content,
           'logged' => $logged,
           'user_id' => $user_id,
           'url_id' => $url_id,
         );
		$this->load->view('template',$page);	
	

	}

	function profile_update_form() {
		$title='Редактировать профиль';
		$user_id=$this->session->userdata('user_id');
		$this ->db_module->last_activity($user_id);
		$url_id= $this->_get_url_id();
		$unread = $this->db_module->get_unread($url_id);
		$whopage= $this->_get_whopage($url_id,$user_id);
		$logged = $this->session->userdata('logged_in');
		$user_data = $this->db_module->get_user_by_id($url_id);
		$user_data_arr = array( 'user_data' => $user_data, 'whopage' => $whopage,'url_id' => $url_id,'logged' => $logged,'unread' => $unread);
		$page_content = $this->load->view('profile_update_form', $user_data_arr, true);
		$user_id='';
		if ($logged == TRUE) {
		 	$user_id=$this->session->userdata('user_id');
		 }
		$page = array(
           'title' => $title,
           'page_content' => $page_content,
           'logged' => $logged,
           'user_id' => $user_id,
           'url_id' => $url_id,
         );
		$this->load->view('template',$page);	



	}



		function profile_update_send(){
		$famil = $_POST['famil'];
		$name = $_POST['name'];
		$otchestvo = $_POST['otchestvo'];
		$mail = $_POST['mail'];
		$birthday1 = $_POST['birthday1'];
		$birthday2 = $_POST['birthday2'];
		$birthday3 = $_POST['birthday3'];
		if($birthday1 == 'day' || $birthday2 == 'month' || $birthday3 == 'year'){
			$birthday = '';
		}else{
		
		$birthday = $birthday1.'.'.$birthday2.'.'.$birthday3;
		}
		if($_POST['spec_user'] == 'Другое'){
			$spec_user = $_POST['spec_user1'];	
		}else{
			$spec_user = $_POST['spec_user'];
		}

		$sex = $_POST['sex'];
		$education_level = $_POST['education_level'];
		$education_basic = $_POST['education_basic'];
		$facultet = $_POST['facultet'];
		$education_end = $_POST['education_end'];
		$language = $_POST['language'];
		$sity = $_POST['sity'];
		$telephone = $_POST['telephone'];
		$dop_telephone = $_POST['dop_telephone'];
		$skype = $_POST['skype'];
		$website = $_POST['website'];
		$interests = $_POST['interests'];
		$fon = $_POST['fon'];

		$this->db_module->send_profile($famil,$name,$otchestvo,$mail,$birthday, $spec_user, $sex, $education_level,
		 $education_basic, $facultet, $education_end, $language, 
		 $sity, $telephone, $dop_telephone, $skype, $website, $interests,$fon);
		$user_id=$this->session->userdata('user_id');
		header ('Location:'.$this->config->site_url() .'id'.$user_id.'/profile');



	}

	function profile_podtvr() {
		if (isset($_GET['k'])) {
		$key=$_GET['k'];
		$podtvr=$_GET['p'];
		if ($key == $podtvr) {
		$user_id=$this->session->userdata('user_id');
		echo $this->db_module->up_podtvr($user_id);
		  header ('Location:'.$this->config->site_url() .'id'.$user_id.'/profile');
		}
		}
		else {
			echo "not denied";
		}
	}



	function like_photos(){
		
		 $like_photos = $_POST['like_photos'];
		 $user_id = $this->session->userdata('user_id');
		$like_num=0;
		$like_data = $this->db_module->view_like($like_photos);
		foreach ($like_data as $item) {
			$like_num = $item->like_photos;
		}
		
		
		$like_user_rows = $this->db_module->view_like_user($like_photos, $user_id);
			
			if($like_user_rows >= 1)
			{
				$like_num=$like_num-1;
				$this->db_module->dell_like($like_photos);
			}
			if($like_user_rows == 0){
				$like_num=$like_num+1;
				$this->db_module->send_like_photos($like_photos);
				
			}
		
		
		$this->db_module->send_like($like_photos, $like_num);
		
		
	}

	function delete_photos()
	{
		$delete_photos = $_POST['delete_photos'];
		$this->db_module->delete_photos($delete_photos);
	}

	function delete_audio()
	{
		$delete_audio = $_POST['delete_audio'];
		$this->db_module->delete_audio($delete_audio);
	}

		function delete_video()
	{
		$delete_video = $_POST['delete_video'];
		$this->db_module->delete_video($delete_video);
	}

	function support(){
		$this->load->view('support');
	}

	function seach(){
		$logged = $this->session->userdata('logged_in');
		if ($logged == TRUE) {
		$title='Найти человека';
		$user_id=$this->session->userdata('user_id');
		$this ->db_module->last_activity($user_id);
		$url_id= $this->_get_url_id();
		$unread = $this->db_module->get_unread($url_id);
		$whopage= $this->_get_whopage($url_id,$user_id);
		$user_data = $this->db_module->get_user_by_id($url_id);

		$user_data_arr = array( 'user_data' => $user_data, 'whopage' => $whopage,'url_id' => $url_id,'logged' => $logged, 'unread' => $unread,);
		$page_content = $this->load->view('seach', $user_data_arr, true);
		$page = array(
           'title' => $title,
           'page_content' => $page_content,
           'logged' => $logged,
           'user_id' => $user_id,
           'url_id' => $url_id,
         );

		$this->load->view('template',$page);	
	} else {
		echo "not denied";
	}
	}

	function seach_user(){

		$title='Найти человека';
		$user_id=$this->session->userdata('user_id');
		$this ->db_module->last_activity($user_id);
		$url_id= $this->_get_url_id();
		$whopage= $this->_get_whopage($url_id,$user_id);
		$logged = $this->session->userdata('logged_in');
		$user_data = $this->db_module->get_user_by_id($url_id);
		//
		$seach = $_POST['seach'];
		
		$birthday1 = $_POST['birthday1'];
		$birthday2 = $_POST['birthday2'];
		$birthday3 = $_POST['birthday3'];
		if($birthday1 == 'day' || $birthday2 == 'month' || $birthday3 == 'year'){
			$birthday = '';
		}else{
		
		$birthday = $birthday1.'.'.$birthday2.'.'.$birthday3;
		}

		$spec_user = $_POST['spec_user'];
		if ($spec_user == 'Другое') {
			$spec_user = $_POST['spec_user1'];
		}
		$seach = trim($seach, " ");//чтоб наверняка
		$seach = preg_replace('/\s\s+/', ' ', $seach);
		$mas = explode(" ",$seach);
		$text ='';
		$seach_data ='';
		if (strlen($seach) > 128) {
            $text = '<p>Слишком длинный поисковый запрос.</p>';
        } else {
        	//var_dump($mas);
		$seach_data = $this->db_module->seach($mas, $birthday, $spec_user);
		}
		
		//
		$unread = $this->db_module->get_unread($url_id);
		$user_data_arr = array( 'user_data' => $user_data, 'whopage' => $whopage,'url_id' => $url_id,'logged' => $logged, 'seach_data' => $seach_data, 'text' => $text, 'unread' => $unread,);
	 $this->load->view('seach', $user_data_arr);

		$user_id='';
		if ($logged == TRUE) {
		 	$user_id=$this->session->userdata('user_id');
		 }
		// $page = array(
  //          'title' => $title,
  //          'page_content' => $page_content,
  //          'logged' => $logged,
  //          'user_id' => $user_id,
  //          'url_id' => $url_id,
  //        );
		// $this->load->view('template',$page);	

		
	}


	function dell_form(){
		$this->load->view('dell_form');
	}

	function dell_user(){
		$user_id=$this->session->userdata('user_id');
		$this->db_module->dell_user($user_id);
		$this->session->sess_destroy();
		header ("Location:". $this->config->site_url());
	}

	function pass_update_form(){
		
		$logged = $this->session->userdata('logged_in');
		if ($logged == TRUE) {
		$title='Измение пароля';
		$user_id=$this->session->userdata('user_id');
		$this ->db_module->last_activity($user_id);
		$url_id= $this->_get_url_id();
		$unread = $this->db_module->get_unread($url_id);
		$whopage= $this->_get_whopage($url_id,$user_id);
		$user_data = $this->db_module->get_user_by_id($url_id);

		$user_data_arr = array( 'user_data' => $user_data, 'whopage' => $whopage,'url_id' => $url_id,'logged' => $logged, 'unread' => $unread,);
		$page_content = $this->load->view('pass_update', $user_data_arr, true);

		$page = array(
           'title' => $title,
           'page_content' => $page_content,
           'logged' => $logged,
           'user_id' => $user_id,
           'url_id' => $url_id,
         );

		$this->load->view('template',$page);	
	} else {
		echo "not denied";
	}

	}


	function pass_update(){
		$old_pass = $_POST['old_pass'];
		$new_pass = $_POST['new_pass'];
		if(preg_match('/^[a-z0-9]{3,20}$/',$new_pass)){
		$user_id=$this->session->userdata('user_id');
		$pass_data = $this->db_module->get_user_by_id($user_id);
		foreach ($pass_data as $item) {
			$orig_pass = $item->password;
		}
		if($old_pass === $orig_pass){
			$this->db_module->pass_update($user_id, $new_pass);
			echo 'Пароль изменен';
		}else{
			echo 'Старый пароль введен неправильно';
		}
		//$this->load->view('pass_update');
		}else{
			echo "В пароле испольуются некоректные символы";
		}
	}


 
}
?>
