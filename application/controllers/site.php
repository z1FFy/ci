<?php
 








class Site extends CI_Controller {

	public function __construct() {
    	parent::__construct();
    	$this->load->library('session');
    	$this->load->model('db_module');
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
		$user_id='';
		if ($logged == TRUE) {
		 	$user_id=$this->session->userdata('user_id');
		 }
		$title='PortfoliOnline DEV / BETA';
		// $page_content = $this->load->view('welcome_message', '', true);
		$page = array(
       'title' => $title,
       // 'page_content' => $page_content,
       'logged' => $logged,
       'user_id' => $user_id
       );
		$this->load->view('welcome_message2',$page);
	}

	function reg() {
		$title='Регистрация';
		$logged = $this->session->userdata('logged_in');
		$user_id='';
		if ($logged == TRUE) {
		 	$user_id=$this->session->userdata('user_id');
		 }
		$page = array(
           'title' => $title,
           'logged' => $logged,
           'user_id' => $user_id
         );
		$this->load->view('reg',$page);	
	}
	function licension () {
		$this->load->view('licension');
	}
	function sendreg() {
		if (!empty($_POST)){
		$this->db_module->registration();
		} else {
			header ("Location:". $this->config->site_url());
		}
	}
	
		function reg_sucess () {
	// 	$title='Вход : PortfoliOnline';
	// 			$logged = $this->session->userdata('logged_in');
	// $page_content = $this->load->view('reg_sucess', '', true);
	// $page = array(
 //           'title' => $title,
 //           'page_content' => $page_content
 //                     , 'logged' => $logged);
			if (isset($_GET['login'])) {
					$login = $_GET['login'];
		$user_data = $this->db_module->get_user($login);
		foreach ($user_data as $item) {
			$email_to = $item->mail;
			$name_to = $item->login;
			$body = $item->podtvr;
			$user_id = $item->user_id;
			$pass = $item->password;
			$acc=$item->account;
			
		}
		$name_from = 'PortfoliOnline.ru';
		$email_from = 'support@portfolionline.ru';
		//$name_to = 'Получатель';
		//$email_to = 'tailz440@mail.ru';
		$data_charset = 'UTF-8';
		$send_charset = "CP1251";
		$subject = "PortfoliOnline.ru / Подтверждение регистрации";
		

		$regmail_data = array(
						'name_from' => $name_from, // имя отправителя
                        'email_from' => $email_from, // email отправителя
                        'name_to' => $name_to, // имя получателя
                        'email_to' => $email_to, // email получателя
                        'data_charset' => $data_charset, // кодировка переданных данных
                        'send_charset' => $send_charset, // кодировка письма
                        'subject' => $subject, // тема письма
                        'body' => $body, // текст письма
                        'user_id' => $user_id,
                        'pass' => $pass,
                        'login' => $login,
			);


		$this->load->view('reg_sucess', $regmail_data);
		// if ($acc == 'pra') {
		// 		header ("Location:". $this->config->site_url().'id'.$user_id.'/pay');	
		// } 
	} else {
		echo "You not a reg";
	}
	}

	function entry() {
		if (!empty($_POST) || !empty($_GET)){
			if (!empty($_POST)){
			$login = $_POST['login'];
			$pass  = $_POST['pass'];
			}
			if (!empty($_GET)){
			$login = $_GET['login'];
			$pass  = $_GET['pass'];
			}



		$user_id='';
		$pass_db = '';
		$allow='';

        $data = $this->db_module->get_user($login);

		foreach ($data as $item){ 
			$user_id=$item->user_id;
			$pass_db = $item->password;
		}
		if ((preg_match('/^[a-zA-Z0-9_]{3,20}$/',$login)) && (preg_match('/^[a-zA-Z0-9]{3,20}$/',$pass))){
			if ($pass == $pass_db){
				$newdata = array('logged_in' => TRUE, 'user_id' => $user_id);
				$this->session->set_userdata($newdata);
			} else {
	 			$allow= "no_pass";
	 		} 
		} else {
			$allow= "no_pass";
		}
				if ($user_id=='') {
					$allow= "no_pass";
				}
		echo $allow;
		if (!empty($_GET)){
			header ("Location:". $this->config->site_url().'id'.$this->session->userdata('user_id'));	
		}
		} else {
			header ("Location:". $this->config->site_url());
		}
	}

	function lose_pass() {
			if (isset($_GET['send'])) {
				$email=$_GET['email'];
				$user_data = $this->db_module->get_user_by_email($email);
				$u_mail='';
				$pass='';
				foreach ($user_data as $item) {
					$pass=$item->password;
					$u_mail=$item->mail;
					$login =$item->login;
				}
				if ($email==$u_mail) {
				$data = array('pass' => $pass ,'email' => $email, 'login'=>$login);
					if ($email=='') {
				echo '    <meta charset="utf-8">Вы не ввели Email';

			} else {
				$this->load->view('lose_pass', $data);
			}
			} else {
				echo '    <meta charset="utf-8">Пользователь с таким email не найден';
			}
		
			} else {
				$this->load->view('lose_pass');
			}

	}
	
	function vyhod() {
		$this->session->sess_destroy();
		header ("Location:". $this->config->site_url());
		}
}

?>