<?php

	class Photos extends CI_Controller {
		public function __construct() {
    	parent::__construct();
    		$this->load->model('db_module');
	}


	private function _get_url_id() {
	  	$url_id = $this->uri->segment(1);
		$url_id = trim($url_id, " \id.");
		return $url_id;
	}

	function index() {
 	$url_id= $this->_get_url_id();
 	$data_user = $this->db_module->get_user_by_id($url_id);
	if (!empty($data_user)){
	$url_id= $this->_get_url_id();
	$photo_data = $this->db_module->get_user_photos($url_id);
	$photo_data_arr = array( 'user_data' => $photo_data );
	$this->load->view('photos',$photo_data_arr);
		} else {
		echo "user not found";
	}
	}


}
?>