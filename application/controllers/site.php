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

	 function entry() {
	 	$login = $_POST['login'];
		$pass  = $_POST['password'];
	 	$newdata = array(
                   'login'  => $login,
                   'password'     => $pass,
                   'logged_in' => TRUE
               );
	 	$this->session->set_userdata($newdata);
		header ("Location:". $this->config->site_url());
	}
	
	function vyhod() {
		$this->session->sess_destroy();
header ("Location:". $this->config->site_url());
		}
}

?>