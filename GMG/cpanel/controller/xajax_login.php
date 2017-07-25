<?php
	function redirectGMG(){
		$objResponse = new xajaxResponse();
	
		$objResponse->redirect(BASE_URL_GMG."index.php");

		return $objResponse;
	}
	//REGISTRO DE FUNCIONES XAJAX
	$xajax->register(XAJAX_FUNCTION, "redirectGMG");
?>