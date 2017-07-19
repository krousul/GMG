<?php
	function servicioCoincidencia($frmEditarTitulo){
		$objResponse = new xajaxResponse();
	
		$servicios = new servicios();
		$arrayServicios = $servicios->getServicios();
		
		foreach ($arrayServicios as $listServicios){
			if(strtoupper($arrayServicios['nom_servicio']) == strtoupper($frmEditarTitulo['nom_servicio'])){
				$objResponse->script("$('#titulo_reg').css(\"visibility\",\"visible\");");
				return $objResponse;
				break;
			} 
		}
		$objResponse->script("$('#titulo_reg').css(\"visibility\",\"hidden\");");
		return $objResponse;
	}
	function saveServicio($frmSaveTitulo){
		$objResponse = new xajaxResponse();
	
		$id_servicio = $frmSaveTitulo['id_servicio'];
		$nom_servicio = $frmSaveTitulo['nom_servicio'];
		$contenido = $frmSaveTitulo['contenido'];
		
		if($nom_servicio == '' && $contenido == ''){
			$objResponse->alert("Por lo menos un campo debe tener datos!");
			return $objResponse;
		}
		
		$servicios = new servicios($id_servicio);	
		$rSuccesfull = $servicios->saveServicio($nom_servicio, $contenido);
		
		if(!$rSuccesfull){
			$objResponse->alert("Error! no se guardo correctamente");
		} else {
			$objResponse->alert("Guardado con exito!");
			$objResponse->redirect(URL_SECCIONES."servicios.php");
		}
		return $objResponse;
	}
	function consultarServ($nom_serv, $cont){
		$objResponse = new xajaxResponse();

		$html = "<input type='text' class='form-control' name='nom_servicio' id='nom_servicio' value='$nom_serv' placeholder='Ingrese Titulo'>
			     <textarea  class='form-control' name='contenido' id='contenido' rows='3' placeholder='Ingrese Contenido'>$cont</textarea>";
		$objResponse->assign("resultServ", "innerHTML", $html);
		
		return $objResponse;
	}
	//REGISTRO DE FUNCIONES XAJAX
	$xajax->register(XAJAX_FUNCTION, "consultarServ");
	$xajax->register(XAJAX_FUNCTION, "servicioCoincidencia");
	$xajax->register(XAJAX_FUNCTION, "saveServicio");
?>