<?php
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	$con=@mysqli_connect('localhost', 'root', '', 'gmg_db');
	if(!$con){
		die("imposible conectarse: ".mysqli_error($con));
	}
	if (@mysqli_connect_errno()) {
		die("Conexión falló: ".mysqli_connect_errno()." : ". mysqli_connect_error());
	}
	
	if (isset($_GET['id'])){
		
		$user_id=intval($_GET['id']);
		$query=mysqli_query($con, "select * from users where id_users='".$user_id."'");
		$rw_user=mysqli_fetch_array($query);
		$count=$rw_user['id_users'];
		
		if ($user_id!=1){
			if ($delete1=mysqli_query($con,"DELETE FROM users WHERE id_users='".$user_id."'")){
				?>
				<div class="alert alert-success alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Aviso!</strong> Datos eliminados exitosamente.
				</div>
				<?php 
			}else {
				?>
				<div class="alert alert-danger alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Error!</strong> Lo siento algo ha salido mal intenta nuevamente.
				</div>
				<?php
			}
		} else {
			?>
			<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Error!</strong> No se puede borrar el usuario administrador. 
			</div>
			<?php
		}
	}
	if($action == 'ajax'){

		// escaping, additionally removing everything that could be (html/javascript-) code
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		 $aColumns = array('firstname', 'lastname');//Columnas de busqueda
		 $sTable = "users";
		 $sWhere = "";
		if ( $_GET['q'] != "" )
		{
			$sWhere = "WHERE (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= $aColumns[$i]." LIKE '%".$q."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
		$sWhere.=" order by id_users desc";
		include URL_CONTROLLER.'pagination.php'; //include pagination file
		//pagination variables
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 10; //how much records you want to show
		$adjacents  = 4; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;
		//Count the total number of row in your table*/
		
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = URL_ADMIN.'sistema.php';
		
		//main query to fetch the data
		$sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		//loop through fetched data
		if ($numrows>0){
			
			?>
			<div class="table-responsive">
			  <table class="table">
				<tr  class="success">
					<th>ID</th>
					<th>Nombres</th>
					<th>Usuario</th>
					<th>Email</th>
					<th>Agregado</th>
					<th><span class="pull-right">Acciones</span></th>
					
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){
						$user_id=$row['id_users'];
						$fullname=$row['firstname']." ".$row["lastname"];
						$user_name=$row['user_name'];
						$user_email=$row['user_email'];
						$date_added= date('d/m/Y', strtotime($row['date_added']));
						
					?>
					<tr>
					<td>
						<input type="hidden" value="<?= $row['firstname'];?>" id="nombres<?= $user_id;?>">
						<input type="hidden" value="<?= $row['lastname'];?>" id="apellidos<?= $user_id;?>">
						<input type="hidden" value="<?= $user_name;?>" id="usuario<?= $user_id;?>">
						<input type="hidden" value="<?= $user_email;?>" id="email<?= $user_id;?>">
						<?php echo $user_id; ?></td>
						<td><?php echo $fullname; ?></td>
						<td ><?php echo $user_name; ?></td>
						<td ><?php echo $user_email; ?></td>
						<td><?php echo $date_added;?></td>
						
					<td ><span class="pull-right">
					<a href="#" class='btn btn-default' title='Editar usuario' onclick="obtener_datos('<?= $user_id;?>');" data-toggle="modal" data-target="#myModal2"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 
					<a href="#" class='btn btn-default' title='Cambiar contraseña' onclick="get_user_id('<?= $user_id;?>');" data-toggle="modal" data-target="#myModal3"><i class="fa fa-key"></i></a>
					<a href="#" class='btn btn-default' title='Borrar usuario' onclick="eliminar('<?= $user_id; ?>')"><i class="fa fa-trash"></i> </a></span></td>
						
					</tr>
					<?php
				}
				?>
				<tr>
					<td colspan=9><span class="pull-right">
					<?php
//					  paginate($reload, $page, $total_pages, $adjacents);
					?></span></td>
				</tr>
			  </table>
			</div>
			<?php
		}
	}
?>