<?php
	require_once URL_MODEL."SaveDate.php";
	
	class Modulos extends SaveDate {
		public $nom_modulo = array('string', 'dos', array('label' => '', 'allowNull'));
		public $cod_modulo = array('string', 'dos', array('label' => '', 'allowNull'));
		public $id_rama = array('integer', null, array('allowNull' => true));
		
		public function getModulos($view = ''){
			
			$sQuery = " SELECT * FROM modulos mo ";
			$wQuery = " INNER JOIN rama AS rama ON rama.id_rama = mo.id_rama
						 WHERE mo.cod_modulo LIKE '$view' ";

			$sQuery = ($view != '') ? $sQuery.$wQuery : $sQuery;

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