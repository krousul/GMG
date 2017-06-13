<?php 
	class Conexion extends PDO {
		private $tipo_de_base = DB_TYPE;
		private $host = DB_HOST;
		private $nombre_de_base = DB_NAME;
		private $usuario = DB_USER;
		private $contrasena = DB_PASS;
		private $conjunto_de_caracteres = DB_CHAR;
		public function __construct() {
			//Sobreescribo el método constructor de la clase PDO.
			try{
				parent::__construct($this->tipo_de_base.':host='.$this->host.';dbname='.$this->nombre_de_base.';charset='.$this->conjunto_de_caracteres, $this->usuario, $this->contrasena);
			}catch(PDOException $e){
				echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
				exit;
			}
		}
	}
?>