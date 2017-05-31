<?php 
	include '..//app/config.php';
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

	  <div class="btn-floating" id="help-actions">
		  <button type="button" class="btn btn-default btn-toggle" data-toggle="toggle" data-target="#help-actions">
		  <i class="icon fa fa-plus"></i><span class="help-text">Shortcut</span>
	  </button>
	  <div class="toggle-content">
	    <ul class="actions">
	      <li><a href="#">Website</a></li>
	      <li><a href="#">Documentation</a></li>
	      <li><a href="#">Issues</a></li>
	      <li><a href="#">About</a></li>
	    </ul>
	  </div>
	</div>
	
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