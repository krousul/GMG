<?php
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', substr(realpath(dirname(__FILE__)) . DS, 0, -4));

define('URL_TEMPLATES', ROOT . 'views'. DS . 'templates' . DS );
define('URL_APP', ROOT . 'app'. DS );
define('URL_CONTROLLER', ROOT . 'controller'. DS );
define('URL_MODEL', ROOT . 'app'. DS . 'model' . DS );
define('URL_UPLOAD_IMAGES_DIR', ROOT . 'assets'. DS . 'images' . DS . 'upload' . DS);
define('URL_DATATYPES', URL_MODEL . 'DataTypes'. DS );
define('URL_MODAL', ROOT . 'views'. DS . 'administracion' . DS . 'modal' . DS);
define('URL_AJAX', ROOT . 'views'. DS . 'administracion' . DS . 'ajax' . DS);


define('BASE_URL', 'http://localhost:8080/GMG/');
define('URL_SECCIONES', BASE_URL . 'views/secciones/');
define('URL_REDES', BASE_URL . 'views/redes_sociales/');
define('URL_CONF_GEN', BASE_URL . 'views/conf_general/');
define('URL_ADMIN', BASE_URL . 'views/administracion/');
define('URL_VIEWS', BASE_URL . 'views'. DS );
define('URL_UPLOAD_IMAGES_DB', BASE_URL . 'assets/images/upload/');
define('URL_VIEWS_IDIOM', BASE_URL . 'views/secciones/');

define('CSS', BASE_URL . 'assets/css/');
define('JS', BASE_URL . 'assets/js/');
define('FONTS', BASE_URL .'assets/fonts/');
define('IMAGES', BASE_URL . 'assets/images/');

/*------------------------- XAJAX -------------------------------------*/
define('XAJAX_CORE', ROOT . 'controller'. DS . 'xajax'. DS . 'xajax_core'. DS . 'xajax.inc.php');
define('XAJAX_FUNC', ROOT . 'controller'. DS);
define('XAJAX_JS', BASE_URL . 'controller/xajax/');

/*--------------------------- BD ---------------------------------------*/
//Configuracion de la BD a usar
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'gmg_db');
define('DB_CHAR', 'utf8');
define('DB_TYPE', 'mysql');


/*----------------------------------------------------*/
//configuracion de las variable globales por modulo

/* Se definen los moduulos individualmente
 * y luego se anexan todos en $ALLMODULE
 * */

define('MODULE_INV', 'Inversiones');
define('MODULE_PROP', 'Propiedades');
define('MODULE_BANNER', 'Banner');
define('MODULE_TEAM', 'Equipo');

$ALLMODULE = array(MODULE_INV,
				   MODULE_PROP,
				   MODULE_BANNER,
				   MODULE_TEAM);

//configuracion de las variable globales por secciones de formularios

define("GLOBAL_FORM_1", 1);
define("GLOBAL_FORM_2", 2);
define("GLOBAL_FORM_3", 3);
define("GLOBAL_FORM_4", 4);
define("GLOBAL_FORM_5", 5);
define("GLOBAL_FORM_6", 6);
define("GLOBAL_FORM_7", 7);
define("GLOBAL_FORM_8", 8);
define("GLOBAL_FORM_9", 9);
define("GLOBAL_FORM_10", 10);
define("GLOBAL_FORM_11", 11);
define("GLOBAL_FORM_12", 12);

$GLOBALFORM = array(GLOBAL_FORM_1,GLOBAL_FORM_2,GLOBAL_FORM_3,
					GLOBAL_FORM_4,GLOBAL_FORM_5,GLOBAL_FORM_6,
					GLOBAL_FORM_7,GLOBAL_FORM_8,GLOBAL_FORM_9,
					GLOBAL_FORM_10,GLOBAL_FORM_11,GLOBAL_FORM_12,);
/*Aqui se encuentran todos los ID de los formularios
 * de los cuales cada formulario se vera identificado
 * dependiendo de cuantos elementos esten integrados*/

foreach ($ALLMODULE as $indice => $modulo){
	foreach ($GLOBALFORM as $indiceGlobal => $forms) {
		$IDFORMS[$modulo][] = $modulo.$forms;
	}
}

//ARCHIVOS *************************************************************************

//Imagenes permitidas
$ALLOWFORMAT = array("image/gif","image/png","image/jpeg","application/pdf");

//Limite de tamaño archivos

define('UPLOAD_LIMIT',(1024000 * 20)); // 20 MB

//***********************************************************************************

//Mensajes de Modales****************************************************************

define("MSJ_GUARDADO_EXITOSO", "Se ha guardado exitosamente");	
define("MSJ_ERROR_GENERAL", "Error : ");
define("MSJ_ADVERTENCIA", "Atencion : ");

$MENSAJES = array(MSJ_GUARDADO_EXITOSO,
				  MSJ_ERROR_GENERAL,
				  MSJ_ADVERTENCIA);

//***********************************************************************************

//IDIOMA ****************************************************************************

define('ESPANOL', 1);
define('INGLES', 2);
define('PORTUGUES', 3);

$ALLIDIOM = array("es_ES" => ESPANOL,
				  "en_EN" => INGLES,
				  "pr_PR" => PORTUGUES);

//********************************************************************
//Parametros de validacion de archivos
$PARAMETERSVALIDATION = array($GLOBALFORM,$ALLOWFORMAT,URL_UPLOAD_IMAGES_DB,URL_SECCIONES,$MENSAJES,UPLOAD_LIMIT,$ALLIDIOM,URL_UPLOAD_IMAGES_DIR);
?>