<!-- eliminar.php -->
<!-- modificar.php -->
<?php
error_reporting(E_ERROR | E_PARSE);
  include_once ('../models/sesion.php');
  include_once('../models/conexion.php');
  include_once('../models/funciones.php');
	?>
<!DOCTYPE html>
<html>
<head>
  <?php
    include_once('head.php');
  ?>
</head>
  <body background="image/3.jpg">
  <?php 
      include_once('logo.php')
   ?>
<div class="row">
	<?php 
    include_once('menu.php')
   ?>
</div>

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
		$nombre     = $_POST['hiddennom'];
		$apellido     = $_POST['hiddenape'];
		$genero     = $_POST['hiddengen'];
		$seleccion     = $_POST['hiddenedo'];
		$fecha     = $_POST['hiddenfecha'];
		$clave     = $_POST['hiddenclave'];

		
		$correo     = $_POST['hiddencorreo'];

		$usuario    = $_POST['hiddenusuario'];


		// foreach ($_POST['CheckBox'] as $idI)
		// {
		// 	echo "<br>el interes es: CheckBox$idI ";
		// }
	}

 ?>

 <h2>Búsqueda</h2>

<?php 

	echo "<form action='eliminar.php?id=$iddatosper' name='Formulario' method='post'>";

		echo "<br>";

		// Campo Oculto ID
		echo "<input type='hidden' name='hiddenid' value='$iddatosper'>";

		// Validación para Campo de Texto
		echo "<label for='cedula'>Cédula :</label>
			<input name='cedula' type='text' id='cedula' size='30' maxlength='8' disabled placeholder='Ingrese Cédula' value='$cedula'>";

		// Campo Oculto Cedula
		echo "<input type='hidden' name='hiddenced' value='$cedula'>";


		echo "<br><br>";


		// Validación para Campo de Texto
		echo "<label for='nombre'>Nombre :</label>
			<input name='nombre' type='text' id='nombre' size='30' maxlength='30' disabled placeholder='Ingrese Nombre' value='$nombre'>";

		// Campo Oculto Nombre
		echo "<input type='hidden' name='hiddennom' value='$nombre'>";

		echo "<br><br>";


		// Validación para Campo de Texto
		echo "<label for='apellido'>Apellido :</label>
			<input name='apellido' type='text' id='apellido' size='30' maxlength='30' disabled placeholder='Ingrese Apellido' value='$apellido'>";

		// Campo Oculto Apellido
		echo "<input type='hidden' name='hiddenape' value='$apellido'>";
		
		echo "<br><br>";


		// Validación para Correo
		echo "<label for='correo'>Correo Electrónico :</label>
			<input name='correo' type='text' id='correo' size='30' maxlength='30' disabled placeholder='Ingrese el correo' value='$correo'>";

		// Campo Oculto Correo
		echo "<input type='hidden' name='hiddencorreo' value='$correo'>";

		echo "<br><br>";


		// Validación para Usuario
		echo "<label for='usuario'>Usuario :</label>
			<input name='usuario' type='text' id='usuario' size='30' maxlength='30' disabled placeholder='Ingrese el usuario' value='$usuario'>";

		// Campo Oculto Usuario
		echo "<input type='hidden' name='hiddenusuario' value='$usuario'>";

		echo "<br><br>";


		// Validación para Clave
		echo "<label for='clave'>Clave :</label>
			<input name='clave' type='password' id='clave' size='30' maxlength='30' disabled placeholder='Ingrese la clave' value='$clave'>";

		// Campo Oculto Clave
		echo "<input type='hidden' name='hiddenclave' value='$clave'>";

		echo "<br><br>";


		// Validación de una Fecha

		$fecha = cambiarfechadeBD($fecha);

		echo "<label for='fecha'>Fecha :</label>
			<input name='fecha' type='text' min='1900-01-01' max='2016-12-31' id='fecha' size='30' maxlength='30' disabled placeholder='Fecha' value='$fecha'>
			<span class='error'>(dd-mm-aaaa)</span>";

		// Campo Oculto Fecha
		echo "<input type='hidden' name='hiddenfecha' value='$fecha'>";

		echo "<br><br>";

		// Validación de Radiobox
		 echo "<label>Genero :</label> ";  
		 	
		 echo "<input name='genero' type='radio' id='genero' disabled value='F' ";
		 	if($genero === 'F')
			{
	        	echo "checked ";
	    	}
				echo " > Femenino";
				
		 echo "<input name='genero' type='radio' id='genero' disabled value='M' ";
		 	if($genero === 'M')
			{
	        	echo "checked ";
	    	}
				echo " > Masculino";

		// Campo Oculto Genero
		echo "<input type='hidden' name='hiddengen' value='$genero'>";

		echo "<br><br>";


		// Validación de Checkbox
		echo "<label>Intereses : </label><br>";

		// Buscar en la Base de Datos
		$querybuscarI = $mysqli->query("SELECT * FROM intereses ") or die ( "<br>No se puede ejecutar query para buscar Intereses ". $mysqli->error);
		while (($fila=mysqli_fetch_array($querybuscarI)))
		{
			$idinteres= $fila['idinteres'];
			$nombreint= $fila['nombreint'];

			echo "$nombreint : <input name='CheckBox[]' type='checkbox' disabled value='$idinteres' ";
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


			echo " ><br>";
		}



		// Validación de Selección
		echo "<label><br>Estado Civíl  :</label><br>
			<select name='seleccion' disabled>
				
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

		// Campo Oculto Estado Civíl
		echo "<input type='hidden' name='hiddenedo' value='$edocivil'>";


		if ( isset ($_POST['BtnEnviar']) )
		{
			// Eliminar en la Base de Datos
			$queryEliminar = $mysqli->query("DELETE from datospersonales where iddatosper='$iddatosper'") or die ( "<br>No se puede ejecutar query para eliminar datos p ". $mysqli->error);

			$queryEliminar2 = $mysqli->query("DELETE from usuario where iddatosper='$iddatosper'") or die ( "<br>No se puede ejecutar query para eliminar usuario ". $mysqli->error);

			$queryEliminar3 = $mysqli->query("DELETE from interper where iddatosper='$iddatosper'") or die ( "<br>No se puede ejecutar query para eliminar interesesper ". $mysqli->error);

			if ($queryEliminar && $queryEliminar2 && $queryEliminar3 )
			{
				echo "<span class='error'><br><br>Datos eliminados exitosamente<br><br></span>";
			}

		}
		else
		{
			echo "<br><br>";
			echo "<input name='BtnEnviar' type='submit' id='BtnEnviar' class='btn btn-danger' value='Eliminar' >";
		}
				


		echo "<br>";
		echo "<br>";
  ?>

  </form>

  <br><br>
<?php 
  include_once('footer.php')
 ?>
</body>
</html>