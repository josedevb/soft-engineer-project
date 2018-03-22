<?php
	error_reporting(E_ERROR | E_PARSE);
	include_once('funciones.php');
?>
<!DOCTYPE html>
<html>
<head>
	<?php
		include_once('head.php');
	?>
</head>

<body>
	<header id="logo">
		<?php
			include_once('logo.php');
	 	?>
	</header>

	<section id="menu">
		<?php
			include_once('menu.php');
		?>
	</section>

	<section id="body" class="bwhite2">
		<article>
			<?php
				$Articulo = $_GET['art'];
				if ( $Articulo == '' ) {
					include_once('body.php');
				}
				$Articulo = $_GET['art'];
				if ( $Articulo == login ) {
					include_once('login.php');
				}
				$Articulo = $_GET['art'];
				if ( $Articulo == busqueda ) {
					include_once('busqueda.php');
				}
				$Articulo = $_GET['art'];
				if ( $Articulo == contacto ) {
					include_once('contacto.php');
				}
				$Articulo = $_GET['art'];
				if ( $Articulo == nologin ) {
					include_once('nologin.php');
				}
				$Articulo = $_GET['art'];
				if ( $Articulo == administrador ) {
					include_once('administrador.php');
				}

				$Articulo = $_GET['art'];
				if ( $Articulo == registro ) {
					include_once('registro.php');
				}
				$Articulo = $_GET['art'];
				if ( $Articulo == salir ) {
					include_once('salir.php');
				}
				$Articulo = $_GET['art'];
				if ( $Articulo == errorlogin ) {
					include_once('errorlogin.php');
				}
				$Articulo = $_GET['art'];
				if ( $Articulo == solicitudes ) {
					include_once('solicitudes.php');
				}

				$Articulo = $_GET['art'];
				if ( $Articulo == crearsolicitud ) {
					include_once('crearsolicitud.php');
				}

				$Articulo = $_GET['art'];
				if ( $Articulo == responderorden ) {
					include_once('responderorden.php');
				}

				$Articulo = $_GET['art'];
				if ( $Articulo == adminsolicitudes ) {
					include_once('adminsolicitudes.php');
				}

				$Articulo = $_GET['art'];
				if ( $Articulo == modificar ) {
					include_once('modificar.php');
				}

				$Articulo = $_GET['art'];
				if ( $Articulo == aprobar ) {
					include_once('aprobar.php');
				}
				$Articulo = $_GET['art'];
				if ( $Articulo == rechazar ) {
					include_once('rechazar.php');
				}
			?>
		</article>
	</section>

</body>
</html>
