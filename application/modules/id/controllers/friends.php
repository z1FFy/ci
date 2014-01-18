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

		$user_id=$this->session->userdata('user_id');
		$messages_data = $this->db_module->view_friend_message($friend_id, $user_id);
$row_count = $messages_data;

$config['base_url'] = $this->config->site_url().'id'.$user_id.'/friends'.$friend_id.'/index/';
$config['total_rows'] = $row_count;
$config['per_page'] = 10; // кол-во фоток на 1 странице
$config['uri_segment'] = 4;
$config['num_links'] = 2;
$config['next_link'] = '>>';
$offset= preg_replace("/[^0-9]/", '', $this->uri->segment(4));
//var_dump($config['uri_segment']);

$this->pagination->initialize($config); 

$messages_data = $this->db_module->view_friend_message1($friend_id, $user_id, $config['per_page'], $offset);

		$this->db_module->dell_unread($user_id, $friend_id);
		$url_id= $this->_get_url_id();
		$whopage= $this->_get_whopage($url_id,$user_id);
		$logged = $this->session->userdata('logged_in');
		$user_data = $this->db_module->get_user_by_id($user_id);
		$this->db_module->dell_unread($user_id, $friend_id);
		$acc_user = $this->db_module->get_acc_by_id($user_id);//выводим про 
		$messages_data_arr = array( 'messages_data' => $messages_data ,'user_data' => $user_data,'acc_data' => $acc_user, 'whopage' => $whopage,'url_id' => $url_id ,'logged' => $logged);
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
$acc_user = $this->db_module->get_acc_by_id($user_id);//выводим про 
$friends_data_arr = array('friends_data_friend' => $friends_data_friend, 'user_data' => $user_data,'acc_data' => $acc_user, 'url_id' => $url_id, 'whopage' => $whopage , 'logged' => $logged, 'unread' => $unread, 'unread_data' => $unread_data, 'last_activity' => $last_activity, 'mess_data' => $mess_data);

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
//мои контакты
function contacts_send(){
$logged = $this->session->userdata('logged_in');
		if ($logged == TRUE) {
			$second_user = $_GET['contacts_id'];
			$user_id=$this->session->userdata('user_id');
			$this->db_module->contacts_insert($user_id, $second_user);
			header ("Location:". $this->config->site_url().'id'.$user_id);
		}else {
			header ("Location:". $this->config->site_url());
		}

}

function contacts_podtvr(){
	$first_user=$_GET['first_user'];
	$second_user=$_GET['second_user'];
	$this->db_module->contacts_podtvr($first_user, $second_user);
	header ("Location:". $this->config->site_url().'id'.$first_user.'/friends/contacts');
}

function contacts(){

$logged = $this->session->userdata('logged_in');
	if ($logged == TRUE) {
$i=0;
$user_id=$this->session->userdata('user_id');
$this ->db_module->last_activity($user_id);
$url_id= $this->_get_url_id();
$whopage= $this->_get_whopage($url_id,$user_id);
$user_data = $this->db_module->get_user_by_id($user_id);
$unread_data = $this->db_module->get_all_unread($user_id);
$unread = $this->db_module->get_unread($url_id);
$acc_user = $this->db_module->get_acc_by_id($user_id);//выводим про 
//$contacts_not_pod = $this->db_module->get_contacts_not_pod($user_id);
$contacts_pod = $this->db_module->get_contacts_pod($user_id);

$contacts_data_arr = array('user_data' => $user_data,'acc_data' => $acc_user, 'url_id' => $url_id, 'whopage' => $whopage , 'logged' => $logged, 'unread' => $unread, 'unread_data' => $unread_data,'contacts_pod'=> $contacts_pod);

$page_content = $this->load->view('contacts',$contacts_data_arr,true);
$title= 'Мои Контакты / PortfolioOnline';

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

function contacts_not_pod(){

$logged = $this->session->userdata('logged_in');


$user_id=$_POST['contacts'];

$contacts_not_pod = $this->db_module->get_contacts_not_pod($user_id);

foreach ($contacts_not_pod as $item) {
		if($item->name == ''){
			$name = $item->login;	
		}else{
			$name=$item->name.' '.$item->famil;
		}
		echo '<img src="'.$this->config->site_url().'uploads/avatars/small/'.$item->avatar.'" width="50"/>';
		echo '<a href="'.$this->config->site_url().'id'.$item->second_user.'/friends/contacts_podtvr?first_user='.$item->second_user.'&second_user='.$item->first_user.'">Подтвердить добавление</a>';
		# code...
	}


}

function contacts_pod(){

$logged = $this->session->userdata('logged_in');


$user_id=$_POST['contacts'];
//$contacts_not_pod = $this->db_module->get_contacts_not_pod($user_id);
$contacts_pod = $this->db_module->get_contacts_pod($user_id);

if(count($contacts_pod) != 0){
	foreach ($contacts_pod as $item) {
		$t = time() - $item->lastactivity;
			if($t > 300){
				$last_activity = '<font style="color: red;" >offline</font>';
			}else{
				$last_activity = '<font style="color: rgb(66, 177, 106);" >online</font>';
			}



		if($item->name == ''){
			$name = $item->login;	
		}else{
			$name=$item->name.' '.$item->famil;
		}
		echo '<p><table width="100%"><hr> <tr align="center" valign="top">';
		echo '<td><a href="'.$this->config->site_url().'id'.$item->second_user.'"><img src="'.$this->config->site_url().'uploads/avatars/small/'.$item->avatar.'" width="100"/></a></td>';
		echo '<td><a href="'.$this->config->site_url().'id'.$item->second_user.'">'.$name.'</a>
		<br>'.$last_activity.'</td>';
		echo '<td><a href="'.$this->config->site_url().'id'.$item->first_user,'/friends'.$item->second_user.'">Переписка</a><br>
		<a href="'.$this->config->site_url().'id'.$item->first_user,'/friends/contacts_delete?second_user='.$item->second_user.'">Удалить контакт</a></td>';
		echo '</tr></table></p>';
		# code...
	}
}else{
		echo 'У вас пока нет ни одного контакта!';
	}


}


function contacts_delete(){
	$first_user = $this->session->userdata('user_id');
	$second_user = $_GET['second_user'];
	$this->db_module->contacts_delete($first_user, $second_user);
	header ("Location:". $this->config->site_url().'id'.$first_user.'/friends/contacts');
}




}
?>