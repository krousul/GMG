<?php 
	include_once URL_APP . 'conex.php';
	
	class Login
	{
		private $db_connection = null;
		public $errors = array();
		public $messages = array();
	
		public function __construct(){

			session_start();
	
			if (isset($_GET["logout"])) {
				$this->doLogout();
			} elseif (isset($_GET["expire"])) {
				$this->doExpire();
			} elseif (isset($_POST["login"])) {
				$this->dologinWithPostData();
			}
		}
	
		private function dologinWithPostData(){
			
			if (empty($_POST['user_name'])) {
				$this->errors[] = "El campo usuario esta vacio.";
			} elseif (empty($_POST['user_password'])) {
				$this->errors[] = "El campo Contrase&ntilde;a esta vacio.";
			} elseif (!empty($_POST['user_name']) && !empty($_POST['user_password'])) {
	
				$this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	
				if (!$this->db_connection->set_charset("utf8")) {
					$this->errors[] = $this->db_connection->error;
				}
	
				if (!$this->db_connection->connect_errno) {
	
					$user_name = $this->db_connection->real_escape_string($_POST['user_name']);
	
					$sql = "SELECT id_users, user_name, firstname, user_email, user_password_hash
                       		 FROM users
                        		WHERE user_name = '" . $user_name . "' OR user_email = '" . $user_name . "';";
					$result = $this->db_connection->query($sql);
	
					if ($result->num_rows == 1) {
	
						$result_row = $result->fetch_object();
	
 						if (password_verify($_POST['user_password'], $result_row->user_password_hash)) {
	
							$_SESSION['id_users'] = $result_row->id_users;
							$_SESSION['firstname'] = $result_row->firstname;
							$_SESSION['user_name'] = $result_row->user_name;
							$_SESSION['user_email'] = $result_row->user_email;
							$_SESSION['user_login_status'] = 1;
	
 						} else {
 							$this->errors[] = "Usuario y/o contrase&ntilde;a no coinciden.";
						}
					} else {
						$this->errors[] = "Usuario y/o contrase&ntilde;a no coinciden.";
					}
				} else {
					$this->errors[] = "Problema de conexi&oacute;n de base de datos.";
				}
			}
		}
	
		/**
		 * perform the logout
		 */
		public function doLogout()
		{
			$_SESSION = array();
			session_unset();
			session_destroy();
			$this->messages[] = "Has sido desconectado.";	
		}
	
		/**
		 * perform the logout and return cpanel login 
		 */
		public function starCpanel()
		{
			$_SESSION = array();
			session_unset();
			session_destroy();
		}
		
		/**
		 * session expire
		 */
		public function doExpire()
		{
			$_SESSION = array();
			session_unset();
			session_destroy();
			$this->messages[] = "Tu sesi&oacute;n a Expirado.";	
		}

		/**
		 * simply return the current state of the user's login
		 * @return boolean user's login status
		 */
		public function isUserLoggedIn()
		{
			if (isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] == 1) {
				return true;
			}
			return false;
		}
	}
?>