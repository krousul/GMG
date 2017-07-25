<?php 
	include '..//app/config.php';
	include URL_CONTROLLER . 'con_principal.php';
	include URL_TEMPLATES . 'head.php';
?>
<body>
  <div class="app app-default app-inbox">
		<?php include URL_TEMPLATES . 'aside.php'; ?>
	  
	    <div class="app-container" id="background_principal">
			<div class="tittle_principal">
				<h1><em>Bienvenidos a la Interfaz Administrativa de la Aplicaci&oacute;n </em>GMG</h1>
			</div>		  
		<?php include URL_TEMPLATES."btn_floating.php";?>
		
		</div>
	</div>
  <script type="text/javascript" src="<?= JS?>vendor.js"></script>
  <script type="text/javascript" src="<?= JS?>app.js"></script>

</body>
</html>