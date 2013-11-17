<?php

class Upload extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('db_module');
	}


	function index()
	{
		$logged = $this->session->userdata('logged_in');
		if ($logged == TRUE) {
			$this->load->view('upload_form', array('error' => ' ' ));
		}
		else {
			$this->load->view('welcome_message', array('error' => ' ' ));
		}
	}

	function do_upload()
	{
		$logged = $this->session->userdata('logged_in');
		if ($logged == TRUE) {
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '1000';
		$config['max_width']  = '1024';
		$config['max_height']  = '1068';
		$config['encrypt_name'] = 'TRUE';
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('upload_form', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			$this->load->view('upload_success', $data);
		}
		}
	}
	function db_upload() {
		$logged = $this->session->userdata('logged_in');
		if ($logged == TRUE) {
			$user_id=$this->session->userdata('user_id');
			$name_photo  = $_GET['name'];
				$data = array(
	               'user_id' => $user_id,
	               'name_photo' => $name_photo
	                       );
				$data_user = $this->db_module->send_user_photos($data);
				echo "Фото загружено";
		}

	}
}