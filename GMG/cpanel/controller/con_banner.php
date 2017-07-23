<?php
	/*Includes de la connexion y los
	 * controladores propias de la
	 * seccion del modulo
	 * y controladores externos*/
	
	include URL_APP.'conex.php';
	include URL_MODEL.'mod_banner.php';
	include URL_MODEL.'mod_idioma.php';
	include URL_MODEL.'validarArchivos.php'; //archivo para guardar imagenes y textos en todos los modulos
	$url = 'banner';
	include URL_APP.'xajax.php';
	$showViews = array();
	$SHOWFORMS = array();
	$headers = array();

	//Ejecucion INICIAL
	//Despues de un Response desde ValidarArchivos.php
	if($_REQUEST || $_FILES){ //sin aceptar parametros xajax
		$headers[] = countResponse($_REQUEST,$_FILES,$IDFORMS);
		$showViews = verifyFiles($_FILES,$headers,MODULE_BANNER,$PARAMETERSVALIDATION);//solo cambiar el MODULE
		$SHOWFORMS= getComponents(MODULE_BANNER,$showViews['IDIOM'],$GLOBALFORM);
	}
	
	//Rutina para cargar elementos dependiendo del idioma
	
	if(!$_REQUEST && !$_FILES){
		$SHOWFORMS= getComponents(MODULE_BANNER,ESPANOL,$GLOBALFORM);
	} else if(!empty($_REQUEST['getContentsIdiom'])){
		$SHOWFORMS = getComponents(MODULE_BANNER,$_REQUEST['getContentsIdiom'],$GLOBALFORM);
	}
	
	if(!empty($SHOWFORMS)){
		$img = array();
		$des = array();
	
		foreach ($SHOWFORMS as $key => $show){
			$img[$key] = (!empty($show['urlImage'])) ? $show['urlImage'][0] : '';
			$des[$key] = (!empty($show['descriptionText'])) ? $show['descriptionText'][0] : '';
		}
	}
?>