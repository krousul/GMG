<?php 
	include '..//app/config.php';
	require_once(URL_CONTROLLER . "con_vlogin.php");
	require_once(URL_CONTROLLER . "con_login.php");
	
	$login = new Login();

	if ($login->isUserLoggedIn() == true) {
	   header("location: principal.php");
	} else {
?>
	<!DOCTYPE html>
		<html lang="es">
		<head>
		<?php $xajax->printJavascript('../controller/xajax/');?>
		  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
		  <title>GMG | Login</title>
			<!-- Latest compiled and minified CSS -->
			<link rel="stylesheet" href="<?= CSS?>bootstrap.min.css">
		  <!-- CSS  -->
		   <link href="<?= CSS?>login.css" type="text/css" rel="stylesheet" media="screen,projection"/>
		</head>
		<body>
		 <div class="container">
		        <div class="card card-container">
		            <img id="profile-img" class="profile-img-card" src="<?= IMAGES?>avatar_2x.png" />
		            <p id="profile-name" class="profile-name-card"></p>
		            <form method="post" accept-charset="utf-8" action="login.php" name="loginform" autocomplete="off" role="form" class="form-signin">
					<?php
						if (isset($login)) {
							if ($login->errors) {
								?>
								<div class="alert alert-danger alert-dismissible" role="alert">
								    <strong>Error!</strong> 
								
								<?php 
								foreach ($login->errors as $error) {
									echo $error;
								}
								?>
								</div>
								<?php
							}
							if ($login->messages) {
								?>
								<div class="alert alert-success alert-dismissible" role="alert">
								    <strong>Aviso!</strong>
								<?php
								foreach ($login->messages as $message) {
									echo $message;
								}
								?>
								</div> 
								<?php 
							}
						}
						?>
		                <span id="reauth-email" class="reauth-email"></span>
		                <input class="form-control" placeholder="Usuario" name="user_name" type="text" value="" autofocus="" required>
		                <input class="form-control" placeholder="Contraseña" name="user_password" type="password" value="" autocomplete="off" required>
		                <button type="submit" class="btn btn-lg btn-success btn-block btn-signin" name="login" id="submit">Iniciar Sesi&oacute;n</button>
		                <button type="button" class="btn btn-lg btn-success btn-block btn-signin" onClick="xajax_redirectGMG();" name="regresar" id="regresar">Ir a Glabal Money Group</button>
		            </form><!-- /form -->
		        </div><!-- /card-container -->
		    </div><!-- /container -->
		  </body>
		</html>
<?php } ?>