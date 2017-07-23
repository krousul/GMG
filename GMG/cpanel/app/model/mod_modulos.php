<?php
	require_once URL_MODEL."SaveDate.php";
	
	class Modulos extends SaveDate {
		public $nom_modulo = array('string', 'dos', array('label' => '', 'allowNull'));
		public $cod_modulo = array('string', 'dos', array('label' => '', 'allowNull'));
		public $id_rama = array('integer', null, array('allowNull' => true));
		
		public function getModulos(){
			
			$sQuery = "SELECT * FROM modulos";
			$sResult = self::$db->query($sQuery);
		
			if($sResult->rowCount() > 0) return $sResult->fetchAll(PDO::FETCH_ASSOC);
		}
		
		public function saveProyecto(){
			$this->nb_usuario = $_POST['nombreUsuario'];
			$this->nick = $_POST['nickUsuario'];
			$this->email = $_POST['emailUsuario'];
			$this->password = $_POST['passUsuario'];
			$this->save();
			return true;
		}
	}
?>