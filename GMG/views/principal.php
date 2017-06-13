<?php 
	include '..//app/config.php';
	include URL_CONTROLLER . 'con_principal.php';
	include URL_TEMPLATES . 'head.php';
?>
<body>
 	<div class="app app-default" id="sidebar-dropdown.tpl.html">
		<?php include URL_TEMPLATES . 'aside.php'; ?>
		
		<script type="text/ng-template" >
    		<div class="dropdown-background">
        		<div class="bg"></div>
        	</div>
  			<div class="dropdown-container">
    			{{list}}
  			</div>
		</script>
		<div class="app-container" id="background_principal">
			<?php include URL_TEMPLATES."btn_floating.php";?>
			<div class="tittle_principal">
				<h1><em>Bienvenidos a la Interfaz Administrativa de la Aplicaci&oacute;n </em>GMG</h1>
			</div>
			<div>
		  		<?php include URL_TEMPLATES . 'footer.php';?>
		  	</div>
		</div>
	</div>
  <script type="text/javascript" src="<?= JS?>vendor.js"></script>
  <script type="text/javascript" src="<?= JS?>app.js"></script>

</body>
</html>