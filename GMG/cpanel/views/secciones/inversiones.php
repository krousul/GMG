<?php 

	include '..//..//app/config.php';
	include URL_CONTROLLER . 'con_inversiones.php';
	include URL_TEMPLATES . 'head.php';
		
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
		          <img class="profile-img" src="<?= IMAGES?>propiedades2.png">
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
		          <div id="idiom" class="btn-group"></div>
		        </div>		        
		        <div class="card-body no-padding tab-content">
		          <div role="tabpanel" class="tab-pane active" id="tab1">
                  <div class="card-body">
		            <div class="row">
		              <div class="col-md-4 col-sm-4">
		                <div class="section">
		                  <div class="section-title"><i class="icon fa fa-book" aria-hidden="true"></i> SECCION 1</div>
		                  <div class="section-body">
			                 <div class="thumbnail">
								<img src="<?php if(!empty($img['Inversiones1'])) echo $img['Inversiones1']; ?>" class="img-responsive"  height="300px" width="300px">
								<div class="caption">
									<h3 class="title"><?php if(!empty($des['Inversiones1'])) echo $des['Inversiones1']; ?><a class="anchorjs-link" href="#thumbnail-label"><span class="anchorjs-icon"></span></a></h3>
								</div>
							    <div align="center">
							      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#<?= $IDFORMS[MODULE_INV][0]; ?>">
					                  <div><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;EDITAR</div>
							      </button>
							    </div>
							</div>
		                  </div>
		                </div>
		              </div>
              		  <div class="col-md-4 col-sm-4">
		                <div class="section">
		                  <div class="section-title"><i class="icon fa fa-book" aria-hidden="true"></i>SECCION 2</div>
		                  <div class="section-body">
			                 <div class="thumbnail">
								<img src="<?php if(!empty($img['Inversiones2'])) echo $img['Inversiones2']; ?>" class="img-responsive" height="300px" width="300px">
								<div class="caption">
									<h3 class="title"><?php if(!empty($des['Inversiones2'])) echo $des['Inversiones2']; ?><a class="anchorjs-link" href="#thumbnail-label"><span class="anchorjs-icon"></span></a></h3>
								</div>
							    <div align="center">
							      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#<?= $IDFORMS[MODULE_INV][1]; ?>">
					                  <div><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;EDITAR</div>
							      </button>
							    </div>
							</div>
		                  </div>
		                </div>
		              </div>
              		  <div class="col-md-4 col-sm-4">
		                <div class="section">
		                  <div class="section-title"><i class="icon fa fa-book" aria-hidden="true"></i>SECCION 3</div>
		                  <div class="section-body">
			                 <div class="thumbnail">
								<img src="<?php if(!empty($img['Inversiones3'])) echo $img['Inversiones3']; ?>" class="img-responsive" height="300px" width="300px">
								<div class="caption">
									<h3 class="title"><?php if(!empty($des['Inversiones3'])) echo $des['Inversiones3']; ?><a class="anchorjs-link" href="#thumbnail-label"><span class="anchorjs-icon"></span></a></h3>
								</div>
							    <div align="center">
							      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#<?= $IDFORMS[MODULE_INV][2]; ?>">
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
</div>

<!-- Modales -->

    <div class="modal fade" id="<?= $IDFORMS[MODULE_INV][0]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
		  <form class="form-horizontal" method="POST" action="Inversiones.php" enctype="multipart/form-data" autocomplete="off">								
	          <div class="modal-header">
	            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	            <h4 class="modal-title">EDITANDO SECCION 1</h4>
	          </div>
	          <div class="modal-body">
		         <div class="container">
		         	<div class="row">
						<div class="form-group">
							<div class="col-sm-5">
								<label for="idioma1" class="control-label">Eliga el idioma de edici&oacute;n</label>
								<select name="idioma1" id="idioma1">
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
								<input type="file" class="form-control" id="<?= $IDFORMS[MODULE_INV][0]; ?>file1" name="<?= $IDFORMS[MODULE_INV][0]; ?>file1">
								<div align="center">
									<output id="<?= $IDFORMS[MODULE_INV][0]; ?>file1_img"></output>
								</div>
							</div>
						</div>
					</div>
		         	<div class="row">
						<div class="form-group">
							<div class="col-sm-5">
								Titulo: <input value="<?=  $des['Inversiones1']; ?>" id="<?= $IDFORMS[MODULE_INV][0]; ?>text1" name="<?= $IDFORMS[MODULE_INV][0]; ?>text1" class="form-control" placeholder="Input" type="text">
							</div>
						</div>
					</div>
				</div>
	          </div>
	          <div class="modal-footer">
	            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cerrar</button>
	            <button type="submit" class="btn btn-sm btn-success"  name="<?= $IDFORMS[MODULE_INV][0]; ?>" value="<?= $IDFORMS[MODULE_INV][0]; ?>">Guardar Cambios</button>
	          </div>
		  </form>
        </div>
      </div>
    </div>
    <div class="modal fade" id="<?= $IDFORMS[MODULE_INV][1]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
			<form class="form-horizontal" method="POST" action="Inversiones.php" enctype="multipart/form-data" autocomplete="off">								
          	  <div class="modal-header">
	            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	            <h4 class="modal-title">EDITANDO SECCION 1</h4>
	          </div>
	          <div class="modal-body">
		         <div class="container">
		         	<div class="row">
						<div class="form-group">
							<div class="col-sm-5">
								<label for="idioma1" class="control-label">Eliga el idioma de edici&oacute;n</label>
								<select name="idioma1" id="idioma1">
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
								<input type="file" class="form-control" id="<?= $IDFORMS[MODULE_INV][1]; ?>file1" name="<?= $IDFORMS[MODULE_INV][1]; ?>file1">
								<div align="center">
									<output id="<?= $IDFORMS[MODULE_INV][1]; ?>file1_img"></output>
								</div>
							</div>
						</div>
					</div>
		         	<div class="row">
						<div class="form-group">
							<div class="col-sm-5">
								Titulo: <input value="<?=  $des['Inversiones2']; ?>" id="<?= $IDFORMS[MODULE_INV][1]; ?>text1" name="<?= $IDFORMS[MODULE_INV][1]; ?>text1" class="form-control" placeholder="Input" type="text">
							</div>
						</div>
					</div>
				</div>
	          </div>
	          <div class="modal-footer">
	            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cerrar</button>
	            <button type="submit" class="btn btn-sm btn-success"  name="<?= $IDFORMS[MODULE_INV][1]; ?>" value="<?= $IDFORMS[MODULE_INV][1]; ?>">Guardar Cambios</button>
	          </div>
		  </form>
        </div>
      </div>
    </div>
     <div class="modal fade" id="<?= $IDFORMS[MODULE_INV][2]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
			<form class="form-horizontal" method="POST" action="Inversiones.php" enctype="multipart/form-data" autocomplete="off">								
          	  <div class="modal-header">
	            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	            <h4 class="modal-title">EDITANDO SECCION 1</h4>
	          </div>
	          <div class="modal-body">
		         <div class="container">
		         	<div class="row">
						<div class="form-group">
							<div class="col-sm-5">
								<label for="idioma1" class="control-label">Eliga el idioma de edici&oacute;n</label>
								<select name="idioma1" id="idioma1">
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
								<input type="file" class="form-control" id="<?= $IDFORMS[MODULE_INV][2]; ?>file1" name="<?= $IDFORMS[MODULE_INV][2]; ?>file1">
								<div align="center">
									<output id="<?= $IDFORMS[MODULE_INV][2]; ?>file1_img"></output>
								</div>
							</div>
						</div>
					</div>
		         	<div class="row">
						<div class="form-group">
							<div class="col-sm-5">
								Titulo: <input value="<?=  $des['Inversiones3']; ?>" id="<?= $IDFORMS[MODULE_INV][2]; ?>text1" name="<?= $IDFORMS[MODULE_INV][2]; ?>text1" class="form-control" placeholder="Input" type="text">
							</div>
						</div>
					</div>
				</div>
	          </div>
	          <div class="modal-footer">
	            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cerrar</button>
	            <button type="submit" class="btn btn-sm btn-success" name="<?= $IDFORMS[MODULE_INV][2]; ?>" value="<?= $IDFORMS[MODULE_INV][2]; ?>">Guardar Cambios</button>
	          </div>
		  </form>
        </div>
      </div>
    </div>
	<script type="text/javascript">
		xajax_getIdiomList('<?php echo URL_VIEWS_IDIOM.'inversiones.php?getContentsIdiom='; ?>');
		<?php if(!empty($showViews['MSJ'])){ ?>
			xajax_saveState("<?= $showViews['MSJ']?>");
		<?php } ?>
	</script>

<!-- FOOTER -->
<?php include URL_TEMPLATES.'footer.php';?> 
<script type="text/javascript" src="<?= JS?>previewImageInversiones.js"></script>

</html>