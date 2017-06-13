<?php
	require_once URL_MODEL."SaveDate.php";

	class servicios extends SaveDate {
		public $nom_servicio = array('string', 'dos', array('label' => '', 'allowNull'));
		public $posicion = array('integer', null, array('allowNull' => true));
		public $num_columna = array('integer', null, array('allowNull' => true));
		public $contenido =  array('string', 'dos', array('label' => '', 'allowNull'));
		
		public function getServicios($id = 0){
			$sQuery = "SELECT * FROM servicios";
				if($id > 0)	$sQuery .= " WHERE id_servicios = {$id}";
			$sResult = self::$db->query($sQuery);
		
			return ($sResult->rowCount() > 0) ? $sResult->fetchAll(PDO::FETCH_ASSOC) : false;
		}
		
		public function saveServicio($nom_servicio = null,$contenido = null){
			
			if($nom_servicio != null) $this->nom_servicio = $nom_servicio;
			if($contenido != null)    $this->contenido = $contenido;
			$this->save();
			return true;		
		}
	}
?>