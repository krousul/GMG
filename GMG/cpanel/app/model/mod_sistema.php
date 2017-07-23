<?php
	require_once URL_MODEL."SaveDate.php";

	class users extends SaveDate {
		public $firstname = array('string', null, array('label' => '', 'allowNull'));
		public $lastname = array('string', null, array('label' => '', 'allowNull'));
		public $user_name = array('string', null, array('label' => '', 'allowNull'));
		public $user_email = array('string', null, array('label' => '', 'allowNull'));
		public $user_password = array('string', null, array('label' => '', 'allowNull'));
		public $date_added = array('string', null, array('label' => '', 'allowNull'));
		
		public function getProyecto($id = 0){
			$sQuery = "SELECT * FROM proyectos";
				if($id > 0)
					$sQuery .= " WHERE id_proyectos = {$id}";
			$sResult = self::$db->query($sQuery);
		
			if($sResult->rowCount() > 0) 
				return $sResult->fetchAll(PDO::FETCH_ASSOC);
			else 
				return false;
		}
		
		public function getMail($user, $mail){
			
			$sQuery = "SELECT * FROM users WHERE user_name = '{$user}' OR user_email = '{$mail}';";
			$sResult = self::$db->query($sQuery);

			return $sResult->fetchAll(PDO::FETCH_ASSOC);;
			if($sResult->rowCount() > 0)
				return true;
			else
				return false;
		}
		
		public function saveUsuario($firstname,$lastname,$user_name,$user_password_hash,$user_email,$date_added){
			$this->firstname = $firstname;
			$this->lastname = $lastname;
			$this->user_name = $user_name;
			$this->user_password = $user_password_hash;
			$this->user_email = $user_email;
			$this->date_added = $date_added;
			
			$saveSuccesfull = $this->save();
			
			if($saveSuccesfull)
				return true;
			else
				return false;
		}
	}
?>