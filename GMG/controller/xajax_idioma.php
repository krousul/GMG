<?php
function cargarIdioma(){
	
	$objResponse = new xajaxResponse();
	
	$idiomas = new Idiomas();
	$arrayIdioma = $idiomas->getIdioma();
	
	//Contenido del elemento 
	$idiomaHeader .= "<table class=\"table\">";
		$idiomaHeader .= "<thead>";
			$idiomaHeader .= "<tr>";
				$idiomaHeader .= "<th>ID</th>";				
				$idiomaHeader .= "<th>Nombre del Idioma</th>";				
				$idiomaHeader .= "<th>Estatus</th>";				
			$idiomaHeader .= "</tr>";
		$idiomaHeader.= "</thead>";
		
	$idiomaBody .= "<tbody>";
	
	foreach ($arrayIdioma As $idiom){
		
		$idIdiom = $idiom['id_idiom'];
		
		$idiomaBody.= "<tr>";
			$idiomaBody.= "<td>".$idIdiom."</td>";
			$idiomaBody.= "<td>".$idiom['idiom']."</td>";
			$idiomaBody.= "<td>";
			
			switch ($idiom['status']){
				case 1 : 
					$activated = "checked=\"\"";
				break;
				case 0 : 
					$desactivated = "checked=\"\"";
				break;
			}
			
			//Declarando eventos de los elementos
			$activatedOnclick = "onClick=xajax_updateStatus('".$idIdiom."',this.value)";
			$desactivatedOnclick = "onClick=xajax_updateStatus('".$idIdiom."',this.value)";
			
			$idiomaBody .= sprintf("<div>
									<div class=\"radio radio-inline\">
										<input name=\"radio%s\" id=\"radio_activate%s\" value=\"1\" %s type=\"radio\" %s>
										<label for=\"radio_activate%s\">Activado</label>
									</div>
									<div class=\"radio radio-inline\">
										<input name=\"radio%s\" id=\"radio_desactivate%s\" value=\"0\" %s type=\"radio\" %s>
										<label for=\"radio_desactivate%s\">Desactivado</label>
									</div>
								</div>",
						$idIdiom,$idIdiom,$activated,$activatedOnclick,
						$idIdiom,
						$idIdiom,$idIdiom,$desactivated,$desactivatedOnclick,
						$idIdiom);
			
			$idiomaBody.= "</td>";
		$idiomaBody.= "</tr>";
		
		//Reseteado los string
		$activated = '';
		$desactivated ='';
	}
	
	$idiomaBody.= "</tbody>";
	
	
	$idiomaFooter .= "</table>";
	
	//Armazon del elemento
	$idiomasTotal = $idiomaHeader.$idiomaBody.$idiomaFooter;
	
	//Finiquitacion del elemento
	$objResponse->assign("idiom", "innerHTML", $idiomasTotal);
	
	return $objResponse;
}

function updateStatus($id_idioma,$statusValue){
	
	$objResponse = new xajaxResponse();
	
	$idioma = new Idiomas();
	$idioma->updateStatusIdiomConfiguration($id_idioma, $statusValue);
	
 	$objResponse->script("xajax_cargarIdioma();");
	
	return $objResponse;
	
}

//REGISTRO DE FUNCIONES XAJAX
$xajax->register(XAJAX_FUNCTION, "cargarIdioma");
$xajax->register(XAJAX_FUNCTION, "updateStatus");


