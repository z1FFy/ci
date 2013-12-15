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
		private function _get_whopage($url_id,$user_id) {
		$whopage='none';
			if ($user_id == $url_id) {
				$whopage='my';
			}
			return $whopage;
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
		$photo_id= $_POST['id_photos'];
		if (isset($_POST['id_albom'])) {
			$albom_id = $_POST['id_albom'];		
			$res=$this->db_module->send_photo_from_albom($albom_id, $photo_id,'');
		}
	if (isset($_POST['photos_name'])) {
		$photos_name = $_POST['photos_name'];
		$res=$this->db_module->send_photo_from_albom('',$photo_id,$photos_name);
	}
		$user_id=$this->session->userdata('user_id');
	header ("Location:". $this->config->site_url().'id'.$user_id);
	}

function photos_in_albom()
	{
		$albom_id = $_GET['id_albom'];
		$albom_data = $this->db_module->get_photo_from_albom($albom_id);
		$albom_data_arr = array( 'albom_data' => $albom_data);
		$this->load->view('photos_in_albom',$albom_data_arr);
		
	}	

	function view_photo(){
		$url_id= $this->_get_url_id();
	 	$user_id=$this->session->userdata('user_id');
	 	$logged = $this->session->userdata('logged_in');
		$whopage= $this->_get_whopage($url_id,$user_id);		
		$id_photos = $_GET['id_orig'];
		$user_data = $this->db_module->get_user_by_id($url_id);
		$photos_data = $this->db_module->get_user_photos($url_id);
		$message_data = $this->db_module->view_message($id_photos);
		$message_data_arr = array( 'message_data' => $message_data, 'user_data' => $user_data, 'photos_data' => $photos_data,'whopage' => $whopage,'logged' => $logged,'user_id' => $user_id, 'url_id' => $url_id);
		$page_content=$this->load->view('view_photo',$message_data_arr,true);
		$title="Просмотр фото";
		$data['page_content'] = $page_content;
		$data['title'] = $title;
		$this->load->view('template',$data);		
	}

	function red_photo() {
		$id_photo=$_GET['id_photo'];
		$photos_name=$_GET['photos_name'];
		$user_id=$this->session->userdata('user_id');
		$albom_data = $this->db_module->get_albom_photos($user_id);
		$data=array( 'albom_data' => $albom_data,'user_id'=>$user_id,'id_photo'=>$id_photo,'photos_name'=>$photos_name);
		$this->load->view('red_photo',$data);
	}


}