<?php

/*Includes de la connexion y los
 * controladores propias de la
 * seccion del modulo
 * y controladores externos*/

	include URL_APP.'conex.php';
	include URL_MODEL.'mod_propiedades.php';
	include URL_MODEL.'mod_idioma.php';
	include URL_MODEL.'validarArchivos.php'; //archivo para guardar imagenes y textos en todos los modulos
	$url = propiedades;
	include URL_APP.'xajax.php';

//Ejecucion INICIAL
//Despues de un Response desde ValidarArchivos.php
if($_REQUEST || $_FILES){ //sin aceptar parametros xajax
	$headers[] = countResponse($_REQUEST,$_FILES,$IDFORMS);
	$showViews = verifyFiles($_FILES,$headers,MODULE_PROP,$PARAMETERSVALIDATION);//solo cambiar el MODULE
	$SHOWFORMS= getComponents(MODULE_PROP,$showViews['IDIOM'],$GLOBALFORM);
}

//Rutina para cargar elementos dependiendo del idioma

if(!$_REQUEST && !$_FILES){
	$SHOWFORMS= getComponents(MODULE_PROP,ESPANOL,$GLOBALFORM);
} else if($_REQUEST['getContentsIdiom']){
	$SHOWFORMS = getComponents(MODULE_PROP,$_REQUEST['getContentsIdiom'],$GLOBALFORM);
}

?>