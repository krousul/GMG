<?php

include 'subirArchivos.php';

//Ejecucion INICIAL
//Despues de un Response desde ValidarArchivos.php
if($_REQUEST || $_FILES){
	$headers[] = countResponse($_REQUEST,$_FILES,$IDFORMS);
	$showViews = verifyFiles($_FILES,$headers,MODULE_INV,$PARAMETERSVALIDATION);//solo cambiar el MODULE
	$moduleSeccion = identitySeccion($_REQUEST, $IDFORMS);
	$SHOWFORMS = innerContents($showViews,$moduleSeccion['module']);
}

function countResponse($REQUEST,$FILES,$moduloSeccion){
	
	$splitArray = identitySeccion($REQUEST,$moduloSeccion);
	
	$REQUEST = 	$splitArray["request"];
	$moduloSeccion = $splitArray["module"];
	
	foreach ($REQUEST as $key => $valoresRESQUEST){
		for($i = 0; $i <= strlen($valoresRESQUEST)-1; $i++){
			$stringresponse .= $valoresRESQUEST[$i];
		}
		$values[0][] = $stringresponse;
		$stringresponse = '';
		$i=0;
	}
	foreach ($FILES as $key => $valoresRESQUEST){
		$values[1][] = array($valoresRESQUEST["name"],
							 $valoresRESQUEST["type"],
							 $valoresRESQUEST["size"]);
	}
	
return array($values,$moduloSeccion);

}

function verifyFiles($FILES,$cabeceras,$modulo,$PARAMETERSVALIDATION){
	
	$GLOBALFORM =  	$PARAMETERSVALIDATION[0];
	$ALLOWFORMAT = 	$PARAMETERSVALIDATION[1];
	$URL_DB=        $PARAMETERSVALIDATION[2];
	$REDIRECCION = 	$PARAMETERSVALIDATION[3].$modulo.'.php';
	$MSJ_EXITOSO = 	$PARAMETERSVALIDATION[4][0];
	$MSJ_ERRONEO = 	$PARAMETERSVALIDATION[4][1];
	$MSJ_ATENCION = $PARAMETERSVALIDATION[4][2];
	$LIMITEUPLOAD = $PARAMETERSVALIDATION[5];
	$ALLIDIOM = 	$PARAMETERSVALIDATION[6];
    $URL_DIR=       $PARAMETERSVALIDATION[7];
	
	//Detecta
	
	$seccion = $cabeceras[0][1];
	
	$text = $cabeceras[0][0][0]; //Accediendo a todos los textos
	
	$text = compareForIdiom($ALLIDIOM,$text);	
	$idioma = $text['idioma'];
	$text = $text['text'];
	
	if($text != null){
		for ($i = 1; $i < count($text)+1;$i++){
			$Text = new Documents($modulo, $seccion, $text[$i]);
			$Text->setIdiom($idioma);
			$datosTexto = $Text->getText();
			if($datosTexto == null){
				$Text->setText();
				$allText[] = $Text->getText();
			}else{
				$allText[] = $datosTexto;
			}
		}
	}
	
	$archivos = $cabeceras[0][0][1]; //accediendo a todos los archivos
	
	if($archivos != null){
		for ($i = 0; $i < count($archivos);$i++){
			if(is_array($archivos)){
				$nameFile = $seccion."file".$GLOBALFORM[$i]; //sufijos configurables en config.php ej = file1
				
				if($FILES[$nameFile]["error"]>0){
					$MSJ = $MSJ_ERRONEO.'Archivo invalido';
				} else {
				
					if(in_array($FILES[$nameFile]["type"],$ALLOWFORMAT) && $FILES[$nameFile]["size"] <= $LIMITEUPLOAD){
						
						//Ruta de DB
						$RUTA_DB = $URL_DB.$modulo.'/';
						$archivos[$i][] = $RUTA_DB.$FILES[$nameFile]["name"];
						
						//Ruta de directorio
						$RUTA_DIR = $URL_DIR.$modulo.'\\';
						$archivo = $RUTA_DIR.$FILES[$nameFile]["name"];
						
						$File = new Documents($modulo, $seccion, $archivos[$i][0], $archivos[$i][1], $archivos[$i][2], $archivos[$i][3]);
						$File->setIdiom($idioma);
						
						if(!file_exists($RUTA)){
							$ValorRuta = mkdir($RUTA);				
						}
						
						if(!file_exists($archivo)){
				
							$resultado = @move_uploaded_file($FILES[$nameFile]["tmp_name"], $archivo);
							if($resultado){
								$File->setFiles();
								$allFiles[] = $File->getFile();
								$modoMsj = "success";
							} else {
								$MSJ = $MSJ_ERRONEO.'No se pudo guardar el archivo';
								$modoMsj = "danger";
							}
				
						} else {
							//$MSJ = $MSJ_ATENCION.'El archivo ya existe';
							$allFiles[] = $File->getFile();
							$modoMsj = "warning";
						}
							
					} else {
						$MSJ = $MSJ_ERRONEO.'Archivo no permitido o excede el tamaño';
						$modoMsj = "warning";
					}
				
				}
			}
		
		}	
	}
	
	
	
	switch ($modoMsj){
		case "success" :
			$htmlMSJ = "<div class=\"col-md-6 col-sm-12 close-messages\">
							<div class=\"alert alert-success\" role=\"alert\">
								<strong>$MSJ_EXITOSO</strong>
					            <button type=\"button\" class=\"close\" ><span aria-hidden=\"true\">&times;</span></button>
							</div>
						</div>";
		break;
		case "danger":
			$htmlMSJ = "<div class=\"col-md-6 col-sm-12 close-messages\">
							<div class=\"alert alert-danger  alert-dismissible\" role=\"alert\">
								<strong>$MSJ</strong>
					            <button type=\"button\" class=\"close\" ><span aria-hidden=\"true\">&times;</span></button>
							</div>
						</div>";
		break;
		case "warning":
			$htmlMSJ = "<div class=\"col-md-6 col-sm-12 close-messages\">
							<div class=\"alert alert-warning alert-dismissible\" role=\"alert\">
								<strong>$MSJ</strong>
					            <button type=\"button\" class=\"close\" ><span aria-hidden=\"true\">&times;</span></button>
							</div>
						</div>";
		break;
	}
	
	//Armando Array de resultados
	
	$RESULT = array("MSJ" => $htmlMSJ,
					"ALL_FILE" => $allFiles,
					"ALL_TEXT" => $allText,
					"IDIOM" => $idioma,
	);
	
	return $RESULT;
}

function identitySeccion($REQUEST,$moduloSeccion){
	
	foreach ($REQUEST as $keyRequest => $valueRequest) {
		foreach ($moduloSeccion as $keyModule => $valueModule) {
			foreach ( $valueModule as $keySeccion => $valueSeccion) {
				if($valueRequest == $valueSeccion){
					$getValueModule = $valueRequest;
					unset($REQUEST[$keyRequest]);
					break;
				}
			}
		}
	}
return array("module" => $getValueModule,"request" => $REQUEST);
}

function compareForIdiom($idiom,$text){
	foreach ($text as $keyText => $valueText) {
		foreach ( $idiom as $keyIdiom => $valueIdiom) {
			if($valueIdiom == $valueText){
				$getValueIdiom = $valueIdiom;
				unset($text[$keyText]);
				break;
			}
		}
	}
	
	return array("idioma" => $getValueIdiom,"text" => $text);
}

function innerContents ($showviews,$IDFORMS){
	
	$files = $showviews['ALL_FILE'];
	$text = $showviews['ALL_TEXT'];
	
	for($i = 0; $i <= count($text);$i++){
		foreach($text[$i] as $keytext => $valuetext){
			if($keytext == "descripcion"){
				$SHOW[$IDFORMS]['descriptionText'][] = $valuetext;
			}
		}
	}
	
	for($i = 0; $i <= count($files);$i++){
		foreach($files[$i] as $keyfiles => $valuefiles){
			if($keyfiles == "url"){
				//tratamiento url
				//$url = str_replace("/", "\\", $valuefiles);
				$SHOW[$IDFORMS]['urlImage'][] = $valuefiles;
			}
		}
	}
	
	return $SHOW;
	
}



?>