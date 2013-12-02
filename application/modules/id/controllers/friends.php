<?php

	class Friends extends CI_Controller {
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

	function index() {
		$friend_id = $_GET['friend_id'];
		$user_id=$this->session->userdata('user_id');
		$messages_data = $this->db_module->view_friend_message($friend_id, $user_id);
		$messages_data_arr = array( 'messages_data' => $messages_data);
 		$this->load->view('chat_friends_form', $messages_data_arr);	
	}

	function send_messages(){
		$id_photos = $_POST['id_photos'];
		$messages = $_POST['messages'];
		$user_id=$this->session->userdata('user_id');
		$this->db_module->send_message($id_photos, $messages, $user_id);

	}

	function chat_friends()
		{
			$this->load->view('chat_friends_form');	
		}

	function send_friends_messages(){
		$messages = $_POST['messages'];
		$friend_id = $_POST['friend_id'];
		$user_id=$this->session->userdata('user_id');
		$user_data = $this->db_module->get_user_by_id($user_id); 
		foreach ($user_data as $item) {
			$avatar = $item->avatar;
		}

		$this->db_module->send_chat_friends($user_id, $friend_id, $messages, $avatar);

	}

function view_photo1231(){
		
		$id_photos = $_GET['id_photos'];
		$photos_data = $this->db_module->get_photos_by_id($id_photos);
		$message_data = $this->db_module->view_message($id_photos);
		$message_data_arr = array( 'message_data' => $message_data, 'photos_data' => $photos_data);
		$this->load->view('view_photo',$message_data_arr);
		
	}

}
?>