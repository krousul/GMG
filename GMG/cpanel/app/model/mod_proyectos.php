<?php
	require_once URL_MODEL."SaveDate.php";

	class proyectos extends SaveDate {
		public $nom_proyecto = array('string', 'dos', array('label' => '', 'allowNull'));
		public $posicion = array('integer', null, array('allowNull' => true));
		public $num_columna = array('integer', null, array('allowNull' => true));
		
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
		
		public function saveProyecto($nom_proyecto){
			$this->nom_proyecto = $nom_proyecto;
			$this->save();
			return true;		
		}
	}
?>