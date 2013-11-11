<?php

class Site extends CI_Controller {

	public function __construct() {
    	parent::__construct();
    	//code
	}

	function index() {
	
		$this->load->library('session');
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
	$this->load->model('db_module');
	$this->db_module->connect();
	$this->db_module->regisrtation();
	}
	
	 function entry() {
		$login = $_POST['login'];
		$pass  = $_POST['pass'];
        $this->load->model('db_module');
		$this->db_module->connect();
        $data = $this->db_module->get_user($login);
		if ($pass == '') {
		$pass='0';
		}
		foreach ($data as $item){ 
			$user_id=$item->user_id;
		}
   		$pass_db = $item -> password;
		if ($pass == $pass_db){
			 	
			$newdata = array('logged_in' => TRUE, 'user_id' => $user_id);
			$this->session->set_userdata($newdata);
			header ("Location:". $this->config->site_url());
				}else{
	 			header ("Location:". $this->config->site_url());
	 		} 
	

	}
	
	
	function vyhod() {
		$this->session->sess_destroy();
		header ("Location:". $this->config->site_url());
		}
}

?>