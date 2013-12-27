<?php
class db_module extends CI_Model {
		public function __construct() {
    	parent::__construct();
    	$active_group = "default";
$this->load->database("default");
	}


function get_user($login){
	   $query = $this->db->get_where('users', array('login' => $login));
	     return $query->result();
	}

function get_user_by_email($email){
	   $query = $this->db->get_where('users', array('mail' => $email));
	     return $query->result();
	}
function get_user_by_id($user_id){
	 $query = $this->db->get_where('users', array('user_id' => $user_id));
	     return $query->result();
}

function sel_user_ava($user_id){
	$this->db->select('avatar');
	$query = $this->db->get_where('users', array('user_id' => $user_id));
	     return $query->result();
}

function up_user_ava($user_id,$name_photo){
	$logged = $this->session->userdata('logged_in');
	$user_id=$this->session->userdata('user_id');
	$result='';
	if ($logged=TRUE) {
		$data = array(
     'avatar' => $name_photo,
   );

	$this->db->where('user_id', $user_id);
		$this->db->update('users',$data);
	$result='Фото загружено';

	header ("Location:". $this->config->site_url().'id'.$user_id); 
	} else {
		$result='Фото не загружено, прав нет(';

	}
	return $result;
			}


function get_podtvr() {
		$this->db->select('podtvr');
		$query = $this->db->get('users');
	    return $query->result();
}

function up_podtvr($user_id) {
 
	$logged = $this->session->userdata('logged_in');
	$result='';
	if ($logged=TRUE) {
		$data = array(
     'podtvr' => 'okay',
   );
		$this->db->where('user_id', $user_id);
		$this->db->update('users',$data);
		} else {
		$result=' Юзер Не подтвержден ';

	}
		return $result;
}
	 function registration()
    {


    	$user_login='';
    	$user_mail='';
    	if($_POST['famil']!='' && $_POST['name'] != ''){
    	$this->famil   = $_POST['famil'];
    	$this->name   = $_POST['name'];}
		$this->login   = $_POST['login']; // please read the below note
        $this->mail = $_POST['email'];
		$this->password = $_POST['pass'];
		$this->spec_user = $_POST['spec_user'];
		$this->avatar  = 'f04d67ae61e74e96a1e25f226c4379a7.jpeg';
		$this->date  = time();
		$data = $this->db_module->get_user($this->login);
		$data_mail = $this->db_module->get_user_by_email($this->mail);
		foreach ($data as $item){ 
			$user_login=$item->login;
		}
		foreach ($data_mail as $item){ 
			$user_mail=$item->mail;
		}
		//var_dump($this->password);
		// провеяем логин пароль и имейл на наличие недопустимых символов
		if ((preg_match('/^[a-z0-9_.]{3,20}$/',$this->login)) && (preg_match('/^[a-z0-9_.@-]{3,20}$/',$this->mail)) 
			&& (preg_match('/^[a-z0-9]{3,20}$/',$this->password)) ){

		if ($this->login != $user_login) {
    	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$randstring = '';
    		for ($i = 0; $i <= 10; $i++) {
        		$randstring.= $characters[rand(0, strlen($characters) -1)];
    		}
 		$this->podtvr = $randstring;
       		$this->db->insert('users', $this);


	} else {
	echo 'yzhe';
	}
}else{echo"xren";}
}


function send_user_photos($data) {
	$logged = $this->session->userdata('logged_in');
	$result='';
	if ($logged=TRUE) {
	$name='';
	foreach ($data as $key => $value) {
	if ($key == 'photo_data'){
	$photo_data=$value;
}	
	if ($key == 'user_id'){
	$user_id=$value;
}
if ($key == 'name_photo') {
	$name=$value;
}
if ($key == 'photos_name') {
	$photos_name=$value;
}
if ($key == 'min') {
	$min=$value;
}
if ($key == 'photos_date') {
	$photos_date=$value;
}
	}
		$this->id_user   =  $user_id;
		$this->min   =  $min;
        $this->url_photo = $name;
        $this->photos_name = $photos_name; 
        $this->photos_date = $photos_date;
		$query = $this->db->insert('photos', $this);
		$result='Фото загружено!';
		$user_id=$this->session->userdata('user_id');
	header ("Location:". $this->config->site_url().'id'.$user_id); 
		$user_id=$this->session->userdata('user_id');
		header ("Location:". $this->config->site_url().'id'.$user_id); 
	} else {
		$result='Ошибка загрузки';
	}
	return $result;
	}

function send_user_videos($data) {
	$logged = $this->session->userdata('logged_in');
	$result='';
	if ($logged=TRUE) {
	$video_name=$data['video_name'];
	$user_id=$data['user_id'];
	$kod=$data['kod'];
	$video_date = time();
		$this->id_user   =  $user_id;
        $this->video_name = $video_name; 
        $this->kod = $kod;
        $this->video_date = $video_date;
		$query = $this->db->insert('videos', $this);
		$result='Фото загружено!';
	header ("Location:". $this->config->site_url().'id'.$user_id); 

	} else {
		$result='Ошибка загрузки';
	}
	return $result;
	}

	function get_user_videos($url_id) {
		 $query = $this->db->get_where('videos', array('id_user' => $url_id));
	     return $query->result();
	}

	function get_user_photos($url_id) {
		 $query = $this->db->get_where('photos', array('id_user' => $url_id));
	     return $query->result();
	}
	function get_user_audios($url_id) {
		 $query = $this->db->get_where('audios', array('id_user' => $url_id));
	     return $query->result();
	}

	function get_num_user_photos($url_id) {
		 $query = $this->db->get_where('photos', array('id_user' => $url_id));
	     return $query->num_rows();
	}


	function send_new_albom($albom_name) {
		$logged = $this->session->userdata('logged_in');
		$result='';
		if ($logged=TRUE) {
		$this->albom_name = $albom_name;
		$this->user_id=$this->session->userdata('user_id');
		$query = $this->db->insert('albom', $this);
	    $result = 'Альбом создан';
	    } else {
	    	$result='Ошибка прав';
	    }
	    return $result;
	}

	function send_new_audio_albom($albom_name) {
		$logged = $this->session->userdata('logged_in');
		$result='';
		if ($logged=TRUE) {
		$this->albom_name = $albom_name;
		$this->user_id=$this->session->userdata('user_id');
		$query = $this->db->insert('audio_albom', $this);
	    $result = 'Альбом создан';
	    } else {
	    	$result='Ошибка прав';
	    }
	    return $result;
	}

	function get_albom_photos($url_id) {
		 $query = $this->db->get_where('albom', array('user_id' => $url_id));
	     return $query->result();
	}

	function get_albom_audios($url_id) {
		 $query = $this->db->get_where('audio_albom', array('user_id' => $url_id));
	     return $query->result();
	}
	function get_photos_by_id($photo_id) {
		 $query = $this->db->get_where('photos', array('id_photos' => $photo_id));
	     return $query->result();
	}

//добавление фото в альбом
function send_photo_from_albom($albom_id, $photo_id, $photos_name) {
			$logged = $this->session->userdata('logged_in');
		$result='';
		if ($logged=TRUE) {
		
		$this->db->where('id_photos', $photo_id);
		if (!empty($photos_name)) {
			$this->photos_name = $photos_name;
		} else {
			$this->id_albom = $albom_id;
		}
		$this->db->update('photos', $this);
		$result ='Фото добавлено в альбом';
		} else {
			$result='Ошибка прав';
		}

		return $result;
	    //return $query->result();
	}

	function send_audio_from_albom($albom_id, $audio_id, $audios_name) {
			$logged = $this->session->userdata('logged_in');
		$result='';
		if ($logged=TRUE) {
		
		$this->db->where('id_audios', $audio_id);
		if (!empty($audios_name)) {
			$this->audio_name = $audios_name;
		} else {
			$this->id_albom = $albom_id;
		}
		$this->db->update('audios', $this);
		$result ='Аудио добавлено в альбом';
		} else {
			$result='Ошибка прав';
		}

		return $result;
	    //return $query->result();
	}


//отображение фото в выбраном альбоме
function get_photo_from_albom($albom_id) {
		 $query = $this->db->get_where('photos', array('id_albom' => $albom_id));
	     return $query->result();


	    //return $query->result();
	}



///////////////




//обновл профиля
function send_profile($famil,$name,$otchestvo,$mail,$birthday, $spec_user, $sex, $education_level, $education_basic, $facultet, $education_end, $language, $sity, $telephone, $dop_telephone, $skype, $website, $interests,$fon) {
		$logged = $this->session->userdata('logged_in');
		$result='';
		if ($logged=TRUE) {
		$this->famil = $famil;
		$this->name  = $name;
		$this->otchestvo  = $otchestvo;
		$this->mail  = $mail;
		$this->birthday  = $birthday;
		$this->spec_user  = $spec_user;
		$this->sex  = $sex;
		$this->education_level  = $education_level;
		$this->education_basic  = $education_basic;
		$this->facultet  = $facultet;
		$this->education_end  = $education_end;
		$this->language  = $language;
		$thus->sity = $sity;
		$this->telephone = $telephone;
		$this->dop_telephone = $dop_telephone;
		$this->skype = $skype;
		$this->website = $website;
		$this->interests = $interests;
		$this->fon = $fon;
		$user_id = $this->session->userdata('user_id');
		$this->db->where('user_id', $user_id);
		$this->db->update('users', $this);
		$result='Профиль обновлен';
	}
		else {
			$result='Ошибка';
		}
		return $result;
	}

function send_message($id_photos, $messages, $user_id){
	$this->photos_id = $id_photos;
	$this->messages = $messages;
	$this->user_id = $user_id;
	$this->message_date  = time();
	$query = $this->db->insert('chat_photos', $this); 
	return $query;
}
function send_message_v($id_video, $messages, $user_id){
	$this->video_id = $id_video;
	$this->messages = $messages;
	$this->user_id = $user_id;
	$this->message_date  = time();
	$query = $this->db->insert('chat_videos', $this); 
	return $query;
}

function view_message($id_photos){
	//$query = $this->db->get_where('chat_photos', array('chat_photos.photos_id' => $id_photos));
	$this->db->select('*');
	$this->db->from('users','chat_photos');
	$this->db->join('chat_photos', 'chat_photos.user_id = users.user_id');
	$this->db->where('chat_photos.photos_id', $id_photos); 
	$query = $this->db->get();


	 return $query->result();
}
function view_message_vid($id_video){
	//$query = $this->db->get_where('chat_photos', array('chat_photos.photos_id' => $id_photos));
	$this->db->select('*');
	$this->db->from('users','chat_videos');
	$this->db->join('chat_videos', 'chat_videos.user_id = users.user_id');
	$this->db->where('chat_videos.video_id', $id_video); 
	$query = $this->db->get();


	 return $query->result();

}

function send_like($like_photos, $like_num){
	$this1->like_photos = $like_num;
	$this->db->where('id_photos', $like_photos);
	$this->db->update('photos', $this1);
	
}

function send_like_photos($like_photos){
		$this->user_id = $this->session->userdata('user_id');
		$this->photo_id = $like_photos;
		//$this->db->where('photo_id', $like_photos);
		$this->db->insert('like_photo', $this);

}

function view_like($like_photos){

	$query = $this->db->get_where('photos', array('id_photos' => $like_photos));
    return $query->result();

}

function view_like_user($like_photos, $user_id){
	$query = $this->db->get_where('like_photo', array('photo_id' => $like_photos, 'user_id' => $user_id));
    return $query->num_rows();
}

function dell_like($like_photos){
	$user_id = $this->session->userdata('user_id');
	$this->db->delete('like_photo', array('photo_id' => $like_photos, 'user_id'=>$user_id));
}

function dell_user($user_id){
	$user_id = $this->session->userdata('user_id');
	$this->db->delete('users', array('user_id' => $user_id));
}

function delete_photos($delete_photos){
	$user_id = $this->session->userdata('user_id');
	$this->db->delete('photos', array('id_photos' => $delete_photos));
}
function delete_video($delete_video){
	$user_id = $this->session->userdata('user_id');
	$this->db->delete('videos', array('id_videos' => $delete_video));
}

function delete_audio($delete_audio){
	$user_id = $this->session->userdata('user_id');
	$this->db->delete('audios', array('id_audios' => $delete_audio));
}

	function friends_insert($friend_id, $user_id){
	$this1->friend_id = $friend_id;
	$this1->user_id = $user_id;
	$this1->subscribe_date = time();
	$query = $this->db->insert('friends', $this1); 

}

function friends_view($user_id){
	$this->db->select('*');
	$this->db->from('users', 'friends');
	 $this->db->join('friends', 'users.user_id = friends.friend_id');
	 $this->db->where('friends.user_id', $user_id); 
	$this->db->or_where('friends.friend_id', $user_id);
	$query = $this->db->get();
	 return $query->result();
}


function get_users_by_id($user_id){
	$this->db->select('*');
	$this->db->from('users');
	$this->db->where_in('user_id', $user_id);
	$query = $this->db->get();

	 return $query->result();
}




function send_chat_friends($user_id, $friend_id, $messages){
	$this->user_id = $user_id;
	$this->adresat = $friend_id;
	$this->messages = $messages;
	$this->message_date  = time();
	$this->unread = 'unread';
	$query = $this->db->insert('chat_friends', $this); 
	//$query->free_result();
}

function get_unread($user_id){
	$query = $this->db->select('unread');
	$query = $this->db->from('chat_friends');
	$query = $this->db->where('adresat', $user_id);
	$query = $this->db->where('unread', 'unread');
	$query = $this->db->get();
	return $query->num_rows();

}

function get_all_unread($user_id){
	$query = $this->db->select('user_id, unread');
	$query = $this->db->from('chat_friends');
	$query = $this->db->where('adresat', $user_id);
	$query = $this->db->where('unread', 'unread');
	$query = $this->db->get();
	return $query->result();

}


function get_all_user_messages($user_id){
	$query = $this->db->select('user_id, unread, messages, adresat');
	$query = $this->db->from('chat_friends');
	$query = $this->db->where('adresat', $user_id);
	$query = $this->db->or_where('user_id', $user_id);
	$query = $this->db->get();
	return $query->result();

}

function dell_unread($user_id, $friend_id){
	$this->unread = 'read';
	$this->db->where('adresat', $user_id);
	$query = $this->db->where('user_id', $friend_id);
	$query = $this->db->where('unread', 'unread');
	$this->db->update('chat_friends', $this);
}



function view_friends($mass){
	$this->db->select('*');
	$this->db->from('friends');
	$this->db->where_in('user_id', $mass); 
	$this->db->where_in('friend_id', $mass);
	$query = $this->db->get();
	return $query->num_rows();

}



function view_friends1($friend_id, $user_id){

	$this->db->select('*');
	$this->db->from('friends');
	$this->db->where('friends.user_id', $friend_id); 
	$this->db->where('friends.friend_id', $user_id);
	$query = $this->db->get();
	return $query->result();
}

function view_friend_message($friend_id, $user_id){

	$this->db->select('*');
	$this->db->from('users','chat_friends');
	$this->db->join('chat_friends', 'chat_friends.user_id = users.user_id');
	$this->db->where('chat_friends.adresat', $friend_id); 
	$this->db->where('chat_friends.user_id', $user_id);

	$this->db->or_where('chat_friends.adresat', $user_id); 
	$this->db->where('chat_friends.user_id', $friend_id);
	$query = $this->db->get();


	 return $query->result();

}

function seach($mas, $birthday, $spec_user){
	$this->db->select('*');
	$this->db->from('users');
	if ($spec_user !== '') {
		$this->db->where_in('spec_user', $spec_user);
	}
	if($birthday !== ''){
		$this->db->where_in('birthday', $birthday);
	}
	if(count($mas) == 3){
	$this->db->where_in('name', $mas); 
	$this->db->where_in('famil', $mas);
	$this->db->where_in('otchestvo', $mas);
}

if(count($mas) == 2){
	$this->db->where_in('name', $mas); 
	$this->db->where_in('famil', $mas);	
}

	if(count($mas) == 1 && $mas['0'] !== ''){
	$this->db->where_in('name', $mas);
	$this->db->or_where_in('famil', $mas); 
	$this->db->or_where_in('otchestvo', $mas); 
}

	if(count($mas) > 3){
		$this->db->where_in('login', 'ррр');
}
	//$res = $this->db->count_all_results();
	//$this->db->limit(10);
	$query = $this->db->get();
	 return $query->result(); 
}


function last_activity($user_id){
	$this->lastactivity = time();
	$this->db->where('user_id', $user_id);
	$this->db->update('users', $this);
}

function get_last_activity($friend_id){
	$this->db->select('user_id, lastactivity');
	$query = $this->db->from('users');
	$this->db->where_in('user_id', $friend_id);
	$query = $this->db->get();
    return $query->result();

}


function pass_update($user_id, $new_pass){
	$this->password = $new_pass;
	$this->db->where('user_id', $user_id);
	$this->db->update('users', $this);

}

function friends_view_id($user_id){
	$this->db->select('*');
	$this->db->from('users');
	 $this->db->join('subscribe', 'subscribe.second_user = users.user_id');
	 $this->db->where('subscribe.user_id', $user_id); 
	//$this->db->or_where('friends.friend_id', $user_id);
	$query = $this->db->get();
	 return $query->result();
}



function view_news_photos($subscribe_users_id){
	$this->db->select('*');
	$query = $this->db->from('photos');
	$this->db->where_in('id_user', $subscribe_users_id);
	//$this->db->where_in('photos_date =', $subscribe_users_date);
	$query = $this->db->get();
    return $query->result();
}


function get_users_videos($subscribe_users_id) {
	$this->db->select('*');
	$query = $this->db->from('videos');
	//$this->db->join('photos', 'videos.id_user = photos.id_user');
	$this->db->where_in('id_user', $subscribe_users_id);
	$query = $this->db->get();
    return $query->result();

	}


function view_subscribe_users($user_id, $second_user){
	$this->db->select('*');
	$this->db->from('subscribe');
	$this->db->where('user_id', $user_id); 
	$this->db->where('second_user', $second_user);
	$query = $this->db->get();
	return $query->num_rows();

}

function subscribe_insert($second_user, $user_id){
	$this->second_user = $second_user;
	$this->user_id = $user_id;
	$this->subscribe_date = time();
	$query = $this->db->insert('subscribe', $this); 

}

function subscribe_view($user_id){
	$this->db->select('*');
	$this->db->from('users', 'subscribe');
	 $this->db->join('subscribe', 'users.user_id = subscribe.second_user');
	 $this->db->where('subscribe.user_id', $user_id); 
	$this->db->or_where('subscribe.second_user', $user_id);
	$query = $this->db->get();
	 return $query->result();
}

function subscribe_user($user_id, $url_id){
	$this->db->select('user_id,second_user');
	$this->db->from('subscribe');
	$this->db->where('subscribe.user_id', $user_id); 
	$this->db->where('subscribe.second_user', $url_id);
	$query = $this->db->get();
	 return $query->result();
}


function visit_insert($url_id, $guest_id, $session_id){
	$data = array('session_id' => $session_id, 'user_id' => $url_id, 'guest_id' => $guest_id, 'visit_date' => time());
	$query = $this->db->insert('visit', $data); 
}

function view_visit_num($user_id){
	$this->db->select('*');
	$this->db->from('visit');
	$this->db->where('user_id', $user_id); 
	$query = $this->db->get();
	return $query->result();

}


function dell_subscribe($user_id, $second_user){
	$this->db->delete('subscribe', array('user_id' => $user_id, 'second_user'=>$second_user));
}

function view_like_kol($url_id){
	$query = $this->db->get_where('like_photo', array('user_id' => $url_id));
	return $query->num_rows();
}

function upload_audio($user_id, $url_audio, $audios_name){
	$this->id_user = $user_id;
	$this->url_audio = $url_audio;
	$this->audio_name = $audios_name;
	$this->audio_date  = time();
	$query = $this->db->insert('audios', $this); 

}


	}
	   ?>