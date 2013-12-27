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
		$user_id=$this->session->userdata('user_id');
		$logged = $this->session->userdata('logged_in');
		if ($logged == TRUE) {
			$photo_data = $this->db_module->get_num_user_photos($user_id);
			$this->load->view('upload_form', array('error' => ' ' ,'photo_data' => $photo_data));
		}
		else {
			$this->load->view('welcome_message', array('error' => ' ' ));
		}
	}

	function do_upload()
	{
		$logged = $this->session->userdata('logged_in');
		$user_id=$this->session->userdata('user_id');
		if ($logged == TRUE) {
			$who = $_POST['who'];
		if ($who == 'video') {
			$video_name = $_POST['photos_name'];
			$kod = $_POST['kod'];
			$youtube_url = $kod;
			preg_match("!v\=([A-z|0-9]*)!", $youtube_url, $url_parts);
			$video_id = $url_parts[1];
				$data = array(
	               'user_id' => $user_id,
	               'video_name' => $video_name,
	               'kod' => $video_id
	                       );
				$data_user = $this->db_module->send_user_videos($data);
		}
		else {
		if ($who == 'audio') {
			$config['upload_path'] = './uploads/audios/';
			$audios_name = $_POST['photos_name'];
			$config['allowed_types'] = 'mp3';
			$config['max_size']	= '8000';
			$config['encrypt_name'] = 'TRUE';
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload())
			{
				$error = array('error' => $this->upload->display_errors());

				$this->load->view('upload_form', $error);
			}
			else
			{
				$data=$this->upload->data();
				$url_audio = $data['file_name'];
				$this->db_module->upload_audio($user_id, $url_audio, $audios_name);
				header ("Location:". $this->config->site_url().'id'.$user_id.'/albom/view_audio'); 
			}
		}else{

		if ($who == 'photos') {
			$config['upload_path'] = './uploads/photos/';
			$photos_name = $_POST['photos_name'];
			
		}
		if ($who == 'avatars') {
			$config['upload_path'] = './uploads/avatars/';
		}
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '5000';
		$config['max_width']  = '3024';
		$config['max_height']  = '3068';
		$config['encrypt_name'] = 'TRUE';
		$this->load->library('upload', $config);
			

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('upload_form', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data(),'who' => $who);
			if ($who == 'photos') {
				$data['photos_name']=$photos_name;
			}
			$page_content=$this->load->view('upload_success', $data,TRUE);
			$title="Загрузка фото";
					$page = array(
           'title' => $title,
           'page_content' => $page_content,
           'logged' => $logged,
           'user_id' => $user_id
         );
		$this->load->view('template',$page);
				}
			}
		}
		}
	}
	function small_ava() {
		if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			//var_dump($_POST);
			$targ_w = 200;
			$targ_h = 200;
			$jpeg_quality = 100;
			$full_path=$_POST['full_path'];
			$file_path=$_POST['file_path'];
			$raw_name=$_POST['raw_name'];
			$name_photo=$_POST['name_photo'];
			$src = $this->config->site_url().'uploads/avatars/'.$raw_name;
			$img_r = imagecreatefromjpeg($src);
			$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
			imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
			$targ_w,$targ_h,$_POST['w'],$_POST['h']);

			$user_id=$this->session->userdata('user_id');
			$name_photo=$_POST['name_photo'];
			$path=$file_path.'small/'.$raw_name;
			$img =imagejpeg($dst_r,$path,$jpeg_quality);
			$who='avatars';
			header ("Location:db_upload?user_id=".$user_id."&name=".$raw_name."&who=".$who);


			
		}
	}
	function db_upload() {
			$who  = $_GET['who'];
			if (isset($_GET['min'])) {
				$min = $_GET['min'];
			}
			$logged = $this->session->userdata('logged_in');
			if ($logged == TRUE) {
			$user_id=$this->session->userdata('user_id');
			if ($who=='avatars'){
			$name_photo  = $_GET['name'];
			$photos_name = '';	
			} else {
			$name_photo  = $_GET['name'];
			$photos_name = $_GET['photos_name'];
			}
			$photos_date = time();
			if ($who == 'photos') {
				$photo_data = $_GET['photo_data'];
				$data = array(
	               'user_id' => $user_id,
	               'name_photo' => $name_photo,
	               'photos_name'=> $photos_name,
	               'photo_data' => $photo_data,
	               'min' => $min,
	               'photos_date' => $photos_date
	                       );
				$data_user = $this->db_module->send_user_photos($data);
			}
			if ($who == 'avatars') {
						
			$data_user = $this->db_module->up_user_ava($user_id,$name_photo);
			echo $data_user;
			}
			}
		}

	
}