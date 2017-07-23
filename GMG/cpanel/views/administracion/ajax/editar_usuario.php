<?php
		if (empty($_POST['firstname2'])){
			$errors[] = "Nombres vacíos";
		} elseif (empty($_POST['lastname2'])){
			$errors[] = "Apellidos vacíos";
		}  elseif (empty($_POST['user_name2'])) {
            $errors[] = "Nombre de usuario vacío";
        }  elseif (strlen($_POST['user_name2']) > 64 || strlen($_POST['user_name2']) < 2) {
            $errors[] = "Nombre de usuario no puede ser inferior a 2 o más de 64 caracteres";
        } elseif (!preg_match('/^[a-z\d]{2,64}$/i', $_POST['user_name2'])) {
            $errors[] = "Nombre de usuario no encaja en el esquema de nombre: Sólo aZ y los números están permitidos , de 2 a 64 caracteres";
        } elseif (empty($_POST['user_email2'])) {
            $errors[] = "El correo electrónico no puede estar vacío";
        } elseif (strlen($_POST['user_email2']) > 64) {
            $errors[] = "El correo electrónico no puede ser superior a 64 caracteres";
        } elseif (!filter_var($_POST['user_email2'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Su dirección de correo electrónico no está en un formato de correo electrónico válida";
        } elseif (
			!empty($_POST['user_name2'])
			&& !empty($_POST['firstname2'])
			&& !empty($_POST['lastname2'])
            && strlen($_POST['user_name2']) <= 64
            && strlen($_POST['user_name2']) >= 2
            && preg_match('/^[a-z\d]{2,64}$/i', $_POST['user_name2'])
            && !empty($_POST['user_email2'])
            && strlen($_POST['user_email2']) <= 64
            && filter_var($_POST['user_email2'], FILTER_VALIDATE_EMAIL)
          )
         {
        	$con=@mysqli_connect('localhost', 'root', '', 'gmg_db');
			if(!$con){
				die("imposible conectarse: ".mysqli_error($con));
			}
			if (@mysqli_connect_errno()) {
				die("Conexión falló: ".mysqli_connect_errno()." : ". mysqli_connect_error());
			}
			
				// escaping, additionally removing everything that could be (html/javascript-) code
                $firstname = mysqli_real_escape_string($con,(strip_tags($_POST["firstname2"],ENT_QUOTES)));
				$lastname = mysqli_real_escape_string($con,(strip_tags($_POST["lastname2"],ENT_QUOTES)));
				$user_name = mysqli_real_escape_string($con,(strip_tags($_POST["user_name2"],ENT_QUOTES)));
                $user_email = mysqli_real_escape_string($con,(strip_tags($_POST["user_email2"],ENT_QUOTES)));
				
				$user_id=intval($_POST['mod_id']);
					
               
					// write new user's data into database
                    $sql = "UPDATE users SET firstname='".$firstname."', lastname='".$lastname."', user_name='".$user_name."', user_email='".$user_email."'
                            WHERE id_users='".$user_id."';";
                    $query_update = mysqli_query($con,$sql);

                    // if user has been added successfully
                    if ($query_update) {
                        $messages[] = "La cuenta ha sido modificada con éxito.";
                    } else {
                        $errors[] = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.";
                    }
                
            
        } else {
            $errors[] = "Un error desconocido ocurrió.";
        }
		
		if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}

?>