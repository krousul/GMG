<?php

// Aqui van todas las funciones de cargar los respectivos datos


class DataES extends PDO {
	private $tipo_de_base = 'mysql';
	private $host = 'localhost';
	private $nombre_de_base = 'gmg_db';
	private $usuario = 'root';
	private $contrasena = '';
	private $conjunto_de_caracteres = 'utf8';
	private $conex;
	public function __construct() {
		//Sobreescribo el m�todo constructor de la clase PDO.
		try{
			$this->conex = $this->tipo_de_base.':host=' . $this->host. ';dbname=' . $this->nombre_de_base.";host=".$this->host;
		}catch(PDOException $e){
			echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
			exit;
		}
	}
	
	public function getDataPropiedades($label,$idiom){
		
		$PDO = new PDO($this->conex,$this->usuario,$this->contrasena);
		$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$string="";
		
		try {
			
			$sentence = "SELECT
			description
			FROM text fl
			WHERE id_module = 'Propiedades'
			AND id_idiom = '$idiom';";
			
			$Result = $PDO->prepare($sentence);
			$Result->setFetchMode(PDO::FETCH_ASSOC);
			$Result->execute();
			
			
			while($row = $Result->fetch()){
				$variable = $row['description'];
				$string.= "<li><a href=\"#propi\">".utf8_encode($variable)."</a></li>";
			}
			
			
		} catch (Exception $e) {
			echo "Error: ".$e->getMessage()."\n Linea : ".__LINE__;
			//echo "Error: ".$e->getMessage()."\n Linea : ".__LINE__."\nTrazado : ".$e->getTraceAsString()."\n";
		}
		
		return $string;
		
	}
	
	public function getAllPropiedades($label,$idiom){
		
		
		$PDO = new PDO($this->conex,$this->usuario,$this->contrasena);
		$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$html="";
		
		try {
			
			$sentence = "SELECT
			txt.description,
			fl.url
			FROM text txt
			LEFT JOIN files fl ON fl.id_module = txt.id_module
			AND fl.id_seccion = txt.id_seccion
    		AND fl.id_idiom = txt.id_idiom
			WHERE txt.id_module = 'Propiedades'
			AND txt.id_idiom = '$idiom';";
			
			$Result = $PDO->prepare($sentence);
			$Result->setFetchMode(PDO::FETCH_ASSOC);
			$Result->execute();
			
			
			while($row = $Result->fetch()){
				$value[]=$row;
				$descripcion = utf8_encode($row['description']);
				$url = utf8_encode($row['url']);
				$html .= "<div class=\"col-lg-3 col-md-3 col-sm-12\">
							<article class=\"blog-wrap boxes portfolio-wrap inversiones\">
								<div class=\"singleTeam\">".
								
// 				***************			Esto para videos con iframe    *******************
// 								" <div class=\"blog-media\">
// 										<div class=\"ImageWrapper boxes_img\">
// 											<iframe width=\"560\" height=\"315\" src=\"$url\" frameborder=\"0\" allowfullscreen></iframe>
// 										</div><!-- ImageWrappe-->
// 									</div><!-- end blog media --> "
// 				***************			Esto para videos con iframe    *******************

							   "<div class=\"blog-media\">
									<div class=\"ImageWrapper boxes_img\">
										<img class=\"img-responsive\" src=\"$url\" alt=\"\">
									<div class=\"ImageOverlayH\"></div>
										<div class=\"Buttons StyleMg\">
											<span class=\"WhiteSquare\"><a class=\"fancybox\" href=\"$url\"><i class=\"fa fa-search\"></i></a></span>
										</div>
									</div><!-- ImageWrappe-->
								</div><!-- end blog media --> 
									 <div class=\"post-content\"> 
										<h2>$descripcion</h2>
									</div><!-- post-content -->
									<div class=\"team_hover\" style=\"height: 70px !important;\">
										<p style=\"text-align: center; margin-top: -10px !important\">
											<a href=\"#contact\" style=\"color: #FFF; font-size: 20px !important; \">
												Ver Más
											</a>
										</p>
									</div>
								</div>
							</article><!-- end blog wrap -->
						</div><!-- end col-lg-3 -->";
			}
			
			
		} catch (Exception $e) {
			echo "Error: ".$e->getMessage()."\n Linea : ".__LINE__;
			//echo "Error: ".$e->getMessage()."\n Linea : ".__LINE__."\nTrazado : ".$e->getTraceAsString()."\n";
		}
		
		return $html;
		
	}
	
	public function getSliders($label,$idiom){
		
		
		$PDO = new PDO($this->conex,$this->usuario,$this->contrasena);
		$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$slider="";
		$arrayUrl="";
		$val=false;
		
		try {
			
			$sentence = "SELECT
			fl.id_seccion,
			fl.url
			FROM  files fl 
			WHERE fl.id_module = 'Banner'
			AND fl.id_idiom = '$idiom'
			ORDER BY fl.id_seccion;";
			
			$Result = $PDO->prepare($sentence);
			$Result->setFetchMode(PDO::FETCH_ASSOC);
			$Result->execute();
			
			
			while($row = $Result->fetch()){
				$seccion = $row['id_seccion'];
				$url = utf8_encode($row['url']);
				$oldUrl = explode("/", $url);
				for ($i = count($oldUrl)-7; $i < count($oldUrl); $i++) {
					if($i == count($oldUrl)-7)
					$arrayUrl.= $oldUrl[$i];
					else 
					$arrayUrl.= "/".$oldUrl[$i];
						
				}
				$slider .= "<li>
								<a href=\"#\"><img src=\"$arrayUrl\" alt=\"$seccion\"></a>
						   </li>";
				$arrayUrl="";
			}
			
			
		} catch (Exception $e) {
			echo "Error: ".$e->getMessage()."\n Linea : ".__LINE__;
			//echo "Error: ".$e->getMessage()."\n Linea : ".__LINE__."\nTrazado : ".$e->getTraceAsString()."\n";
		}
		
		
		return $slider;
	}
	
	public function getIdiomas(){
		
		
		$PDO = new PDO($this->conex,$this->usuario,$this->contrasena);
		$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$idiom="";
		
		try {
			
			$sentence = "SELECT
			id_idiom FROM idiom
			WHERE status = 1;";
			
			$Result = $PDO->prepare($sentence);
			$Result->setFetchMode(PDO::FETCH_ASSOC);
			$Result->execute();
			
			
			while($row = $Result->fetch()){
				
				switch ($row['id_idiom']){
				
					case 1:
						$idiom .= "<span class=\"flag-icon flag-icon-es\"></span><a href=\"".$_SERVER['PHP_SELF']."?lang=es\" class=\"\" style=\"color:white\" >ES</a>";
					break;
					case 2 :
						$idiom .= "<span class=\"flag-icon flag-icon-gb\"></span><a href=\"".$_SERVER['PHP_SELF']."?lang=en\" class=\"\" style=\"color:white\" >EN</a>";
					break;
					case 3 :
						$idiom .= "<span class=\"flag-icon flag-icon-pt\"></span><a href=\"".$_SERVER['PHP_SELF']."?lang=pt\" class=\"\" style=\"color:white\" >PT</a>";
					break;
					
				}
			}
			
			
		} catch (Exception $e) {
			echo "Error: ".$e->getMessage()."\n Linea : ".__LINE__;
			//echo "Error: ".$e->getMessage()."\n Linea : ".__LINE__."\nTrazado : ".$e->getTraceAsString()."\n";
		}
		
		
		return $idiom;
	}
	
	public function getServicios($label,$idiom){
		
		$PDO = new PDO($this->conex,$this->usuario,$this->contrasena);
		$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$servicio="";
		$arrayServ = "";
		$cantServ = "";
		$cont=1;
		
		try {
			
			$sentence = "SELECT
			*
			FROM text txt
			WHERE txt.id_module = 'Servicios'
			AND txt.id_idiom = '$idiom'
			ORDER BY txt.id_seccion;";
			
			$Result = $PDO->prepare($sentence);
			$Result->setFetchMode(PDO::FETCH_ASSOC);
			$Result->execute();
			
			
			while($row = $Result->fetch()){
				$arrayServ[$cont]=$row;
				$cantServ[] = $row['id_seccion'];
				$cont++;
			}
			
			$cont=1;
		
			//Eliminando valores duplicados
			
			if(count($cantServ)!= 0){
				$cantServ= array_unique($cantServ);
			}
			
			if(count($arrayServ)>0){
				for ($i = 1; $i <= count($cantServ); $i++) {
					
					$servicio.="<div class=\"col-lg-4 col-md-4 col-sm-4 col-xs-12\">
									<div class=\"servicebox first\"><div class=\"service-icon\">
										<div class=\"dm-icon-effect-1 effect-slide-bottom in\">
											<a href=\"#propi\" class=\"\">
												<i class=\"hovicon effect-1 sub-a icofont icofont-check-circled fa-2x\"></i>
											</a>
										</div>
									</div>";
					
					for ($j = 1; $j <= 2; $j++){
						if($arrayServ[$cont]['id_element'] == 1){
							$servicio.=" <div class=\"servicetitle\">
											<h3>".utf8_encode($arrayServ[$cont]['description'])."</h3>
										 </div>";
						}else{
							$servicio.="<p>".utf8_encode($arrayServ[$cont]['description'])."</p>";
						}
						$cont++;
					}

				$servicio.="</div>
						</div>";
				}
			}
				

			
			
		} catch (Exception $e) {
			echo "Error: ".$e->getMessage()."\n Linea : ".__LINE__;
			//echo "Error: ".$e->getMessage()."\n Linea : ".__LINE__."\nTrazado : ".$e->getTraceAsString()."\n";
		}
		
		
		return $servicio;
	}
	
	public function getTeam($label,$idiom){
		
		$PDO = new PDO($this->conex,$this->usuario,$this->contrasena);
		$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$team ="";
		$arrayTeam = "";
		$arrayFile="";
		$cantTeam = "";
		$cont=1;
		$img=0;
		$switchTeamRow = true;
		$arrayUrl="";
		
		try {
			
			$sentence = "SELECT
			*
			FROM text txt
			WHERE txt.id_module = 'Equipo'
			AND txt.id_idiom = '$idiom'
			ORDER BY txt.id_seccion,txt.id_element;";
			
			$Result = $PDO->prepare($sentence);
			$Result->setFetchMode(PDO::FETCH_ASSOC);
			$Result->execute();
			
			
			while($row = $Result->fetch()){
				$arrayTeam[$cont]=$row;
				$cantTeam[] = $row['id_seccion'];
				$cont++;
			}
			
			$sentence = "SELECT
			file.id_seccion,
			file.url
			FROM files file
			WHERE file.id_module = 'Equipo'
			AND file.id_idiom = '$idiom'
			ORDER BY file.id_seccion;";
			
			$Result = $PDO->prepare($sentence);
			$Result->setFetchMode(PDO::FETCH_ASSOC);
			$Result->execute();
			$cont=1;

			while($row = $Result->fetch()){
				$arrayFile[] = $row;
			}
			//Eliminando valores duplicados
			
			if(count($cantTeam)!= 0){
				$cantTeam = array_unique($cantTeam);
			}
			
			if(count($arrayTeam)>0){
				$team.= "<div class=\"row\">";
				for ($j = 1; $j <= count($cantTeam); $j++){
					if($arrayTeam[$cont]['id_seccion'] == "Equipo1"){
						$team.= "<div class=\"text-center clearfix\">
									<h3 class=\"big_title\">";
							if($arrayTeam[$cont]['id_element'] == "1"){
								$team.= utf8_encode($arrayTeam[$cont]['description']);
								$cont++;
							}
							if($arrayTeam[$cont]['id_element'] == "2"){
								$team.= "<small>".utf8_encode($arrayTeam[$cont]['description'])."</small>";
								$cont++;
							}
						
							$team.= "</h3>
								</div>";
					}else{
						if($switchTeamRow){ 
							$team.= "<div class=\"row team-row\">"; 
							$switchTeamRow = false;
						}else{ $team.="";}
							$team.= "<div class=\"col-lg-3 col-sm-5 col-xs-12 wow fadeInUp animated\" data-wow-duration=\"700ms\" data-wow-delay=\"400ms\">";
								$team.= "<div class=\"singleTeam text-center\">";
									$swImg = true;
										if(count($arrayFile)>0 && $swImg = true){
												$oldUrl = explode("/", $arrayFile[$img]['url']);
												for ($i = count($oldUrl)-7; $i < count($oldUrl); $i++) {
													if($i == count($oldUrl)-7)
														$arrayUrl.= utf8_encode($oldUrl[$i]);
														else
															$arrayUrl.= "/".$oldUrl[$i];
												}
												$team.= "<div class=\"teamImg\">
															<img src=\"$arrayUrl\" alt=\"\">
														</div>";
												$arrayUrl="";
												$img++;
												$swImg = false;
										}
										
										($arrayTeam[$cont]['id_element'] == "1") ? $texto1 = $arrayTeam[$cont]['description']: $texto1="";
										$cont++;
										($arrayTeam[$cont]['id_element'] == "2") ? $texto2 = $arrayTeam[$cont]['description']: $texto2="";
										$cont++;
										($arrayTeam[$cont]['id_element'] == "3") ? $texto3 = $arrayTeam[$cont]['description']: $texto3="";
										$cont++;
										
										$texto1 = utf8_encode($texto1);
										$texto2 = utf8_encode($texto2);
										$texto3 = utf8_encode($texto3);

										$team.="<div class=\"teamDet\">
												<h3> $texto1 </h3>
												<p> $texto2</p>
											  </div>";
										
										$team.="<div class=\"team_hover\">
													<h3>$texto1</h3>
													<p>$texto3</p>
												</br>
													<a href=\"#contact\" style=\"color: #FFF; font-size: 20px !important; \">
														Ver Más
													</a>
												</div>";
								$team.= "</div>";
							$team.= "</div>";
							if($j == count($cantTeam)){
							$team.= "</div>";
							$switchTeamRow = false;
						}else{ $team.="";}
					}
				}				
				$cont++;
				$team.= "</div>";
			}
				

			
			
		} catch (Exception $e) {
			echo "Error: ".$e->getMessage()."\n Linea : ".__LINE__;
			//echo "Error: ".$e->getMessage()."\n Linea : ".__LINE__."\nTrazado : ".$e->getTraceAsString()."\n";
		}
		
		
		return $team;
	}
	
	public function getInversiones($label,$idiom){
		
		
		$PDO = new PDO($this->conex,$this->usuario,$this->contrasena);
		$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$html="";
		$arrayUrl="";
		try {
			
			$sentence = "SELECT
			txt.description,
			fl.url
			FROM text txt
			LEFT JOIN files fl ON fl.id_module = txt.id_module
			AND fl.id_seccion = txt.id_seccion
     		AND fl.id_idiom = txt.id_idiom
			WHERE txt.id_module = 'Inversiones'
			AND txt.id_idiom = '$idiom';";
			
			$Result = $PDO->prepare($sentence);
			$Result->setFetchMode(PDO::FETCH_ASSOC);
			$Result->execute();
			
			
			while($row = $Result->fetch()){
				$descripcion = utf8_encode($row['description']);
				$url = utf8_encode($row['url']);
				$oldUrl = explode("/", $url);
				for ($i = count($oldUrl)-7; $i < count($oldUrl); $i++) {
					if($i == count($oldUrl)-7)
						$arrayUrl.= $oldUrl[$i];
						else
							$arrayUrl.= "/".$oldUrl[$i];
				}
				$html .= "<div class=\"col-lg-3 col-md-3 col-sm-12\">
							<article class=\"blog-wrap boxes portfolio-wrap inversiones wow fadeInUp animated\" data-wow-duration=\"700ms\" data-wow-delay=\"300ms\">
								<div class=\"blog-media\">
									<div class=\"ImageWrapper boxes_img\">
										<img class=\"img-responsive\" src=\"$arrayUrl\" alt=\"\">
										<div class=\"ImageOverlayH\"></div>
										<div class=\"Buttons StyleMg\">
											<span class=\"WhiteSquare\"><a class=\"fancybox\" href=\"$arrayUrl\"><i class=\"fa fa-search\"></i></a></span>
										</div>
									</div><!-- ImageWrappe-->
								</div><!-- end blog media -->
								<div class=\"post-content\"><h2><a href=\"#myCarousel16\"> $descripcion </a></h2>
								</div><!-- post-content -->
							</article><!-- end blog wrap -->
						</div><!-- end col-lg-3 -->";
				$arrayUrl="";
			}
			
			
		} catch (Exception $e) {
			echo "Error: ".$e->getMessage()."\n Linea : ".__LINE__;
			//echo "Error: ".$e->getMessage()."\n Linea : ".__LINE__."\nTrazado : ".$e->getTraceAsString()."\n";
		}
		
		return $html;
		
	}
	
}

/* INICIANDO EL OBJETO DE LOS DATOS A OBTENER*/
$data = new DataES();


return [

	/* TOP BAR */	
		
	'idiomas' => $data->getIdiomas(),	
		
	/* MENU */

	'menu1' => 'Nosotros',

	'menu2' => 'Propiedades',

	'menu3' => 'Financiamiento',

	'menu4' => 'Inversiones',

	'menu5' => 'Inmigración',

	'menu6' => 'Noticias',

	'menu7' => 'Contacto',

	'menu8' => 'Admin',

	/*   SECCION NOSOTROS   */

    'tituloNosotros1' => 'Global Money Group <p style=\"font-size: 16px !important\">Acerca de nosotros</p>',

    'parrafoNosotros1' => 'Ofrecemos DIFERENTES OPCIONES de rentabilidad en $ de </br>
                        Inversiones dentro de USA, a Inversionistas a nivel <strong>GLOBAL</strong> </br>
                        para que obtenga un rendimiento de su $ <strong>MONEY</strong><br/>
                        a través de nuestro de profesionales, somos un <strong>GROUP,</strong><br/>
                        Ingenieros, licenciados en Bienes Raíces y financiamientos, </br>Propiedades
,

                        con alta experiencia en distintas áreas de Inversiones.',
    
    'parrafoNosotros2' => 'Somos un GROUP multidisciplinario de profesionales con amplia experiencia de más de 10 años en servicio al cliente,<strong> ofrecemos nuestro apoyo y asesoría en materia de inversiones en diferentes áreas que incluyen Bienes y Raíces (propiedades residenciales nueva, usadas, preventa), créditos hipotecarios para extranjeros, Inversiones de Capital (Equity y Crowndfunding), soporte en el proceso de compra de negocios en marcha y apoyo en Inmigración a los EEUU, principalmente a través el programa de inversión EB-5.</strong></br>
                  </br>
                  Actualmente estamos enfocados en las zonas y productos de mayor rentabilidad, vemos potencial en varios Estados
                  dentro de USA, debido a la moneda estable, y nos enfocamos donde hay un gran desarrollo y crecimiento, después
                  de nuestros análisis de cada producto, apostamos a la buena inversión en rentabilidad en $$$.</br></br>
                  <strong>Brindamos un apoyo completo e integral, desde el antes, hasta después de su inversión dentro de Estados Unidos con nuestros profesionales licenciados con experiencia, siempre a la mano con nuestros clientes,</strong> gracias a nuestras relaciones comerciales con diversas empresas y profesionales en distintas  ramas que hemos logrado establecer a través de los años permitiendo así que nuestros clientes puedan encontrar todo el apoyo necesario en un mismo lugar Global Money Group.  

                  <strong>Nuestro servicio se destaca</strong> por la atención personalizada, búsqueda de oportunidades de inversión en el mercado, acompañando a nuestros clientes en todo el proceso de inversión, y más aún, después de su inversión, el aspecto más importante es establecer una relación a largo plazo y mejor aun, <strong>MAKING YOUR MONEY GROWN!</strong>
                  ¡Consideramos que para lograr una inversión exitosa, lo más importante es estar bien asesorado!',
    
    'tituloNosotros2' => 'Misión y Visión',
    
    'parrafoNosotros3' => 'Nuestra misión es lograr ofrecer un servicio de asesoramiento con el mayor estándar de calidad y con un alto grado de compromiso soportándonos en <strong>nuestros valores corporativos, profesionales y éticos, buscando la máxima satisfacción del cliente</strong> y la optimización del retorno de su inversión basados en su necesidades particulares y ajustándolas a nuestras alternativas ofrecidas.</br></br>
                Presentamos a cada cliente todas las opciones de inversión que se ajustan a sus intereses y necesidades cuando planean comprar propiedades inmobiliarias residenciales en USA. Escuchamos con mucha atención a nuestros
                clientes, para ofrecer lo que están buscando y los apoyamos a entender el mercado para que puedan tomar la
                mejor decisión, siempre de la mano con los clientes durante todo el proceso en sus decisiones
                <strong>GLOBAL MONEY GROUP</strong>, esta con ustedes en el proceso de cualquier tipo de transacción de compra o venta desde
                la más pequeña hasta la más grande.',                                 

		/*  SECCION NUESTROS SERVICIOS  */                

	'tituloNuestroServ1' => 'Nuestros Servicios',
		
	'servicios' => $data->getServicios('servicios',1),

	/*  SECCION NUESTRO EQUIPO  */


	'equipo' =>$data->getTeam('team',1),
		
	/* SECCION DE PROPIEDADES */
 
	'tituloPropiedades1' => 'Propiedades',

	'tituloPropiedades2' => 'USA',

	'tituloPropiedades3' => 'Panama',

	'tituloPropiedades4' => 'Venezuela',

	/* SECCION DE FINANCIAMIENTO */

	'tituloFinanciamiento1' => 'Financiamiento',

  'tituloFinanciamiento2' => 'Información de Crédito Hipotecario Residencial / Comercial',

	'textoFinanciamiento1' => 'GLOBAL MONEY GROUP recomendamos el crédito, dependiendo el caso de cada uno de nuestros clientes, por eso recomendamos la reunión personalizada, para poder escuchar y brindar la información más correcta.
                                        <br/>
                                        Comprar una propiedad en USA con financiamiento como extranjero es más sencillo de lo que usted cree. 
                                        <br/>
                                        Queremos mostrarle un ejemplo de cómo puede obtener unas casas similares a esta: ',

    'textoFinanciamiento2' => 'Puede utilizar nuestra calculadora que tenemos a mano derecha para ser más sencillo los cálculos. 
                                            <strong>Ejemplo</strong>, si el valor de la casa vale $300,000 y conseguimos un crédito del 75%, $225,000 consideramos que con el 25%, $75,000 de inicial podemos obtener esta casa, sin embargo, no es tan real, se require unos costos de cierres y unos depósitos. Siempre debemos sumar estos costos. Que dependerá del caso. Contáctanos para más información, evaluaremos tu caso y brindaremos la información más real.',                                    

    'textoFinanciamiento3' => 'A veces también tenemos el dinero para la compra, sin embargo después de analizar el caso, podemos recomendar un crédito de tanto % para luego amortizarlo sin penalidad, cuando lo requiera. Y mientras tanto dar uso de su dinero en otras inversiones rentables que ofrecemos que pague su crédito y le quede dinero. Con tasas superiores al crédito!',
    
    'textoFinanciamiento4' => 'Los créditos que ofrecemos son de 5, 7 y 30 años, con tasas desde 4,75%
                                            <br/>
                                            *Siempre depende de cada caso!
                                            <br/>
                                            Las iniciales o como dicen el downpayment, depende de muchos motivos que implican un análisis previo del cliente, del Proyecto, del banco con que lo manejemos, pero van desde 25%, 30%, 35%, 40%, 50% de inicial.',

    'textoFinanciamiento5' => 'Se puede obtener crédito para inversiones mayor a $170,000. GLOBAL MONEY GROUP, ofrecemos créditos privados y bancarios. ',

    'textoFinanciamiento6' => 'CONTACTANOS sin ningún compromiso. Los créditos comerciales depende de  varios factores, contáctenos info@globalmoneygroup.com',

    /*  CALCULADORA */


    'calculadora1' => 'Calculadora',

    'calculadora2' => 'Préstamo Requerido',

    'calculadora3' => 'Ingreso Por Mes',

    'calculadora4' => 'Plazo del Préstamo',

    'calculadora5' => '15 Años',

    'calculadora6' => '20 Años',

    'calculadora7' => '30 Años',

    'calculadora8' => 'Tasa de Interés',

    'calculadora9' => 'Verificar Elección',

    /* SECCION DE INVERSIONES */

    'inversiones1' => 'Inversiones',

	'inversiones' => $data->getInversiones('inversiones',1),
		
    /* SECCION DE INMIGRACION */

    'tituloInmigracion1' => 'Inmigración',

    'tituloInmigracion2' => 'Inmigración a USA',

    'textoInmigracion1' => '<strong>Global Money Group</strong> (GMG) cuenta con aliados estratégicos en el área legal de inmigración a los Estados Unidos de América que prestan el apoyo necesario para nuestros clientes interesados en el área migratoria, de cualquier forma, nuestro equipo de trabajo cuenta con los conocimientos básicos necesarios para determinar en primera instancia cuales opciones de inmigración se pueden ajustar a sus necesidades y perfiles, siempre dejando como última palabra las recomendaciones dadas por los abogados de inmigración calificados. Nuestro alcance en este tema, es a un nivel inicial, una vez comenzado el proceso se resolverán todas las dudas técnicas de mano de los expertos en cada área. 
                                            <br/>
                                            Nuestro enfoque va dirigido a un tipo de visa de inversionista de nombre EB-5 la cual es catalogada como visa de inmigrante llevando así a la Residencia Permanente (Green Card) en forma directa y estructura bajo el esquema de este programa. Sin embargo, daremos la información básica de otros tipos de visa ampliamente utilizadas y relacionadas con negocios para dar una perspectiva más amplia a nuestros clientes.',

    'textoInmigracion2' => 'Para más información regístrese y póngase en contacto con nosotros y nuestros asesores que le darán el apoyo inicial para comenzar a entender sus opciones migratorias y dar ese primer paso tan importante y necesario.
                                      <br/>
                                      <br/>
                                      Entendemos que el proceso de inmigración a un país Nuevo, no es sencillo, empezar desde cero y movilizar a toda una familia en algunos casos, sin embargo consideramos que lo más importante y recomendable es estar legal, somos optimistas y sinceros, gracias a  nuestras experiencias y valores hemos logrado que nuestros clientes vean esta situación placentera junto a <strong>GLOBAL MONEY GROUP</strong> pueden sentirse apoyados en la decisión que tomen, entendemos que este paso no es un proceso de un día para otro, por eso estamos allí siempre de la mano con nuestros clientes brindando el apoyo y soporte necesario.',

    /* SECCION NOTICIAS */
    
    'tituloNoticias1' => 'Noticias',

    'tituloNoticias2' => 'Otras Publicaciones',

    /* SECCION CONTACTANOS */

    'textoContactanos1' => 'Tiene alguna Duda?<small>Déjenos su mensaje para ayudarle</small>',




    /* FOOTER */

    'footer1' => 'Correo:',

    'footer2' => 'Telf:',

    'footer3' => '<strong>Tweets</strong> Recientes',

    /* FEEDBACK */

    'tituloFeedback1' => 'Formulario de Contanto',

    'campoFeedback1' => 'Su nombre*',

    'campoFeedback2' => 'Ciudad*',

    'campoFeedback3' => 'Su Teléfono*',

    'campoFeedback4' => 'Correo*',

    'campoFeedback5' => 'Mensaje*',

    'buttonFeedback1' => 'Enviar',


    /* VIEW CONTACT */

    'textContact1' => 'Contactenos para mayor información o asesoría personalizada, confidencialidad y gratutita.',

    'tituloContact1' => 'Detalles de Contacto',

    'campoContact1' => 'Nombre',

    'campoContact2' => 'Correo',

    'campoContact3' => 'Telf',

    'campoContact4' => 'Ciudad',

    'campoContact5' => 'Mensaje ...',

    'buttonContact1' => 'Enviar Mensaje',

    /* VIEW INMIGRA */

    'tituloInmigra1' => 'Inmigración',

    'tituloInmigra2' => 'Inmigración a USA',

    'textoInmigra1' => '<strong>Global Money Group</strong> (GMG) cuenta con aliados estratégicos en el área legal de inmigración a los Estados Unidos de América que prestan el apoyo necesario para nuestros clientes interesados en el área migratoria, de cualquier forma, nuestro equipo de trabajo cuenta con los conocimientos básicos necesarios para determinar en primera instancia cuales opciones de inmigración se pueden ajustar a sus necesidades y perfiles, siempre dejando como última palabra las recomendaciones dadas por los abogados de inmigración calificados. Nuestro alcance en este tema, es a un nivel inicial, una vez comenzado el proceso se resolverán todas las dudas técnicas de mano de los expertos en cada área. 
                                            <br/>
                                            Nuestro enfoque va dirigido a un tipo de visa de inversionista de nombre EB-5 la cual es catalogada como visa de inmigrante llevando así a la Residencia Permanente (Green Card) en forma directa y estructura bajo el esquema de este programa. Sin embargo, daremos la información básica de otros tipos de visa ampliamente utilizadas y relacionadas con negocios para dar una perspectiva más amplia a nuestros clientes.',

    'textoInmigra2' => 'Para más información regístrese y póngase en contacto con nosotros y nuestros asesores que le darán el apoyo inicial para comenzar a entender sus opciones migratorias y dar ese primer paso tan importante y necesario.
                                      <br/>
                                      <br/>
                                      Entendemos que el proceso de inmigración a un país Nuevo, no es sencillo, empezar desde cero y movilizar a toda una familia en algunos casos, sin embargo consideramos que lo más importante y recomendable es estar legal, somos optimistas y sinceros, gracias a  nuestras experiencias y valores hemos logrado que nuestros clientes vean esta situación placentera junto a <strong>GLOBAL MONEY GROUP</strong> pueden sentirse apoyados en la decisión que tomen, entendemos que este paso no es un proceso de un día para otro, por eso estamos allí siempre de la mano con nuestros clientes brindando el apoyo y soporte necesario.
                                      <br/>
                                      <br/>
                                      <strong>A continuación presentamos los tipos de VISAS más comunes:</strong>
                                      <br/>
                                      <br/>
                                      <strong>Visa EB5 </strong> Excelente oportunidad para los inmigrantes-inversionistas de todas partes del Mundo, en especial para los Latinoamericanos
                                      <br/>
                                      <br/>
                                      <strong>Que es la Visa EB-5 (Programa de Inversionista Inmigrante)? </strong>',

    'textoInmigra3' => 'La categoría de residencia EB-5 (Employment-Based quinta preferencia) es la vía para aquellos inversionistas que deseen obtener su residencia y al mismo tiempo aprovechar las oportunidades de negocios y de inversión. La Agencia de Inmigración, Servicios de Inmigración de USA, (United States Citizenship and Immigration Services) otorga residencia a personas que inviertan como mínimo $1.000.000 y creen 10 empleos en al menos dos años de operaciones. Uscis tiene una cantidad de 10.000 residencias disponibles al año por esta importante vía y que nosotros consideramos como una excelente oportunidad para los Empresarios e Inversionistas de otros países, en especial de Latinoamérica. Existe una excepción en la ley que lleva la inversión a un monto de $500.000 en caso de que se realice la inversión en un Proyecto que genere los empleos en una zona con alta tasa de desempleo. Global Money Group trabaja con proyectos que cumplen esta condición.',
    
    'textoInmigra4' => '<strong>Quienes están incluidos?</strong>
                                        <br/>
                                        <br/>
                                        Las personas incluidas en la aplicación son el aplicante, el conyugue (legalmente casados) y los hijos menores de 21 años no casados (si su hijo está por cumplir 21 años, la edad que se toma en consideración es la edad que tenga al momento de introducir su aplicación).
                                        <br/>
                                        <br/>
                                        <strong>Por qué aplicar a la visa EB-5?</strong>
                                        <br/>
                                        <br/>
                                        La visa EB-5, es sin duda alguna la opción más recomendada para lograr la deseada residencia permanente de forma rápida y eficiente, ya que al ser una visa de inmigrante lleva al aplicante y su núcleo familiar a la Residencia Permanente (Green Card) de forma rápida y eficiente, siempre tomando en consideración que el aplicante puede efectivamente demostrar el origen de los fondos del capital y está consciente de que esta inversión no devenga ingresos para el mantenimiento mensual económico de la familia al trasladarse a los EEUU. 
                                        <br/>
                                        <br/>
                                        <strong>Como aplicar a la EB-5 a través de un Centro Regional?</strong>
                                        <br/>
                                        <br/>
                                        La utilización de un Proyecto ya en curso es la opción más sencilla y conveniente, ya que la actuación del inversionista es completamente pasiva, y todo el trabajo referente a la planificación, ejecución, generación de fuentes de empleo y terminación será llevada a cabo por el desarrollador del Proyecto, por lo que el inversionista y su familia no tiene nada de qué preocuparse en cuanto a la generación de los empleos y las tareas diarias de ejecución de la obra o negocio, por ello y otras factores como lo es la experiencia en el medio, el conocimiento en el manejo de este programa, etc.,  esta es la alternativa que recomendamos y trabajamos en Global Money Group.
                                        <br/>
                                        <br/>
                                        1) El primer paso que usted como inversionista debe dar, es educarse en cuanto al proceso y buscar asesoría para entender de que se trata y como funciona. Para ello, cuenta con nuestro total apoyo para dar ese primer paso y enterarse de los proyectos en los cuales puede invertir y que califican para la visa EB-5.
                                        <br/>
                                        2) Determinar si el aplicante califica, este es un paso crucial del proceso, ya que para poder aplicar a este programa el aplicante debe poder demostrar el origen de los fondos del capital a invertir con documentación que puede incluir (no limitativo): Documentos de Registro de Negocio en el extranjero, declaraciones de impuestos personales y del negocios, o declaraciones de impuestos de cualquier tipo introducidas en cualquier parte del mundo dentro de los 5 años anteriores, documentos identificando cualquier otra Fuente de ingresos, copias certificadas de todos las acciones y procedimientos civiles o penales pendientes o cualquier acción civil privada que involucren juicios por dinero en contra del inversionista dentro de los últimos 15 años.
                                        <br/>
                                        3) Transferir el dinero a un fideicomiso. Un vez seleccionado el proyecto de su gusto y haber firmado la documentación necesaria, usted debe realizar la transferencia de los fondos al Proyecto, generalmente estos proyectos utilizan Cuentas de Fideicomiso para recibir los fondos. Al mismo tiempo se realiza la aplicación ante la embajada de la forma I-526. Tiempo de procesamiento estimado 12-15 meses.
                                        <br/>
                                        4) Una vez aprobada la forma I-526, se introduce la forma I-485 (si está dentro de los EEUU, ajuste de estatus) o la DS-260 (si esta fuera de los EEUU para obtener una visa EB-5 y poder ser admitido en EEUU).
                                        <br/>
                                        5) Una vez aprobada la forma I-485 (si está en EEUU) o al entrar en EEUU con su visa de inmigrante EB-5, el inversionista y sus familiares directos están garantizados con su Residencia Permanente Condicional (Green Card Condicional) por un periodo de 2 años. En este punto, ya el aplicante y su núcleo familiar puede vivir tranquilamente en Estados Unidos y dedicarse a lo que gusten, bien sea estudiar, trabajar o retirarse por un periodo de 2 años.
                                        <br/>
                                        6) 90 días antes del aniversario de sus 2 años de Residencia Permanente Condicional, se debe introducir la forma I-829 para la remoción del estatus condicional.
                                        <br/>
                                        7) Una vez aprobada la solicitud, el aplicante y su familia pasan a poder vivir y trabajar legalmente en Estados Unidos sin ninguna restricción. Su Green Card ya no tiene ninguna condición y podrá en un futuro una vez cumplido el plazo establecido para la ley y si así lo desea aplicar por la ciudadanía Americana.
                                        <br/>
                                        8) A los 5 años de haber realizado su inversión, el Proyecto devolverá sus fondos invertidos más la rentabilidad que la haya ofrecido el Proyecto seleccionado.
                                        <br/>
                                        <br/>
                                        NOTA: Para aplicar por este programa EB-5, adicional al monto de inversión, existen gastos administrativos y de abogados que aumentan la cifra del monto a total y que debe tomarlo en cuenta para su análisis y consideración.
                                        <br/>
                                        <br/>
                                        Si usted está interesado en este programa lo invitamos a registrase con nosotros y obtener más información y soporte.
                                        <br/>
                                        <br/>
                                        <strong>Visa E2:</strong>Tratados bilaterales de amistad, comercio y navegación ',

    'textoInmigra5' => 'La Visa E es muy respetada pues está auspiciada por un tratado de inversión bilateral entre EE.UU. y el país de donde la persona es originario. Hay dos tipos de visa E: la visa E-1 y la visa E-2.
                                            <br/>
                                            <br/>
                                            La visa E-2 se diferencia de la E-1 en que ésta no exige que exista una empresa en el país que se está utilizando para  calificar por el tratado. Lo que se requiere es que exista una inversión en un negocio en EE.UU. de por lo menos $120.000,00 (monto sugerido) o más a riesgo.
                                            <br/>
                                            <br/>
                                            Esta visa se origina en el consulado y el trámite es frecuentemente rápido pues los consulados tienen ventanillas y cónsules especiales para visas de este tipo. Fíjese bien que las visas E no dan residencia, ya que son visas de no-inmigrante. Son renovables para toda la vida pero no terminan en residencia. La esposa (legalmente casados) e hijos están bajo el amparo de esta Visa Los hijos, por ejemplo, pueden asistir a la escuela mientras los padres están en estatus bajo la visa E.',

    'textoInmigra6' => 'Los beneficiarios de estas visas pueden viajar cuando quieran una vez que sus visas estén plasmadas en sus pasaportes. No necesitan un permiso de trabajo como tal a menos que quieran solicitar un permiso de trabajo, pues la mera visa los hace elegibles para trabajar y residir en EE.UU. Para efectos prácticos sí pueden vivir en EE.UU. mientras el negocio exista. Los beneficiarios de estas visas pueden viajar cuando quieran una vez que sus visas estén plasmadas en sus pasaportes. No necesitan un permiso de trabajo como tal a menos que quieran solicitar un permiso de trabajo, pues la mera visa los hace elegibles para trabajar y residir en EE.UU. Para efectos prácticos sí pueden vivir en EE.UU. pues, mientras el negocio La visa E-2 se diferencia de la visa E-1 en que ésta no exige que exista una empresa en EE.UU. para calificar para el tratado. Lo que se requiere es que exista una inversión en un negocio estadounidense de por lo menos $ 100.000,00 (monto sugerido) ó más a riesgo. Es decir, una inversión activa y no solamente tener, por ejemplo,  dinero en el banco sin que se esté usando. Esto es importante explicarlo. No se puede tener simplemente dinero en el banco ó en la casa en la que se habita y entonces decir que usted tiene inversiones en EE.UU. La visa E-2 exige que usted invierta sus fondos en equipo ó infraestructura, o que demuestre que su empresa ó negocio genera la cantidad de por lo menos $100.000,00 al año en servicios, y que por lo tanto la inversión es seria. Fíjese bien que no estamos hablando de inversiones estáticas. Por ejemplo, haber heredado un negocio no es suficiente para calificar para esta visa. Por otro lado, sacar una segunda hipoteca en su casa para invertir en el negocio sí califica como capital puesto en riesgo. Lo importante es que los fondos invertidos tengan la posibilidad de ser perdidos  en caso de que la inversión se haga incorrectamente. Antes de solicitar la visa, es importante pedir una valuación del negocio a un contador público. Esto se hace para cubrir el requisito de que el negocio tenga una  inversión de por lo menos $100.000,00. Lo que se evalúa es el inventario, la estructura, préstamos, líneas de crédito, cuentas por cobrar, etc. El negocio no debe ser usado simplemente para subsistir, de ser sólo para ese uso, la visa será negada. El proceso y los documentos requeridos para ambas visas Las visas E tienen la particularidad de que se radican directamente en los consulados. El paquete se prepara y la persona se presenta en el exterior, donde el cónsul será el que decida los méritos de la solicitud. El proceso no dura más de tres meses desde el momento en que se somete la solicitud.
                                      <br/>
                                      <br/>
                                      <strong>Algunos países INCLUIDOS en el tratado son:</strong>
                                      <br/>
                                      <br/>
                                      Argentina, Bolivia, Chile, Colombia, Costa Rica, Panama, Paraguay, Francia, Alemania, España, Iatalia, Irlanda, Holanda, Noruega, , Polonia, Suiza, Suecia, Reino Unido, Entre otros.
                                      <br/>
                                      <br/>
                                      En general para poder calificar para este tipo de visa usted debe poseer la nacionalidad y pasaporte de un país con tratado, haber invertido o estar en proceso de inversion de un monto sustancial de capital a riesgo ($120.000 al menos como monto sugerido), tener como intención única entrar  los EEUU para desarrollar y dirigir la inversion en la cual debe mostrar al menos 50% de propiedad o posesión del control operacional a traves de una posición ejecutiva u otro instrumento corporativo. 
                                      <br/>
                                      <br/>
                                      <strong>Visa L1</strong>
                                      <br/>
                                      <br/>
                                      La visa L-1 se otorga a ejecutivos, gerentes y a personas con conocimientos especializados, quienes vienen al país en una subsidiaria, filial u oficina sucursal de cualquier compañía extranjera. El solicitante de esta visa debe demostrar que ha trabajado por lo menos un año en la compañía extranjera en capacidad administrativa, ejecutiva, o en una posición que requiere de conocimientos especiales, así como   también demostrar que vendrá al país a trabajar temporalmente para esa compañía, su subsidiaria, filial o sucursal. Actualmente, las visas L-1 son otorgadas con frecuencia, principalmente para nuevas operaciones, por el plazo de un año, y para obtener extensiones, habría que demostrar que, entre otros, la subsidiaria, filial o sucursal estadounidense está operando comercialmente. 
                                      <br/>
                                      <br/>
                                      El hombre de negocios que solicite una visa L-1, debe venir a los Estados Unidos a trabajar única y exclusivamente en una subsidiaria, filial o sucursal de la sociedad matriz. 
                                      <br/>
                                      <br/>
                                      <strong>Visa H1</strong> Visa de Trabajo ',

    'textoInmigra7' => 'Lo que esas visas tienen en común es que quien las solicita es una compañía estadounidense y lo hace con la finalidad de que un extranjero pueda venir a trabajar para esa compañía en especial, con un propósito en particular y por un tiempo específico. Visas H-1 son otorgadas a personas con méritos y habilidades distinguidas, capaces de prestar servicios de naturaleza excepcional en el país, es decir que la persona es “profesional”, o que tiene un grado de habilidad o reconocimiento muy por encima de lo que se encuentra ordinariamente. 
                                            <br/>
                                            <br/>
                                            Los arquitectos, ingenieros, abogados, médicos, cirujanos, maestros, así como otras ocupaciones que puedan ser clasificadas y documentadas como “profesionales” están incluidos.',

    'textoInmigra8' => 'Debe aquí hacerse notar que una persona no sólo debe ser profesional, sino que el trabajo ofrecido debe requerir los servicios de un profesional. El solicitante puede ser un profesional, pero si el trabajo ofrecido consiste en labores no profesionales, o requiere las habilidades de otra profesión, no le era otorgada la visa. Los animadores, artistas y quienes son famosos en su terreno en particular, son a menudo calificados como extranjeros de méritos y habilidades distinguidas. Hay que presentar documentos para probar que, de hecho, el solicitante es famoso. La Visa H-2 es para trabajadores generales y es otorgada por un año para un trabajador extranjero que viene a los EEUU a desempeñar servicios de naturaleza temporal. La palabra temporal es aquí muy importante, ya que el patrón estadounidense debe demostrar que sólo necesita al extranjero por un tiempo limitado. Por ejemplo, un patrón estadounidense se ha comprado una maquinaria en el exterior y necesita los servicios de un extranjero para su instalación, así como para entrenar a sus trabajadores en la operación de la misma, debe solicitar al extranjero por medio de esta visa. De ninguna manera este extranjero calificaría, si el patrón necesitase de sus servicios de una manera permanente.
                                            <br/>
                                            <br/>
                                            <strong>Visa O </strong>',

  	'textoInmigra9' => 'La visa O-1 es una visa de no-inmigrante basada en la clasificación de empleo para extranjeros que puedan  demostrar reconocimiento nacional o internacional por sus logros en las ciencias, educación, negocios o atletismo. Se requiere que el empleador presente una petición con la evidencia de la capacidad  individual extraordinaria mencionada, esto significa un nivel de experiencia que indica que la persona es un caso excepcional que ha surgido al nivel más alto en una determinada área en base a su experiencia y dedicación. Esta capacidad debe ser ampliamente documentada y justificada a través de premios, si recibió atención de los medios, y la asociación con otros expertos de reconocido prestigio en ese mismo campo, y / o la innovación o las principales contribuciones en el campo específico de conocimientos. Los reconocimientos tanto a nivel Nacional como internacional de la persona son importantes en el establecimiento de esta habilidad extraordinaria. ',
  	
  	'textoInmigra10' => '      La visa O-1 también está disponible para las artes, el cine y la televisión, que pueden demostrar un historial de, logro extraordinario. La UA USCIS interpreta la ley de manera muy amplia para abarcar la mayoría de los campos de la actividad creativa. La persona que desee trabajar en los EEUU lo tiene que hacer en el mismo campo de su especialidad. Una persona que busca una visa O-1 debe tener un patrocinador. Esto significa que la visa necesita un empleador y una oferta de trabajo. Por ejemplo, un actor necesita un estudio para aplicar en su nombre y la oferta correspondiente. 
                                            <br/>
                                            <br/>
                                            <strong>
                                                NOTA LEGAL: La información contenida en esta página es meramente informativa y nunca debe ser tomada como una consulta jurídica o legal, queda de parte del lector verificar por su cuenta si dicha información está actualizada o vigente a momento de su consulta. Global Money Group ni ninguna de sus integrantes se hace responsable por la información aquí publicada, la misma es basada en opiniones personales e investigaciones propias.
                                            </strong>',

    /* VIEW ISLES */

    'tituloIsles1' => 'Ubicación',

    'textoIsles1' => 'Está ubicado en la cuidad de Sunrise. Bordeando el elegante Lago Mar Country Club y situado junto a una hermosa vista al campo de golf Isles At Lago Mar está situado en el corazón del condado de Broward.
                                            <br/>
                                            <br/>
                                            El complejo residencial se extiende en 37 acres convenientemente ubicado a una cuadra del centro comercial Sawgrass Mills Mall, y del futuro mega proyecto METROPICA, restaurantes, muy cerca del BB&T Centro de espectáculos, de la súper tienda para el hogar IKEA, parque Markham Park, y Volunteer Park, a 15 minutos del Aeropuerto Internacional de Fort Lauderdale y a 45 minutos del Aeropuerto Internacional de Miami. 
                                            <br/>
                                            <br/>
                                            Cercano también a escuelas y universidades excepcionales, tales como American Heritage, Nova University, Broward College, Florida Atlantic  University, entre otros. Con inmediato acceso a las autopistas I -75 , I- 595 y la autopista Sawgrass expressway 869.
                                            <br/>
                                            <br/>
                                            <strong>CARACTERÍSTICAS</strong>
                                            <br/>
                                            <br/>
                                            Es un complejo de apartamentos compuesto por un total de 368 unidades , construido en 1991-1994, Todas las unidades ofrecen vistas a los campos de Golf y Lago, exuberantes espacios naturales donde disfrutar la caída del sol por las tardes. Los residentes cuentan con el servicio de gerencia en dentro del mismo complejo.
                                            <br/>
                                            <br/>
                                            <strong>ÁREAS COMUNES</strong>
                                            <br/>
                                            <br/>
                                            • 37 acres de exuberante belleza natural.
                                            <br/>
                                            • 2 Piscinas con Solarium y vistas al campo de golf y al agua.
                                            <br/>
                                            • 2 Spa.
                                            <br/>
                                            • Clubhouse.
                                            <br/>
                                            • Caminerias.
                                            <br/>
                                            • 2 Canchas de tennis.
                                            <br/>
                                            • 2 Canchas de raquetball.
                                            <br/>
                                            • Parque infantil.
                                            <br/>
                                            • Áreas de picnic y barbacoa.',

    /* VIEW MARQUESA */


    'textoMarquesa1' => 'Con una ubicación ideal en <strong>Pembroke Pines</strong>, Sur de Florida, The Marquesa, son residencias espaciosas y lujosas. La comunidad esta ubicada cerca del acceso a la I-75, Florida Turnpike y la I-95. The Marquesa se encuentra al frente de Pembroke Lakes Mall y muy cerca de The Shops at Pembroke Gardens, Memorial Hospital West, Keiser University, Broward College, Florida International University (FIU), Sun Life Stadium, CB Smith Park, escuelas públicas y excelente restaurantes.
                                            <br/>
                                            <br/>
                                            <strong>Una Ciudad de Posibilidades</strong>
                                            <br/>
                                            <br/>
                                            Pembroke Pines, la segunda ciudad más poblada del condado de Broward, es una de las ciudades más recomendables para criar hijos en todo el estado de la Florida según la revista BusinessWeek, por su bajo índice de criminalidad, las buenas escuelas del área, la amplia oferta de espacios públicos recreativos, la excelencia en los servicios de salud del Memorial Hospital, el crecimiento en el área laboral, y el bienestar de sus residentes. 
                                            <br/>
                                            <br/>
                                            The Marquesa es una comunidad de residencias compuesta de 468 unidades, construida en 1998 y 1999. 
                                            <br/>
                                            <br/>
                                            <strong>Una Comunidad Privada en medio de todo</strong>
                                            <br/>
                                            <br/>
                                            •Comunidad cerrada .
                                            <br/>
                                            •Piscina estilo resort.
                                            <br/>
                                            •Bellos jardines por toda la comunidad.
                                            <br/>
                                            •Cancha de Ráquet balI interior.
                                            <br/>
                                            •Gimnasio moderno y bien equipado.
                                            <br/>
                                            •Lujoso club house.
                                            <br/>
                                            •Wifi en zonas comunes.
                                            <br/>
                                            •Parque infantil.
                                            <br/>
                                            •Salon de cine.
                                            <br/>
                                            •Area para parrillas.
                                            <br/>
                                            •Cabañas.
                                            <br/>
                                            •Garages y cocheras.
                                            <br/>
                                            •Estacionamiento asignado.',

    /* VIEW NEGOCIO DE LOGISTICA */

    'titutloNegocio1' => 'Negocios de Logística',

    'textoNegocio1' => '
                                        Estados Unidos se desprende un negocio que creció fuertemente en los últimos años: el transporte logístico terrestre. Producto del gran movimiento de una economía sólida.
                                            <br/>
                                            <br/>
                                        El creciente aumento de buques de transporte que arriban a los principales puertos de carga de Estados Unidos como Houston, Miami, Nueva York, Los Ángeles y San Francisco demandan unos 43 millones de viajes terrestres anuales producto de las importaciones y exportaciones, convirtiendo al transporte terrestre en un eslabón indispensable para realizar los enlaces desde y hacia los puertos.
                                            <br/>
                                            <br/>
                                        El 70% de las cargas que abastecen el mercado interno se transporta en camión, abarcando a todos los rubros de la industria, generando un promedio de 170.000 viajes diarios a lo largo de los 48 estados americanos, transformando esta actividad en un negocio con excelentes márgenes de rentabilidad.
                                            <br/>
                                            <br/>
                                      <strong>Mas info del Proyecto:</strong>
                                      <br/>
                                      <br/>
                                        •Creación de la empresa ante el estado de la florida.
                                        <br/>
                                        •Plan de negocio para tramite de visa.
                                        <br/>
                                        •2 Tracto camiones 2012  o mas reciente con  sleeper, garantía  60,000 millas de motor y transmisión.
                                        <br/>
                                        <br/>
                                        <strong>Documentación requerida para:</strong>
                                        <br/>
                                        <br/>
                                        •Certificación mecánica de los camiones ante el estado para operar.
                                        <br/>
                                        •Permisos estatales y nacionales para iniciar operaciones.
                                        <br/>
                                        •Se entrega con contrato a un bróker de carga para los camiones sin cláusula de permanencia (el inversionista puede cambiar​de bróker en cualquier momento) ofrecido el Proyecto seleccionado.
                                        <br/>
                                        •Asesoría del negocio (contabilidad, operación,seguros,taxes)
                                        <br/>
                                        •Asesoría para la contratación de conductores.
                                        <br/>
                                        •Primer mantenimiento 10,000 millas gratis (cambio de aceite, filtro, revisión de líquido de frenos, engrase de la 5ª rueda).
                                        <br/>
                                        <br/>
                                        Inversión $ : more info info@globalmoneygroup.com
                                        <br/>
                                        <br/>
                                        Usted tendrá un promedio del 4% mensual sobre su inversión.',


		'textoProyecto' => $data->getDataPropiedades("textoProyecto",1),

		
		
		'divProyecto' => $data->getAllPropiedades("divProyecto",1),
    
		'sliders' => $data->getSliders("sliders",1),

		'verMas' => 'Ver Más'

];


