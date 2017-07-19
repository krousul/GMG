<?php
	$secciones = '';
	$gereral = '';
	$admin = '';
	if(strpos($_SERVER['REQUEST_URI'], 'secciones')){
		$secciones = 'active';
	} else if(strpos($_SERVER['REQUEST_URI'], 'administracion')){
		$admin = 'active';
	} else if(strpos($_SERVER['REQUEST_URI'], 'conf_general')){
		$gereral = 'active';
	}
?>