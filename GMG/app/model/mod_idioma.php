<?php
	require_once URL_MODEL."SaveDate.php";

	class Idiomas extends SaveDate {
		public $id_idiom = array('integer', null, array('allowNull' => true));
		public $idiom = array('string', 'dos', array('label' => '', 'allowNull'));
		public $status= array('integer', null, array('allowNull' => true));
		
		public function getIdioma($id = 0){
			$sQuery = "SELECT * FROM idiom";
			if($id > 0)
				$sQuery .= " WHERE id_idiom = {$id}";
			$sResult = self::$db->query($sQuery);
		
			if($sResult->rowCount() > 0) 
				return $sResult->fetchAll(PDO::FETCH_ASSOC);
			else 
				return false;
		}
		
	
		public function updateStatusIdiomConfiguration($id_diom,$statusValue){
			
			$sQuery = "UPDATE idiom SET ";
				$sQuery.= "status = $statusValue ";
				$sQuery.= "WHERE id_idiom = $id_diom ";
				
			$sResult = self::$db->query($sQuery);
			
			if($sResult->rowCount() > 0)
				return $sResult->fetchAll(PDO::FETCH_ASSOC);
			else
				return false;
		}
		
		public function getIdiomaActive(){
			$sQuery = "SELECT * FROM idiom";
			$sQuery .= " WHERE status=1 ";
				$sResult = self::$db->query($sQuery);
				
				if($sResult->rowCount() > 0)
					return $sResult->fetchAll(PDO::FETCH_ASSOC);
				else
					return false;
		}
	}
?>