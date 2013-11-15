<?php

class Id extends CI_Controller {
		public function __construct() {
    	parent::__construct();
    		$this->load->model('db_module');
	}



	function index() {

 	$user_id=$this->session->userdata('user_id');
	$logged = $this->session->userdata('logged_in');

	$url_id = $this->uri->segment(1);
	$url_id = trim($url_id, " \id.");

	$podtvr=0;

	$data_user = $this->db_module->get_user_by_id($url_id);

	$whopage='none';
	if ($user_id == $url_id) {
		$whopage='my';
	}
	if ($logged == TRUE) {
		$podtvr = $this->db_module->get_podtvr($url_id);
	}
	$data = array(
               'user_data' => $data_user,
               'whopage' => $whopage,
               'logged' => $logged,
               'podtvr' => $podtvr
                       );
	if (!empty($data_user)){
	$this->load->view('userpage',$data);
	}
	else {
		echo "idinahuj";
	}
	//Photo show in page user  //
	$photo_data = $this->db_module->get_user_photos($url_id);
	$photo_data_arr = array( 'user_data' => $photo_data );
	$this->load->view('photos',$photo_data_arr);

			}

 function photos() {
	$url_id = $this->uri->segment(1);
	$url_id = trim($url_id, " \id.");
	$photo_data = $this->db_module->get_user_photos($url_id);
	$photo_data_arr = array( 'user_data' => $photo_data );
	$this->load->view('photos',$photo_data_arr);
}
}
?>