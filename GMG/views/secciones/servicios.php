<?php 
	include '..//..//app/config.php';
	include URL_CONTROLLER . 'con_servicios.php';
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
		            <div class="title"><span class="highlight">Servicios</span></div>
		            <div class="description">Editar el Contenido de esta Secci&oacute;n</div>
		          </div>
		        </div>
		      </div>
		    </div>
		  </div>
	
		<?php include URL_TEMPLATES."btn_floating.php";?>
	
		<div class="row">
		    <div class="col-xs-12">
		      <div class="card">
				  <div class="card-body no-padding">
				    <div class="row no-gap">
					<!--Columna #1 -->
				      <div class="col-md-4 col-sm-6">
				        <div class="pricing-table no-border-left">
				          <div class="pricing-heading">
				            <div class="title">Propiedades</div>
				            <div class="price">
				              <div class="title"><span class="sign">+</span> 3</div>
				              <div class="subtitle"></div>
				            </div>
				          </div>
				          <div class="pricing-body">
				            <ul class="description">
								<?= $column1?>
				            </ul>
				          </div>
				        </div>
				      </div>
				      <!--Columna #2 -->
				      <div class="col-md-4 col-sm-6">
				        <div class="pricing-table no-border-left">
				          <div class="pricing-heading">
				            <div class="title">USA</div>
				            <div class="price">
				              <div class="title"><span class="sign">+</span> 6</div>
				              <div class="subtitle"></div>
				            </div>
				          </div>
				          <div class="pricing-body">
				            <ul class="description">
								<?= $column2?>
				            </ul>
				          </div>
				        </div>
				      </div>
				      <!--Columna #3 -->
				      <div class="col-md-4 col-sm-6">
				        <div class="pricing-table no-border-left">
				          <div class="pricing-heading">
				            <div class="title">Panama</div>
				            <div class="price">
				              <div class="title"><span class="sign">+</span> 9</div>
				              <div class="subtitle"></div>
				            </div>
				          </div>
				          <div class="pricing-body">
				            <ul class="description">
								<?= $column3?>
				            </ul>
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
    <div class="modal fade" id="imgInversiones" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
        	<form class="form-horizontal" method="POST" name="editarServicio" id="editarServicio" enctype="multipart/form-data" autocomplete="off">	
	          <div class="modal-header">
	            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	            <h4 class="modal-title">Editar Servicio: <span id='nom_servicio'></span></h4>
	          </div>
	          <div class="modal-body">
		          <div class="container">
		            		<div class="col-md-4">
						    	<div class="form-group has-success">
						    		<strong id="titulo_reg" style="visibility:hidden;" class="alert alert-success col-md-12" role="alert">
								    	Titulo Registrado!
									</strong>
						      		<input type="text" class="form-control" name="nom_servicio" id="inputSuccess1" onkeyUp="xajax_servicioCoincidencia(xajax.getFormValues('editarServicio'));" placeholder="Ingrese Titulo">
						      		<textarea name="contenido" rows="3" class="form-control" placeholder="Ingrese Contenido"></textarea>
						    	</div>
		<!-- 				    <div class="form-group has-error"> -->
		<!-- 				      <input type="text" class="form-control" id="inputError1" placeholder="Danger"> -->
		<!-- 				    </div> -->
					   		</div>
		          </div>
		        </div>
		        <div class="modal-footer">
		        	<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
		        	<button type="button" name="id_servicio" id="id_servicio" onclick="xajax_saveServicio(xajax.getFormValues('editarServicio'));" class="btn btn-sm btn-success">Save changes</button>
		        </div>
          	</form>
	     </div>
      </div>
    </div>
  <script type="text/javascript" src="<?= JS?>vendor.js"></script>
  <script type="text/javascript" src="<?= JS?>app.js"></script>
</body>
</html>