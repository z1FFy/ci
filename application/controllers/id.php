<?php

class Id extends CI_Controller {
		public function __construct() {
    	parent::__construct();
    		$this->load->model('db_module');
	}

	
	function index() {
 	$user_id=$this->session->userdata('user_id');
	$url_id = $this->uri->segment(1);
	$url_id = trim($url_id, " \id.");
	$podtvr=0;
	$data_user = $this->db_module->get_user_by_id($url_id);
	$whopage='none';
	//var_dump($this->config);
	if ($user_id == $url_id) {
		$whopage='my';
	}
	$logged = $this->session->userdata('logged_in');
	if ($logged == TRUE) {
		$podtvr = $this->db_module->get_podtvr($url_id);
	}
	$data = array(
               'user_data' => $data_user,
               'whopage' => $whopage,
               'logged' => $logged,
               'podtvr' => $podtvr
                       );
	$this->load->view('userpage',$data);
	//Photo show in page user  //
	$photo_data = $this->db_module->get_user_photos($url_id);
	$photo_data_arr = array( 'user_data' => $photo_data );
	$this->load->view('photos',$photo_data_arr);
	//
	// $albom_data = $this->db_module->get_albom_photos($url_id);
	// $albom_data_arr = array( 'user_data' => $albom_data );
	// $this->load->view('albom_success',$albom_data_arr);
	$url_id = $this->uri->segment(1);
	$url_id = trim($url_id, " \id.");
	$albom_data = $this->db_module->get_albom_photos($url_id);
	$photo_data = $this->db_module->get_user_photos($url_id);
	$albom_data_arr = array( 'user_data' => $albom_data, 'photo_data' => $photo_data);
	$this->load->view('albom_success',$albom_data_arr);

	
			}

 function photos() {
	$url_id = $this->uri->segment(1);
	$url_id = trim($url_id, " \id.");
	$photo_data = $this->db_module->get_user_photos($url_id);
	$photo_data_arr = array( 'user_data' => $photo_data );
	$this->load->view('photos',$photo_data_arr);
}

function albom_success() {
	$url_id = $this->uri->segment(1);
	$url_id = trim($url_id, " \id.");
	$albom_data = $this->db_module->get_albom_photos($url_id);
	$photo_data = $this->db_module->get_user_photos($url_id);
	$albom_data_arr = array( 'user_data' => $albom_data, 'photo_data' => $photo_data);
	$this->load->view('albom_success',$albom_data_arr);
}

function albom_image() {

	$url_id = $this->uri->segment(1);
	$url_id = trim($url_id, " \id.");
	$albom_data = $this->db_module->get_albom_photos($url_id);
	$photo_data = $this->db_module->get_user_photos($url_id);
	$albom_data_arr = array( 'user_data' => $albom_data, 'photo_data' => $photo_data);
	$this->load->view('albom_success',$albom_data_arr);
}

function albom_success_image() {

	// $url_id = $this->uri->segment(1);
	// $url_id = trim($url_id, " \id.");
	// $albom_data = $this->db_module->get_albom_photos($url_id);
	// $photo_data = $this->db_module->get_user_photos($url_id);
	// $albom_data_arr = array( 'user_data' => $albom_data, 'photo_data' => $photo_data);
	// $this->load->view('albom_success',$albom_data_arr);
}

}
?>