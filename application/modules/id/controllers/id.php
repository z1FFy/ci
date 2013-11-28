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
		$url_id= $this->_get_url_id();
	 	$user_id=$this->session->userdata('user_id');
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
		$photo_data = $this->db_module->get_user_photos($url_id);
		$albom_data = $this->db_module->get_albom_photos($url_id);
		$profile_data = $this->db_module->get_user_by_id($url_id);
		$title='userpage';
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
	               'url_id' => $url_id,
	               'user_id' => $user_id,
	               'profile_data' => $profile_data,
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
		$user_id=$this->session->userdata('user_id');
		$profile_data = $this->db_module->get_user_by_id($user_id);
		$profile_data_arr = array( 'profile_data' => $profile_data);
		$this->load->view('profile',$profile_data_arr);

	}

	function profile_update_form() {
		$user_id=$this->session->userdata('user_id');
		$profile_data = $this->db_module->get_user_by_id($user_id);
		$profile_data_arr = array( 'profile_data' => $profile_data);
		$this->load->view('profile_update_form',$profile_data_arr);

	}



		function profile_update_send(){
		$famil = $_POST['famil'];
		$name = $_POST['name'];
		$otchestvo = $_POST['otchestvo'];
		$mail = $_POST['mail'];
		$birthday1 = $_POST['birthday1'];
		$birthday2 = $_POST['birthday2'];
		$birthday3 = $_POST['birthday3'];
		$birthday = $birthday1.'.'.$birthday2.'.'.$birthday3;
		$spec_user = $_POST['spec_user'];
		$this->db_module->send_profile($famil,$name,$otchestvo,$mail,$birthday, $spec_user);

	}




 
}
?>