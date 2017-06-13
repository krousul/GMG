<?php
	if(strpos($_SERVER['REQUEST_URI'], 'secciones')){
		$secciones = 'active';
		$redes = '';
		$gereral = '';
		$admin = '';
	} else if(strpos($_SERVER['REQUEST_URI'], 'redes_sociales')){
		$secciones = '';
		$redes = 'active';
		$gereral = '';
		$admin = '';
	} else if(strpos($_SERVER['REQUEST_URI'], 'administracion')){
		$secciones = '';
		$redes = '';
		$gereral = '';
		$admin = 'active';
	} else if(strpos($_SERVER['REQUEST_URI'], 'conf_general')){
		$secciones = '';
		$redes = '';
		$gereral = 'active';
		$admin = '';
	} else{
		$secciones = '';
		$redes = '';
		$gereral = '';
		$admin = '';
	}
?>