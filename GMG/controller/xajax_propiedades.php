<?php
	function proyectoCoincidencia($frmEditarTitulo){
		$objResponse = new xajaxResponse();
	
		$proyectos = new Proyectos();
		$arrayProyecto = $proyectos->getProyecto();
		
		foreach ($arrayProyecto as $listProyecto){
			if(strtoupper($listProyecto['nom_proyecto']) == strtoupper($frmEditarTitulo['nom_proyecto'])){
				$objResponse->script("$('#titulo_reg').css(\"visibility\",\"visible\");");
				return $objResponse;
				break;
			} 
		}
		$objResponse->script("$('#titulo_reg').css(\"visibility\",\"hidden\");");
		return $objResponse;
	}
	function saveProyecto($frmSaveTitulo){
		$objResponse = new xajaxResponse();
	
		$id_proyecto = $frmSaveTitulo['id_proyecto'];
		$nom_proyecto = $frmSaveTitulo['nom_proyecto'];
		
		$proyectos = new Proyectos($id_proyecto);	
		$rSuccesfull = $proyectos->saveProyecto($nom_proyecto);
		
		if(!$rSuccesfull){
			$objResponse->alert("Error! no se guardo correctamente");
		} else {
			$objResponse->alert("Guardado con exito!");
			$objResponse->redirect(URL_CONF_GEN."proyectos.php");
		}
		return $objResponse;
	}
	//REGISTRO DE FUNCIONES XAJAX
	$xajax->register(XAJAX_FUNCTION, "proyectoCoincidencia");
	$xajax->register(XAJAX_FUNCTION, "saveProyecto");
?>