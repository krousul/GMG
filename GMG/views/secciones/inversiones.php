<?php 
include '../../app/config.php';
include URL_TEMPLATES.'head.php'; 

//Despues de un Response
if($_REQUEST){
		
	include URL_MODEL.'validarArchivos.php';
	countResponse($_REQUEST);
}

?>
<body>
  <div class="app app-default ">
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
		            <div class="title"><span class="highlight">Inversiones</span></div>
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
                  <div class="card-body">
		            <div class="row">
		              <div class="col-md-4 col-sm-4">
		                <div class="section">
		                  <div class="section-title"><i class="icon fa fa-book" aria-hidden="true"></i> IMAGEN 1</div>
		                  <div class="section-body __indent">
						    <div>
						      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#imgInversiones1">
				                  <div><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;EDITAR</div>
						      </button>
						    </div>
		                  </div>
		                </div>
		              </div>
              		  <div class="col-md-4 col-sm-4">
		                <div class="section">
		                  <div class="section-title"><i class="icon fa fa-book" aria-hidden="true"></i>IMAGEN 2</div>
		                  <div class="section-body __indent">
						    <div>
						      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#imgInversiones2">
				                  <div><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;EDITAR</div>
						      </button>
						    </div>
		                  </div>
		                </div>
		              </div>
              		  <div class="col-md-4 col-sm-4">
		                <div class="section">
		                  <div class="section-title"><i class="icon fa fa-book" aria-hidden="true"></i>IMAGEN 3</div>
		                  <div class="section-body __indent">
						    <div>
						      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#imgInversiones3">
				                  <div><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;EDITAR</div>
						      </button>
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
		</div>
	</div>
</div>

#Modales
    <div class="modal fade" id="imgInversiones1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
		  <form class="form-horizontal" method="GET" action="Inversiones.php" enctype="multipart/form-data" autocomplete="off">								
	          <div class="modal-header">
	            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	            <h4 class="modal-title">Editando imagen 1</h4>
	          </div>
	          <div class="modal-body">
		         <div class="container">
		         	<div class="row">
						<div class="form-group">
							<div class="col-sm-5">
								<label for="idioma" class="control-label">Eliga el idioma de edici&oacute;n</label>
								<select name="idioma" id="idioma">
									<option value="1">Espa&ntilde;ol</option>
									<option value="2">Ingles</option>
									<option value="3">Portugues</option>
								</select>
							</div>
						</div>
					</div>
		         	<div class="row">
						<div class="form-group">
							<div class="col-sm-5">
								<label for="archivo" class="control-label">Ingrese la imagen</label>
								<input type="file" class="form-control" id="archivo" name="archivo">
							</div>
						</div>
					</div>
				</div>
	          </div>
	          <div class="modal-footer">
	            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cerrar</button>
	            <button type="submit" class="btn btn-sm btn-success">Guardar Cambios</button>
	          </div>
		  </form>
        </div>
      </div>
    </div>
    <div class="modal fade" id="imgInversiones2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Aqui 2</h4>
          </div>
          <div class="modal-body">
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-sm btn-success">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="imgInversiones3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Aqui 3</h4>
          </div>
          <div class="modal-body">
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-sm btn-success">Save changes</button>
          </div>
        </div>
      </div>
    </div>

<?php include URL_TEMPLATES.'footer.php'; ?>
<?php include URL_TEMPLATES.'footer_includes.php' ; ?>

  <script type="text/javascript" src="<?= JS?>vendor.js"></script>
  <script type="text/javascript" src="<?= JS?>app.js"></script>
</body>
</html>