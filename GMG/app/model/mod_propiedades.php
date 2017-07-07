<?php
	require_once URL_MODEL."SaveDate.php";

	class propiedades extends SaveDate {
		public $nom_propiedades = array('string', 'dos', array('label' => '', 'allowNull'));
		public $posicion = array('integer', null, array('allowNull' => true));
		public $num_columna = array('integer', null, array('allowNull' => true));
		
		public function getpropiedades($id = 0){

				$sQuery = "SELECT * FROM propiedades";
					if($id > 0)
						$sQuery .= " WHERE id_propiedades = {$id}";
				$sResult = self::$db->query($sQuery);
			
				if($sResult->rowCount() > 0) 
					return $sResult->fetchAll(PDO::FETCH_ASSOC);
				else 
					return false;
		}
		
		public function savepropiedades($nom_propiedades){
			$this->nom_propiedades = $nom_propiedades;
			$this->save();
			return true;		
		}
	}
?>