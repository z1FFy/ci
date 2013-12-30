<?php

	class Statistic extends CI_Controller {
		public function __construct() {
    	parent::__construct();
    		$this->load->model('db_module');
    		$this->load->library('session');
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

	function index() {


		$logged = $this->session->userdata('logged_in');
		if ($logged == TRUE) {
		$title='Статистика';
		$user_id=$this->session->userdata('user_id');
		$url_id= $this->_get_url_id();
		$unread = $this->db_module->get_unread($url_id);
		$whopage= $this->_get_whopage($url_id,$user_id);
		$user_data = $this->db_module->get_user_by_id($url_id);
		$visit_data = $this->db_module->view_visit_num($url_id);
		$like_data = $this->db_module->view_like_kol($url_id);
		$kol_user_photos = $this->db_module->kol_user_photos($url_id);
		$kol_user_videos = $this->db_module->kol_user_videos($url_id);
		$kol_user_audios = $this->db_module->kol_user_audios($url_id);
		$i=0;
		foreach ($visit_data as $item) {
			if($item->guest_id != 0){
				$guests[$i] = $item->guest_id;
				$i++;
			}
		}
		$guests_data = $this->db_module->get_users_by_id($guests);
		//var_dump($guests_data);
		$user_data_arr = array( 'user_data' => $user_data, 'whopage' => $whopage,'url_id' => $url_id,'logged' => $logged, 'unread' => $unread, 'visit_data' => $visit_data, 'guests_data' => $guests_data, 'like_data' => $like_data,
			'kol_user_photos' => $kol_user_photos, 'kol_user_videos' => $kol_user_videos, 'kol_user_audios' => $kol_user_audios);
		$page_content = $this->load->view('statistic', $user_data_arr, true);
		$this ->db_module->last_activity($user_id);
	
		$page = array(
           'title' => $title,
           'page_content' => $page_content,
           'logged' => $logged,
           'user_id' => $user_id,
           'url_id' => $url_id,
         );

		$this->load->view('template',$page);	
	} else {
		echo "not denied";
	}

	}


	



}
?>