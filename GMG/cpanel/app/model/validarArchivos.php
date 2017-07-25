<?php

include 'subirArchivos.php';

function countResponse($REQUEST,$FILES,$moduloSeccion){
	
	$splitArray = identitySeccion($REQUEST,$moduloSeccion);
	
	$REQUEST = 	$splitArray["request"];
	$moduloSeccion = $splitArray["module"];
	$stringresponse = '';
	
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
    $htmlMSJ = '';
  	$allText = '';
    $idioma = '';
	//Detecta

	$seccion = $cabeceras[0][1];
	
	$text = $cabeceras[0][0][0]; //Accediendo a todos los textos
	
	$textCompare = compareForIdiom($ALLIDIOM,$text);	
	$idioma = $textCompare['idioma'];
	$text = $textCompare['text'];
	$folderIdiom = $textCompare['description'];
	
	if($text != null){
		for ($i = 1; $i < count($text)+1;$i++){
			$Text = new Documents($modulo, $seccion,$i,$text[$i]);
			$Text->setIdiom($idioma);
			$datosTexto = $Text->getText();
			if(!is_array($datosTexto)){
				if($datosTexto == null){
					if($Text->setText()){
						$allText[] = $Text->getText();
						$modoMsj = 'success';
					} else{
						$modoMsj = 'error';
					}
				}else{
					if($Text->updateText($datosTexto)){
						$allText[] = $Text->getText();
						$modoMsj = 'success';
					} else{
						$modoMsj = 'error';
					}
				}
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
						$RUTA_DB = $URL_DB.$modulo.'/'.$folderIdiom.'/';
						$archivos[$i][] = $RUTA_DB.$FILES[$nameFile]["name"];
						
						//Ruta de directorio
						$RUTA_DIR = $URL_DIR.$modulo.'\\';
						$RUTA_DIR = str_replace("\\", "/", $RUTA_DIR);//solo para el servidor
						if(!file_exists($RUTA_DIR)){
							$ValorRuta = mkdir($RUTA_DIR);		
							chmod($RUTA_DIR, 0777);
						}
						$RUTA_DIR.=$folderIdiom.'\\';
						$RUTA_DIR = str_replace("\\","/", $RUTA_DIR);//Solo para el servidor
						$archivo = utf8_decode($RUTA_DIR.$FILES[$nameFile]["name"]);
						chmod($archivo, 0777);
						
						$File = new Documents($modulo, $seccion, $archivos[$i][0], $archivos[$i][1], $archivos[$i][2], $archivos[$i][3]);
						$File->setIdiom($idioma);
						
						if(!file_exists($RUTA_DIR)){
							$ValorRuta = mkdir($RUTA_DIR);		
							chmod($RUTA_DIR, 0777);
						}
						
						$datosFiles = $File->getFile();
						
						if(!file_exists($archivo)){
							$resultado = @move_uploaded_file($FILES[$nameFile]["tmp_name"], $archivo);
							if($datosFiles == null){
								if($resultado){
									$File->setFiles();
									$allFiles[] = $File->getFile();
									$modoMsj = "success";
								} else {
									$MSJ = $MSJ_ERRONEO.'No se pudo guardar el archivo';
									$modoMsj = "error";
								}
							}else{
								/*Eliminando imagen asociada*/
								$modoMsj = "success";
								$valor = new Documents($modulo,$seccion,$idioma);
								$delete[] = $valor->getFile('deleted');
								$oldUrl = explode("/", $delete[0]['url']);
								for ($i = count($oldUrl)-6; $i < count($oldUrl); $i++) {
									$arrayUrl.= "/".$oldUrl[$i];
								}
								unlink("../..$arrayUrl");
								$File->updateFile();
								$allFiles[] = $File->getFile();
							}
				
						} else {
							/*Eliminando imagen asociada*/
							$modoMsj = "success";
						}
							
					} else {
						$MSJ = $MSJ_ERRONEO.'Archivo no permitido o excede el tamaño';
						$modoMsj = "warning_no_permitido";
					}
				
				}
			}
		
		}	
	}

	//Armando Array de resultados
	
	$RESULT = array("MSJ" => $modoMsj,
					"ALL_FILE" => $allFiles,
					"ALL_TEXT" => $allText,
					"IDIOM" => $idioma,
	);
	return $RESULT;
}

function identitySeccion($REQUEST,$moduloSeccion){
	
	foreach ($REQUEST as $keyRequest => $valueRequest) {
		if($keyRequest == 'xjxfun' || 
		   $keyRequest == 'xjxr' || 
		   $keyRequest == 'xjxargs' || 
		   $keyRequest == 'getContentsIdiom'){
				unset($REQUEST[$keyRequest]);
		}
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
				$descIdiom = $keyIdiom;
				unset($text[$keyText]);
				break;
			}
		}
	}
	return array("idioma" => $getValueIdiom,"text" => $text,"description" => $descIdiom);
}



function getComponents($module,$idiom,$GLOBALFORM){
	
	$documents = new Documents($module,$idiom);
	$arrayValues = $documents->getDocuments();
	
	$texts = null;
	$texts = $arrayValues['text'];
	$files = $arrayValues['file'];
	$SHOW = array();
	$i = 0;

	if($texts != null){
		for($i = 0; $i <= count($texts);$i++){
			if(isset($texts[$i])){
				foreach($texts[$i] AS $keytext => $valuetext){
					if($keytext == "id_seccion"){
						$secciontext[] = $valuetext;
					}
				}
			}
		}
		for($i = 0; $i <= count($texts);$i++){
			if(isset($texts[$i])){
				foreach($texts[$i] as $keytext => $valuetext){
					if($keytext == "description"){
						$SHOW[$secciontext[$i]]['descriptionText'][] = $valuetext;
					}
				}
			}
		}
	}
	
	if($files != null){
		for($i = 0; $i <= count($files);$i++){
			if(isset($files[$i])){
				foreach($files[$i] as $keyfiles => $valuefiles){
					if($keyfiles== "id_seccion"){
						$seccionFile[] = $valuefiles;
					}
				}
			}
		}
		for($i = 0; $i <= count($files);$i++){
			if(isset($files[$i])){
				foreach($files[$i] as $keyfiles => $valuefiles){
					if($keyfiles == "url"){
						$SHOW[$seccionFile[$i]]['urlImage'][] = $valuefiles;
					}
				}
			}
		}
	}
	return $SHOW;
}
?>