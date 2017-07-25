<?php
	include URL_MODEL.'mod_modulos.php';

	function redirect($url = ''){
		$objResponse = new xajaxResponse();

		session_start();
	   //Comprobamos si esta definida la sesión 'tiempo'.
	    if(isset($_SESSION['tiempo']) ) {

	        //Tiempo en segundos para dar vida a la sesión.
	        $inactivo = 1200;//20min en este caso.

	        //Calculamos tiempo de vida inactivo.
	        $vida_session = time() - $_SESSION['tiempo'];

	        //Compraración para redirigir página, si la vida de sesión sea mayor a el tiempo insertado en inactivo.
	        if($vida_session > $inactivo){
	        	$objResponse->script("
	        		swal({ 
						title: 'Tu Sesión ha Expirado',
						type: 'info',
						showConfirmButton: false 
					});
	        	");
	        	$objResponse->sleep(60);
				$objResponse->redirect(BASE_URL."views/login.php?expire");
				return $objResponse;
			}
	    }
	    $_SESSION['tiempo'] = time();

		$servicios = new Modulos();	
		$rSuccesfull = $servicios->getModulos($url);

		$view = $rSuccesfull[0]['url'].$url;
		$objResponse->redirect(BASE_URL.$view.".php");

		return $objResponse;
	}

	function expireSession(){
		$objResponse = new xajaxResponse();

		session_start();
	   //Comprobamos si esta definida la sesión 'tiempo'.
	    if(isset($_SESSION['tiempo']) ) {

	        //Tiempo en segundos para dar vida a la sesión.
	        $inactivo = 1200;//20min en este caso.

	        //Calculamos tiempo de vida inactivo.
	        $vida_session = time() - $_SESSION['tiempo'];

	        //Compraración para redirigir página, si la vida de sesión sea mayor a el tiempo insertado en inactivo.
	        if($vida_session > $inactivo){
	        	$objResponse->script("
	        		swal({ 
						title: 'Tu Sesión ha Expirado',
						type: 'info',
						showConfirmButton: false 
					});
	        	");
	        	$objResponse->sleep(60);
				$objResponse->redirect(BASE_URL."views/login.php?expire");
				return $objResponse;
			}
	    } else{
	    	$_SESSION['tiempo'] = time();
	    }

		return $objResponse;
	}

	function saveState($msj){
		$objResponse = new xajaxResponse();
		
		if($msj == 'success'){
			$objResponse->script("
				swal('¡Bien!', 'Datos guardado con Exito!', 'success');		
			");
		} else if($msj == 'warning_no_permitido'){
			$objResponse->script("
				swal('Lo sentimos!', 'Archivo no permitido o excede el tamaño!', 'warning');		
			");	
		} else if($msj == 'error'){
			$objResponse->script("
				swal('Error!', 'Hubo un inconveniente, por favor intentalo de nuevo!', 'warning');		
			");	
		} else if($msj == 'warning'){
			$objResponse->script("
				swal('Error!', 'El archivo ya existe!', 'warning');		
			");	
		}
		return $objResponse;
	}
	//REGISTRO DE FUNCIONES XAJAX
	$xajax->register(XAJAX_FUNCTION, "expireSession");
	$xajax->register(XAJAX_FUNCTION, "redirect");	
	$xajax->register(XAJAX_FUNCTION, "saveState");
?>