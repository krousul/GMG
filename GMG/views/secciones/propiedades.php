<?php 
	include '..//..//app/config.php';
	include URL_CONTROLLER . 'con_propiedades.php';
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
		            <div class="description">Editar Propiedades del sistema</div>
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
	
	
		<div class="row">
		    <div class="col-xs-12">
		      <div class="card">
				  <div class="card-body no-padding">
				    <div class="row no-gap">
					<!--Columna #1 -->
				      <div class="col-md-3 col-sm-6">
				        <div class="pricing-table no-border-left">
				          <div class="pricing-body">
				            <ul class="description">
								<li class="thumbnail">
									<img src="<?php if(!empty($img['Propiedades1'])) echo $img['Propiedades1']; ?>" class="img-responsive"  height="300px" width="300px">
									<div class="caption">
										<h3 class="title"><?php if(!empty($des['Propiedades1'])) echo $des['Propiedades1']; ?><a class="anchorjs-link" href="#thumbnail-label"><span class="anchorjs-icon"></span></a></h3>
									</div>
								    <div align="center">
								      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#<?= $IDFORMS[MODULE_PROP][0]; ?>">
						                  <div><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;EDITAR</div>
								      </button>
								    </div>
								</li>
								<li class="thumbnail">
									<img src="<?php if(!empty($img['Propiedades2'])) echo $img['Propiedades2']; ?>" class="img-responsive"  height="300px" width="300px">
									<div class="caption">
										<h3 class="title"><?php if(!empty($des['Propiedades2'])) echo $des['Propiedades2']; ?><a class="anchorjs-link" href="#thumbnail-label"><span class="anchorjs-icon"></span></a></h3>
									</div>
								    <div align="center">
								      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#<?= $IDFORMS[MODULE_PROP][1]; ?>">
						                  <div><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;EDITAR</div>
								      </button>
								    </div>
								</li>
								<li class="thumbnail">
									<img src="<?php if(!empty($img['Propiedades3'])) echo $img['Propiedades3']; ?>" class="img-responsive"  height="300px" width="300px">
									<div class="caption">
										<h3 class="title"><?php if(!empty($des['Propiedades3'])) echo $des['Propiedades3']; ?><a class="anchorjs-link" href="#thumbnail-label"><span class="anchorjs-icon"></span></a></h3>
									</div>
								    <div align="center">
								      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#<?= $IDFORMS[MODULE_PROP][2]; ?>">
						                  <div><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;EDITAR</div>
								      </button>
								    </div>
								</li>
				            </ul>
				          </div>
				        </div>
				      </div>
				      <!--Columna #2 -->
				      <div class="col-md-3 col-sm-6">
				        <div class="pricing-table no-border-left">
				          <div class="pricing-body">
				            <ul class="description">
								<li class="thumbnail">
									<img src="<?php if(!empty($img['Propiedades4'])) echo $img['Propiedades4']; ?>" class="img-responsive"  height="300px" width="300px">
									<div class="caption">
										<h3 class="title"><?php if(!empty($des['Propiedades4'])) echo $des['Propiedades4']; ?><a class="anchorjs-link" href="#thumbnail-label"><span class="anchorjs-icon"></span></a></h3>
									</div>
								    <div align="center">
								      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#<?= $IDFORMS[MODULE_PROP][3]; ?>">
						                  <div><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;EDITAR</div>
								      </button>
								    </div>
								</li>
								<li class="thumbnail">
									<img src="<?php if(!empty($img['Propiedades5'])) echo $img['Propiedades5']; ?>" class="img-responsive"  height="300px" width="300px">
									<div class="caption">
										<h3 class="title"><?php if(!empty($des['Propiedades5'])) echo $des['Propiedades5']; ?><a class="anchorjs-link" href="#thumbnail-label"><span class="anchorjs-icon"></span></a></h3>
									</div>
								    <div align="center">
								      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#<?= $IDFORMS[MODULE_PROP][4]; ?>">
						                  <div><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;EDITAR</div>
								      </button>
								    </div>
								</li>
								<li class="thumbnail">
									<img src="<?php if(!empty($img['Propiedades6'])) echo $img['Propiedades6']; ?>" class="img-responsive"  height="300px" width="300px">
									<div class="caption">
										<h3 class="title"><?php if(!empty($des['Propiedade6'])) echo $des['Propiedades6']; ?><a class="anchorjs-link" href="#thumbnail-label"><span class="anchorjs-icon"></span></a></h3>
									</div>
								    <div align="center">
								      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#<?= $IDFORMS[MODULE_PROP][5]; ?>">
						                  <div><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;EDITAR</div>
								      </button>
								    </div>
								</li>
				            </ul>
				          </div>
				        </div>
				      </div>
				      <!--Columna #3 -->
				      <div class="col-md-3 col-sm-6">
				        <div class="pricing-table no-border-left">
				          <div class="pricing-body">
				            <ul class="description">
								<li class="thumbnail">
									<img src="<?php if(!empty($img['Propiedades7'])) echo $img['Propiedades7']; ?>" class="img-responsive"  height="300px" width="300px">
									<div class="caption">
										<h3 class="title"><?php if(!empty($des['Propiedade7'])) echo $des['Propiedades7']; ?><a class="anchorjs-link" href="#thumbnail-label"><span class="anchorjs-icon"></span></a></h3>
									</div>
								    <div align="center">
								      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#<?= $IDFORMS[MODULE_PROP][6]; ?>">
						                  <div><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;EDITAR</div>
								      </button>
								    </div>
								</li>
								<li class="thumbnail">
									<img src="<?php if(!empty($img['Propiedades8'])) echo $img['Propiedades8']; ?>" class="img-responsive"  height="300px" width="300px">
									<div class="caption">
										<h3 class="title"><?php if(!empty($des['Propiedade8'])) echo $des['Propiedades8']; ?><a class="anchorjs-link" href="#thumbnail-label"><span class="anchorjs-icon"></span></a></h3>
									</div>
								    <div align="center">
								      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#<?= $IDFORMS[MODULE_PROP][7]; ?>">
						                  <div><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;EDITAR</div>
								      </button>
								    </div>
								</li>
								<li class="thumbnail">
									<img src="<?php if(!empty($img['Propiedades9'])) echo $img['Propiedades9']; ?>" class="img-responsive"  height="300px" width="300px">
									<div class="caption">
										<h3 class="title"><?php if(!empty($des['Propiedade9'])) echo $des['Propiedades9']; ?><a class="anchorjs-link" href="#thumbnail-label"><span class="anchorjs-icon"></span></a></h3>
									</div>
								    <div align="center">
								      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#<?= $IDFORMS[MODULE_PROP][8]; ?>">
						                  <div><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;EDITAR</div>
								      </button>
								    </div>
								</li>
				            </ul>
				          </div>
				        </div>
				      </div>
				      <!--Columna #4 -->
				      <div class="col-md-3 col-sm-6">
				        <div class="pricing-table no-border-left">
				          <div class="pricing-body">
				            <ul class="description">
								<li class="thumbnail">
									<img src="<?php if(!empty($img['Propiedades10'])) echo $img['Propiedades10']; ?>" class="img-responsive"  height="300px" width="300px">
									<div class="caption">
										<h3 class="title"><?php if(!empty($des['Propiedade10'])) echo $des['Propiedades10']; ?><a class="anchorjs-link" href="#thumbnail-label"><span class="anchorjs-icon"></span></a></h3>
									</div>
								    <div align="center">
								      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#<?= $IDFORMS[MODULE_PROP][9]; ?>">
						                  <div><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;EDITAR</div>
								      </button>
								    </div>
								</li>
								<li class="thumbnail">
									<img src="<?php if(!empty($img['Propiedades11'])) echo $img['Propiedades11']; ?>" class="img-responsive"  height="300px" width="300px">
									<div class="caption">
										<h3 class="title"><?php if(!empty($des['Propiedade11'])) echo $des['Propiedades11']; ?><a class="anchorjs-link" href="#thumbnail-label"><span class="anchorjs-icon"></span></a></h3>
									</div>
								    <div align="center">
								      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#<?= $IDFORMS[MODULE_PROP][10]; ?>">
						                  <div><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;EDITAR</div>
								      </button>
								    </div>
								</li>
								<li class="thumbnail">
									<img src="<?php if(!empty($img['Propiedades12'])) echo $img['Propiedades12']; ?>" class="img-responsive"  height="300px" width="300px">
									<div class="caption">
										<h3 class="title"><?php if(!empty($des['Propiedade12'])) echo $des['Propiedades12']; ?><a class="anchorjs-link" href="#thumbnail-label"><span class="anchorjs-icon"></span></a></h3>
									</div>
								    <div align="center">
								      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#<?= $IDFORMS[MODULE_PROP][11]; ?>">
						                  <div><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;EDITAR</div>
								      </button>
								    </div>
								</li>
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
	</div>
	</div>
</div>

<!-- Modales -->

    <div class="modal fade" id="<?= $IDFORMS[MODULE_PROP][0]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
		  <form class="form-horizontal" method="POST" action="propiedades.php" enctype="multipart/form-data" autocomplete="off">								
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
								<input type="file" class="form-control" id="<?= $IDFORMS[MODULE_PROP][0]; ?>file1" name="<?= $IDFORMS[MODULE_PROP][0]; ?>file1">
								<div align="center">
									<output id="<?= $IDFORMS[MODULE_PROP][0]; ?>file1_img"></output>
								</div>
							</div>
						</div>
					</div>
		         	<div class="row">
						<div class="form-group">
							<div class="col-sm-5">
								Titulo: <input id="<?= $IDFORMS[MODULE_PROP][0]; ?>text1" name="<?= $IDFORMS[MODULE_PROP][0]; ?>text1" class="form-control" placeholder="Input" type="text">
							</div>
						</div>
					</div>
				</div>
	          </div>
	          <div class="modal-footer">
	            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cerrar</button>
	            <button type="submit" class="btn btn-sm btn-success"  name="<?= $IDFORMS[MODULE_PROP][0]; ?>" value="<?= $IDFORMS[MODULE_PROP][0]; ?>">Guardar Cambios</button>
	          </div>
		  </form>
        </div>
      </div>
    </div>
    
    <div class="modal fade" id="<?= $IDFORMS[MODULE_PROP][1]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
			<form class="form-horizontal" method="POST" action="propiedades.php" enctype="multipart/form-data" autocomplete="off">								
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
								<input type="file" class="form-control" id="<?= $IDFORMS[MODULE_PROP][1]; ?>file1" name="<?= $IDFORMS[MODULE_PROP][1]; ?>file1">
								<div align="center">
									<output id="<?= $IDFORMS[MODULE_PROP][1]; ?>file1_img"></output>
								</div>
							</div>
						</div>
					</div>
		         	<div class="row">
						<div class="form-group">
							<div class="col-sm-5">
								Titulo: <input id="<?= $IDFORMS[MODULE_PROP][1]; ?>text1" name="<?= $IDFORMS[MODULE_PROP][1]; ?>text1" class="form-control" placeholder="Input" type="text">
							</div>
						</div>
					</div>
				</div>
	          </div>
	          <div class="modal-footer">
	            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cerrar</button>
	            <button type="submit" class="btn btn-sm btn-success"  name="<?= $IDFORMS[MODULE_PROP][1]; ?>" value="<?= $IDFORMS[MODULE_PROP][1]; ?>">Guardar Cambios</button>
	          </div>
		  </form>
        </div>
      </div>
    </div>
    
     <div class="modal fade" id="<?= $IDFORMS[MODULE_PROP][2]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
			<form class="form-horizontal" method="POST" action="propiedades.php" enctype="multipart/form-data" autocomplete="off">								
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
								<input type="file" class="form-control" id="<?= $IDFORMS[MODULE_PROP][2]; ?>file1" name="<?= $IDFORMS[MODULE_PROP][2]; ?>file1">
								<div align="center">
									<output id="<?= $IDFORMS[MODULE_PROP][2]; ?>file1_img"></output>
								</div>
							</div>
						</div>
					</div>
		         	<div class="row">
						<div class="form-group">
							<div class="col-sm-5">
								Titulo: <input id="<?= $IDFORMS[MODULE_PROP][2]; ?>text1" name="<?= $IDFORMS[MODULE_PROP][2]; ?>text1" class="form-control" placeholder="Input" type="text">
							</div>
						</div>
					</div>
				</div>
	          </div>
	          <div class="modal-footer">
	            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cerrar</button>
	            <button type="submit" class="btn btn-sm btn-success"  name="<?= $IDFORMS[MODULE_PROP][2]; ?>" value="<?= $IDFORMS[MODULE_PROP][2]; ?>">Guardar Cambios</button>
	          </div>
		  </form>
        </div>
      </div>
    </div>
    
     <div class="modal fade" id="<?= $IDFORMS[MODULE_PROP][3]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
			<form class="form-horizontal" method="POST" action="propiedades.php" enctype="multipart/form-data" autocomplete="off">								
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
								<input type="file" class="form-control" id="<?= $IDFORMS[MODULE_PROP][3]; ?>file1" name="<?= $IDFORMS[MODULE_PROP][3]; ?>file1">
								<div align="center">
									<output id="<?= $IDFORMS[MODULE_PROP][3]; ?>file1_img"></output>
								</div>
							</div>
						</div>
					</div>
		         	<div class="row">
						<div class="form-group">
							<div class="col-sm-5">
								Titulo: <input id="<?= $IDFORMS[MODULE_PROP][3]; ?>text1" name="<?= $IDFORMS[MODULE_PROP][3]; ?>text1" class="form-control" placeholder="Input" type="text">
							</div>
						</div>
					</div>
				</div>
	          </div>
	          <div class="modal-footer">
	            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cerrar</button>
	            <button type="submit" class="btn btn-sm btn-success"  name="<?= $IDFORMS[MODULE_PROP][3]; ?>" value="<?= $IDFORMS[MODULE_PROP][3]; ?>">Guardar Cambios</button>
	          </div>
		  </form>
        </div>
      </div>
    </div>
    
     <div class="modal fade" id="<?= $IDFORMS[MODULE_PROP][4]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
			<form class="form-horizontal" method="POST" action="propiedades.php" enctype="multipart/form-data" autocomplete="off">								
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
								<input type="file" class="form-control" id="<?= $IDFORMS[MODULE_PROP][4]; ?>file1" name="<?= $IDFORMS[MODULE_PROP][4]; ?>file1">
								<div align="center">
									<output id="<?= $IDFORMS[MODULE_PROP][4]; ?>file1_img"></output>
								</div>
							</div>
						</div>
					</div>
		         	<div class="row">
						<div class="form-group">
							<div class="col-sm-5">
								Titulo: <input id="<?= $IDFORMS[MODULE_PROP][4]; ?>text1" name="<?= $IDFORMS[MODULE_PROP][4]; ?>text1" class="form-control" placeholder="Input" type="text">
							</div>
						</div>
					</div>
				</div>
	          </div>
	          <div class="modal-footer">
	            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cerrar</button>
	            <button type="submit" class="btn btn-sm btn-success"  name="<?= $IDFORMS[MODULE_PROP][4]; ?>" value="<?= $IDFORMS[MODULE_PROP][4]; ?>">Guardar Cambios</button>
	          </div>
		  </form>
        </div>
      </div>
    </div>
     <div class="modal fade" id="<?= $IDFORMS[MODULE_PROP][5]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
			<form class="form-horizontal" method="POST" action="propiedades.php" enctype="multipart/form-data" autocomplete="off">								
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
								<input type="file" class="form-control" id="<?= $IDFORMS[MODULE_PROP][5]; ?>file1" name="<?= $IDFORMS[MODULE_PROP][5]; ?>file1">
								<div align="center">
									<output id="<?= $IDFORMS[MODULE_PROP][5]; ?>file1_img"></output>
								</div>
							</div>
						</div>
					</div>
		         	<div class="row">
						<div class="form-group">
							<div class="col-sm-5">
								Titulo: <input id="<?= $IDFORMS[MODULE_PROP][5]; ?>text1" name="<?= $IDFORMS[MODULE_PROP][5]; ?>text1" class="form-control" placeholder="Input" type="text">
							</div>
						</div>
					</div>
				</div>
	          </div>
	          <div class="modal-footer">
	            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cerrar</button>
	            <button type="submit" class="btn btn-sm btn-success"  name="<?= $IDFORMS[MODULE_PROP][5]; ?>" value="<?= $IDFORMS[MODULE_PROP][5]; ?>">Guardar Cambios</button>
	          </div>
		  </form>
        </div>
      </div>
    </div>
     <div class="modal fade" id="<?= $IDFORMS[MODULE_PROP][6]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
			<form class="form-horizontal" method="POST" action="propiedades.php" enctype="multipart/form-data" autocomplete="off">								
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
								<input type="file" class="form-control" id="<?= $IDFORMS[MODULE_PROP][6]; ?>file1" name="<?= $IDFORMS[MODULE_PROP][6]; ?>file1">
								<div align="center">
									<output id="<?= $IDFORMS[MODULE_PROP][6]; ?>file1_img"></output>
								</div>
							</div>
						</div>
					</div>
		         	<div class="row">
						<div class="form-group">
							<div class="col-sm-5">
								Titulo: <input id="<?= $IDFORMS[MODULE_PROP][6]; ?>text1" name="<?= $IDFORMS[MODULE_PROP][6]; ?>text1" class="form-control" placeholder="Input" type="text">
							</div>
						</div>
					</div>
				</div>
	          </div>
	          <div class="modal-footer">
	            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cerrar</button>
	            <button type="submit" class="btn btn-sm btn-success"  name="<?= $IDFORMS[MODULE_PROP][6]; ?>" value="<?= $IDFORMS[MODULE_PROP][6]; ?>">Guardar Cambios</button>
	          </div>
		  </form>
        </div>
      </div>
    </div>
     <div class="modal fade" id="<?= $IDFORMS[MODULE_PROP][7]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
			<form class="form-horizontal" method="POST" action="propiedades.php" enctype="multipart/form-data" autocomplete="off">								
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
								<input type="file" class="form-control" id="<?= $IDFORMS[MODULE_PROP][7]; ?>file1" name="<?= $IDFORMS[MODULE_PROP][7]; ?>file1">
								<div align="center">
									<output id="<?= $IDFORMS[MODULE_PROP][7]; ?>file1_img"></output>
								</div>
							</div>
						</div>
					</div>
		         	<div class="row">
						<div class="form-group">
							<div class="col-sm-5">
								Titulo: <input id="<?= $IDFORMS[MODULE_PROP][7]; ?>text1" name="<?= $IDFORMS[MODULE_PROP][7]; ?>text1" class="form-control" placeholder="Input" type="text">
							</div>
						</div>
					</div>
				</div>
	          </div>
	          <div class="modal-footer">
	            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cerrar</button>
	            <button type="submit" class="btn btn-sm btn-success"  name="<?= $IDFORMS[MODULE_PROP][7]; ?>" value="<?= $IDFORMS[MODULE_PROP][7]; ?>">Guardar Cambios</button>
	          </div>
		  </form>
        </div>
      </div>
    </div>
     <div class="modal fade" id="<?= $IDFORMS[MODULE_PROP][8]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
			<form class="form-horizontal" method="POST" action="propiedades.php" enctype="multipart/form-data" autocomplete="off">								
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
								<input type="file" class="form-control" id="<?= $IDFORMS[MODULE_PROP][8]; ?>file1" name="<?= $IDFORMS[MODULE_PROP][8]; ?>file1">
								<div align="center">
									<output id="<?= $IDFORMS[MODULE_PROP][8]; ?>file1_img"></output>
								</div>
							</div>
						</div>
					</div>
		         	<div class="row">
						<div class="form-group">
							<div class="col-sm-5">
								Titulo: <input id="<?= $IDFORMS[MODULE_PROP][8]; ?>text1" name="<?= $IDFORMS[MODULE_PROP][8]; ?>text1" class="form-control" placeholder="Input" type="text">
							</div>
						</div>
					</div>
				</div>
	          </div>
	          <div class="modal-footer">
	            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cerrar</button>
	            <button type="submit" class="btn btn-sm btn-success"  name="<?= $IDFORMS[MODULE_PROP][8]; ?>" value="<?= $IDFORMS[MODULE_PROP][8]; ?>">Guardar Cambios</button>
	          </div>
		  </form>
        </div>
      </div>
    </div>
     <div class="modal fade" id="<?= $IDFORMS[MODULE_PROP][9]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
			<form class="form-horizontal" method="POST" action="propiedades.php" enctype="multipart/form-data" autocomplete="off">								
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
								<input type="file" class="form-control" id="<?= $IDFORMS[MODULE_PROP][9]; ?>file1" name="<?= $IDFORMS[MODULE_PROP][9]; ?>file1">
								<div align="center">
									<output id="<?= $IDFORMS[MODULE_PROP][9]; ?>file1_img"></output>
								</div>
							</div>
						</div>
					</div>
		         	<div class="row">
						<div class="form-group">
							<div class="col-sm-5">
								Titulo: <input id="<?= $IDFORMS[MODULE_PROP][9]; ?>text1" name="<?= $IDFORMS[MODULE_PROP][9]; ?>text1" class="form-control" placeholder="Input" type="text">
							</div>
						</div>
					</div>
				</div>
	          </div>
	          <div class="modal-footer">
	            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cerrar</button>
	            <button type="submit" class="btn btn-sm btn-success"  name="<?= $IDFORMS[MODULE_PROP][9]; ?>" value="<?= $IDFORMS[MODULE_PROP][9]; ?>">Guardar Cambios</button>
	          </div>
		  </form>
        </div>
      </div>
    </div>
     <div class="modal fade" id="<?= $IDFORMS[MODULE_PROP][10]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
			<form class="form-horizontal" method="POST" action="propiedades.php" enctype="multipart/form-data" autocomplete="off">								
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
								<input type="file" class="form-control" id="<?= $IDFORMS[MODULE_PROP][10]; ?>file1" name="<?= $IDFORMS[MODULE_PROP][10]; ?>file1">
								<div align="center">
									<output id="<?= $IDFORMS[MODULE_PROP][10]; ?>file1_img"></output>
								</div>
							</div>
						</div>
					</div>
		         	<div class="row">
						<div class="form-group">
							<div class="col-sm-5">
								Titulo: <input id="<?= $IDFORMS[MODULE_PROP][10]; ?>text1" name="<?= $IDFORMS[MODULE_PROP][10]; ?>text1" class="form-control" placeholder="Input" type="text">
							</div>
						</div>
					</div>
				</div>
	          </div>
	          <div class="modal-footer">
	            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cerrar</button>
	            <button type="submit" class="btn btn-sm btn-success"  name="<?= $IDFORMS[MODULE_PROP][10]; ?>" value="<?= $IDFORMS[MODULE_PROP][10]; ?>">Guardar Cambios</button>
	          </div>
		  </form>
        </div>
      </div>
    </div>
     <div class="modal fade" id="<?= $IDFORMS[MODULE_PROP][11]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
			<form class="form-horizontal" method="POST" action="propiedades.php" enctype="multipart/form-data" autocomplete="off">								
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
								<input type="file" class="form-control" id="<?= $IDFORMS[MODULE_PROP][11]; ?>file1" name="<?= $IDFORMS[MODULE_PROP][11]; ?>file1">
								<div align="center">
									<output id="<?= $IDFORMS[MODULE_PROP][11]; ?>file1_img"></output>
								</div>
							</div>
						</div>
					</div>
		         	<div class="row">
						<div class="form-group">
							<div class="col-sm-5">
								Titulo: <input id="<?= $IDFORMS[MODULE_PROP][11]; ?>text1" name="<?= $IDFORMS[MODULE_PROP][11]; ?>text1" class="form-control" placeholder="Input" type="text">
							</div>
						</div>
					</div>
				</div>
	          </div>
	          <div class="modal-footer">
	            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cerrar</button>
	            <button type="submit" class="btn btn-sm btn-success"  name="<?= $IDFORMS[MODULE_PROP][11]; ?>" value="<?= $IDFORMS[MODULE_PROP][11]; ?>">Guardar Cambios</button>
	          </div>
		  </form>
        </div>
      </div>
    </div>
 
<script type="text/javascript">
xajax_getIdiomList('<?php echo URL_VIEWS_IDIOM.'propiedades.php?getContentsIdiom='; ?>');
</script>
<!-- FOOTER -->
<?php include URL_TEMPLATES.'footer.php';?> 
<script type="text/javascript" src="<?= JS?>previewImagePropiedades.js"></script>

</html>