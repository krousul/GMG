<?php

// Aqui van todas las funciones de cargar los respectivos datos


class Data extends PDO {
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
				$string.= "<li><a href=\"#propi\">".$variable."</a></li>";
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
			WHERE txt.id_module = 'Propiedades'
			AND txt.id_idiom = '$idiom';";
			
			$Result = $PDO->prepare($sentence);
			$Result->setFetchMode(PDO::FETCH_ASSOC);
			$Result->execute();
			
			
			while($row = $Result->fetch()){
				$descripcion = $row['description'];
				$url = $row['url'];
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
				$url = $row['url'];
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
											<h3>".$arrayServ[$cont]['description']."</h3>
										 </div>";
						}else{
							$servicio.="<p>".$arrayServ[$cont]['description']."</p>";
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
							$team.= $arrayTeam[$cont]['description'];
							$cont++;
						}
						if($arrayTeam[$cont]['id_element'] == "2"){
							$team.= "<small>".$arrayTeam[$cont]['description']."</small>";
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
									$arrayUrl.= $oldUrl[$i];
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
						
						$team.="<div class=\"teamDet\">
						<h3> $texto1 </h3>
						<p> $texto2</p>
						</div>";
						
						$team.="<div class=\"team_hover\">
						<h3>$texto2</h3>
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
			WHERE txt.id_module = 'Inversiones'
			AND txt.id_idiom = '$idiom';";
			
			$Result = $PDO->prepare($sentence);
			$Result->setFetchMode(PDO::FETCH_ASSOC);
			$Result->execute();
			
			
			while($row = $Result->fetch()){
				$descripcion = $row['description'];
				$url = $row['url'];
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
$data = new Data();

return [

	/* TOP BAR */
	
	'idiomas' => $data->getIdiomas(),	
		
	/* MENU */

	'menu1' => 'WHO WE ARE',

	'menu2' => 'OUR PROJECTS',

	'menu3' => 'FINANCING',

	'menu4' => 'INVESTMENTS',

	'menu5' => 'INMIGRATION',

	'menu6' => 'NEWS',

	'menu7' => 'CONTAC US',

	'menu8' => 'Admin',

	/*   SECCION NOSOTROS   */

    'tituloNosotros1' => 'Global Money Group <p style="font-size: 16px !important">WHO WE ARE</p>',

    'parrafoNosotros1' => 'We offer DIFFERENT OPTIONS for profitability in $</br>
                        Investments in USA, to Investors at <strong>GLOBAL</strong> level </br>
                        To get a profits of your $ <strong>MONEY,</strong><br/>
                        through our professionals, we are a <strong>GROUP,</strong><br/>
                        Engineers, graduates in Real Estate and financing,
                        With high experience in different investment areas.',
    
    'parrafoNosotros2' => 'We are a multidisciplinary group of professionals with more than 10 years of
experience in customer service,<strong> we offer our support and advice on investments
in different areas including Real Estate (new, used, pre-sale residential
properties), mortgage loans for foreigners , Capital Investment (Equity and
Crowndfunding), support in the process of purchasing business in progress
and support in Immigration to the US, mainly through the EB-5 investment
program.</strong></br>
                  </br>
                  <strong>We are currently focused on the most profitable areas and products, we see
potential in several states in USA,</strong> due to the stable currency, and we focus on
where there is a great development and growth, after our analyzes of each product,
we bet on the good Investment in profitability in $$$.</br></br>
                  <strong>Brindamos un apoyo completo e integral, desde el antes, hasta después de su inversión dentro de Estados Unidos con nuestros profesionales licenciados con experiencia, siempre a la mano con nuestros clientes,</strong> gracias a nuestras relaciones comerciales con diversas empresas y profesionales en distintas  ramas que hemos logrado establecer a través de los años permitiendo así que nuestros clientes puedan encontrar todo el apoyo necesario en un mismo lugar Global Money Group.  

                  We offer a complete and comprehensive support, from before, until after your
investment in the United States with our experienced licensed professionals, always
at hand with our clients, thanks to our commercial relations with various companies
and professionals in different branches that we have Managed to establish through
the years, allowing our clients to find all the necessary support in one place Global
Money Group. <strong>Our service stands out for personalized attention, search for
investment opportunities in the market,</strong> accompanying our clients throughout the
investment process, and even more, after their investment, the most importantaspect is to establish a long-term relationship and Better yet, <strong>MAKING YOUR
MONEY GROWN!</strong> We believe that to achieve a successful investment, the most
important thing is to be well advised!',
    
    'tituloNosotros2' => 'MISSION AND VISION',
    
    'parrafoNosotros3' => 'Our mission is to offer an advisory service with the highest quality standard and a
high degree of commitment, supporting us in <strong>our corporate, professional and
ethical values, seeking maximum customer satisfaction and optimizing the
return on your investment</strong> based on your needs and adjusting them to our offereWe present each client with all the investment options that fit their interests and
needs when they plan to buy residential real estate in the USA. We listen very
carefully to our clients, to offer what they are looking for and we support them to
understand the market so that they can make the best decision, always hand in hand
with the clients throughout the process in their decisions
GLOBAL MONEY GROUP, is with you in the process of any type of purchase or
sale transaction from the smallest to the largest.d
alternatives.</br></br>
                We present each client with all the investment options that fit their interests and
needs when they plan to buy residential real estate in the USA. We listen very
carefully to our clients, to offer what they are looking for and we support them to
understand the market so that they can make the best decision, always hand in hand
with the clients throughout the process in their decisions
<strong>GLOBAL MONEY GROUP</strong>, is with you in the process of any type of purchase or
sale transaction from the smallest to the largest.',                                 

		/*  SECCION NUESTROS SERVICIOS  */                

	'tituloNuestroServ1' => 'OUR SERVICES',
	
	'servicios' => $data->getServicios('servicios',2),

	/*  SECCION NUESTRO EQUIPO  */

	'equipo' =>$data->getTeam('team',2),

	/* SECCION DE PROPIEDADES */
 
	'tituloPropiedades1' => 'Properties',

	'tituloPropiedades2' => 'USA',

	'tituloPropiedades3' => 'Panama',

	'tituloPropiedades4' => 'Venezuela',

	/* SECCION DE FINANCIAMIENTO */

	'tituloFinanciamiento1' => 'Financing',

  'tituloFinanciamiento2' => 'Residential / Commercial Mortgage Credit Information',

	'textoFinanciamiento1' => 'GLOBAL MONEY GROUP we recommend credit, depending on the case of each
client, so we recommend the personalized meeting with us, to provide the most accurate information.
                                        <br/>
                                        Buying a property in the USA with foreign financing is simpler than you think.
                                        <br/>
                                        We want to show you an example of how you can get houses similar to this:',

    'textoFinanciamiento2' => 'You can use our calculator that we have on the right for simpler calculations.
                                            <strong>Example</strong>, if the value of the house is worth $ 300,000 and we get a credit of 75%, $ 225,000 we consider that with 25%, $ 75,000 of initial, however, it is not so real, closing costs are required and some Deposits. We must always add up these costs around 6% more. That will depend on the case. Contact us for more information, we will evaluate your case and provide the most real information.',                                    

    'textoFinanciamiento3' => 'Sometimes we also have the money for the purchase, however after analyzing the
case, we can recommend a credit of so much and then amortize it without penalty.
Also in the meantime make use of your money in other profitable investments that
we offer to pay your credit and you have money left. With rates higher than credit!',
    
    'textoFinanciamiento4' => 'The loans we offer are 5, 7 and 30 years, with rates ranging from 2.75%
                                            <br/>
                                            * Always depends on each case!
                                            <br/>
                                            The initials or as they say the downpayment, depends on many reasons that imply
a previous analysis of the client, of the Project, of the bank with which we handle it,
but they go from 25%, 30%, 35%, 40%, 50% of initial.',

    'textoFinanciamiento5' => 'Credit for investments over $ 150,000 can be obtained. GLOBAL MONEY GROUP,
we offer private and bank loans.',

    'textoFinanciamiento6' => 'CONTACT US without any commitment. Commercial credits depends on several
factors, contact us info@globalmoneygroup.com',

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

    'inversiones1' => 'Investments',

	'inversiones' => $data->getInversiones('inversiones',2),

    /* SECCION DE INMIGRACION */

    'tituloInmigracion1' => 'Immigration',

    'tituloInmigracion2' => 'Immigration to USA',

    'textoInmigracion1' => '<strong>Global Money Group</strong> (GMG) has strategic alliances in the legal area of immigration to the United States of America that provide the necessary support to our clients interested in the migratory area, however, our team has the necessary basic knowledge To determine in the first instance which immigration options can be adjusted to their needs and profiles, always leaving as final word the recommendations given by qualified immigration lawyers. Our scope in this subject, is to an initial level, once the process begins, all the technical doubts will be solved by the experts in each area.
                                            <br/>
                                            Our approach is aimed at a type of investor visa with the name EB-5 which is
classified as an immigrant visa, thus leading to the Permanent Residency (Green Card) in a direct form and structure under the scheme of this program. However, we will give basic information on other widely used and business related visa types to give a broader perspective to our clients.',

    'textoInmigracion2' => 'For more information register and contact us: info@globalmoneygroup.com and our
advisors who will give you the initial support to begin to understand your migratory options and take that first step as important and necessary
                                      <br/>
                                      <br/>
                                     We understand that the process of immigration to a New country is not simple,
starting from scratch and mobilizing an entire family in some cases, however we consider that the most important and advisable is to be legal, we are optimistic and sincere, thanks to our experiences And values we have made our customers see this pleasant situation together with <strong>GLOBAL MONEY GROUP</strong> can feel supported in the decision they make, we understand that this step is not a process from one day to the next, that is why we are there always hand in hand with our customers Providing the necessary support and support.',

    /* SECCION NOTICIAS */
    
    'tituloNoticias1' => 'News',

    'tituloNoticias2' => 'Other publications',

    /* SECCION CONTACTANOS */

    'textoContactanos1' => 'DO YOU HAVE ANY QUESTIONS?<small>LEAVE YOUR MESSAGE PLEASE CONTACT DETAIL</small>',

    /* FOOTER */

    'footer1' => 'Email:',

    'footer2' => 'Phone:',

    'footer3' => 'Recents <strong>Tweets</strong>',

    /* FEEDBACK */

    'tituloFeedback1' => 'Formulario de Contanto',

    'campoFeedback1' => 'Name*',

    'campoFeedback2' => 'City*',

    'campoFeedback3' => 'Phone*',

    'campoFeedback4' => 'Email*',

    'campoFeedback5' => 'Message*',

    'buttonFeedback1' => 'Send',


    /* VIEW CONTACT */

    'textContact1' => 'Contactenos para mayor información o asesoría personalizada, confidencialidad y gratutita.',

    'tituloContact1' => 'Detalles de Contacto',

    'campoContact1' => 'Name',

    'campoContact2' => 'Email',

    'campoContact3' => 'Phone',

    'campoContact4' => 'City',

    'campoContact5' => 'Message ...',

    'buttonContact1' => 'Send Message',

    /* VIEW INMIGRA */

    'tituloInmigra1' => 'Immigration',

    'tituloInmigra2' => 'Immigration to USA',

    'textoInmigra1' => '<strong>Global Money Group</strong> (GMG) has strategic alliances in the legal area of immigration
to the United States of America that provide the necessary support to our clients interested in the migratory area, however, our team has the necessary basic knowledge To determine in the first instance which immigration options can be
adjusted to their needs and profiles, always leaving as final word the recommendations given by qualified immigration lawyers. Our scope in this subject, is to an initial level, once the process begins, all the technical doubts will be solved by the experts in each area. 
                                            <br/>
                                            Our approach is aimed at a type of investor visa with the name EB-5 which is
classified as an immigrant visa, thus leading to the Permanent Residency (Green Card) in a direct form and structure under the scheme of this program. However, we will give basic information on other widely used and business related visa types to give a broader perspective to our clients.',

    'textoInmigra2' => 'For more information register and contact us: info@globalmoneygroup.com and our
advisors who will give you the initial support to begin to understand your migratory options and take that first step as important and necessary
                                      <br/>
                                      <br/>
                                     We understand that the process of immigration to a New country is not simple,
starting from scratch and mobilizing an entire family in some cases, however we consider that the most important and advisable is to be legal, we are optimistic and sincere, thanks to our experiences And values we have made our customers see this pleasant situation together with GLOBAL MONEY GROUP can feel supported in the decision they make, we understand that this step is not a process from one day to the next, that is why we are there always hand in hand with our customers
Providing the necessary support and support.
                                      <br/>
                                      <br/>
                                      <strong>Here are the most common types of VISAS:</strong>
                                      <br/>
                                      <br/>
                                      <strong>EB5 Visa </strong> Excellent opportunity for immigrants-investors from all over the world,especially for Latin Americans                                      <br/>
                                      <br/>
                                      <strong>What is the EB-5 Visa (Immigrant Investor Program)? </strong>',

    'textoInmigra3' => 'The EB-5 (Employment-Based Fifth Preference) residency category is the way for those investors who wish to obtain their residency and at the same time take advantage of business and investment opportunities. The US Immigration and Customs Enforcement (US Citizenship and Immigration Services) grants people whoinvest at least $ 1,000,000 and create 10 jobs in at least two years of operations. Uscis has an amount of 10,000 residences available per year for this important route and we consider it an excellent opportunity for Businessmen and Investors from
other countries, especially Latin America. There is an exception in the law that brings the investment to an amount of $ 500,000 in case the investment is made in a Project that generates jobs in an area with high unemployment rate. Global Money Group works with projects that fulfill this condition.',
    
    'textoInmigra4' => '<strong>Who are included?</strong>
                                        <br/>
                                        <br/>
                                        The persons included in the application are the applicant, the spouse (legally
married) and children under 21 years of age who are not married (if your child is 21 years old, the age you are considering is the age you are Introduce your application).
                                        <br/>
                                        <br/>
                                        <strong>Why apply for the EB-5 visa?</strong>
                                        <br/>
                                        <br/>
                                        The EB-5 visa is undoubtedly the most recommended option to achieve the desired
permanent residence quickly and efficiently, since being an immigrant visa takes the applicant and his family to the Permanent Residency (Green Card) of Always taking into consideration that the applicant can effectively prove the origin of the capital funds and is aware that this investment does not earn income for the monthly economic maintenance of the family when moving to the US. 
                                        <br/>
                                        <br/>
                                        <strong>How to apply to the EB-5 through a Regional Center?</strong>
                                        <br/>
                                        <br/>
                                        The use of a project already underway is the simplest and most convenient option,
since the investors actions are completely passive, and all the work related to the planning, execution, generation of sources of employment and termination will be carried out by the Developer of the Project, so that the investor and his family has nothing to worry about in terms of generating jobs and the daily tasks of execution of the work or business, and other factors such as experience in the Medium, knowledge in the management of this program, etc., this is the alternative that we recommend and work for Global Money Group.
                                        <br/>
                                        <br/>
                                        1) The first step you should take as an investor is to educate yourself about the
process and seek advice to understand what it is about and how it works. To do this, we have our full support to take that first step and learn about the projects in which you can invest and qualify for the EB-5 visa.
                                        <br/>
                                        2) To determine if the applicant qualifies, this is a crucial step of the process, since to be able to apply to this program the applicant must be able to demonstrate the origin of the funds of the capital to be invested with documentation that may include (not limiting): Business Registration abroad, personal and business tax returns, or tax returns of any kind introduced anywhere in the world within the previous 5 years, documents identifying any other source of income, certified copies of all shares and Pending civil or criminal proceedings, or any private civil action involving investor money suits within the past 15 years.
                                        <br/>
                                        3) Transfer the money to a trust. Once you have selected the project of your choice
and signed the necessary documentation, you must transfer the funds to the Project, generally these projects use Trust Accounts to receive the funds. At the same time, the application to the embassy of the I-526 form is carried out. Estimated processing time 12-15 months.
                                        <br/>
                                        4) Once the I-526 form is approved, the I-485 form (if it is within the US, adjustment of status) or the DS-260 is entered (if outside the US to obtain an EB-5 visa and Be admitted to the US).
                                        <br/>
                                        5) Once the I-485 form (if you are in the US) or when entering the US with your EB-
5 immigrant visa is approved, the investor and his / her immediate family members are guaranteed with their Conditional Permanent Card Period of 2 years. At this point, the applicant and his / her family can live quietly in the United States and devote to what they like, whether studying, working or retiring for a period of 2 years.
                                        <br/>
                                        6) 90 days before the anniversary of his 2 years of Permanent Conditional
Residency, I-829 must be entered for removal of conditional status.
                                        <br/>
                                        7) Once the application is approved, the applicant and his / her family can live and work legally in the United States without any restrictions. Your Green Card no longer has any conditions and may in future after the deadline established for the law and if you want to apply for American citizenship.
                                        <br/>
                                        8) Within 5 years of making your investment, the Project will return its funds invested plus the profitability offered by the selected Project.
                                        <br/>
                                        <br/>
                                        NOTE: To apply for this EB-5 program, in addition to the investment amount, there
are administrative and lawyers expenses that increase the amount of the total amount and that you must take it into account for analysis and consideration.
                                        <br/>
                                        <br/>
                                        If you are interested in this program we invite you to register with us and obtain more information and support. info@globalmoneygroup.com
                                        <br/>
                                        <br/>
                                        <strong>Visa E2:</strong>Bilateral friendship, trade and navigation treaties',

    'textoInmigra5' => 'The E Visa is highly respected as it is sponsored by a bilateral investment treaty
between the US and Canada. And the country of origin. There are two types of E visa: the E-1 visa and the E-2 visa.
                                            <br/>
                                            <br/>
                                            The E-2 visa differs from the E-1 visa in that it does not require a company in the country that is being used to qualify for the treaty. What is required is that there is an investment in a US business. Of at least $ 120,000.00 (suggested amount) or more at risk.
                                            <br/>
                                            <br/>
                                            This visa originates in the consulate and the procedure is frequently fast because the consulates have special consulates and consuls for visas of this type. Note that E visas do not give residency since they are nonimmigrant visas. They are renewable for life but do not end up in residence. Wife (legally married) and children are under the protection of this Visa Children, for example, may attend school while the parents are in E status.',

    'textoInmigra6' => 'The beneficiaries of these visas can travel whenever they want once their visas are reflected in their passports. They do not need a work permit as such unless they want to apply for a work permit, as the mere visa makes them eligible to work and reside in the US. For practical purposes they can live in the USA. While the business exists. The beneficiaries of these visas can travel whenever they want once their visas are reflected in their passports. They do not need a work permit as such unless they want to apply for a work permit, as the mere visa makes them eligible to work and reside in the US. For practical purposes they can live in the USA. As long as the business The E-2 visa differs from the E-1 visa in that it does not require a US company to exist. To qualify for the treaty. What is required is that there is an investment in a US business of at least $ 100,000.00 (suggested amount) or more at risk. That is, an active investment and not only have, for example, money in the bank without it being used. This is important to explain. You can not simply have money in the bank or in the house where you live and then say that you have investments in the US. The E-2 visa requires you to invest your funds in equipment
or infrastructure, or to prove that your company or business generates at least $100,000 per year in services, and that therefore the investment is serious. Notice that we are not talking about static investments. For example, having a business is not enough to qualify for this visa. On the other hand, taking out a second mortgage in your home to invest in the business does qualify as capital put at risk. The important thing is that the funds invested have the possibility of being lost in case the investment is done incorrectly. Before applying for the visa, it is important to ask for a valuation of the business to a public accountant. This is done to cover the requirement that the business have an investment of at least $ 100,000.00. What is evaluated is the inventory, the structure, loans, lines of credit, accounts receivable, etc. The business should not be used simply to survive, if only for that use, the visa will be denied. The process and documents required for both visas The E visas have the peculiarity that they are registered directly in the consulates. The package is prepared and the person is presented outside, where the consul will decide the merits of the application. The process lasts no more than three months from the time the application is submitted.
                                      <br/>
                                      <br/>
                                      <strong>Some countries INCLUDED in the treaty are:</strong>
                                      <br/>
                                      <br/>
                                      Argentina, Bolivia, Chile, Colombia, Costa Rica, Panama, Paraguay, France, Germany, Spain, Italia, Ireland, Holland, Norway, Poland, Switzerland, Sweden, UK, among others.
                                      <br/>
                                      <br/>
                                      In general, in order to qualify for this type of visa you must possess the nationality and passport of a treaty country, have invested or are in the process of investing a substantial amount of capital at risk ($ 120,000 at least as suggested amount), have as Enter the United States to develop and direct the investment in which it must show at least 50% ownership or possession of the operational control through an executive position or other corporate instrument.
                                      <br/>
                                      <br/>
                                      <strong>Visa L1</strong>
                                      <br/>
                                      <br/>
                                      The L-1 visa is granted to executives, managers and people with specialized
knowledge, who come to the country in a subsidiary, branch or branch office of any foreign company. The applicant for this visa must demonstrate that he / she has worked for at least one year in the foreign company in administrative capacity,
executive capacity, or in a position that requires special knowledge, as well as to demonstrate that he / she will come to the country to work temporarily for that company, Its subsidiary, subsidiary or branch. Currently, L-1 visas are frequently granted, mainly for new operations, for a term of one year, and to obtain extensions, it should be shown that, among others, the US subsidiary, branch or branch is operating commercially. The businessman who applies for an L-1 visa must come to the United States to work exclusively and exclusively in a subsidiary, branch or branch of the parent company.
                                            <br/>
                                            <br/>
                                  
                                      <strong>Visa H1</strong> Work Visa',

    'textoInmigra7' => 'What these visas have in common is that the petitioner is an American company and does so in order that a foreigner can come to work for that particular company, for a particular purpose and for a specific time. H-1 visas are granted to persons with distinguished merits and abilities, capable of rendering services of an exceptional
nature in the country, ie the person is "professional", or who has a degree of skill or recognition far above what Is found ordinarily. 
                                            <br/>
                                            <br/>
                                            Architects, engineers, lawyers, physicians, surgeons, teachers, as well as other occupations that can be classified and documented as "professionals" are included.',

    'textoInmigra8' => 'It should be noted here that a person should not only be professional, but the job
offered should require the services of a professional. The applicant may be a professional, but if the job offered consists of non-professional work, or requires the skills of another profession, the visa was not granted. Animators, artists and those who are famous in their particular terrain are often qualified as foreigners of distinguished merits and abilities. You have to present documents to prove that, in fact, the applicant is famous. The H-2 Visa is for general workers and is granted for one year for a foreign worker who comes to the US to perform temporary services.
The word temporary is here very important, since the American employer must prove that he only needs the foreigner for a limited time. For example, a US employer has purchased machinery abroad and needs the services of a foreigner for its
installation, as well as to train its workers in the operation of the same, must apply abroad through this visa. In no way would this foreigner qualify, if the employer needed his services in a permanent way.
                                            <br/>
                                            <br/>
                                            <strong>Visa O </strong>',

  	'textoInmigra9' => 'The O-1 visa is a nonimmigrant visa based on the employment classification for foreigners who can demonstrate national or international recognition for their achievements in the sciences, education, business or athletics. The employer is required to file a petition with the evidence of the extraordinary individual capacity
mentioned, this means a level of experience indicating that the person is an exceptional case that has emerged to the highest level in a given area based on their experience and dedication. This capability should be widely documented and
justified through awards, if received media attention, and partnership with other experts of recognized standing in the same field, and / or innovation or major contributions in the specific field of knowledge. National and international recognition of the person is important in the establishment of this extraordinary ability. ',
  	
  	'textoInmigra10' => '     The O-1 visa is also available for the arts, film and television, which can demonstrate
a history of, extraordinary achievement. UA USCIS interprets the law very broadly to encompass most fields of creative activity. The person who wants to work in the US has to do it in the same field of their specialty. A person seeking an O-1 visa must have a sponsor. This means that the visa needs an employer and a job offer. For example, an actor needs a study to apply on their behalf and the corresponding offer.
                                            <br/>
                                            <br/>
                                            <strong>
                                                NOTE: The information contained in this page is purely informative and should never be taken as a legal or legal consultation, it is up to the reader to verify on their own if the information is current or current at the time of their consultation. Global Money Group nor any of its members is responsible for the information published here, it is based on personal opinions and own research.
                                            </strong>',

    /* VIEW ISLES */

    'tituloIsles1' => 'Location',

    'textoIsles1' => 'It is located in the city of Sunrise. Bordering the elegant Lake Mar Country Club and situated next
to a beautiful view of the Isles At Lake Mar golf course is located in the heart of Broward County.
                                            <br/>
                                            <br/>
                                           The residential complex spans 37 acres conveniently located one block from the Sawgrass Mills Mall, and the future mega METROPICA project, restaurants, very close to the BB & T Entertainment Center, the IKEA SuperStore, Markham Park Park, And Volunteer Park, 15 minutes from Fort Lauderdale International Airport and 45 minutes from Miami International Airport.
                                            <br/>
                                            <br/>
                                            It is also close to exceptional schools and universities, such as American Heritage, Nova University, Broward College, Florida Atlantic University, among others. With immediate access to I-75, I-595 and the Sawgrass expressway 869.
                                            <br/>
                                            <br/>
                                            <strong>CHARACTERISTICS</strong>
                                            <br/>
                                            <br/>
                                            It is an apartment complex consisting of a total of 368 units, built in 1991-1994, All units offer views of the Golf and Lake, lush natural areas where you can enjoy the sun in the afternoon. Residents have the management service within the same complex.
                                            <br/>
                                            <br/>
                                            <strong>COMMON AREAS</strong>
                                            <br/>
                                            <br/>
                                            • 37 acres of lush natural beauty.
                                            <br/>
                                            • 2 swimming pools with solarium and views of the golf course and the water.
                                            <br/>
                                            • 2 Spa.
                                            <br/>
                                            •Club house.
                                            <br/>
                                            •Caminerias.
                                            <br/>
                                            •2 tennis courts.
                                            <br/>
                                            • 2 raquetball courts.
                                            <br/>
                                            •Playground.
                                            <br/>
                                            •Picnic and barbecue areas.',

    /* VIEW MARQUESA */


    'textoMarquesa1' => 'Ideally located in Pembroke Pines, South Florida, The Marquesa, these are spacious and luxurious
residences. The community is located near access to I-75, Florida Turnpike and I-95. The Marquesa is located in the heart of Pembroke Lakes Mall and close to The Shops at Pembroke Gardens, West Memorial Hospital, Keizer University, Broward College, Florida International University (FIU), Sun Life Stadium, CB Smith Park.
                                            <br/>
                                            <br/>
                                            <strong>A City of Possibilities</strong>
                                            <br/>
                                            <br/>
                                           Pembroke Pines, the second most populated city in Broward County, is one of the most desirable cities to raise children throughout the state of Florida according to BusinessWeek magazine, because of its low crime rate, good schools in the area, Offering recreational public spaces, excellence in Memorial Hospital health services, growth in the workplace, and the well-being of its residents.
                                            <br/>
                                            <br/>
                                            The Marquesa is a residential community composed of 468 units, built in 1998 and 1999.
                                            <br/>
                                            <br/>
                                            <strong>A Private Community in the middle of everything</strong>
                                            <br/>
                                            <br/>
                                            •Closed community.
                                            <br/>
                                            •Resort style pool.
                                            <br/>
                                            •Beautiful gardens throughout the community.
                                            <br/>
                                            •Ráquet court ball interior.
                                            <br/>
                                            •Modern and well equipped gym.
                                            <br/>
                                            •Luxurious club house.
                                            <br/>
                                            •Wifi in common areas.
                                            <br/>
                                            •Playground.
                                            <br/>
                                            •Movie theater.
                                            <br/>
                                            •Grill area.
                                            <br/>
                                            •Cabins.
                                            <br/>
                                            •Garages.
                                            <br/>
                                            •Assigned parking.',

    /* VIEW NEGOCIO DE LOGISTICA */

    'titutloNegocio1' => 'Logistic Business',

    'textoNegocio1' => 'The United States is a business that grew strongly in recent years: land transport logistic. Product of the great movement of a solid economy.
                                            <br/>
                                            <br/>
                                       The growing increase of shipping ships arriving in the main cargo ports of the United States, such as Houston, Miami, New York, Los Angeles and San Francisco, demand about 43 million annual trips of land per year from imports and exports, making land transport In an indispensable link to make the connections to and from the ports.
                                            <br/>
                                            <br/>
                                        Seventy percent of the domestic market is cargoes are transported by truck, covering all sectors of
the industry, generating an average of 170,000 trips a day across the 48 American states,
transforming this activity into a business with excellent margins Of profitability.
                                            <br/>
                                            <br/>
                                      <strong>More info about the Project:</strong>
                                      <br/>
                                      <br/>
                                        •Creation of the company before the state of florida.
                                        <br/>
                                        •Business plan for visa processing.
                                        <br/>
                                        •2 truck tractors 2012 or newer with sleeper, guarantee 60,000 miles of engine and transmission.
                                        <br/>
                                        <br/>
                                        <strong>Documentation required for:</strong>
                                        <br/>
                                        <br/>
                                        •Mechanical certification of trucks before the state to operate.
                                        <br/>
                                        •State and national permits to start operations.
                                        <br/>
                                        •Se entrega con contrato a un bróker de carga para los camiones sin cláusula de permanencia (el inversionista puede cambiar​de bróker en cualquier momento) ofrecido el Proyecto seleccionado.
                                        <br/>
                                        •Asesoría del negocio (contabilidad, operación,seguros,taxes)
                                        <br/>
                                        •Asesoría para la contratación de conductores.
                                        <br/>
                                        •A freight broker is delivered with a contract for trucks without a stay clause (the investor can change brokers at any time) offered the selected Project.
                                        </br>
                                        •Business consulting (accounting, operations, insurance, taxes)
                                        </br>
                                        •Advising for the hiring of drivers.
                                        </br>
                                        •First maintenance 10,000 miles free (oil change, filter, brake fluid check, 5th wheel greasing).
                                        <br/>
                                        <br/>
                                        Investment $: more info info@globalmoneygroup.com
                                        <br/>
                                        <br/>
                                        You will have an average of 4% per month on your investment.',



		'textoProyecto' => $data->getDataPropiedades("textoProyecto",2),
		
		
		
		'divProyecto' => $data->getAllPropiedades("divProyecto",2),
		
		'sliders' => $data->getSliders("sliders",2)


];