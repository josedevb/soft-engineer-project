<?php
	error_reporting(E_ERROR | E_PARSE);
  include_once('funciones.php');
  $Articulo = $_GET['art'];  
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
				if ( $Articulo == '' ) {
					include_once('body.php');
				}
				if ( $Articulo == login ) {
					include_once('login.php');
				}
				if ( $Articulo == busqueda ) {
					include_once('busqueda.php');
				}
				if ( $Articulo == contacto ) {
					include_once('contacto.php');
				}
				if ( $Articulo == nologin ) {
					include_once('nologin.php');
				}
				if ( $Articulo == administrador ) {
					include_once('administrador.php');
				}
				if ( $Articulo == editar ) {
					include_once('editar.php');
				}
				if ( $Articulo == salir ) {
					include_once('salir.php');
				}
				if ( $Articulo == errorlogin ) {
					include_once('errorlogin.php');
				}
				if ( $Articulo == solicitudes ) {
					include_once('solicitudes.php');
				}
				if ( $Articulo == crearsolicitud ) {
					include_once('crearsolicitud.php');
				}
				if ( $Articulo == responderorden ) {
					include_once('responderorden.php');
				}
				if ( $Articulo == adminsolicitudes ) {
					include_once('adminsolicitudes.php');
				}
				if ( $Articulo == updateorden ) {
					include_once('updateorden.php');
				}
				if ( $Articulo == reactivateorder ) {
					include_once('reactivateorder.php');
				}
				if ( $Articulo == declineorder ) {
					include_once('declineorder.php');
				}
			?>
		</article>
	</section>

</body>
</html>
