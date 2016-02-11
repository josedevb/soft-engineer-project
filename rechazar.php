<?php
error_reporting(E_ERROR | E_PARSE);
  include_once ('../models/sesion.php');
  include_once('../models/conexion.php');
  include_once('../models/funciones.php');
	?>


<div class="container">
	<div class="row" style="margin-top: 10%;">
		<div class="col-md-12 parrafo">
				<h1>¿Esta seguro que sea rechazar la solicitud?</h1>
				<?php 
								if ( isset($_POST['BtnEnviar']) )
								{
									$id = $_GET['id'];
						        	$mysqli->query("UPDATE solicitudes set idestado = 2 where idsolicitud = $id");

						       	 	header("Location: index.php?art=adminsolicitudes");
								} 
									else
								{
								echo "<form action='' method='post'>";
								echo "<input type='submit' id='BtnEnviar' name='BtnEnviar' class='btn btn-success' value='Aceptar' >";
								echo "</form>";
								}
									
						  ?>
						  <br>
				<a href="index.php?art=adminsolicitudes"><input type="submit" class="btn btn-danger" value="Cancelar" "></a>
		</div>
	</div>
</div>

<div class="clearfix" style="height: 15vh;"> </div>
