<?php

class Albom extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('db_module');
	}

	function index()
	{
		$this->load->view('albom_form');
	}

	
function do_albom()
	{
		$albom_name = $_POST['albom_name'];
		$this->db_module->send_new_albom($albom_name);
	}

function do_img_to_albom()
	{
		//var_dump($this->config->site_url());
		$albom_id = $_POST['id_albom'];
		$photo_id = $_POST['id_photos'];
		//$this->load->view($this->config->site_url());
		$this->db_module->send_photo_from_albom($albom_id, $photo_id);
	}

function do_img_view_albom()
	{
		//var_dump($this->config->site_url());
		$albom_id = $_POST['id_albom'];
		//$this->load->view($this->config->site_url());
		//$this->db_module->get_photo_from_albom($albom_id);
		$albom_data = $this->db_module->get_photo_from_albom($albom_id);
		$albom_data_arr = array( 'user_data' => $albom_data);
		$this->load->view('albom_success_image',$albom_data_arr);
		
	}	

}