<?php
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', substr(realpath(dirname(__FILE__)) . DS, 0, -4));

define('URL_TEMPLATES', ROOT . 'views'. DS . 'templates' . DS );
define('URL_APP', ROOT . 'app'. DS );
//define('UPLOAD_IMG', URL_APP . 'lib' . 'jQuery-File-Upload-9.18.0/' );

/*--------------------------------------------------------------------*/

define('BASE_URL', 'http://localhost:8080/github/GMG/');

define('URL_SECCIONES', BASE_URL . 'views/secciones/');
define('URL_REDES', BASE_URL . 'views/redes_sociales/');
define('URL_CONF_GEN', BASE_URL . 'views/conf_general/');
define('URL_ADMIN', BASE_URL . 'views/administracion/');

define('CSS', BASE_URL . 'assets/css/');
define('JS', BASE_URL . 'assets/js/');
define('FONTS', BASE_URL .'assets/fonts/');
define('IMAGES', BASE_URL . 'assets/images/');

//URL de Jquery Upload Files

define('REG_2_DIR', '../../');
define('UPLOAD_IMG', REG_2_DIR . 'app/lib/jQuery-File-Upload-9.18.0/');
define('UPLOAD_IMG_CSS', REG_2_DIR . 'app/lib/jQuery-File-Upload-9.18.0/css/');
define('UPLOAD_IMG_JS', REG_2_DIR . 'app/lib/jQuery-File-Upload-9.18.0/js/');
define('UPLOAD_IMG_SERVER', REG_2_DIR . 'app/lib/jQuery-File-Upload-9.18.0/server/php/');

/*--------------------------------------------------------------------*/

//Configuracion de la BD a usar
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'gmg_db');
define('DB_CHAR', 'utf8');

//Configuracion de 

$options = array(
		'delete_type' => 'POST',
		'db_host' => 'localhost',
		'db_user' => 'root',
		'db_pass' => '',
		'db_name' => 'example',
		'db_table' => 'files'
);


?>