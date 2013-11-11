<?php
class db_module extends CI_Model {
function connect(){
$config['hostname'] = "localhost";
	$config['username'] = "root";
	$config['password'] = "";
	$config['database'] = "ci_base";
	$config['dbdriver'] = "mysql";
	$config['dbprefix'] = "";
	$config['pconnect'] = FALSE;
	$config['db_debug'] = TRUE;
	$config['cache_on'] = FALSE;
	$config['cachedir'] = "";
	$config['char_set'] = "utf8";
	$config['dbcollat'] = "utf8_general_ci";

$this->load->database($config);
}
function get_user($login){
	   $query = $this->db->get_where('users', array('login' => $login));
	     return $query->result();
	}
function get_user_by_id($user_id){
	 $query = $this->db->get_where('users', array('user_id' => $user_id));
	     return $query->result();
}
	 function regisrtation()
    {
    	$user_login='';
		$this->login   = $_POST['login']; // please read the below note
        $this->mail = $_POST['email'];
		$this->password = $_POST['pass'];
		$this->date  = date("m.d.y");
		$data = $this->db_module->get_user($this->login);
		
		foreach ($data as $item){ 
			$user_login=$item->login;
				$user_mail=$item->mail;
		}

		if ($this->login != $user_login || $this->mail != $user_mail) {
        $this->db->insert('users', $this);
    }
	else {
	echo 'yzhe';
	}
	
}
	   }
	   ?>