<?php 
	include '..//..//app/config.php';
	include URL_TEMPLATES . 'head.php';
?>
<body>
  <div class="app app-default app-inbox">
	<?php include URL_TEMPLATES . 'aside.php'; ?>
	
	<script type="text/ng-template" id="sidebar-dropdown.tpl.html">
    	<div class="dropdown-background">
         <div class="bg"></div>
        </div>
  		<div class="dropdown-container">
    		{{list}}
  		</div>
	</script>
	
	<div class="app-container">
		<div class="row">
		    <div class="col-lg-12">
		      <div class="card">
		        <div class="card-body app-heading">
		          <img class="profile-img" src="<?= IMAGES?>profile.png">
		          <div class="app-title">
		            <div class="title"><span class="highlight">Propiedades</span></div>
		            <div class="description">Frontend Developer</div>
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
		              <div class="col-md-12 col-sm-12">
		                <div class="section">
		                  <div class="section-title"><i class="icon fa fa-user" aria-hidden="true"></i> PROPIEDADES DE RECONTRUCCI&oacute;N</div>
		                  <div class="section-body __indent">Proyectos residenciales, comerciales u oficina en plano, construcci&oacute;n o nuevas en Florida - USA</div>
		                </div>
		                <div class="section">
		                  <div class="section-title"><i class="icon fa fa-book" aria-hidden="true"></i> PROPIEDADES EN RE-VENTA</div>
		                  <div class="section-body __indent">Computer Engineering, Khon Kaen University</div>
		                </div>
		                <div class="section">
		                  <div class="section-title"><i class="icon fa fa-book" aria-hidden="true"></i> ASESOR&iacute;A EN INMIGRACI&oacute;N A USA</div>
		                  <div class="section-body __indent">Computer Engineering, Khon Kaen University</div>
		                </div>
		                <div class="section">
		                  <div class="section-title"><i class="icon fa fa-book" aria-hidden="true"></i> FINANCIAMIENTO COMERCIAL / COMERCIAL</div>
		                  <div class="section-body __indent">Computer Engineering, Khon Kaen University</div>
		                </div>
		                <div class="section">
		                  <div class="section-title"><i class="icon fa fa-book" aria-hidden="true"></i> NEGOCIOS RENTABLES EN $</div>
		                  <div class="section-body __indent">Computer Engineering, Khon Kaen University</div>
		                </div>
		              	<div class="section">
		                  <div class="section-title"><i class="icon fa fa-book" aria-hidden="true"></i> INVERSIONES DE CAPITAL</div>
		                  <div class="section-body __indent">Computer Engineering, Khon Kaen University</div>
		                </div>
		              </div>
		              
		            </div>
		          </div>
		        </div>
		    	</div>
			</div>
		</div>
	</div>
</div>
  <script type="text/javascript" src="<?= JS?>vendor.js"></script>
  <script type="text/javascript" src="<?= JS?>app.js"></script>
</body>
</html>