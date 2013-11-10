<?php

class Id extends CI_Controller {
	function index() {

	$this->load->model('db_module');
	$this->db_module->connect();

 	$user_id=$this->session->userdata('user_id');
	$url_id = $this->uri->segment(1);
	$url_id = trim($url_id, " \id.");

	$data_user = $this->db_module->get_user_by_id($url_id);

	$whopage='none';
	if ($user_id == $url_id) {
		$whopage='my';
	}
	$logged = $this->session->userdata('logged_in');
	$data = array(
               'user_data' => $data_user,
               'whopage' => $whopage,
               'logged' => $logged
                       );
	$this->load->view('userpage',$data);
			}
}


?>