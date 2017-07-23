<?php


// Aqui van todas las funciones de cargar los respectivos datos


class DataPT extends PDO {
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
		$cantServ = array();
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
		$cantTeam = array();
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
			//Eliminando valores duplicados
			if(count($cantTeam)!= 0){
				$cantTeam = array_unique($cantTeam);
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
$data = new DataPT();


return [

	/* TOP BAR */
	
	'idiomas' => $data->getIdiomas(),	
		
	/* MENU */

	'menu1' => 'Quem Somos',

	'menu2' => 'Projectos',

	'menu3' => 'Financiamento',

	'menu4' => 'Inversoes',

	'menu5' => 'Inmigracao',

	'menu6' => 'Noticias',

	'menu7' => 'Contactos',

	'menu8' => 'Admin',
		
	/*   SECCION NOSOTROS   */

    'tituloNosotros1' => 'Global Money Group <p style="font-size: 16px !important">Quem Somos</p>',

    'parrafoNosotros1' => 'Oferecemos diferentes opções de rentabilidade $ </br>
Investimento dentro de EUA, para os investidores em todo <strong>GLOBAL</strong> </br>
o mundo, para obter um retorno sobre seu $ <strong>MONEY</strong> </br>
através de nossos profissionais, somos um <strong>GROUP,</strong> </br>
Engenheiros, graduados em imóveis e financiamentos,
com vasta experiência em várias áreas de investimento.',
    
    'parrafoNosotros2' => 'Somos um grupo multidisciplinar de profissionais com uma alta experiência de
mais de 10 anos de serviço ao cliente,<strong> oferecemos nosso apoio e aconselhamento referente a investimentos em diferentes áreas, incluindo a propriedade real (nova propriedades residenciais, usado, pré-venda), as
hipotecas para estrangeiros , Capital investimento (Equidade e Crowndfunding), apoiar o processo de compra e apoiar os negócios em curso na imigração para os EUA, principalmente através do programa de investimento EB-5.</strong></br>
                  </br>
                 No momento, estamos enfocados em produtos de maior rentabilidade, vemos potencial em vários estados dentro de EUA, devido à moeda estável,concentramos onde há um grande desenvolvimento e crescimento, após aanálise de cada produto oferecemos os que tem boa $$$ rentabilidade do investimento..</br></br>
                  <strong>Oferecemos um suporte completo e amplio, sempre con os nossos clientes, antes e depois do seu investimento nos Estados Unidos, com GLOBAL MONEY GROUP com grande experiência, sempre à mão com os nossos clientes</strong> profissionais, graças às nossas relações comerciais com várias empresas e
profissionais de diferentes ramos que temos conseguido estabelecer ao longo dos anos permitindo que nossos clientes possam encontrar todo o apoio necessário em um lugar, Global Group Money.  

                  <strong>Nosso serviço é caracterizada pela atenção personalizada</strong> buscando oportunidades de investimento no mercado, acompanhando nossos clientes em todo o processo de investimento
e, ainda, após o seu investimento, o aspecto mais importante é estabelecer um relacionamento de longo prazo e melhor ainda, <strong>Fazendo seu dinheiro crescer!</strong>Acreditamos que para o investimento bem sucedido, o mais
importante é ser bem aconselhados!',
    
    'tituloNosotros2' => 'MISSÃO E VISÃO',
    
    'parrafoNosotros3' => 'Nossa missão é fornecer um serviço de aconselhamento com o mais alto
padrão de qualidade e com um alto grau de <strong>compromisso basados dos nossos valores corporativos, profissionais e éticos, buscando a máxima satisfação dos clientes e otimizar o retorno do investimento</strong> com base em suas
necesidades.</br></br>
               Apresentamos cada cliente todas as opções de investimento que se encaixam seus interesses e necessidades, quando pretende comprar productos de inversoes e imóveis residenciais nos EUA. Ouvimos atentamente aos nossos clientes, para oferecer o que eles estão procurando e nós ajudá-los a entender o mercado para que eles possam tomar a melhor decisão, sempre de mãos dadas com os clientes durante todo o processo em suas decisões <strong>GLOBAL MONEY GROUP</strong>, esta com você no processo de qualquer compra ou
venda ocorrida desde o menor até o maior.',                                 

		/*  SECCION NUESTROS SERVICIOS  */                

	'tituloNuestroServ1' => 'NOSSOS SERVIÇOS',
	
	'servicios' => $data->getServicios('servicios',3),

	/*  SECCION NUESTRO EQUIPO  */

	'equipo' =>$data->getTeam('team',3),
		
	/* SECCION DE PROPIEDADES */
 
	'tituloPropiedades1' => 'Propiedades',

	'tituloPropiedades2' => 'USA',

	'tituloPropiedades3' => 'Panama',

	'tituloPropiedades4' => 'Venezuela',

	/* SECCION DE FINANCIAMIENTO */

	'tituloFinanciamiento1' => 'Financiamento',

  'tituloFinanciamiento2' => 'Informação de Crédito Hipotecário Residencial / Comercial',

	'textoFinanciamiento1' => 'GLOBAL MONEY GROUP recomendamos o crédito, dependendo do caso de cada um de nossos clientes, por isso recomendamos a reunião personalizada con un consutor da nossa equipe, para poder ouvir e brindar a informação mais correcta.
                                        <br/>
                                        Comprar uma propriedade em EUA com o financiamento como o estrangeiro é mais simples do que você cree.
                                        <br/>
                                        Queremos mostrar um exemplo de como pode obter algumas casas similares:',

    'textoFinanciamiento2' => 'Pode utilizar a nossa calculadora que tem a mão direita para ser mais simples os cálculos.
                                            <strong>Exemplo</strong>, se o valor da casa vale $ 300.000 e conseguimos um crédito do 75%, $ 225.000 consideramos que com o 25%, $ 75.000 de inicial pode obter esta casa, sem embargo, debemos sumar outro custos. Sempre dependerá do caso de cada quem. Contáctanos para mais informaçõesl.',                                    

    'textoFinanciamiento3' => 'Às vezes nós também temos o dinheiro para comprar, mas depois de analisar o caso, podemos recomendar um crédito de ambos% e depois amortizar sem penalidade quando necessário. E, entretanto, para usar seu dinheiro em outros investimentos lucrativos que oferecem para pagar o seu crédito e dinheiro esquerda. Com as taxas de crédito mais altos!',
    
    'textoFinanciamiento4' => 'Os créditos com 5, 7 e 30 anos, com taxas desde 2,75%
                                            <br/>
                                            * Siempre depende de cada caso!
                                            <br/>
                                            As declarações iniciais como o pagamento baixo, dependem de muitos motivos que implicam um exame prévio do cliente, do projeto, do banco com o que conduzem, mas a partir de 25%, 30%, 35%, 40%, 50% de inicial.',

    'textoFinanciamiento5' => 'Se pode obter um crédito para o investimentos por encima de $ 150.000. GLOBAL MONEY GROUP.
ofrecemos créditos privados e bancarios.',

    'textoFinanciamiento6' => 'CONTACTANOS sin ningún compromiso. Os créditos comerciais dependem de vários fatores, contáctenos info@globalmoneygroup.com',

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

    'inversiones1' => 'Inversoes',

	'inversiones' => $data->getInversiones('inversiones',3),

    /* SECCION DE INMIGRACION */

    'tituloInmigracion1' => 'Imigração',

    'tituloInmigracion2' => 'Imigração aos EUA',

    'textoInmigracion1' => '<strong>Global Money Group</strong> (GMG) tem aliados estratégicos no departamento jurídico
de imigração para os Estados Unidos, que fornecem o apoio necessário para os nossos clientes interessados na área de imigração, de qualquer maneira, nossa equipe tem o conhecimento básico necessário para determinar nas primeiras opções instância de imigração que podem ser ajustados às suas necessidades e perfis, deixando sempre a última palavra como as
recomendações dadas pelos advogados de imigração qualificados. Nosso escopo nesta edição, está em um nível inicial, uma vez que o processo começou todas as dúvidas técnicas de especialistas em cada área será resolvido.
                                            <br/>
                                            A nossa abordagem é destinada a um tipo de visto de investidor nome EB-5,
o que é listado como visto de imigrante levando assim a residência permanente (Green Card) diretamente sob o regime ea estrutura deste programa. No entanto, nós dar informações básicas sobre outros tipos de visto amplamente utilizado e negócios relacionados para dar uma perspectiva mais ampla para nossos clientes.',

    'textoInmigracion2' => 'Para mais informações registar e entrar em contato com nós e os nossos conselheiros que irão fornecer o apoio inicial de começar a entender as suas opções de migração e dar este primeiro passo importante e
necessário.
                                      <br/>
                                      <br/>
                                  Entendemos que o processo de imigração para um país novo não é fácil,
começar do zero e mobilizar uma família inteira em alguns casos, no entanto,
acreditamos que o mais importante e recomendável para ser legal, estamos
otimistas e sinceros agradecimentos a nossas experiências e os valores que
temos conseguido os nossos clientes para ver esta situação agradável, com <strong>GLOBAL MONEY GROUP</strong>pode sentir-se apoiada na decisão que eles fazem, entendemos que este passo não é um processo durante a noite, por isso
estamos há sempre de mãos dadas com os nossos clientes prestar apoio e suporte necessário.',

    /* SECCION NOTICIAS */
    
    'tituloNoticias1' => 'Notícia',

    'tituloNoticias2' => 'outras publicações',
    

    /* SECCION CONTACTANOS */

    'textoContactanos1' => 'DÚVIDA?<small>DEIXE SUA MENSAGEM PARA AJUDAR</small>',




    /* FOOTER */

    'footer1' => 'correio:',

    'footer2' => 'Telf:',

    'footer3' => '<strong>Tweets</strong> recente',

    /* FEEDBACK */

    'tituloFeedback1' => 'Formulario de Contanto',

    'campoFeedback1' => 'seu nome*',

    'campoFeedback2' => 'cidade*',

    'campoFeedback3' => 'seu telefone*',

    'campoFeedback4' => 'correio*',

    'campoFeedback5' => 'mensagem*',

    'buttonFeedback1' => 'Enviar',


    /* VIEW CONTACT */

    'textContact1' => 'Contacte-nos para mais informações ou aconselhamento personalizado, confidencialidade e gratutita.',

    'tituloContact1' => 'DETALHES DO CONTATO',

    'campoContact1' => 'nome',

    'campoContact2' => 'correio',

    'campoContact3' => 'telefone',

    'campoContact4' => 'cidade',

    'campoContact5' => 'mensagem ...',

    'buttonContact1' => 'Enviar mensagem',

    /* VIEW INMIGRA */

    'tituloInmigra1' => 'Imigração',

    'tituloInmigra2' => 'Imigração aos EUA',

    'textoInmigra1' => '<strong>Global Money Group</strong> (GMG) tem aliados estratégicos no departamento jurídico
de imigração para os Estados Unidos, que fornecem o apoio necessário para os nossos clientes interessados na área de imigração, de qualquer maneira, nossa equipe tem o conhecimento básico necessário para determinar nas primeiras opções instância de imigração que podem ser ajustados às suas necessidades e perfis, deixando sempre a última palavra como as
recomendações dadas pelos advogados de imigração qualificados. Nosso escopo nesta edição, está em um nível inicial, uma vez que o processo começou todas as dúvidas técnicas de especialistas em cada área será resolvido.
                                            <br/>
                                           A nossa abordagem é destinada a um tipo de visto de investidor nome EB-5,
o que é listado como visto de imigrante levando assim a residência permanente (Green Card) diretamente sob o regime ea estrutura deste programa. No entanto, nós dar informações básicas sobre outros tipos de visto amplamente utilizado e negócios relacionados para dar uma perspectiva mais ampla para nossos clientes.',

    'textoInmigra2' => 'Para mais informações registar e entrar em contato com nós e os nossos conselheiros que irão fornecer o apoio inicial de começar a entender as suas opções de migração e dar este primeiro passo importante e
necessário.
                                      <br/>
                                      <br/>
                                       Entendemos que o processo de imigração para um país novo não é fácil, começar do zero e mobilizar uma família inteira em alguns casos, no entanto, acreditamos que o mais importante e recomendável para ser legal, estamos otimistas e sinceros agradecimentos a nossas experiências e os valores que temos conseguido os nossos clientes para ver esta situação agradável, com <strong>GLOBAL MONEY GROUP</strong>pode sentir-se apoiada na decisão que eles fazem, entendemos que este passo não é um processo durante a noite, por isso estamos há sempre de mãos dadas com os nossos clientes prestar apoio e suporte necessário.
                                      <br/>
                                      <br/>
                                      <strong>Aqui estão os tipos mais comuns de vistos:</strong>
                                      <br/>
                                      <br/>
                                      <strong>EB5 Visa</strong> Excelente oportunidade para imigrantes de investidores de todo o mundo, especialmente para a América Latina.
                                      <br/>
                                      <br/>
                                      <strong>Esse é o EB-5 Visa (Programa Investidor Imigrante)?</strong>',

    'textoInmigra3' => 'O status de residência EB-5 (baseado em emprego Quinta Preferência) é o caminho para os investidores que desejam obter sua residência e ao mesmo tempo aproveitar as oportunidades de negócios e investimento. Imigração dos EUA, Serviços de Imigração EUA (United States Citizenship and Immigration Services) concede residência para pessoas que investem pelo menos US $ 1 milhão e criar 10 postos de trabalho em pelo menos dois anos de operações. USCIS tem um número de residências disponíveis 10.000 por ano para essa importante rota e que consideramos como uma excelente oportunidade para empresários e investidores de outros países, especialmente na América Latina. Há uma exceção na lei que leva o valor do investimento $ 500.000 se o investimento é feito em um projeto degeração de postos de trabalho em uma área com alto índice de desemprego. Grupo Global Money trabalha com projetos que cumprem esta condição.',
    
    'textoInmigra4' => '<strong>Aqueles incluídos?</strong>
                                        <br/>
                                        <br/>
                                        As pessoas incluídas no pedido são o requerente, o cônjuge (legalmente
casado) e crianças menores de 21 anos não casados (se o seu filho está prestes a completar 21 anos, a idade é levado em consideração é a forma como você está velho quando introduzir a sua aplicação).
                                        <br/>
                                        <br/>
                                        <strong>Por que aplicar para o visto EB-5?</strong>
                                        <br/>
                                        <br/>
                                        O visto EB-5 é sem dúvida o mais recomendado para obter a residência
permanente desejado de forma rápida e eficiente opção, já que sendo um visto de imigrante leva o requerente e sua família para a residência permanente (Green Card) rapidez e eficiência, sempre levando em consideração que o requerente possa efetivamente demonstrar a origem dos fundos de capitais e está ciente de que este investimento não ganhar a renda para manutenção mensal econômica da família se mudar para os EUA.
                                        <br/>
                                        <br/>
                                        <strong>Como aplicado ao EB-5 através de um Centro Regional?</strong>
                                        <br/>
                                        <br/>
                                       A utilização de um projeto já em curso é a opção mais fácil e mais conveniente, uma vez que o desempenho do investidor é completamente passivo e todos os trabalhos relacionados com o planeamento, implementação, geração de emprego e rescisão será realizado pelo desenvolvedor do projeto, de modo que o investidor e sua família não tem nada que se preocupar com a geração de postos de trabalho e as tarefas
diárias de realização do trabalho ou de negócios, por isso e outros fatores tais como a experiência significa, conhecimento na gestão deste programa, etc., esta é a alternativa recomendamos e trabalhar no Grupo global Money.
                                        <br/>
                                        <br/>
                                        1) O primeiro passo que você como um investidor deve dar, é educar-se sobre o processo e procurar aconselhamento para entender que é e como funciona. Para fazer isso, você tem todo o nosso apoio para dar o primeiro passo e aprender sobre os projetos em que você pode investir e que se qualificam para o visto EB-5.
                                        <br/>
                                        2) Determinar se o requerente preenche, este é um passo crucial no processo, porque, a fim de aplicar a este programa o candidato deve ser capaz de provar a origem dos fundos de capital para investir documentação podem incluir (sem limitação): Documentos registro de empresas no exterior, impostos pessoais e empresariais, ou imposto de qualquer espécie introduzida qualquer lugar do mundo, nos últimos 5 anos, os documentos de identificação de qualquer outra
fonte de renda, cópias autenticadas de todas as ações e pendentes processos criminais ou civis ou quaisquer processos de ação civil de direito privado que envolvem dinheiro contra o investidor nos últimos 15 anos.
                                        <br/>
                                        3) transferir o dinheiro para uma relação de confiança. Depois que o
projeto um sabor selecionado e assinaram os documentos necessários, você deve fazer a transferência de fundos para o projeto, geralmente esses projetos usam contas fiduciárias para receber osfundos. Ao mesmo tempo, a aplicação na embaixada do Formulário I-526 é realizada. tempo de processamento estimado 12-15 meses.
                                        <br/>
                                        4) Uma vez aprovado o Formulário I-526, Formulário I-485 é introduzido (se dentro de EUA, ajuste de status) ou DS-260 (se fora os EUA para um visto EB-5 e para ser admitido em os EUA).
                                        <br/>
                                        5) Uma vez aprovado o Formulário I-485 (se em os EUA) ou entrar os EUA com um visto de imigrante EB-5 investidor e as suas famílias estão garantidas com condicional residência permanente (Green Card Condicional) para período de 2 anos. Neste ponto, o candidato e sua família podem viver tranquilamente em os EUA e perseguir o que eles gostam, seja para estudar, trabalhar ou aposentar-se por um período de 2 anos.
                                        <br/>
                                        6) 90 dias antes do aniversário de seu 2 anos de condicional residência permanente, você deve digitar o I-829 para a remoção do status condicional.
                                        <br/>
                                        7) Uma vez que o pedido for aprovado, o candidato e sua família passam a viver e trabalhar legalmente nos Estados Unidos sem restrição. O seu Green Card já não tem quaisquer condições e pode, no futuro, uma vez que o prazo fixado para a lei e se você deseja aplicar para a cidadania norte-americana.
                                        <br/>
                                        8) Após 5 anos de ter feito o seu investimento, o projeto vai voltar seus recursos aplicados maior rentabilidade que ofereceu o projeto selecionado.
                                        <br/>
                                        <br/>
                                        NOTA: Para se candidatar ao EB-5, além do montante do investimento, existem custos do programa administrativos e honorários advocatícios que aumentam o valor ao montante total e deve ter em conta para a análise e consideração.
                                        <br/>
                                        <br/>
                                        Se você está interessado neste programa convidamo-lo a registrar conosco e obter mais informações e suporte.
                                        <br/>
                                        <br/>
                                        <strong>Visa E2:</strong>tratados bilaterais de amizade, comércio e navegação',

                                        /* problemas con la traduccion de la visa E2*/

    'textoInmigra5' => 'A Visa E é altamente respeitado porque ele é patrocinado por um tratado bilateral de investimentos entre os Estados Unidos e do país onde a pessoa é. Existem dois tipos de vistos E: O visto E-1 e visto E-2.
                                            <br/>
                                            <br/>
                                            O visto E-2 difere da E-1 na medida em que não exige que existe uma
empresa no país que está sendo usado para se qualificar para o tratado. O que é necessário é que haja um investimento em um negócio de US de pelo menos US $ 120.000,00 (valor sugerido) ou mais em risco.
                                            <br/>
                                            <br/>
                                            Isto origina de visto no consulado e o processo é muitas vezes o mais
rápido consulados têm janelas especiais e cônsules para tais vistos. Note bem que não dão vistos de residência E porque eles são vistos de não-imigrantes. Eles são renováveis para a vida, mas não terminam em residência. A esposa (legalmente casado) e as crianças estão sob a proteção da Visa Crianças, por exemplo, eles podem frequentar a escola enquanto os pais estão no status de visto Visa E.',

    'textoInmigra6' => 'Os beneficiários destas vistos podem viajar quando eles querem uma vez que seus vistos são refletidos em seus passaportes. Eles não precisam de uma autorização de trabalho, como tal, a menos que queiram se candidatar a uma autorização de trabalho, uma vez que a simples visto que os torna elegíveis para trabalhar e residir em os EUA Para fins práticos eles podem viver em US enquanto que o negócio existe. Os beneficiários destas
vistos podem viajar quando eles querem uma vez que seus vistos são refletidos em seus passaportes. Eles não precisam de uma autorização de trabalho, como tal, a menos que queiram se candidatar a uma autorização de trabalho, uma vez que a simples visto que os torna elegíveis para trabalhar e residir em os EUA Para fins práticos eles podem viver em US
Assim, enquanto visto de negócios visto E-2 difere da E-1 na medida em que não exige que existe uma empresa em os EUA para se qualificar para o tratado. O que é necessário é que haja um investimento em um negócio de US pelo menos US $ 100.000,00 (valor sugerido) ou mais em risco. Isto é, um investimento não só activa e ter, por exemplo, dinheiro no banco sem ser utilizado. Isso é importante para explicar. Você não pode ter apenas o dinheiro no banco ou na casa em que vive e, em seguida, dizer que você tem investimentos em os EUA O visto E-2 exige que você investir seus fundos em equipamentos ou infra-estrutura, ou para demonstrar que sua empresa ou negócio gera o valor de pelo menos US $ 100.000,00 por ano em serviços e, portanto, o investimento é grave.
                                      <br/>
                                      <br/>
                                      <strong>Alguns países incluídos no tratado são:</strong>
                                      <br/>
                                      <br/>
                                      Argentina, Bolívia, Chile, Colômbia, Costa Rica, Panamá, Paraguai, França, Alemanha, Espanha, Iatalia, Irlanda, Holanda, Noruega, Polônia, Suíça, Suécia, Reino Unido, entre outros.
                                      <br/>
                                      <br/>
                                      Geralmente para se qualificar para este tipo de visto que você deve ter a nacionalidade e passaporte de um país com um tratado, têm investido ou estar em processo de investir uma quantidade substancial de capital de risco ($ 120,000 pelo menos tão valor sugerido), têm como única intenção de entrar os EUA para desenvolver e investimento directo em que você deve mostrar, pelo menos, 50% de propriedade ou posse de controle operacional através de um cargo executivo ou outro instrumento corporativo.
                                      <br/>
                                      <br/>
                                      <strong>L1 Visa</strong>
                                      <br/>
                                      <br/>
                                      O visto L-1 para executivos, gestores e pessoas com experiência que vêm ao país em uma subsidiária, filial ou sucursal de qualquer empresa estrangeira é atribuída. O candidato a este visto deve demonstrar que eles têm trabalhado por pelo menos um ano na empresa estrangeira no administrativo, executivo, ou em uma posição que requer habilidades especiais, bem como demonstrar que veio ao país para trabalhar
temporariamente para que a empresa, sua subsidiária, filial ou subsidiária. Atualmente, os vistos L-1 são concedidas com frequência, principalmente para novas operações, no prazo de um ano, e por extensões, teria de mostrar que, entre outros, a subsidiária, filial ou sucursal dos EUA está operando comercialmente.
                                      <br/>
                                      <br/>
                                      O empresário que se aplica para um visto L-1, você deve vir para os Estados Unidos para trabalhar exclusivamente em uma subsidiária, filial ou subsidiária da empresa-mãe.
                                      <br/>
                                      <br/>
                                      <strong>H1 Visa</strong> Visto de Trabalho',

    'textoInmigra7' => 'O que aqueles vistos têm em comum é que quem pede é uma empresa americana e faz isso com o propósito de um estrangeiro para vir trabalhar para que determinada empresa, com uma finalidade específica e por um tempo específico. Vistos H-1 são concedidas a pessoas com mérito e distinto, capaz de proporcionar natureza excepcional no país, o que significa que a pessoa é "profissional" ou ter um grau de habilidade ou de reconhecimento
muito acima de competências que é ordinariamente.
                                            <br/>
                                            <br/>
                                            Arquitetos, engenheiros, advogados, médicos, cirurgiões, professores e
outras ocupações que podem ser classificados e documentados como "profissionais" estão incluídos.',

    'textoInmigra8' => 'Deve-se notar aqui que uma pessoa não deve ser apenas profissional, mas o trabalho oferecido deve requerer os serviços de um profissional. O requerente pode ser um profissional, mas se o trabalho oferecido não é o
trabalho profissional, ou exigir habilidades outra profissão, não lhe foi concedido o visto. Animadores e artistas que são famosos em seu campo, em particular, são geralmente classificadas como mérito distinto estrangeira e habilidade. Você tem que apresentar documentos para provar que, de fato, o requerente é famosa. O H-2 Visa é para os trabalhadores em geral e é concedido por um ano para um trabalhador estrangeiro que vem para os EUA para realizar serviços de natureza temporária. palavra temporária aqui é muito importante, como o empregador dos EUA deve mostrar que só precisa de no exterior por um tempo limitado. Por exemplo, um padrão americano adquiriu máquinas no exterior e precisa dos serviços de um estrangeiro para a instalação e para treinar seus trabalhadores no funcionamento do mesmo, deve aplicar-se no exterior por meio deste visto. De jeito nenhum essa taxa estrangeiro, se o padrão precisavam de seus serviços em uma base permanente.
                                            <br/>
                                            <br/>
                                            <strong>Visa O </strong>',

  	'textoInmigra9' => 'O visto O-1 é uma categoria de visto de não-imigrante baseada no emprego para os estrangeiros que possam demonstrar o reconhecimento nacional ou internacional para realizações em ciência, educação, negócios ou
atletismo. Ela exige que o empregador a apresentar uma petição com a prova da extraordinária capacidade individual mencionado, isso significa um nível de conhecimento indicando que a pessoa é um caso excepcional que
surgiu ao mais alto nível em uma determinada área com base na sua experiência e dedicação. Esta capacidade deve ser devidamente documentados e justificados através de prêmios, se você recebeu atenção da mídia, e associação com outros especialistas de renome no mesmo campo, e / ou a inovação ou grandes contribuições no campo específico de conhecimento. Os prêmios nível nacional e internacional do indivíduo são importantes para estabelecer essa capacidade extraordinária.',
  	
  	'textoInmigra10' => 'O visto O-1 também está disponível para as artes, cinema e televisão, o que pode demonstrar uma história de conquista extraordinária. AU USCIS interpreta a lei de forma muito ampla para abranger a maioria dos campos de atividade criativa. A pessoa que quer trabalhar em os EUA têm de fazê- lo na mesma área de especialização. A pessoa que procura um visto O-1 deve ter um patrocinador. Isto significa que o empregador precisa de um visto e um emprego. Por exemplo, um ator precisa de um estudo para aplicar em seu nome e a proposta correspondente.
                                            <br/>
                                            <br/>
                                            <strong>
                                                AVISO LEGAL: As informações desta página é meramente informativo e não
deve ser tomado como uma consulta jurídica ou legal é parte do leitor para verificar em seu próprio país, se tal informação é atual ou corrente no momento da consulta. Grupo de fundos global nem qualquer de seus membros responsáveis pela informação publicada aqui, ele é baseado em opiniões pessoais e investigações próprias.
                                            </strong>',

    /* VIEW ISLES */

    'tituloIsles1' => 'localização',

    'textoIsles1' => 'Ele está localizado na cidade de Sunrise. Na fronteira com o elegante Lago Mar Country Club e ao lado de uma bela vista do campo de golfe ilhas no Lago Mar está localizado no coração do Condado de Broward.
                                            <br/>
                                            <br/>
                                            O complexo residencial está espalhada por 37 acres convenientemente
localizado a uma quadra do Sawgrass Mills Mall, e para o futuro mega projeto Metropica, restaurantes, perto do Centro de BB & T mostra, o super loja para casa IKEA, Parque Markham Park, e Volunteer Park, a 15 minutos do Aeroporto Internacional de Fort Lauderdale e 45 minutos do Aeroporto Internacional de Miami.
                                            <br/>
                                            <br/>
                                            Também perto de escolas e universidades excepcionais, tais como American
Heritage, Universidade Nova, Broward College, Florida Atlantic University, entre outros. Com acesso imediato a I-75, I-595 e Highway 869 Sawgrass Expressway.
                                            <br/>
                                            <br/>
                                            <strong>RECURSOS</strong>
                                            <br/>
                                            <br/>
                                           É um complexo construída em e lago, áreas moradores têm de apartamentos compreende um total de 368 unidades, 1991-1994 Todas as unidades têm vista para o campo de golfe naturais exuberantes para apreciar o pôr do sol à noite. Os de gestão de serviços em dentro do mesmo complexo.
                                            <br/>
                                            <br/>
                                            <strong>ÁREAS COMUNS</strong>
                                            <br/>
                                            <br/>
                                            • 37 acres de beleza natural exuberante.
                                            <br/>
                                            • 2 piscinas com solário e vista para o campo de golfe e água.
                                            <br/>
                                            • 2 Spa.
                                            <br/>
                                            • Clubhouse.
                                            <br/>
                                            • Caminerias.
                                            <br/>
                                            • 2 campos de tennis.
                                            <br/>
                                            • 2 campos de raquetball.
                                            <br/>
                                            • Parque infantil.
                                            <br/>
                                            •As áreas de piquenique e churrasco.',

    /* VIEW MARQUESA */


    'textoMarquesa1' => 'Idealmente localizado em Pembroke Pines, South Florida, A Marquesa, espaçoso e residências de luxo. A comunidade está localizada perto do acesso à I-75, Florida Turnpike e I-95. A Marquesa está localizado na
frente do Pembroke Lakes Mall e perto de The Shops at Pembroke Gardens, Memorial Hospital Oeste, Keiser University, Broward College, Universidade Internacional da Flórida (FIU), Sun Life Stadium, CB Smith Park, escolas públicas e excelentes restaurantes.
                                            <br/>
                                            <br/>
                                            <strong>A City of Possibilities</strong>
                                            <br/>
                                            <br/>
                                            Pembroke Pines, a segunda cidade mais populosa do Broward County, é um
dos mais recomendados para criar os filhos em todo o estado da Flórida, segundo a revista BusinessWeek, por sua baixa taxa de criminalidade, boas escolas nas cidades da área, ampla oferecer espaços públicos de lazer, excelência em serviços de saúde Memorial Hospital, o crescimento do trabalho e bem-estar dos seus residentes.
                                            <br/>
                                            <br/>
                                            A Marquesa é uma comunidade composta de 468 unidades residenciais,
construídos em 1998 e 1999.
                                            <br/>
                                            <br/>
                                            <strong>Um condomínio fechado no meio de tudo</strong>
                                            <br/>
                                            <br/>
                                            •Condomínio.
                                            <br/>
                                            •piscina em estilo resort.
                                            <br/>
                                            •Belos jardins em toda a comunidade.
                                            <br/>
                                            •tênis coberta RAQUET Bali.
                                            <br/>
                                            •moderna e um ginásio bem equipado.
                                            <br/>
                                            •Luxurious casa do clube.
                                            <br/>
                                            •Wi-Fi em áreas públicas.
                                            <br/>
                                            •Parque infantil.
                                            <br/>
                                            •filme Salon.
                                            <br/>
                                            •churrasqueiras.
                                            <br/>
                                            •Cabañas.
                                            <br/>
                                            •Garagens e carports.
                                            <br/>
                                            •Estacionamento atribu',

    /* VIEW NEGOCIO DE LOGISTICA */

    'titutloNegocio1' => 'negócio de logística',

    'textoNegocio1' => '
                                        logística de transporte terrestre: Nos Estados Unidos, um negócio que
cresceu fortemente nos últimos anos é clara. Produto do grande movimento de uma economia forte.
                                            <br/>
                                            <br/>
                                        Os navios de transporte crescentes que chegam aos principais portos de
carga dos EUA como Houston, Miami, Nova York, Los Angeles e San Francisco requerem cerca de 43 milhões de viagens por terra as importações e exportações de produtos anuais, tornando o transporte rodoviário uma ferramenta indispensável para ligações de e para a ligação portas.
                                            <br/>
                                            <br/>
                                        70% das cargas que abastecem o mercado interno é transportado, abrangendo
todas as áreas da indústria, gerando uma média de 170.000 viagens diárias ao longo dos 48 estados americanos, transformando essa atividade em um negócio com excelentes margens rentabilidade.
                                            <br/>
                                            <br/>
                                      <strong>Mais informações Projeto:</strong>
                                      <br/>
                                      <br/>
                                        •Criação da empresa no estado da Flórida.
                                        <br/>
                                        •Plano de Negócios para pedido de visto.
                                        <br/>
                                        •2 Tract 2012 ou mais novos caminhões com cama, motor de garantia de 60.000
milhas e transmissão.
                                        <br/>
                                        <br/>
                                        <strong>Documentação necessária para:</strong>
                                        <br/>
                                        <br/>
                                        •Certificação caminhão mecânico com o estado de operar.
                                        <br/>
                                        •autorizações nacionais e estaduais para iniciar as operações.
                                        <br/>
                                        •Entregue com um contrato corretor para caminhões, sem cláusula de
permanência (o corretor investidor pode mudar a qualquer momento) ofereceu o projeto selecionado.
                                        <br/>
                                        •Consultoria de Negócios (contabilidade, operação, seguro, impostos)
                                        <br/>
                                        •Aconselhamento para a contratação de motoristas.
                                        <br/>
                                        •Primeiro de manutenção gratuitos 10.000 milhas (troca de óleo, filtro,
fluido de freio avaliação, graxa 5a roda)
                                        <br/>
                                        <br/>
                                        Investimento de US $: mais informações info@globalmoneygroup.com
                                        <br/>
                                        <br/>
                                        Você terá uma média de 4% ao mês sobre o seu investimento.',



		'textoProyecto' => $data->getDataPropiedades("textoProyecto",3),
		
		
		
		'divProyecto' => $data->getAllPropiedades("divProyecto",3),
		
		'sliders' => $data->getSliders("sliders",3)
		


];