<?php

class Albom extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('db_module');
	}
	
	private function _get_url_id() {
	  	$url_id = $this->uri->segment(1);
		$url_id = trim($url_id, " \id.");
		return $url_id;
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

function photos_in_albom()
	{
		//var_dump($this->config->site_url());
		$albom_id = $_POST['id_albom'];
		//$this->load->view($this->config->site_url());
		//$this->db_module->get_photo_from_albom($albom_id);
		$albom_data = $this->db_module->get_photo_from_albom($albom_id);
		$albom_data_arr = array( 'albom_data' => $albom_data);
		$this->load->view('photos_in_albom',$albom_data_arr);
		
	}	






}