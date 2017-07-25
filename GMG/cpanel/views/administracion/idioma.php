<?php 
	include '..//..//app/config.php';
	include URL_CONTROLLER . 'con_idiomas.php';
	include URL_TEMPLATES . 'head.php';
?>
<body>
  <div class="app app-default app-inbox">
	<?php include URL_TEMPLATES . 'aside.php'; ?>
	
	<div class="app-container">
		<div class="row">
		    <div class="col-lg-12">
		      <div class="card">
		        <div class="card-body app-heading">
		          <img class="profile-img" src="<?= IMAGES?>idioma3.png">
		          <div class="app-title">
		            <div class="title"><span class="highlight">Idioma</span></div>
		            <div class="description">Elija los idiomas posibles para mostrar el contenido del sitio web. </div>
		          </div>
		        </div>
		      </div>
		    </div>
		  </div>
		 
		<?php include URL_TEMPLATES."btn_floating.php";?>
		
		<div class="row">
		    <div class="col-lg-12">
		      <div class="card card-tab">
		        <div class="card-header">
		          <ul class="nav nav-tabs">
		            <li role="tab1" class="active">
		              <a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">Contenido</a>
		            </li>
		          </ul>
		        </div>
		        <div class="card-body no-padding tab-content">
		          <div role="tabpanel" class="tab-pane active" id="tab1">
		            <div class="row">
		              <div id="idiom" class="col-md-12 col-sm-12"></div>
		            </div>
		          </div>
		        </div>
		    	</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	xajax_cargarIdioma();
</script>	  

<!-- Aqui va el footer de scripts y el pie de pagina -->
<?php include URL_TEMPLATES.'footer.php';?> 

</body>
</html>