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
		private function _get_whopage($url_id,$user_id) {
		$whopage='none';
			if ($user_id == $url_id) {
				$whopage='my';
			}
			return $whopage;
	}

	function index() {	
			$friend_id = preg_replace("/[^0-9]/", '', $this->uri->segment(2));
		var_dump($friend_id);
		$user_id=$this->session->userdata('user_id');
		$messages_data = $this->db_module->view_friend_message($friend_id, $user_id);
$row_count = $messages_data;
$config['base_url'] = $this->config->site_url().'id'.$user_id.'/friends'.$friend_id.'/index/';
$config['total_rows'] = $row_count-1;
$config['per_page'] = 2; // кол-во фоток на 1 странице
$config['uri_segment'] = 4;
$config['num_links'] = 2;
$config['next_link'] = '>>';
$offset= preg_replace("/[^0-9]/", '', $this->uri->segment(4));
//var_dump($config['uri_segment']);
var_dump($this->uri->segment(4));
$this->pagination->initialize($config); 

$messages_data = $this->db_module->view_friend_message1($friend_id, $user_id, $config['per_page'], $offset);

		$this->db_module->dell_unread($user_id, $friend_id);
		$url_id= $this->_get_url_id();
		$whopage= $this->_get_whopage($url_id,$user_id);
		$logged = $this->session->userdata('logged_in');
		$user_data = $this->db_module->get_user_by_id($user_id);
		$this->db_module->dell_unread($user_id, $friend_id);
		$messages_data_arr = array( 'messages_data' => $messages_data ,'user_data' => $user_data, 'whopage' => $whopage,'url_id' => $url_id ,'logged' => $logged);
 		$page_content = $this->load->view('chat_friends_form',$messages_data_arr,true);
		$title= 'Сообщения / PortfolioOnline';
		$logged = $this->session->userdata('logged_in');
		$user_id='';
		if ($logged == TRUE) {
		 	$user_id=$this->session->userdata('user_id');
		 }
		$page = array(
           'title' => $title,
           'page_content' => $page_content,
           'logged' => $logged,
           'user_id' => $user_id
         );
		$this->load->view('template',$page);


	}
function friends_view()
{
	$logged = $this->session->userdata('logged_in');
	if ($logged == TRUE) {
$i=0;
$user_id=$this->session->userdata('user_id');
$url_id= $this->_get_url_id();
$whopage= $this->_get_whopage($url_id,$user_id);
$user_data = $this->db_module->get_user_by_id($user_id);
$friend_id = '';
$friends_data = $this->db_module->friends_view($user_id);
foreach ($friends_data as $item) {
//var_dump($item);

if($item->friend_id == $user_id){
$friend_id[$i] = $item->user_id;
}else{
$friend_id[$i] = $item->friend_id;
}
$i++;

}

$last_activity =$this->db_module->get_last_activity($friend_id); 
$unread_data = $this->db_module->get_all_unread($user_id);
$mess_data = $this->db_module->get_all_user_messages($user_id);
$friends_data_friend = $this->db_module->get_users_by_id($friend_id);
$unread = $this->db_module->get_unread($url_id);
$friends_data_arr = array('friends_data_friend' => $friends_data_friend, 'user_data' => $user_data, 'url_id' => $url_id, 'whopage' => $whopage , 'logged' => $logged, 'unread' => $unread, 'unread_data' => $unread_data, 'last_activity' => $last_activity, 'mess_data' => $mess_data);

$page_content = $this->load->view('friends_view_form',$friends_data_arr,true);
$title= 'Сообщения / PortfolioOnline';

$user_id='';

$user_id=$this->session->userdata('user_id');

$page = array(
'title' => $title,
'page_content' => $page_content,
'logged' => $logged,
'user_id' => $user_id,
);
$this->load->view('template',$page);
} else {
				header ("Location:". $this->config->site_url());
}
}





	function chat_friends()
		{
				$logged = $this->session->userdata('logged_in');
	if ($logged == TRUE) {

			$this->load->view('chat_friends_form');	
} else {
				header ("Location:". $this->config->site_url());
}
		}

	function send_friends_messages(){
						$logged = $this->session->userdata('logged_in');
			if ($logged == TRUE) {
		$messages = $_POST['messages'];
		$friend_id = $_POST['friend_id'];
		$user_id=$this->session->userdata('user_id');
		$user_data = $this->db_module->get_user_by_id($user_id); 
		foreach ($user_data as $item) {
			$avatar = $item->avatar;
		}
		$this->db_module->send_chat_friends($user_id, $friend_id, $messages, $avatar);
		$mass = array('0' => $user_id, '1' => $friend_id);
		$friend_data = $this->db_module->view_friends($mass); 
		if($friend_data != '1'){
		$this->db_module->friends_insert($friend_id, $user_id);
		
		}

		} else {
				header ("Location:". $this->config->site_url());
}
		// // извлекаю из базы значение "отправлял ли пользователь сообщение этому адресату когда либо"
		// $friend_data = $this->db_module->view_friends($friend_id, $user_id); 
		// foreach ($friend_data as $item) {
			
		// 	$id_user = $item->user_id;
		// 	$id_friend = $item->friend_id;
		// }

		// // извлекаю из базы значение "отправлял ли адресат сообщение пользователю когда либо"
		// $friend_data1 = $this->db_module->view_friends1($friend_id, $user_id); 
		// foreach ($friend_data1 as $item1) {
		// 	$id_user1 = $item1->user_id;
		// 	$id_friend1 = $item1->friend_id;
		// }
		// // если по запросам в базе ничего не вывелось
		// if($id_user == '' && $id_friend == ''){	
		// 	$lal = '1';	
		// 	}

		// if($id_user1 == '' && $id_friend1 == ''){	
		// 	$lal1 = '1';	
		// 	}

		// // заносим в базу айди пользователя и адресата для дальнейшего извлечения сообщений
		// if($lal == '1' && $lal1 == '1'){
		// $this->db_module->friends_insert($friend_id, $user_id); 
		// }

	}


	function subscribe(){
						$logged = $this->session->userdata('logged_in');
		if ($logged == TRUE) {
		$second_user = $_GET['friend_id'];
		$user_id=$this->session->userdata('user_id');
		//$mass = array('0' => $user_id, '1' => $second_user);
		//$friend_data = $this->db_module->view_friends($mass); 
		// $subscribe_data = $this->db_module->view_subscribe_users($user_id, $second_user); 
		// //заносим в базу айди пользователя и адресата для дальнейшего извлечения сообщений
		// //var_dump($subscribe_data);
		// if($subscribe_data != '1'){
		$this->db_module->subscribe_insert($second_user, $user_id);
		header ("Location:". $this->config->site_url().'id'.$second_user); 
		// }else{
		// 	echo 'Уже подписан';
		// }

			} else {
				header ("Location:". $this->config->site_url());
			}

	}


function dell_subscribe(){
		$logged = $this->session->userdata('logged_in');
		$second_user = $_GET['friend_id'];
		$user_id=$this->session->userdata('user_id');
		$subscribe_data = $this->db_module->dell_subscribe($user_id, $second_user); 
		header ("Location:". $this->config->site_url().'id'.$second_user); 


}





}
?>