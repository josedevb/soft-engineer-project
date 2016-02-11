<!-- modificar.php -->
	<style>

<style>
	.form-control{
    background: transparent;
}
form {
	width: 320px;
	margin: 20px;
}
form > div {
	position: relative;
	overflow: hidden;
}
form input, form textarea {
	width: 100%;
	border: 2px solid gray;
	background: none;
	position: relative;
	top: 0;
	left: 0;
	z-index: 1;
	padding: 8px 12px;
	outline: 0;
}
form input:valid, form textarea:valid {
	background: white;
}
form input:focus, form textarea:focus {
	border-color: #357EBD;
}
form input:focus + label, form textarea:focus + label {
	background: #357EBD;
	color: white;
	font-size: 70%;
	padding: 1px 6px;
	z-index: 2;
	text-transform: uppercase;
}
form label {
	-webkit-transition: background 0.2s, color 0.2s, top 0.2s, bottom 0.2s, right 0.2s, left 0.2s;
	transition: background 0.2s, color 0.2s, top 0.2s, bottom 0.2s, right 0.2s, left 0.2s;
	position: absolute;
	color: #999;
	padding: 7px 6px;
	font-weight: normal;
}
form textarea {
	display: block;
	resize: vertical;
}
form.go-bottom input, form.go-bottom textarea {
	padding: 12px 12px 12px 12px;
}
form.go-bottom label {
	top: 0;
	bottom: 0;
	left: 0;
	width: 100%;
}
form.go-bottom input:focus, form.go-bottom textarea:focus {
	padding: 4px 6px 20px 6px;
}
form.go-bottom input:focus + label, form.go-bottom textarea:focus + label {
	top: 100%;
	margin-top: -16px;
}
form.go-right label {
	border-radius: 0 5px 5px 0;
	height: 100%;
	top: 0;
	right: 100%;
	width: 100%;
	margin-right: -100%;
}
form.go-right input:focus + label, form.go-right textarea:focus + label {
	right: 0;
	margin-right: 0;
	width: 40%;
	padding-top: 5px;
}
</style>

<div class="container">
<div class="row">
	<h2 class="fgray"> Modificar Datos Personales </h2>
<div class="col-md-6">



<?php
error_reporting(E_ERROR | E_PARSE);
  include_once ('sesion.php');
  include_once('conexion.php');
  include_once('funciones.php');
	?>
<?php

	//$id = $_REQUEST['hiddenid'];

	if (!isset($_POST['BtnEnviar']))
	{
		$iddatosper = $_REQUEST['id'];
	}else
	{
		$iddatosper = $_REQUEST['hiddenid'];
	}

	$querybuscarD = $mysqli->query("SELECT * FROM datospersonales where iddatosper = $iddatosper ") or die ( "<br>No se puede ejecutar query para buscar datos P ". $mysqli->error);
	$querybuscarU = $mysqli->query("SELECT * FROM usuario where iddatosper = $iddatosper ") or die ( "<br>No se puede ejecutar query para buscar usuario ". $mysqli->error);

	if ( $fila=mysqli_fetch_array($querybuscarD) )
	{
		$cedula= $fila['cedula'];
		$nombre= $fila['nombre'];
		$apellido= $fila['apellido'];
		$correo= $fila['correo'];
		$fecha= $fila['fecha'];
		$genero= $fila['genero'];
		$seleccion= $fila['idedocivil'];
	}


	if ( $fila=mysqli_fetch_array($querybuscarU) )
	{
		$idusuario= $fila['idusuario'];
		$usuario= $fila['usuario'];
		$clave= $fila['clave'];
	}


	if (isset($_POST['BtnEnviar']))
	{
		$iddatosp = $_POST['hiddenid'];
		$cedula     = $_POST['hiddenced'];
		//echo $cedula;
		$nombre     = $_POST['nombre'];
		$apellido   = $_POST['apellido'];
		$genero  = $_POST['genero'];
		$seleccion  = $_POST['seleccion'];
		$fecha      = $_POST['fecha'];
		$correo     = $_POST['correo'];
		$correo     = $_POST['hiddencorreo'];
		$usuario    = $_POST['usuario'];
		$usuario    = $_POST['hiddenusuario'];
		$clave      = $_POST['clave'];
		$clave2     = $_POST['clave2'];

		// foreach ($_POST['CheckBox'] as $idI)
		// {
		// 	echo "<br>el interes es: CheckBox$idI ";
		// }
	}

 ?>

<?php

	echo "<form action='index.php?art=modificar&id=1$id' name='Formulario' method='post'>";

		echo "<br>";

		// Campo Oculto ID
		echo "<input type='hidden' name='hiddenid' value='$iddatosper'>";

		// Validación para Campo de Texto
		echo "<label for='cedula'>Cédula :</label>
			<input name='cedula' type='text' class='form-control' id='cedula' size='30' maxlength='8' disabled placeholder='Ingrese Cédula' value='$cedula'>";

		// Campo Oculto Cedula
		echo "<input type='hidden' name='hiddenced' value='$cedula'>";


		echo "<br>";


		// Validación para Campo de Texto
		echo "<label for='apellido'>Nombre :</label>
			<input name='nombre' type='text' class='form-control' id='nombre' size='30' maxlength='30' placeholder='Ingrese Nombre' value='$nombre'>";

		// el isset determina si una variable está definida, es decir posee algún valor, en cuyo caso nos devolvera el valor booleano.
			if ( isset($nombre) and ($nombre != '') )
			{
				if ( validaAlfa($nombre) )
				{
		  			//echo $nombre;
				}
				else
				{
		  			echo "<span class='error'>Dato no es válido</span>";
		  			$errorendato = 1;
				}
    		}
			else
			{
				if ( isset($nombre) and ($nombre == '') )
				{
    				echo "<span class='error'>Campo obligatorio</span>";
					$campoobligado = 1;
				}
			}

		echo "<br>";


		// Validación para Campo de Texto
		echo "<label for='apellido'>Apellido :</label>
			<input name='apellido' type='text' class='form-control' id='apellido' size='30' maxlength='30' placeholder='Ingrese Apellido' value='$apellido'>";

		// el isset determina si una variable está definida, es decir posee algún valor, en cuyo caso nos devolvera el valor booleano.
			if ( isset($apellido) and ($apellido != '') )
			{
				if ( validaAlfa($apellido) )
				{
		  			//echo $apellido;
				}
				else
				{
		  			echo "<span class='error'>Dato no es válido</span>";
		  			$errorendato = 1;
				}
    		}
			else
			{
				if ( isset($apellido) and ($apellido == '') )
				{
    				echo "<span class='error'>Campo obligatorio</span>";
					$campoobligado = 1;
				}
			}


		echo "<br>";


		// Validación para Correo
		echo "<label for='correo'>Correo Electrónico :</label>
			<input name='correo' type='text' class='form-control' id='correo' size='30' maxlength='30' disabled placeholder='Ingrese el correo' value='$correo'>";

		// Campo Oculto Correo
		echo "<input type='hidden' name='hiddencorreo' value='$correo'>";

		// el isset determina si una variable está definida, es decir posee algún valor, en cuyo caso nos devolvera el valor booleano.
		// 	if ( isset($correo) and ($correo != '') )
		// 	{
		// 		if ( validarDirCorreoElec($correo) )
		// 		{
		//   			//echo $correo;
		// 		}
		// 		else
		// 		{
		//   			echo "<span class='error'>Dato no es válido</span>";
		//   			$errorendato = 1;
		// 		}
    	// 	}
		// 	else
		// 	{
		// 		if ( isset($correo) and ($correo == '') )
		// 		{
    	// 			echo "<span class='error'>Campo obligatorio</span>";
		// 			$campoobligado = 1;
		// 		}
		// 	}

		// echo "<br>";


		// Validación para Usuario
		echo "<label for='usuario'>Usuario :</label>
			<input name='usuario' type='text' class='form-control' id='usuario' size='30' maxlength='30' disabled placeholder='Ingrese el usuario' value='$usuario'>";

		// Campo Oculto Usuario
		echo "<input type='hidden' name='hiddenusuario' value='$usuario'>";

		// el isset determina si una variable está definida, es decir posee algún valor, en cuyo caso nos devolvera el valor booleano.
			if ( isset($usuario) and ($usuario != '') )
			{
				if ( validaAlfaNum($usuario) )
				{
		  			//echo $usuario;
				}
				else
				{
		  			echo "<span class='error'>Dato no es válido</span>";
		  			$errorendato = 1;
				}
    		}
			else
			{
				if ( isset($usuario) and ($usuario == '') )
				{
    				echo "<span class='error'>Campo obligatorio</span>";
					$campoobligado = 1;
				}
			}

		echo "<br>";


		// Validación para Clave
		echo "<label for='clave'>Clave :</label>
			<input name='clave' type='password' class='form-control' id='clave' size='30' maxlength='30' placeholder='Ingrese la clave' value='$clave'>";

		// el isset determina si una variable está definida, es decir posee algún valor, en cuyo caso nos devolvera el valor booleano.
			if ( isset($clave) and ($clave != '') )
			{
				if ( validaAlfaNum($clave) )
				{
		  			//echo $clave;
				}
				else
				{
		  			echo "<span class='error'>Dato no es válido</span>";
		  			$errorendato = 1;
				}
    		}
			else
			{
				if ( isset($clave) and ($clave == '') )
				{
    				echo "<span class='error'>Campo obligatorio</span>";
					$campoobligado = 1;
				}
			}

		echo "<br>";


		// Validación para Clave 2
		echo "<label for='clave2'>Repetir Clave :</label>
			<input name='clave2' type='password' class='form-control' id='clave2' size='30' maxlength='30' placeholder='Repetir la clave' value='";
				if ( isset ($_POST['BtnEnviar']) )
				{
					echo "$clave2'>";
				}
				else
				{
					echo "$clave'>";
				}

		// el isset determina si una variable está definida, es decir posee algún valor, en cuyo caso nos devolvera el valor booleano.
			if ( isset($clave2) and ($clave2 != '') )
			{
				if ( validaAlfaNum($clave2) )
				{
		  			//echo $clave2;
		  			if ( $clave != $clave2 )
					{
						echo "<span class='error'>Las claves no coinciden</span>";
						$errorendato = 1;
					}
				}
				else
				{
		  			echo "<span class='error'>Dato no es válido</span>";
		  			$errorendato = 1;
				}
    		}
			else
			{
				if ( isset($clave2) and ($clave2 == '') )
				{
    				echo "<span class='error'>Campo obligatorio</span>";
					$campoobligado = 1;
				}
			}


		echo "<br>";

		// Validación de una Fecha

		$fecha = cambiarfechadeBD($fecha);

		echo "<label for='fecha'>Fecha :</label>
			<input name='fecha' type='text' class='form-control' min='1900-01-01' max='2016-12-31' id='fecha' size='30' maxlength='30' placeholder='Fecha' value='$fecha'>
			<span class='error'>(dd-mm-aaaa)</span>";

		if ( isset($fecha) and ($fecha != '') )
		{
			// años máximo a restar
			$yearsmax=100;
			// años mínimo a restar
			$yearsmin=-10;

			if (datecheck($fecha)===false or verificaryears($fecha,$yearsmax,$yearsmin)===false )
			{
				echo "<span class='error'><br>La fecha no es correcta</span>";
				$errorendato = 1;
			}
			else
			{
				// echo "<br>";
				// echo "Fecha original $fecha";
				$fecha = cambiarfecha($fecha);
				// echo "<br>";
				// echo "esta es la fecha para BD: $fecha";
			}
		}
		else
		{
			if ( isset($fecha) and ($fecha == ''))
			{
				echo "<span class='error'><br>Campo obligatorio</span>";
				$campoobligado = 1;
			}
		}

		echo "<br>";

		echo "</div>";

		echo "<div class='col-md-6'>";

		// Validación de Radiobox
		 echo "<br><label>Genero :</label> <br>";

		 echo "<input name='genero' type='radio' id='genero' value='F' ";
		 	if($genero === 'F')
			{
	        	echo "checked ";
	    	}
				echo " > Femenino<br>";

		 echo "<input name='genero' type='radio' id='genero' value='M' ";
		 	if($genero === 'M')
			{
	        	echo "checked ";
	    	}
				echo " >Masculino";

		echo "<br>";


		// Validación de Checkbox
		echo "<br><label>Pasatiempos : </label><br>";

		// Buscar en la Base de Datos
		$querybuscarI = $mysqli->query("SELECT * FROM intereses ") or die ( "<br>No se puede ejecutar query para buscar Intereses ". $mysqli->error);
		while (($fila=mysqli_fetch_array($querybuscarI)))
		{
			$idinteres= $fila['idinteres'];
			$nombreint= $fila['nombreint'];

			echo "$nombreint : <input name='CheckBox[]' type='checkbox' class='form-control' value='$idinteres' ";
			if (isset($_POST['BtnEnviar']))
			{
				foreach ($_POST['CheckBox'] as $idI)
				{
					if($idinteres == $idI )
					{
					   echo "checked ";
					}
				}
			}
			else
			{
				$querybuscarI2 = $mysqli->query("SELECT * FROM interper join intereses on interper.idinteres = intereses.idinteres where iddatosper='$iddatosper' ") or die ( "<br>No se puede ejecutar query para buscar datos intereses ". $mysqli->error);
				while (($fila=mysqli_fetch_array($querybuscarI2)))
				{
					$idinteres2= $fila['idinteres'];
					$nombreint2= $fila['nombreint'];
					$estatus= $fila['estatus'];

					if( ($idinteres2 == $idinteres) and ( $estatus=='1') )
					{
						echo "checked ";
					}
				}
			}
			echo " >";
		}

		echo " <br>";

		// Validación de Selección
		echo "<label>Estado Civíl  :</label><br>
			<select  name='seleccion'>

				<option value=''>escoja su opción</option>";

				// Buscar en la Base de Datos
				$querybuscarEdo = $mysqli->query("SELECT * FROM edocivil ") or die ( "<br>No se puede ejecutar query para buscar Edo Civil ". $mysqli->error);
				while (($fila=mysqli_fetch_array($querybuscarEdo)))
				{
					$idedocivil= $fila['idedocivil'];
					$edocivil= $fila['edocivil'];


					echo "$edocivil : <option value='$idedocivil' ";
					if($idedocivil == $seleccion )
					{
					   echo "selected ";
					}
					echo " >$edocivil</option>";
				}

			echo "</select>";

			if ( isset($seleccion) and ($seleccion == '') )
			{
				echo "<span class='error'>escoja su opción</span> ";
				$campoobligado = 1;
			}



		if ( isset ($_POST['BtnEnviar']) )
		{
			if ( $campoobligado == 1 or $errorendato == 1 )
			{
				echo "<br>";
				echo "<input name='BtnEnviar' type='submit' class='btn btn-primary' id='BtnEnviar' value='Modificar' >";
			}
			else
			{
				// Modificar en la Base de Datos
				$queryUpdate = $mysqli->query("UPDATE datospersonales SET nombre='$nombre', apellido='$apellido', fecha='$fecha', genero='$genero', idedocivil='$seleccion' where iddatosper='$iddatosper'") or die ( "<br>No se puede ejecutar query para modificar datos p ". $mysqli->error);

				$queryUpdate2 = $mysqli->query("UPDATE usuario SET clave='$clave' where iddatosper='$iddatosper'") or die ( "<br>No se puede ejecutar query para modificar clave ". $mysqli->error);


				$querybuscarI = $mysqli->query("SELECT * FROM interper where iddatosper='$iddatosper' ") or die ( "<br>No se puede ejecutar query para buscar Intereses ". $mysqli->error);
				while (($fila=mysqli_fetch_array($querybuscarI)))
				{
				 	$idinteres= $fila['idinteres'];
				 	//echo "<br>interes: $idinteres";

				 	$queryUpdate3= $mysqli->query("UPDATE interper SET estatus='0' where idinteres='$idinteres' and iddatosper='$iddatosper' ") or die ( "<br>No se puede ejecutar query para modificar datos Intereses". $mysqli->error);

				 	foreach ($_POST['CheckBox'] as $idI)
				 	{
				 		//echo "<br>el interes es: CheckBox$idI ";

				 		if ( $idinteres == $idI )
				 		{
				 			$queryUpdate4 = $mysqli->query("UPDATE interper SET estatus='1' where idinteres='$idI' and iddatosper='$iddatosper' ") or die ( "<br>No se puede ejecutar query para modificar datos Intereses". $mysqli->error);
				 		}
				 	}

				 	if ( !($_POST['CheckBox']) )
					{
						$queryUpdate4 = $mysqli->query("UPDATE interper SET estatus='0' where idinteres='$idinteres' and iddatosper='$iddatosper' ") or die ( "<br>No se puede ejecutar query para modificar datos Intereses". $mysqli->error);
					}
				}

				if ($queryUpdate && $queryUpdate2 )
				{
					if ( $queryUpdate3 && $queryUpdate4 )
					{
						echo "<span class='error'><br><br>Datos modificados exitosamente<br><br></span>";
					}
				}

			}
		}
		else
		{
			echo "<br><br>";
			echo "<input name='BtnEnviar' type='submit' class='btn btn-primary' id='BtnEnviar' value='Modificar' >";
		}



		echo "<br>";
		echo "<br>";

  ?>

</form>

</div>
</div>
</div>
