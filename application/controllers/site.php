<?php

class Site extends CI_Controller {

	public function __construct() {
    	parent::__construct();
    	$this->load->library('session');
    	$this->load->model('db_module');
	}

	function index() {
		$logged = $this->session->userdata('logged_in');
		$user_id='';
		if ($logged == TRUE) {
		 	$user_id=$this->session->userdata('user_id');
		 }
		$title='PortfoliOnline DEV / BETA';
		$page_content = $this->load->view('welcome_message', '', true);
		$page = array(
       'title' => $title,
       'page_content' => $page_content,
       'logged' => $logged,
       'user_id' => $user_id
       );
		$this->load->view('template',$page);
	}

	
	function reg() {
		$title='Регистрация';
		$page_content = $this->load->view('reg', '', true);
		$logged = $this->session->userdata('logged_in');
		$user_id='';
		if ($logged == TRUE) {
		 	$user_id=$this->session->userdata('user_id');
		 }
		$page = array(
           'title' => $title,
           'page_content' => $page_content,
           'logged' => $logged,
           'user_id' => $user_id
         );
		$this->load->view('template',$page);	
	}
	function sendreg() {
		if (!empty($_POST)){
		$this->db_module->registration();
		} else {
			header ("Location:". $this->config->site_url());
		}
	}
	
	function entry() {
		if (!empty($_POST)){
			$login = $_POST['login'];
			$pass  = $_POST['pass'];
		$user_id='';
		$pass_db = '';
		$allow='';

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
	 			$allow= "no_pass";
	 		} 
		} else {
			$allow= "no_pass";
		}
				if ($user_id=='') {
					$allow= "no_pass";
				}
		echo $allow;
		} else {
			header ("Location:". $this->config->site_url());
		}
	}
	
	
	function vyhod() {
		$this->session->sess_destroy();
		header ("Location:". $this->config->site_url());
		}
}

?>