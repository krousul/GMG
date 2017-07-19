<?php

class Documents extends Conexion{
	
	private $module;
	private $seccion;
	private $element;
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
	
	public function __construct2($module,$idiom){
		$this->module=$module;
		$this->idiom=$idiom;
	}
	
	public function __construct4($module,$seccion,$element,$descripcion){
		$this->module=$module;
		$this->seccion=$seccion;
		$this->element=$element;
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
			
			$consulta = sprintf("INSERT INTO text (id_module, id_seccion,id_element,id_idiom,description) VALUES ('%s','%s','%s','%s','%s');",
					 $this->module,
					 $this->seccion,
					 $this->element,
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
		
			$sentence = sprintf("SELECT
									fl.id,
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
								AND LAN.id_idiom = '%s';",
					$this->module,
					$this->seccion,
					$this->idiom);
		
		$Result = $PDO->prepare($sentence);
		$Result->setFetchMode(PDO::FETCH_ASSOC);
		$Result->execute();
		
		$row = $Result->fetch();
		
		if( $row['url'] == $this->url){
			$FILE['module'] = utf8_decode($row['modulo']);
			$FILE['seccion'] = utf8_decode($row['seccion']);
			$FILE['idiom'] = utf8_decode($row['idioma']);
			$FILE['name'] = utf8_decode($row['name']);
			$FILE['type'] = utf8_decode($row['type']);
			$FILE['size'] = utf8_decode($row['size']);
			$FILE['url'] = utf8_decode($row['url']);
		}else{
			$FILE = $this->id = $row['id'];
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
		$TEXT = array();
		
		try {
		
			$sentence = sprintf("SELECT 
									txt.id,
									txt.id_module AS modulo,
									txt.id_seccion AS seccion,
									txt.id_element AS elemento,
									LAN.idiom AS idioma,
									txt.description AS descripcion
									FROM text txt 
								INNER JOIN idiom LAN ON txt.id_idiom = LAN.id_idiom
								WHERE id_module = '%s' 
								AND id_seccion = '%s' 
								AND id_element = '%s' 
								AND LAN.id_idiom = '%s';",
					$this->module,
					$this->seccion,
					$this->element,
					$this->idiom);
			$Result = $PDO->prepare($sentence);
			$Result->setFetchMode(PDO::FETCH_ASSOC);
			$Result->execute();
			
			if($Result->rowCount() > 0){
				$row = $Result->fetch();
				if(utf8_decode($row['descripcion']) == $this->descripcion){
					$TEXT['module'] = utf8_decode($row['modulo']);
					$TEXT['seccion'] = utf8_decode($row['seccion']);
					$TEXT['elemento'] = utf8_decode($row['elemento']);
					$TEXT['idiom'] = utf8_decode($row['idioma']);
					$TEXT['descripcion'] = utf8_decode($row['descripcion']);
				}else{
					$TEXT = $this->id = utf8_decode($row['id']);
				}
					
			}
			
		} catch (Exception $e) {
			echo "Error: ".$e->getMessage()."\n Linea : ".__LINE__;
			//echo "Error: ".$e->getMessage()."\n Linea : ".__LINE__."\nTrazado : ".$e->getTraceAsString()."\n";
		}
		
		return $TEXT;
		
	}
	
	public function updateText(){
		
		$PDO = new Conexion();
		$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$TEXT = array();
		
		try {
			
			$sentence = sprintf("UPDATE
									text
								SET description = '%s'
								WHERE id = '%s';",
					$this->descripcion,
					$this->id);
			$Result = $PDO->prepare($sentence);
			$Result->execute();
						
		} catch (Exception $e) {
			echo "Error: ".$e->getMessage()."\n Linea : ".__LINE__;
			//echo "Error: ".$e->getMessage()."\n Linea : ".__LINE__."\nTrazado : ".$e->getTraceAsString()."\n";
		}
		
		return $TEXT;
		
	}
	
	public function updateFile(){
		
		$PDO = new Conexion();
		$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$TEXT = array();
		
		try {
			
			$sentence = sprintf("UPDATE
									files
								SET 
									name = '%s',
									type = '%s',
									size =  %s ,
									url =  '%s'
								WHERE id = '%s';",
						$this->name,
						$this->type,
						$this->size,
						$this->url,
						$this->id);
			$Result = $PDO->prepare($sentence);
			$Result->execute();
						
		} catch (Exception $e) {
			echo "Error: ".$e->getMessage()."\n Linea : ".__LINE__;
			//echo "Error: ".$e->getMessage()."\n Linea : ".__LINE__."\nTrazado : ".$e->getTraceAsString()."\n";
		}
		
		return $TEXT;
		
	}
	public function getDocuments() {
		
		$PDO = new Conexion();
		$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		try{	
			$sentence = "SELECT * FROM text";
			$sentence .= " WHERE id_module = '$this->module' and id_idiom = '$this->idiom';";
			$sResultText= $PDO->prepare($sentence);
			$sResultText->setFetchMode(PDO::FETCH_ASSOC);
			$sResultText->execute();
			
			$sentence= "SELECT * FROM files";
			$sentence.= " WHERE  id_module = '$this->module' and id_idiom = '$this->idiom';";
			$sResultFile= $PDO->prepare($sentence);
			$sResultFile->setFetchMode(PDO::FETCH_ASSOC);
			$sResultFile->execute();
			
			if($sResultText->rowCount() > 0 || $sResultFile->rowCount() > 0 )
				return array("text" => $sResultText->fetchAll(PDO::FETCH_ASSOC),"file" => $sResultFile->fetchAll(PDO::FETCH_ASSOC));
			else
				return false;
		} catch (Exception $e) {
			echo "Error: ".$e->getMessage()."\n Linea : ".__LINE__;
			//echo "Error: ".$e->getMessage()."\n Linea : ".__LINE__."\nTrazado : ".$e->getTraceAsString()."\n";
		}
	}

	public function getId(){
		return $this->id;
	}
	
	public function setIdiom($idiom){
		$this->idiom = $idiom;
	}
	

}


?>