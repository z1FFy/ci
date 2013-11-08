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
		 	$this->load->view('userpage');
		 }
	}

	
	function reg() {
		$this->load->view('reg');
	}
	
	 function entry() {
		$login = $_POST['login'];
		$pass  = $_POST['password'];
        $this->load->model('db_module');

		$this->db_module->connect();
        $data = $this->db_module->get_user($login);
		//var_dump($data);

		foreach ($data as $item){ 
			echo $item -> login;
		}
   		$pass_db = $item -> password;
		if ($pass == $pass_db){
			echo 'zaebca!!';	 	
			$newdata = array('logged_in' => TRUE);
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