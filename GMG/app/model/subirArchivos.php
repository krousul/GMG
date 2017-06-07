<?php

class Documents extends Conexion{
	
	private $module;
	private $seccion;
	private $name;
	private $type;
	private $size;
	private $url;
	private $descripcion;
	private $idiom;
	private $id = null;
	
	//Simulando sobrecarga de constructores
	
	function __construct()
	{
		//obtengo un array con los parámetros enviados a la función
		$params = func_get_args();
		//saco el número de parámetros que estoy recibiendo
		$num_params = func_num_args();
		//cada constructor de un número dado de parámtros tendrá un nombre de función
		//atendiendo al siguiente modelo __construct1() __construct2()...
		$funcion_constructor = '__construct'.$num_params;
		//compruebo si hay un constructor con ese número de parámetros
		if (method_exists($this,$funcion_constructor)) {
			//si existía esa función, la invoco, reenviando los parámetros que recibí en el constructor original
			call_user_func_array(array($this,$funcion_constructor),$params);
		}
	}
	
	public function __construct3($module,$seccion,$descripcion){
		$this->module=$module;
		$this->seccion=$seccion;
		$this->descripcion=$descripcion;		
	}
	
	public function __construct6($module,$seccion,$name,$type,$size,$url){
		$this->module=$module;
		$this->seccion=$seccion;
		$this->name=$name;
		$this->type=$type;
		$this->size=$size;
		$this->url=$url;
	}
	
	public function setFiles ()  {
		
		$PDO = new Conexion();
		$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		try {
			//Guardando archivos
				
			$consulta = sprintf("INSERT INTO files (id_module, id_seccion,id_idiom,name,type,size,url) 
						VALUES ('%s','%s','%s','%s','%s',%s,'%s');",
						 $this->module,
						 $this->seccion,
						 $this->idiom,
						 $this->name,
						 $this->type,
						 $this->size,
						 $this->url);
				
				$PDO->exec($consulta);
			    $this->id = $PDO->lastInsertId();

		}catch( PDOException $e ) {
			echo "Error: ".$e->getMessage()."\n Linea : ".__LINE__;
			//echo "Error: ".$e->getMessage()."\nLinea : ".__LINE__."\nTrazado : ".$e->getTraceAsString()."\n";
		}
	
	}
	
	public  function setText (){
		
		$PDO = new Conexion();
		$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		try {
			//Guardando textos
			
			$consulta = sprintf("INSERT INTO text (id_module, id_seccion,id_idiom,description) VALUES ('%s','%s','%s','%s');",
					 $this->module,
					 $this->seccion,
					 $this->idiom,
					 $this->descripcion);
			
			$PDO->exec($consulta);
			$this->id = $PDO->lastInsertId();
							
		}catch( PDOException $e ) {
			echo "Error: ".$e->getMessage()."\n Linea : ".__LINE__;
			//echo "Error: ".$e->getMessage()."\n Linea : ".__LINE__."\nTrazado : ".$e->getTraceAsString()."\n";
		}
		
	}
	
	public function getFile(){
		
		$PDO = new Conexion();
		$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		try {
			if($this->id == null){
				$sentence = sprintf("SELECT
										fl.id_module AS modulo,
										fl.id_seccion AS seccion,
										LAN.idiom AS idioma,
										fl.name,
										fl.type,
										fl.size,
										fl.url
										FROM files fl
									INNER JOIN idiom LAN ON fl.id_idiom = LAN.id_idiom
									WHERE id_module = '%s'
									AND id_seccion = '%s' 
									AND LAN.id_idiom = '%s' 
									AND name = '%s';",
						$this->module,
						$this->seccion,
						$this->idiom,
						$this->name);
			}else{
				$sentence = sprintf("SELECT 
										fl.id_module AS modulo,
										fl.id_seccion AS seccion,
										LAN.idiom AS idioma,
										fl.name,
										fl.type,
										fl.size,
										fl.url
										FROM files fl
									INNER JOIN idiom LAN ON fl.id_idiom = LAN.id_idiom
									WHERE id = '%s';",$this->id);
			}
		
		$Result = $PDO->prepare($sentence);
		$Result->setFetchMode(PDO::FETCH_ASSOC);
		$Result->execute();
		
		while ($row = $Result->fetch())
		{
			$FILE['module'] = utf8_decode($row['modulo']);
			$FILE['seccion'] = utf8_decode($row['seccion']);
			$FILE['idiom'] = utf8_decode($row['idioma']);
			$FILE['name'] = utf8_decode($row['name']);
			$FILE['type'] = utf8_decode($row['type']);
			$FILE['size'] = utf8_decode($row['size']);
			$FILE['url'] = utf8_decode($row['url']);
			
		}
		
		} catch (Exception $e) {
			echo "Error: ".$e->getMessage()."\n Linea : ".__LINE__;
			//echo "Error: ".$e->getMessage()."\n Linea : ".__LINE__."\nTrazado : ".$e->getTraceAsString()."\n";
		}
		
		return $FILE; 
	}
	
	public function getText(){
		
		$PDO = new Conexion();
		$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		try {
		
			$sentence = sprintf("SELECT 
									txt.id_module AS modulo,
									txt.id_seccion AS seccion,
									LAN.idiom AS idioma,
									txt.description AS descripcion
									FROM text txt 
								INNER JOIN idiom LAN ON txt.id_idiom = LAN.id_idiom
								WHERE id_module = '%s' 
								AND id_seccion = '%s' 
								AND description = '%s'
								AND LAN.id_idiom = '%s';",
					$this->module,
					$this->seccion,
					$this->descripcion,
					$this->idiom);
			$Result = $PDO->prepare($sentence);
			$Result->setFetchMode(PDO::FETCH_ASSOC);
			$Result->execute();
			
			if($Result->rowCount() > 0){
				while ($row = $Result->fetch())
				{
					$TEXT['module'] = utf8_decode($row['modulo']);
					$TEXT['seccion'] = utf8_decode($row['seccion']);
					$TEXT['idiom'] = utf8_decode($row['idioma']);
					$TEXT['descripcion'] = utf8_decode($row['descripcion']);
				}
			}
			
		} catch (Exception $e) {
			echo "Error: ".$e->getMessage()."\n Linea : ".__LINE__;
			//echo "Error: ".$e->getMessage()."\n Linea : ".__LINE__."\nTrazado : ".$e->getTraceAsString()."\n";
		}
		
		return $TEXT;
		
	}

	public function getId(){
		return $this->id;
	}
	
	public function setIdiom($idiom){
		$this->idiom = $idiom;
	}
	

}


?>