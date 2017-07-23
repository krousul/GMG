<?php 
	include '..//..//app/config.php';
	include URL_CONTROLLER . 'con_sistema.php';
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
		          <img class="profile-img" src="<?= IMAGES?>profile.png">
		          <div class="app-title">
		            <div class="title"><span class="highlight">Usuarios</span></div>
		            <div class="description">Administrar usuarios</div>
		          </div>
		        </div>
		      </div>
		    </div>
		  </div>
		  
		<?php include URL_TEMPLATES."btn_floating.php";?>
		<div class="row">
		    <div class="col-lg-12">
		      <div class="card">
				<div id="resultadosMsg"></div>
		      </div>
	      </div>
      </div>
		<div class="row">
			<div class="col-xs-12">
		    	<div class="card">
					<div class="panel panel-success">
						<div class="panel-heading">
						    <div class="btn-group pull-right">
								<button type='button' onClick="document.getElementById('guardar_usuario').reset();$('#closeSucces').hide();" class="btn btn-success" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus" ></span> Nuevo Usuario</button>
							</div>
							<h4><i class='fa fa-search'></i> Buscar Usuarios</h4>
						</div>			
						<div class="panel-body">
							<?php
							include URL_MODAL."registro_usuarios.php";
							include URL_MODAL."editar_usuarios.php";
							include URL_MODAL."cambiar_password.php";
							?>
							<form class="form-horizontal" role="form" id="datos_cotizacion">
								<div class="form-group row">
									<label for="q" class="col-md-2 control-label">Nombres:</label>
									<div class="col-md-4">
										<input type="text" class="form-control" id="q" placeholder="Nombre" onkeyup='load(1);'>
									</div>
									<div class="col-md-3">
										<button type="button" id="btnBuscar" class="btn btn-default" onclick='load(1);'>
											<span class="fa fa-search"></span> Buscar</button>
										<span id="loader"></span>
									</div>
								</div>
							</form>
							<div class='outer_div'></div>
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
<script>
$(document).ready(function(){
// 	xajax_inicioLoad('1',$("#q").val());
	load(1);
});
function load(page){
	var q= $("#q").val();
	$("#loader").fadeIn('slow');
	$.ajax({
		 url:'./ajax/buscar_usuarios.php?action=ajax&page='+page+'&q='+q,
		 beforeSend: function(objeto){
		 $('#loader').html('<img src="./ajax/ajax-loader.gif"> Cargando...');
		 },
		success:function(data){
			$(".outer_div").html(data).fadeIn('slow');
			$('#loader').html('');
		}
	})
}
function eliminar (id){
	var q= $("#q").val();
	if (confirm("Realmente deseas eliminar el usuario")){	
		$.ajax({
	        type: "GET",
	        url: "./ajax/buscar_usuarios.php",
	        data: "id="+id,"q":q,
			beforeSend: function(objeto){
				$("#resultados").html("Mensaje: Cargando...");
			},
	        success: function(datos){
			$("#resultados").html(datos);
			load(1);
			}
		});
	}
}

$( "#editar_usuario" ).submit(function( event ) {
  $('#actualizar_datos2').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/editar_usuario.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax2").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajax2").html(datos);
			$('#actualizar_datos2').attr("disabled", false);
			load(1);
		  }
	});
  event.preventDefault();
})

$( "#editar_password" ).submit(function( event ) {
  $('#actualizar_datos3').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/editar_password.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax3").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajax3").html(datos);
			$('#actualizar_datos3').attr("disabled", false);
			load(1);
		  }
	});
  event.preventDefault();
})
	function get_user_id(id){
		$("#user_id_mod").val(id);
	}

	function obtener_datos(id){
			var nombres = $("#nombres"+id).val();
			var apellidos = $("#apellidos"+id).val();
			var usuario = $("#usuario"+id).val();
			var email = $("#email"+id).val();
			
			$("#mod_id").val(id);
			$("#firstname2").val(nombres);
			$("#lastname2").val(apellidos);
			$("#user_name2").val(usuario);
			$("#user_email2").val(email);
	}
</script>