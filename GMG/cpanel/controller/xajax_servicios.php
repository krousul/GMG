<?php
	
	function getIdiomList($url) {
		
		$objResponse = new xajaxResponse();
		
		$idiomas = new Idiomas();
		$arrayIdioma = $idiomas->getIdiomaActive();
		
		//Declarando eventos de los elementos
		
		
		$idiomaHeader .= "<button type=\"button\" class=\"btn btn-success dropdown-toggle\" data-toggle=\"dropdown\" aria-expanded=\"false\">Idioma<span class=\"caret\"></span></button>";
		$idiomaHeader .= "<ul class=\"dropdown-menu\" role=\"menu\">";
		
		foreach ($arrayIdioma As $idiom){
			$valuePath = $url.$idiom['id_idiom'];
			$idiomaBody.= "<li><a href=\"$valuePath\">".$idiom['idiom']."</a></li>";
		}
		
		$idiomaFooter = "</ul>";
		
		$idiomas = $idiomaHeader.$idiomaBody.$idiomaFooter;
		
		$objResponse->assign("idiom", "innerHTML", $idiomas);
		
		return $objResponse;
	}
	//REGISTRO DE FUNCIONES XAJAX
	$xajax->register(XAJAX_FUNCTION, "getIdiomList");
?>