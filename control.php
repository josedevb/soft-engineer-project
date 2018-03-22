<!-- control.php -->
<?php 
 	sleep(1);
	include_once('conexion.php');

	$usuario = $_POST['usuario'];
	$clave = $_POST['clave'];

	if ( $usuario != '' or $clave != '' )
	{
		// Buscar Datos
		$querybuscar = $mysqli->query("SELECT * FROM usuario where usuario='$usuario' and clave='$clave'");
		while (($fila=mysqli_fetch_array($querybuscar)))
		{
			$idusuario= $fila['idusuario'];
			$usuariobd= $fila['usuario'];
			$clavebd= $fila['clave'];
			$rolbd= $fila['cargo'];
		}

		if( $usuario == $usuariobd && $clave == $clavebd) {
			if ($rolbd != 1) {
					// Inicio la sesión
					session_start();
					// Declaro las variables de sesión
					$_SESSION['autentificado'] = true;
					$_SESSION['usuario'] = $usuario;
					$_SESSION['idusuario'] = $idusuario;
					$_SESSION['cargo'] = $rolbd;
					header("Location: index.php?art=administrador");
				}
			else {
					// Inicio la sesión
				session_start();

				// Declaro las variables de sesión
				$_SESSION['autentificado'] = true;
				$_SESSION['usuario'] = $usuario;
				$_SESSION['idusuario'] = $idusuario;
				$_SESSION['cargo'] = $rolbd;
				header("Location: index.php?art=administrador");
			}
		}
		else {
			header("Location: index.php?art=errorlogin");
		}
	}
	else {
			header("Location: index.php?art=errorlogin");
		}

 ?>