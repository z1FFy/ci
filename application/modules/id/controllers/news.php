<?php

	class News extends CI_Controller {
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
		$title='Новости';
		$user_id=$this->session->userdata('user_id');
		$url_id= $this->_get_url_id();
		$unread = $this->db_module->get_unread($url_id);
		$whopage= $this->_get_whopage($url_id,$user_id);
		$user_data = $this->db_module->get_user_by_id($url_id);
		$i=0;
		$subscribe_users_data = $this->db_module->friends_view_id($user_id);
		foreach ($subscribe_users_data as $item) {
			$subscribe_users_id[$i] = $item->user_id;
			//$subscribe_users_date[$i] = $item->subscribe_date;
			//var_dump($item);
			$i++;
		}
		$news_photos_data = $this->db_module->view_news_photos($subscribe_users_id);
		$user_data_arr = array( 'user_data' => $user_data, 'whopage' => $whopage,'url_id' => $url_id,'logged' => $logged, 'unread' => $unread, 'news_photos_data' => $news_photos_data, 'subscribe_users_data' => $subscribe_users_data);
		$page_content = $this->load->view('news', $user_data_arr, true);
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