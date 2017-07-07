<?php
	function servicioCoincidencia($frmEditarTitulo){
		$objResponse = new xajaxResponse();
	
		$servicios = new servicios();
		$arrayServicios = $servicios->getServicios();
		
		foreach ($arrayServicios as $listServicios){
			if(strtoupper($arrayServicios['nom_servicio']) == strtoupper($frmEditarTitulo['nom_servicio'])){
				$objResponse->script("$('#titulo_reg').css(\"visibility\",\"visible\");");
				return $objResponse;
				break;
			} 
		}
		$objResponse->script("$('#titulo_reg').css(\"visibility\",\"hidden\");");
		return $objResponse;
	}
	function saveUsuario($frm){
		$objResponse = new xajaxResponse();
	
		if (empty($frm['firstname'])){
			$errors[] = "Nombres vacíos";
		} elseif (empty($frm['lastname'])){
			$errors[] = "Apellidos vacíos";
		}  elseif (empty($frm['user_name'])) {
            $errors[] = "Nombre de usuario vacío";
        } elseif (empty($frm['user_password_new']) || empty($frm['user_password_repeat'])) {
            $errors[] = "Contraseña vacía";
        } elseif ($frm['user_password_new'] !== $frm['user_password_repeat']) {
            $errors[] = "la contraseña y la repetición de la contraseña no son lo mismo";
        } elseif (strlen($frm['user_password_new']) < 6) {
            $errors[] = "La contraseña debe tener como mínimo 6 caracteres";
        } elseif (strlen($frm['user_name']) > 64 || strlen($frm['user_name']) < 2) {
            $errors[] = "Nombre de usuario no puede ser inferior a 2 o más de 64 caracteres";
        } elseif (!preg_match('/^[a-z\d]{2,64}$/i', $frm['user_name'])) {
            $errors[] = "Nombre de usuario no encaja en el esquema de nombre: Sólo aZ y los números están permitidos , de 2 a 64 caracteres";
        } elseif (empty($frm['user_email'])) {
            $errors[] = "El correo electrónico no puede estar vacío";
        } elseif (strlen($frm['user_email']) > 64) {
            $errors[] = "El correo electrónico no puede ser superior a 64 caracteres";
        } elseif (!filter_var($frm['user_email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Su dirección de correo electrónico no está en un formato de correo electrónico válida";
        } elseif (
			!empty($frm['user_name'])
			&& !empty($frm['firstname'])
			&& !empty($frm['lastname'])
            && strlen($frm['user_name']) <= 64
            && strlen($frm['user_name']) >= 2
            && preg_match('/^[a-z\d]{2,64}$/i', $frm['user_name'])
            && !empty($frm['user_email'])
            && strlen($frm['user_email']) <= 64
            && filter_var($frm['user_email'], FILTER_VALIDATE_EMAIL)
            && !empty($frm['user_password_new'])
            && !empty($frm['user_password_repeat'])
            && ($frm['user_password_new'] === $frm['user_password_repeat'])
        ){
				// escaping, additionally removing everything that could be (html/javascript-) code
                $firstname = strip_tags($frm["firstname"],ENT_QUOTES);
				$lastname = strip_tags($frm["lastname"],ENT_QUOTES);
				$user_name = strip_tags($frm["user_name"],ENT_QUOTES);
                $user_email = strip_tags($frm["user_email"],ENT_QUOTES);
				$user_password = $frm['user_password_new'];
				$date_added=date("Y-m-d H:i:s");
				$user_password_hash = password_hash($user_password, PASSWORD_DEFAULT);
			
				//Chequear si existe el usuario o email
// 				$objUser = new users();
// 				$existeUser = $objUser->getMail($user_name, $user_email);
			
				$PDO = new Conexion();
				$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				$sQuery = "SELECT * FROM users WHERE user_name = '{$user_name}' OR user_email = '{$user_email}';";
				
				$Result = $PDO->prepare($sQuery);
				$Result->setFetchMode(PDO::FETCH_ASSOC);
				$Result->execute();

                if ($Result->rowCount() > 0){
                    $errors[] = "Lo sentimos , el nombre de usuario &oacute; la direcci&oacute;n de correo electr&oacute;nico ya est&aacute;� en uso.";
                } else {
					
                	$PDO = new Conexion();
                	$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                	
                	try {
                		//Guardando archivos
                	
                    $consulta = "INSERT INTO users (firstname, lastname, user_name, user_password_hash, user_email, date_added)
                            VALUES('".$firstname."','".$lastname."','" . $user_name . "', '" . $user_password_hash . "', '" . $user_email . "','".$date_added."');";
                		
                	
                		$PDO->exec($consulta);

                		$messages[] = "La cuenta ha sido creada con &Eacute;xito.";
                	}catch( PDOException $e ) {
                		//echo "Error: ".$e->getMessage()."\n Linea : ".__LINE__;
                		$errors[] = "Lo sentimos , el registro fall&oacute;. Por favor, regrese y vuelva a intentarlo.";
                	}
                }
            
        } else {
            $errors[] = "Un error desconocido ocurri&oacute;.";
        }
		
        if (isset($errors)){
        	foreach ($errors as $error) {
        		$list .= $error." ";
        	}
        	
	        $html = "<div class='alert alert-danger' role='alert'>
	        			<button type='button' class='close' data-dismiss='alert'>&times;</button>
	        				<strong>Error!</strong> 
	        				{$list}
	        		</div>";
        	$objResponse->assign("resultados", 'innerHTML', $html);
        }
        if (isset($messages)){
        	foreach ($messages as $message) {
        		$list .= $message." ";
        	}
        	
        	$html = "<div class='alert alert-success' role='alert'>
			        	<button type='button' id='closeSucces' class='close' data-dismiss='alert'>&times;</button>
				        	<strong>¡Bien hecho!</strong>
				        	{$list}
		        	</div>";
        	$objResponse->assign("resultados", 'innerHTML', $html);
        }
        
		return $objResponse;
	}
	function inicioLoad(){
		// escaping, additionally removing everything that could be (html/javascript-) code
		$q = strip_tags($_REQUEST['q'], ENT_QUOTES);
		$aColumns = array('firstname', 'lastname');//Columnas de busqueda
		$sTable = "users";
		$sWhere = "";
			
		if ( $_GET['q'] != "" )
		{
			$sWhere = "WHERE (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= $aColumns[$i]." LIKE '%".$q."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
		$sWhere.=" order by id_users desc";
		include URL_AJAX.'pagination.php'; //include pagination file
		//pagination variables
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 10; //how much records you want to show
		$adjacents  = 4; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;
		//Count the total number of row in your table*/
		
		$PDO = new Conexion();
		$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$sQuery = "SELECT count(*) AS numrows FROM $sTable  $sWhere";
		
		$Result = $PDO->prepare($sQuery);
		$Result->setFetchMode(PDO::FETCH_ASSOC);
		$Result->execute();
		
		$numrows = $Result->rowCount();
		
		$total_pages = ceil($numrows/$per_page);
		$reload = './usuarios.php';
		
		//main query to fetch the data
		$PDO = new Conexion();
		$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$sQuery = "SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
		
		$Result = $PDO->prepare($sQuery);
		$Result->setFetchMode(PDO::FETCH_ASSOC);
		$Result->execute();
		
		$numrows = $Result->rowCount();
		
		//loop through fetched data
		if ($numrows>0){
				
			?>
					<div class="table-responsive">
					  <table class="table">
						<tr  class="success">
							<th>ID</th>
							<th>Nombres</th>
							<th>Usuario</th>
							<th>Email</th>
							<th>Agregado</th>
							<th><span class="pull-right">Acciones</span></th>
							
						</tr>
						<?php
						while ($row = $Result->fetch()){
								$user_id=$row['id_users'];
								$fullname=$row['firstname']." ".$row["lastname"];
								$user_name=$row['user_name'];
								$user_email=$row['user_email'];
								$date_added= date('d/m/Y', strtotime($row['date_added']));
								
							?>
							
							<input type="hidden" value="<?php echo $row['firstname'];?>" id="nombres<?php echo $user_id;?>">
							<input type="hidden" value="<?php echo $row['lastname'];?>" id="apellidos<?php echo $user_id;?>">
							<input type="hidden" value="<?php echo $user_name;?>" id="usuario<?php echo $user_id;?>">
							<input type="hidden" value="<?php echo $user_email;?>" id="email<?php echo $user_id;?>">
						
							<tr>
								<td><?php echo $user_id; ?></td>
								<td><?php echo $fullname; ?></td>
								<td ><?php echo $user_name; ?></td>
								<td ><?php echo $user_email; ?></td>
								<td><?php echo $date_added;?></td>
								
							<td ><span class="pull-right">
							<a href="#" class='btn btn-default' title='Editar usuario' onclick="obtener_datos('<?php echo $user_id;?>');" data-toggle="modal" data-target="#myModal2"><i class="glyphicon glyphicon-edit"></i></a> 
							<a href="#" class='btn btn-default' title='Cambiar contraseña' onclick="get_user_id('<?php echo $user_id;?>');" data-toggle="modal" data-target="#myModal3"><i class="glyphicon glyphicon-cog"></i></a>
							<a href="#" class='btn btn-default' title='Borrar usuario' onclick="eliminar('<? echo $user_id; ?>')"><i class="glyphicon glyphicon-trash"></i> </a></span></td>
								
							</tr>
							<?php
						}
						?>
						<tr>
							<td colspan=9><span class="pull-right">
							<?php
							 echo paginate($reload, $page, $total_pages, $adjacents);
							?></span></td>
						</tr>
					  </table>
					</div>
					<?php
				}
	}
	//REGISTRO DE FUNCIONES XAJAX
	$xajax->register(XAJAX_FUNCTION, "inicioLoad");
	$xajax->register(XAJAX_FUNCTION, "servicioCoincidencia");
	$xajax->register(XAJAX_FUNCTION, "saveUsuario");
?>