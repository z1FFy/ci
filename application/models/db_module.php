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
		$data = array(
     'avatar' => $name_photo,
   );

	$this->db->where('user_id', $user_id);
		$this->db->update('users',$data);
	//     echo $query->result();
	}

function get_podtvr() {
		$this->db->select('podtvr');
		$query = $this->db->get('users');
	    return $query->result();
}
	 function registration()
    {


    	$user_login='';
    	$user_mail='';
		$this->login   = $_POST['login']; // please read the below note
        $this->mail = $_POST['email'];
		$this->password = $_POST['pass'];
		$this->famil = $_POST['famil'];
		$this->name = $_POST['name'];
		$this->otchestvo = $_POST['pass'];
		$this->birthday = $_POST['birthday'];
		$this->avatar = $_POST['avatar'];
		$this->spec_user = $_POST['spec_user'];
		$this->date  = date("m.d.y");
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

		if ($this->login != $user_login && $this->mail != $user_mail) {
       		$this->db->insert('users', $this);
    	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$randstring = '';
    		for ($i = 0; $i <= 10; $i++) {
        		$randstring.= $characters[rand(0, strlen($characters) -1)];
    		}
 		echo $randstring;

	} else {
	echo 'yzhe';
	}
}else{echo"xren";}
}


function send_user_photos($data) {
	$name='';
	foreach ($data as $key => $value) {
	if ($key == 'user_id'){
	$user_id=$value;
}
if ($key == 'name_photo') {
	$name=$value;
}
	}
		$this->id_user   =  $user_id;
        $this->url_photo = $name; 
		$query = $this->db->insert('photos', $this);
	    //return $query->result();
	}


	function get_user_photos($url_id) {
		 $query = $this->db->get_where('photos', array('id_user' => $url_id));
	     return $query->result();
	}


	function send_new_albom($albom_name) {
		$this->albom_name = $albom_name;
		$this->user_id=$this->session->userdata('user_id');
		$query = $this->db->insert('albom', $this);
	    //return $query->result();
	}

	function get_albom_photos($url_id) {
		 $query = $this->db->get_where('albom', array('user_id' => $url_id));
	     return $query->result();
	}

//добавление фото в альбом
function send_photo_from_albom($albom_id, $photo_id) {
		$this->id_albom = $albom_id;
		//$this->photo_id = $photo_id;
		//var_dump($this->albom_id);
		//var_dump($photo_id);

		$this->db->where('id_photos', $photo_id);
		$this->db->update('photos', $this);



	    //return $query->result();
	}
//отображение фото в выбраном альбоме
function get_photo_from_albom($albom_id) {
		 $query = $this->db->get_where('photos', array('id_albom' => $albom_id));
	     return $query->result();



	    //return $query->result();
	}



	}
	   ?>