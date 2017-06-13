<?php
	include URL_APP.'conex.php';
	include URL_MODEL.'mod_servicios.php';
	$url = servicios;
	include URL_APP.'xajax.php';
	
	$column1 = '';
	$column2 = '';
	$column3 = '';
	$column4 = '';
	$onCLick = '';
	
	$servicios = new servicios();
	$arrayServicios = $servicios->getServicios();
// 	echo "<pre>"; print_r($arrayServicios);exit;
	foreach ($arrayServicios As $services){
		$onCLick = "onClick=\"$('#nom_servicio').text('{$services['nom_servicio']}');$('#id_servicio').val('{$services['id_servicios']}');\";";
		
		switch ($services['num_columna']) {
			case 1 : $column1 .= "<li><button type='button' {$onCLick} data-toggle='modal' data-target='#imgInversiones' id='{$services['id_servicios']}' class='btn btn-default btn-success'>{$services['nom_servicio']}</button></li>"; break;
			case 2 : $column2 .= "<li><button type='button' {$onCLick} data-toggle='modal' data-target='#imgInversiones' id='{$services['id_servicios']}' class='btn btn-default btn-success'>{$services['nom_servicio']}</button></li>"; break;
			case 3 : $column3 .= "<li><button type='button' {$onCLick} data-toggle='modal' data-target='#imgInversiones' id='{$services['id_servicios']}' class='btn btn-default btn-success'>{$services['nom_servicio']}</button></li>"; break;
		}
	}
?>