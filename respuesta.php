<!DOCTYPE html>
<html>
<head>
	<<?php
		include_once('head.php');
	?>
</head>
<body background="image/3.jpg">

	<div class="containerlogo">
		<a href="index.php">	<img src="image/5.png" class="img-circle" alt="logo" width="304" height="236"></a>

	</div>

<div class="row">
	<a href="quienessomos.php"><div class="col-md-3" ><h3>Quienes Somos</h3></div></a>
	<a href="desarrollador.php"><div class="col-md-3"><h3>Desarrollador</h3></div></a>
	<a href="iplay.php"><div class="col-md-3"><h3>iPlay</h3></div></a>
	<a href="contacto.php"><div class="col-md-3" style="background-color:white; color:black"><h3 style="color:black">Contacto</h3></div></a>

</div>

<div class="row">
<div class="col-md-10">
		<center>

		<?php
		//Metodo POST
		$Nombre = $_POST['nombre'];
		$Apellido = $_POST ['apellido'];
		$Usuario = $_POST ['usuario'];
		$Clave = $_POST ['password'];
		$Telefono = $_POST ['telefono'];
		$Email = $_POST ['email'];
		$Genero = $_POST ['genero'];
		$Direccion = $_POST ['direccion'];

		echo "<hr><br>";
		echo "<h3>El <strong>Nombre</strong> recibido desde el formulario es: $Nombre<br></h3>";

		echo "<h3>El <strong>Apellido</strong> recibido desde el formulario es: $Apellido<br></h3>";	

		echo "<h3>El <strong>Usuario</strong> recibido desde el formulario es: $Usuario<br></h3>";

		echo "<h3>La <strong>Clave</strong> recibido desde el formulario es: $Clave<br></h3>";

		echo "<h3>El <strong>Telefono</strong> recibido desde el formulario es: $Telefono<br></h3>";

		echo "<h3>El <strong>Email</strong> recibido desde el formulario es: $Email<br></h3>";

		echo "<h3>El <strong>Genero</strong> recibido desde el formulario es: $Genero<br></h3>";

		echo "<h3>La <strong>Direccion</strong> recibida desde el formulario es: $Direccion<br></h3>";



		echo "<br><br><hr><br>";

		?>
</center>

</div>
</div>


<div class="footer">
	<h1> Página iPlay  - José Barrios 2016.</h1>

</div>

</body>
</html>