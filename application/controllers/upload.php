<?php

class Upload extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	function index()
	{
		$this->load->view('upload_form', array('error' => ' ' ));
	}

	function do_upload()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '6000';
		$config['max_width']  = '3000';
		$config['max_height']  = '3000';

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
	function db_upload() {
		$user_id = $_GET['user_id'];
		$name_photo  = $_GET['name'];
			$data = array(
               'user_id' => $user_id,
               'name_photo' => $name_photo
                       );
				$this->load->model('db_module');
				$data_user = $this->db_module->send_user_photos($data);


	}
}