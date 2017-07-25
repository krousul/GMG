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

function selectLinkImage($image){
	
	$objResponse = new xajaxResponse();

	switch ($image){
		case 'Banner2':
			$objResponse->script("$('#linkbanner2').addClass('active');");
			$objResponse->script("$('#tab2').removeClass('tab-pane');");
			$objResponse->script("$('#tab2').addClass('tab-pane active');");
		break;
		case 'Banner3':
			$objResponse->script("$('#linkbanner3').addClass('active');");
			$objResponse->script("$('#tab3').removeClass('tab-pane');");
			$objResponse->script("$('#tab3').addClass('tab-pane active');");
		break;
		case 'Banner4':
			$objResponse->script("$('#linkbanner4').addClass('active');");
			$objResponse->script("$('#tab4').removeClass('tab-pane');");
			$objResponse->script("$('#tab4').addClass('tab-pane active');");
		break;
		case 'Banner5':
			$objResponse->script("$('#linkbanner5').addClass('active');");
			$objResponse->script("$('#tab5').removeClass('tab-pane');");
			$objResponse->script("$('#tab5').addClass('tab-pane active');");
		break;
		default:
			$objResponse->script("$('#linkbanner1').addClass('active');");
			$objResponse->script("$('#tab1').removeClass('tab-pane');");
			$objResponse->script("$('#tab1').addClass('tab-pane active');");
		break;
	}	
	return $objResponse;	
}

//FUNCIONES XAJAX A REGISTRAR
$xajax->register(XAJAX_FUNCTION, "getIdiomList");
$xajax->register(XAJAX_FUNCTION, "selectLinkImage");


?>