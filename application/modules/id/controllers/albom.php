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
		$res=$this->db_module->send_new_albom($albom_name);
		echo $res;
	}

function do_img_to_albom()
	{
		$albom_id = $_POST['id_albom'];
		$photo_id = $_POST['id_photos'];
		$res=$this->db_module->send_photo_from_albom($albom_id, $photo_id);
		echo $res;
	}

function photos_in_albom()
	{
		$albom_id = $_GET['id_albom'];
		$albom_data = $this->db_module->get_photo_from_albom($albom_id);
		$albom_data_arr = array( 'albom_data' => $albom_data);
		$this->load->view('photos_in_albom',$albom_data_arr);
		
	}	

	function view_photo(){
		
		$id_photos = $_GET['id_photos'];
		$photos_data = $this->db_module->get_photos_by_id($id_photos);
		$message_data = $this->db_module->view_message($id_photos);
		$message_data_arr = array( 'message_data' => $message_data, 'photos_data' => $photos_data);
		$this->load->view('view_photo',$message_data_arr);
		
	}




}