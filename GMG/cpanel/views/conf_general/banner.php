<?php 
	include '..//..//app/config.php';
	include URL_CONTROLLER . 'con_banner.php';
	include URL_TEMPLATES . 'head.php';
	?>
<body>
  <div class="app app-default ">
	<?php include URL_TEMPLATES . 'aside.php'; ?>
	<div class="app-container">
		<div class="row">
		    <div class="col-lg-12">
		      <div class="card">
		        <div class="card-body app-heading">
		          <img class="profile-img" src="<?= IMAGES?>confi3.png">
		          <div class="app-title">
		            <div class="title"><span class="highlight">Banner</span></div>
		            <div class="description">Editar las Im&aacute;genes del Banner Principal</div>
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
		            <li role="tab1" id="linkbanner1">
		              <a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">Imagen 1</a>
		            </li>
		            <li role="tab2" id="linkbanner2">
		              <a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">Imagen 2</a>
		            </li>
		            <li role="tab3" id="linkbanner3">
		              <a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab">Imagen 3</a>
		            </li>
		            <li role="tab4" id="linkbanner4">
		              <a href="#tab4" aria-controls="tab4" role="tab" data-toggle="tab">Imagen 4</a>
		            </li>
		            <li role="tab5" id="linkbanner5">
		              <a href="#tab5" aria-controls="tab5" role="tab" data-toggle="tab">Imagen 5</a>
		            </li>
		          </ul>
		          <div id="idiom" class="btn-group"></div>
		        </div>
		        
		        <div class="card-body no-padding tab-content">
		          <div role="tabpanel" class="tab-pane" id="tab1">
	                  <div class="card-body">
			            <div class="row">
			              <div class="col-md-12 col-sm-12">
			                <div class="section">
			                  <div class="section-body">
							    <div align="center">
							      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#<?= $IDFORMS[MODULE_BANNER][0]; ?>">
					                  <div><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;EDITAR</div>
							      </button>
							    </div>
								<img src="<?php if(!empty($img['Banner1'])) echo $img['Banner1']; ?>" class="img-responsive">
								<div class="caption">
									<h3 class="title"><?php if(!empty($des['Banner1'])) echo $des['Banner1']; ?><a class="anchorjs-link" href="#thumbnail-label"><span class="anchorjs-icon"></span></a></h3>
								</div>
			                  </div>
			                </div>
			              </div>
			            </div>
		          	</div>
		          </div>
		          <div role="tabpanel" class="tab-pane" id="tab2">
	                  <div class="card-body">
			            <div class="row">
			              <div class="col-md-12 col-sm-12">
			                <div class="section">
			                  <div class="section-body">
							    <div align="center">
							      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#<?= $IDFORMS[MODULE_BANNER][1]; ?>">
					                  <div><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;EDITAR</div>
							      </button>
							    </div>
								<img src="<?php if(!empty($img['Banner2'])) echo $img['Banner2']; ?>" class="img-responsive" >
								<div class="caption">
									<h3 class="title"><?php if(!empty($des['Banner2'])) echo $des['Banner2']; ?><a class="anchorjs-link" href="#thumbnail-label"><span class="anchorjs-icon"></span></a></h3>
								</div>
			                  </div>
			                </div>
			              </div>
			            </div>
		          	</div>
		          </div>
		          <div role="tabpanel" class="tab-pane" id="tab3">
	                  <div class="card-body">
			            <div class="row">
			              <div class="col-md-12 col-sm-12">
			                <div class="section">
			                  <div class="section-body">
							    <div align="center">
							      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#<?= $IDFORMS[MODULE_BANNER][2]; ?>">
					                  <div><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;EDITAR</div>
							      </button>
							    </div>
								<img src="<?php if(!empty($img['Banner3'])) echo $img['Banner3']; ?>" class="img-responsive">
								<div class="caption">
									<h3 class="title"><?php if(!empty($des['Banner3'])) echo $des['Banner3']; ?><a class="anchorjs-link" href="#thumbnail-label"><span class="anchorjs-icon"></span></a></h3>
								</div>
			                  </div>
			                </div>
			              </div>
			            </div>
		          	</div>
		          </div>
		          <div role="tabpanel" class="tab-pane" id="tab4">
	                  <div class="card-body">
			            <div class="row">
			              <div class="col-md-12 col-sm-12">
			                <div class="section">
			                  <div class="section-body">
							    <div align="center">
							      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#<?= $IDFORMS[MODULE_BANNER][3]; ?>">
					                  <div><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;EDITAR</div>
							      </button>
							    </div>
								<img src="<?php if(!empty($img['Banner4'])) echo $img['Banner4']; ?>" class="img-responsive">
								<div class="caption">
									<h3 class="title"><?php if(!empty($des['Banner4'])) echo $des['Banner4']; ?><a class="anchorjs-link" href="#thumbnail-label"><span class="anchorjs-icon"></span></a></h3>
								</div>
			                  </div>
			                </div>
			              </div>
			            </div>
		          	</div>
		          </div>
		          <div role="tabpanel" class="tab-pane" id="tab5">
	                  <div class="card-body">
			            <div class="row">
			              <div class="col-md-12 col-sm-12">
			                <div class="section">
			                  <div class="section-body">
							    <div align="center">
							      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#<?= $IDFORMS[MODULE_BANNER][4]; ?>">
					                  <div><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;EDITAR</div>
							      </button>
							    </div>
								<img src="<?php if(!empty($img['Banner5'])) echo $img['Banner5']; ?>" class="img-responsive">
								<div class="caption">
									<h3 class="title"><?php if(!empty($des['Banner5'])) echo $des['Banner5']; ?><a class="anchorjs-link" href="#thumbnail-label"><span class="anchorjs-icon"></span></a></h3>
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

    <div class="modal fade" id="<?= $IDFORMS[MODULE_BANNER][0]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
		  <form class="form-horizontal" method="POST" action="Banner.php" enctype="multipart/form-data" autocomplete="off">								
	          <div class="modal-header">
	            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	            <h4 class="modal-title">EDITANDO IMAGEN 1</h4>
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
								<input type="file" class="form-control" id="<?= $IDFORMS[MODULE_BANNER][0]; ?>file1" name="<?= $IDFORMS[MODULE_BANNER][0]; ?>file1">
								<div align="center">
									<output id="<?= $IDFORMS[MODULE_BANNER][0]; ?>file1_img"></output>
								</div>
							</div>
						</div>
					</div>
				</div>
	          </div>
	          <div class="modal-footer">
	            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cerrar</button>
	            <button type="submit" class="btn btn-sm btn-success"  name="<?= $IDFORMS[MODULE_BANNER][0]; ?>" value="<?= $IDFORMS[MODULE_BANNER][0]; ?>">Guardar Cambios</button>
	          </div>
		  </form>
        </div>
      </div>
    </div>
    <div class="modal fade" id="<?= $IDFORMS[MODULE_BANNER][1]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
		  <form class="form-horizontal" method="POST" action="Banner.php" enctype="multipart/form-data" autocomplete="off">								
	          <div class="modal-header">
	            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	            <h4 class="modal-title">EDITANDO IMAGEN 2</h4>
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
								<input type="file" class="form-control" id="<?= $IDFORMS[MODULE_BANNER][1]; ?>file1" name="<?= $IDFORMS[MODULE_BANNER][1]; ?>file1">
								<div align="center">
									<output id="<?= $IDFORMS[MODULE_BANNER][1]; ?>file1_img"></output>
								</div>
							</div>
						</div>
					</div>
				</div>
	          </div>
	          <div class="modal-footer">
	            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cerrar</button>
	            <button type="submit" class="btn btn-sm btn-success"  name="<?= $IDFORMS[MODULE_BANNER][1]; ?>" value="<?= $IDFORMS[MODULE_BANNER][1]; ?>">Guardar Cambios</button>
	          </div>
		  </form>
        </div>
      </div>
    </div>
    <div class="modal fade" id="<?= $IDFORMS[MODULE_BANNER][2]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
		  <form class="form-horizontal" method="POST" action="Banner.php" enctype="multipart/form-data" autocomplete="off">								
	          <div class="modal-header">
	            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	            <h4 class="modal-title">EDITANDO IMAGEN 3</h4>
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
								<input type="file" class="form-control" id="<?= $IDFORMS[MODULE_BANNER][2]; ?>file1" name="<?= $IDFORMS[MODULE_BANNER][2]; ?>file1">
								<div align="center">
									<output id="<?= $IDFORMS[MODULE_BANNER][2]; ?>file1_img"></output>
								</div>
							</div>
						</div>
					</div>
				</div>
	          </div>
	          <div class="modal-footer">
	            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cerrar</button>
	            <button type="submit" class="btn btn-sm btn-success"  name="<?= $IDFORMS[MODULE_BANNER][2]; ?>" value="<?= $IDFORMS[MODULE_BANNER][2]; ?>">Guardar Cambios</button>
	          </div>
		  </form>
        </div>
      </div>
    </div>
    <div class="modal fade" id="<?= $IDFORMS[MODULE_BANNER][3]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
		  <form class="form-horizontal" method="POST" action="Banner.php" enctype="multipart/form-data" autocomplete="off">								
	          <div class="modal-header">
	            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	            <h4 class="modal-title">EDITANDO IMAGEN 4</h4>
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
								<input type="file" class="form-control" id="<?= $IDFORMS[MODULE_BANNER][3]; ?>file1" name="<?= $IDFORMS[MODULE_BANNER][3]; ?>file1">
								<div align="center">
									<output id="<?= $IDFORMS[MODULE_BANNER][3]; ?>file1_img"></output>
								</div>
							</div>
						</div>
					</div>
				</div>
	          </div>
	          <div class="modal-footer">
	            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cerrar</button>
	            <button type="submit" class="btn btn-sm btn-success"  name="<?= $IDFORMS[MODULE_BANNER][3]; ?>" value="<?= $IDFORMS[MODULE_BANNER][3]; ?>">Guardar Cambios</button>
	          </div>
		  </form>
        </div>
      </div>
    </div>
    <div class="modal fade" id="<?= $IDFORMS[MODULE_BANNER][4]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
		  <form class="form-horizontal" method="POST" action="Banner.php" enctype="multipart/form-data" autocomplete="off">								
	          <div class="modal-header">
	            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	            <h4 class="modal-title">EDITANDO IMAGEN 5</h4>
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
								<input type="file" class="form-control" id="<?= $IDFORMS[MODULE_BANNER][4]; ?>file1" name="<?= $IDFORMS[MODULE_BANNER][4]; ?>file1">
								<div align="center">
									<output id="<?= $IDFORMS[MODULE_BANNER][4]; ?>file1_img"></output>
								</div>
							</div>
						</div>
					</div>
				</div>
	          </div>
	          <div class="modal-footer">
	            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cerrar</button>
	            <button type="submit" class="btn btn-sm btn-success"  name="<?= $IDFORMS[MODULE_BANNER][4]; ?>" value="<?= $IDFORMS[MODULE_BANNER][4]; ?>">Guardar Cambios</button>
	          </div>
		  </form>
        </div>
      </div>
    </div>
 	<script type="text/javascript">
		xajax_getIdiomList('<?php echo URL_CONF_GEN.'banner.php?getContentsIdiom='; ?>');
		<?php if($_POST['Banner1']){?>
			xajax_selectLinkImage('<?php echo $_POST['Banner1']; ?>');
		<?php } ?>
		<?php if(!$_POST){?>
			xajax_selectLinkImage('');
		<?php } ?>
		<?php if($_POST['Banner2']){?>
			xajax_selectLinkImage('<?php echo $_POST['Banner2']; ?>');
		<?php } ?>
		<?php if($_POST['Banner3']){?>
			xajax_selectLinkImage('<?php echo $_POST['Banner3']; ?>');
		<?php } ?>
		<?php if($_POST['Banner4']){?>
			xajax_selectLinkImage('<?php echo $_POST['Banner4']; ?>');
		<?php } ?>
		<?php if($_POST['Banner5']){?>
			xajax_selectLinkImage('<?php echo $_POST['Banner5']; ?>');
		<?php } ?>
		<?php if(!empty($showViews['MSJ'])){ ?>
			xajax_saveState("<?= $showViews['MSJ']?>");
		<?php } ?>
	</script>

<!-- FOOTER -->
<?php include URL_TEMPLATES.'footer.php';?> 
<script type="text/javascript" src="<?= JS?>previewImageBanner.js"></script>


</html>