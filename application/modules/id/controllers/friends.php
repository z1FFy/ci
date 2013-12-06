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
		$messages_data = $this->db_module->view_friend_message($friend_id, $user_id,0);
		$messages_data_arr = array( 'messages_data' => $messages_data);
 		$this->load->view('chat_friends_form', $messages_data_arr);	
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
		// извлекаю из базы значение "отправлял ли пользователь сообщение этому адресату когда либо"
		$friend_data = $this->db_module->view_friends($friend_id, $user_id); 
		foreach ($friend_data as $item) {
			
			$id_user = $item->user_id;
			$id_friend = $item->friend_id;
		}

		// извлекаю из базы значение "отправлял ли адресат сообщение пользователю когда либо"
		$friend_data1 = $this->db_module->view_friends1($friend_id, $user_id); 
		foreach ($friend_data1 as $item1) {
			$id_user1 = $item1->user_id;
			$id_friend1 = $item1->friend_id;
		}
		// если по запросам в базе ничего не вывелось
		if($id_user == '' && $id_friend == ''){	
			$lal = '1';	
			}

		if($id_user1 == '' && $id_friend1 == ''){	
			$lal1 = '1';	
			}

		// заносим в базу айди пользователя и адресата для дальнейшего извлечения сообщений
		if($lal == '1' && $lal1 == '1'){
		$this->db_module->friends_insert($friend_id, $user_id); 
		}

	}



}
?>