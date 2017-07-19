<?php
	include URL_APP.'conex.php';
	include URL_MODEL.'mod_twitter.php';
	$url = 'twitter';
	include URL_APP.'xajax.php';
	
	$column1 = '';
	$column2 = '';
	$column3 = '';
	$column4 = '';
	$onCLick = '';
	
// 	$proyecto = new proyectos();
// 	$arrayProyecto = $proyecto->getProyecto();
	
// 	foreach ($arrayProyecto As $proyect){
// 		$onCLick = "onClick=\"$('#nom_proyecto').text('{$proyect['nom_proyecto']}');$('#id_proyecto').val('{$proyect['id_proyectos']}');\";";
		
// 		switch ($proyect['num_columna']) {
// 			case 1 : $column1 .= "<li><button type='button' {$onCLick} data-toggle='modal' data-target='#imgInversiones' id='{$proyect['id_proyectos']}' class='btn btn-default btn-success'>{$proyect['nom_proyecto']}</button></li>"; break;
// 			case 2 : $column2 .= "<li><button type='button' {$onCLick} data-toggle='modal' data-target='#imgInversiones' id='{$proyect['id_proyectos']}' class='btn btn-default btn-success'>{$proyect['nom_proyecto']}</button></li>"; break;
// 			case 3 : $column3 .= "<li><button type='button' {$onCLick} data-toggle='modal' data-target='#imgInversiones' id='{$proyect['id_proyectos']}' class='btn btn-default btn-success'>{$proyect['nom_proyecto']}</button></li>"; break;
// 			case 4 : $column4 .= "<li><button type='button' {$onCLick} data-toggle='modal' data-target='#imgInversiones' id='{$proyect['id_proyectos']}' class='btn btn-default btn-success'>{$proyect['nom_proyecto']}</button></li>"; break;
// 		}
// 	}
?>