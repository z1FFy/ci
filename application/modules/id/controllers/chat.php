<?php

	class Chat extends CI_Controller {
		public function __construct() {
    	parent::__construct();
    		$this->load->model('db_module');
    		$this->load->library('session');
	}


	private function _get_url_id() {
	  	$url_id = $this->uri->segment(1);
		$url_id = trim($url_id, " \id.");
		return $url_id;
	}

	function index() {
 		$this->load->view('chat_form');
	}

	function send_messages(){
		$id_photos = $_POST['id_photos'];
		$messages = $_POST['messages'];
		$user_id=$this->session->userdata('user_id');
		$res=$this->db_module->send_message($id_photos, $messages, $user_id);
		echo $res;
		
	}



}
?>