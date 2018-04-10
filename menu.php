<!-- menu.php -->
<div class="container-fluid bgray menu">
	<div class="row">
		<?php
			session_start();
			include_once('conexion.php');
			$id = $_SESSION['cargo'];

			$queryadmin = $mysqli->query("SELECT * FROM usuario where cargo= $id ");
			while ($fila=mysqli_fetch_array($queryadmin)) $cargo = $fila['cargo'];
			
			if (isset($_SESSION['usuario']))
				if ($id == 1) {
					echo "<a href='index.php?art=adminsolicitudes'>
									<div class='col-md-4'>
										<h3><i class='far fa-file-alt'></i>Responder ordenes</h3>
									</div>
								</a>";
					echo "<a href='reportes.php'>
									<div class='col-md-4'>
										<h3><i class='fas fa-users'></i>Reporte de ordenes</h3>
									</div>
								</a>";
					echo "<a href='index.php?art=salir'>
									<div class='col-md-4'>
										<h3><i class='fas fa-sign-out-alt'></i>Desconectarse</h3>
									</div>
								</a>";
				}
				else {
					echo "<a href='index.php?art=solicitudes&id=$id'>
									<div class='col-md-4'>
										<h3><i class='far fa-file-alt'></i>Lista de ordenes</h3>
									</div>
								</a>";
					echo "<a href='reportes.php'>
									<div class='col-md-4'>
										<h3><i class='fas fa-users'></i>Reporte de ordenes</h3>
									</div>
								</a>";
					echo "<a href='index.php?art=salir'>
									<div class='col-md-4'>
										<h3><i class='fas fa-sign-out-alt'></i>Desconectarse</h3>
									</div>
								</a>";
				}
			else
				echo"<a href='index.php?art=login'>
							<div class='col-md-12'><h3><i class='fas fa-sign-in-alt'></i>Entrar al Sistema</h3></div>
						</a>";
			?>
	</div>
</div>
