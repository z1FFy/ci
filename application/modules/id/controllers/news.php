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
		$user_data = $this->db_module->get_user_by_id($url_id);$acc_user = $this->db_module->get_acc_by_id($user_id);//выводим про 
		$contacts_not_pod = $this->db_module->get_contacts_not_pod($user_id);
		$subscribe_users_id='';
		$second_user='';
		$i=0;
		$limit = 10;
		$offset = 0;
		$subscribe_users_data = $this->db_module->friends_view_id($user_id); //извлекаем все подписи с id пользователя
		foreach ($subscribe_users_data as $item) {							  // заносим в $subscribe_users_id id всех с кем подписаны 
			$subscribe_users_id = $subscribe_users_id.','.$item->second_user;
			//$subscribe_date[$i] = $item->subscribe_date;
		}
		$news_photos_data='';
		if($news_photos_data !=''){
		$news_photos_data = $this->db_module->view_news_photos(trim($subscribe_users_id, ','), $limit,$offset);}	// извлекаем все фотки подписаных лузеров
		$friend_id = '';
		$friends_data = $this->db_module->subscribe_view($user_id);
		foreach ($friends_data as $item) {
		if($item->second_user == $user_id){
		$second_user[$i] = $item->user_id;
		}else{
		$second_user[$i] = $item->second_user;
		}
		$i++;
}
		$friends_data_friend = $this->db_module->get_users_by_id($second_user);
		$user_data_arr = array('contacts_not_pod'=> $contacts_not_pod, 'user_data' => $user_data,'acc_data' => $acc_user, 'friends_data_friend' => $friends_data_friend, 'whopage' => $whopage,'url_id' => $url_id,'logged' => $logged, 'unread' => $unread, 'news_photos_data' => $news_photos_data, 'subscribe_users_data' => $subscribe_users_data);
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

function news_photo(){
	$limit = $_POST['count'];
	$offset = $_POST['begin'];
	//var_dump($limit);


$user_id=$this->session->userdata('user_id');
$i=0;	$news_photos_data='';
		$subscribe_users_id='';
		$second_user='';
		$subscribe_users_data = $this->db_module->friends_view_id($user_id); //извлекаем все подписи с id пользователя
		foreach ($subscribe_users_data as $item) {							  // заносим в $subscribe_users_id id всех с кем подписаны 
			$subscribe_users_id = $subscribe_users_id.','.$item->second_user;
			//$subscribe_date[$i] = $item->subscribe_date;
			$i++;
		}
		//var_dump($subscribe_users_id);
		if($news_photos_data !=''){
	$news_photos_data = $this->db_module->view_news_photos(trim($subscribe_users_id, ','), $limit,$offset);	// извлекаем все фотки подписаных лузеров	
 	
 foreach ($news_photos_data as $item) { //в переменные заносим все нужные данные для вложенного форича
    $url_photo = $item->url_photo;
    $name_photo = $item->photos_name;
    $photos_date = $item->photos_date;
    $id_photos = $item->id_photos;
    $id_user = $item->id_user;
    $i=0;        
            // что бы вложенный форич не выкладывал несколько раз одну и ту же фотку
    foreach ($subscribe_users_data as $item) {
      if($i==0){
          if($item->second_user == $id_user){
            if($photos_date >= $item->subscribe_date ){ // если дата добавления фотки больше даты создания подписи эхаем все говно
                if($item->name == ''){
                $name = $item->login;
                }else{
                  $name = $item->name.' '.$item->famil;
                }
                 if(stristr($url_photo, '.') === FALSE) {
                echo '<div class="block">';
                echo '<a href="'.$this->config->site_url().'id'.$id_user.'">'.htmlspecialchars($name, ENT_QUOTES).'</a><div style="margin-top:-18px" class="date_msg">'.date("d.m.y H:i:s" ,htmlspecialchars($photos_date, ENT_QUOTES)).'</div>';
                echo '<div><iframe width="100%" height="400" src="//www.youtube.com/embed/'.$url_photo.'" frameborder="0" allowfullscreen></iframe>
                <div>'.$text = htmlspecialchars($name_photo, ENT_QUOTES).'</div></div></div><br>';
                 }else{
                echo '<div class="block" >';
                echo '<a href="'.$this->config->site_url().'id'.$id_user.'">'.htmlspecialchars($name, ENT_QUOTES).'  </a><div style="margin-top:-18px" class="date_msg">'.date("d.m.y H:i:s" ,htmlspecialchars($photos_date, ENT_QUOTES)).'</div>';
                echo '<img width="400" src="'.$this->config->site_url().'uploads/photos/'.$url_photo.'"/">';
                echo '</div><br>';}
                $i++;
            } 
          }
        
      }
      
    }


   }

}


}


function news_create(){
				$url_id = $_GET['url_id'];
				$photo_data = $this->db_module->get_user_photos($url_id);
				$video_data = $this->db_module->get_user_videos($url_id);
				$data = array('photo_data' => $photo_data,'video_data' => $video_data, 'url_id' => $url_id );
				$this->load->view('news_create', $data);
				

}

function send_create_news(){
	$messages=$_POST['messages'];
	$url_id=$_POST['url_id'];
	$url=$_POST['url'];
	$this->db_module->news_insert($url_id, $url, $messages);
}

	
// 	function test() {
// $i=0;
// 	$subscribe_users_id='';
// 		$second_user='';
// 		$user_id='3';
// $friends_data = $this->db_module->subscribe_view($user_id);
// 		foreach ($friends_data as $item) {
// 		if($item->second_user == $user_id){
// 		$second_user[$i] = $item->user_id;
// 		}else{
// 		$second_user[$i] = $item->second_user;
// 		}
// 		$i++;
// }		
// $row_count = $this->db_module->get_count_photos($second_user);
// //$this->load->library('pagination');
// $config['base_url'] = $this->config->site_url().'id/news/test/';
// $config['total_rows'] = $row_count-1;
// $config['per_page'] = 1;
// $config['uri_segment'] = 4;
// $config['num_links'] = 2;
// $config['next_link'] = '>>';
// $offset= preg_replace("/[^0-9]/", '', $this->uri->segment(4));
// var_dump($config['uri_segment']);
// $this->pagination->initialize($config); 
// 	//$data = $this->db_module->view_test($config['per_page'], $offset);

// //ar_dump($second_user);
// 	$mass = '3';
// 	$data1 = $this->db_module->view_test1($second_user, $config['per_page'], $offset);
// 	$data_arr = array('data1' => $data1);
// 	$this->load->view('test', $data_arr);	
// 	}



}
?>