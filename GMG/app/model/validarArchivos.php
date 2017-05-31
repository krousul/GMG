<?php

	function countResponse($_GET){

		foreach ($_GET as $key => $valoresGET){
			for($i = 0; $i <= strlen($valoresGET)-1; $i++){
				$stringresponse .= $valoresGET[$i];
			}
			$values[] = $stringresponse;
			$stringresponse = '';
		}
		return $values;
	}
	require 'subirArchivos.php';

?>