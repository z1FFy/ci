<?php

class Site extends CI_Controller {

	public function __construct() {
    	parent::__construct();
    	$this->load->library('session');
    	$this->load->model('db_module');
	}

	function index() {
		$logged = $this->session->userdata('logged_in');
		if ($logged != TRUE) {
		 	echo "вы не авторизованы<br>";
		 	$this->load->view('welcome_message');
		 } else {
		 	$user_id=$this->session->userdata('user_id');
		 	header ("Location:id$user_id");
		 }
	}


	
	function reg() {
		$this->load->view('reg');	
	}
	function sendreg() {
		$this->db_module->registration();
	}
	
	function entry() {
		$login = $_POST['login'];
		$pass  = $_POST['pass'];
		$pass_db = '';
        $data = $this->db_module->get_user($login);

		foreach ($data as $item){ 
			$user_id=$item->user_id;
			$pass_db = $item->password;
		}
		if ((preg_match('/^[a-z0-9_]{3,20}$/',$login)) && (preg_match('/^[a-z0-9]{3,20}$/',$pass))){
			if ($pass == $pass_db){
				$newdata = array('logged_in' => TRUE, 'user_id' => $user_id);
				$this->session->set_userdata($newdata);
			} else {
	 			echo "no_pass";
	 		} 
		} else {
			echo "no_pass";
		}
	}
	
	
	function vyhod() {
		$this->session->sess_destroy();
		header ("Location:". $this->config->site_url());
		}
}

?>