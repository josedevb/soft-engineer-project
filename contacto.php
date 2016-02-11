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
<div class="row">
	<div class="col-md-10">
		<center>
           <?php 
    error_reporting(E_ERROR | E_PARSE); // Desactiva la notificación y warnings de error en php.
	include_once('../models/funciones.php');
	include_once('../models/conexion.php');
	$cedula=$_POST['cedula'];
	$nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$fecha=$_POST['fecha'];
	$radio=$_POST['genero'];
	$checkbox1=$_POST['checkbox1'];
	$checkbox2=$_POST['checkbox2'];
	$checkbox3=$_POST['checkbox3'];
	$seleccion=$_POST['seleccion'];
	$correo=$_POST['correo'];
	$usuario=$_POST['usuario'];
	$clave=$_POST['clave'];
	$clave2=$_POST['clave2'];

           ?>

<?php 
 	echo " <h1>Contacto</h1>";


	echo "<form action='' name='Registro' method='post'>";

		echo "<br>";

		echo "<label for='cedula'>Cedula :</label>
			<input name='cedula' type='text' id='cedula' size='30' maxlength='8' placeholder='Ingrese la cedula' value='$cedula'>";

		// el isset determina si una variable está definida, es decir posee algún valor, en cuyo caso nos devolvera el valor booleano.
			if ( isset($cedula) and ($cedula != '') )
			{
				if ( validaEntero($cedula) )
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
				if ( isset($cedula) and ($cedula == '') )
				{ 
    				echo "<span class='error'>Campo obligatorio</span>";
					$campoobligado = 1;
				}
			}

		echo "<br><br>";

		// Validación para Campo de Texto
		echo "<label>Nombre :</label>
			<input name='nombre' type='text' id='nombre' size='30' maxlength='30' placeholder='Ingrese Nombre' value='$nombre'>";

		// el isset determina si una variable está definida, es decir posee algún valor, en cuyo caso nos devolvera el valor booleano.
			if ( isset($nombre) and ($nombre != '') )
			{
				if ( validaAlfa($nombre) )
				{
		  			//echo $nombre;
				}
				else
				{
					echo "<br><br>";
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

		echo "<br><br>";

		// Validación para Campo de Texto
		echo "<label>Apellido :</label>
			<input name='apellido' type='text' id='apellido' size='30' maxlength='30' placeholder='Ingrese Apellido' value='$apellido'>";
		
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
		echo "<br><br>";

		//validacion para correo
		echo "<label for='correo'>Correo :</label>
			<input name='correo' type='text' id='correo' size='30' maxlength='30' placeholder='Ingrese el correo' value='$correo'>";

		if ( isset($correo) and ($correo != '') )
			{
				if ( validarDirCorreoElec($correo) )
				{
		  			//echo $correo;
				}
				else
				{
		  			echo "<span class='error'>Dato no es válido</span>";
		  			$errorendato = 1;
				}
    		}
			else
			{
				if ( isset($correo) and ($correo == '') )
				{ 
    				echo "<span class='error'>Campo obligatorio</span>";
					$campoobligado = 1;
				}
			}

		echo "<br><br>";

		// Validación para Usuario
		echo "<label for='usuario'>Usuario :</label>
			<input name='usuario' type='text' id='usuario' size='30' maxlength='30' placeholder='Ingrese el usuario' value='$usuario'>";

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

		echo "<br><br>";

		// Validación para Clave
		echo "<label for='clave'>Clave :</label>
			<input name='clave' type='password' id='clave' size='30' maxlength='30' placeholder='Ingrese la clave' value='$clave'>";

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

		echo "<br><br>";


		// Validación para Clave 2
		echo "<label for='clave2'>Repetir Clave :</label>
			<input name='clave2' type='password' id='clave2' size='30' maxlength='30' placeholder='Repetir la clave' value='$clave2'>";

		// el isset determina si una variable está definida, es decir posee algún valor, en cuyo caso nos devolvera el valor booleano.
			if ( isset($clave2) and ($clave2 != '') )
			{
				if ( validaAlfaNum($clave2) )
				{
		  			//echo $clave2;
		  			if ($clave != $clave2) {
		  				
		  				echo "<span class='error'> Las claves no coinciden </span>";
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

			echo "<br><br>";

		// Validación de una Fecha
		 	echo "<label for='fecha'>Fecha :</label>
			<input name='fecha' type='text' min='1900-01-01' max='2016-12-31' id='txtFecha' size='30' maxlength='30' placeholder='Fecha' value='$fecha'>
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
				$fecha = cambiarfecha($fecha);
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

		echo "<br><br>";

		// Validación de Radiobox
		 echo "<label>Genero :</label> ";  
		 	
		 echo "<input name='genero' checked type='radio' id='genero' value='F' ";
		 	if($radio === 'F')
			{
	        	echo "checked ";
	    	}
				echo " > Femenino";
				
		 echo "<input name='genero' type='radio' id='genero' value='M' ";
		 	if($radio === 'M')
			{
	        	echo "checked ";
	    	}
				echo " > Masculino";

		echo "<br><br>";


		// Validación de Checkbox
		echo "<label>Pasatiempos : </label><br>";

		// Buscar en la Base de Datos
		$querybuscarI = $mysqli->query("SELECT * FROM intereses ") or die ( "<br>No se puede ejecutar query para buscar Intereses ". $mysqli->error);
		while (($fila=mysqli_fetch_array($querybuscarI)))
		{
			$idinteres= $fila['idinteres'];
			$nombreint= $fila['nombreint'];

			echo "$nombreint : <input name='CheckBox[]' type='checkbox' value='$idinteres' ";

			foreach ($_POST['CheckBox'] as $idI)
			{
				if($idinteres == $idI )
				{
				   echo "checked ";
				}
			}
			echo " ><br>";
		}


		// Validación de Selección
		echo "<label><br>Estado Civíl  :</label><br>
			<select name='seleccion'>
				
				<option value=''>escoja su opción</option><br><br> ";

				//Buscar en la Base de Datos
			$querybuscarEdo = $mysqli->query("SELECT * FROM edocivil ") or die ( "<br> No se puede ejecutar query para buscar Edo Civil ". $mysqli->error);

				while (($fila=mysqli_fetch_array($querybuscarEdo))) 
				{
					$idedocivil= $fila['idedocivil'];
					$edocivil= $fila['edocivil'];

					echo "$edocivil : <option value= '$idedocivil' ";
					if($idedocivil == $seleccion) 
					{
						echo "selected";
					}
					echo " >$edocivil </option>";
				}
		
			echo "</select><br>";	
			
		if ( isset ($_POST['BtnEnviar']) )
		{
			if ( $campoobligado == 1 or $errorendato == 1 )
			{
				echo "</select><br><br>";
				echo "<input name='BtnEnviar' type='submit' id='BtnEnviar' value='Enviar' >";
			}
			else
			{
                //Consultar cedula existente para no repetirla
				$querybuscar = $mysqli->query("SELECT * FROM datospersonales join usuario on datospersonales.iddatosper = usuario.iddatosper where cedula='$cedula' or correo='$correo' or usuario='$usuario' ") or die ("<br> No se puede ejecutar query para buscar datos".$mysqli->error);

				if (mysqli_num_rows($querybuscar) > 0) 
				{
					$querybuscarC = $mysqli->query("SELECT * FROM datospersonales where cedula='$cedula' ") or die ("<br>No se puede ejecutar query para buscar cedula".$mysqli->error);

					if (mysqli_num_rows($querybuscarC) > 0) 
					{
						echo "<span class='error'<br>Cedula ya registrada<br></span>";
					}

					$querybuscarE = $mysqli->query("SELECT * FROM datospersonales where correo='$correo' ") or die ("<br>No se puede ejecutar query para buscar correo".$mysqli->error);

					if (mysqli_num_rows($querybuscarE) > 0) 
					{
						echo "<span class='error'<br>Correo ya registrado<br></span>";
					}

					$querybuscarU = $mysqli->query("SELECT * FROM usuario where usuario='$usuario' ") or die ("<br>No se puede ejecutar query para buscar usuario<br>".$mysqli->error);

					if(mysqli_num_rows($querybuscarU) > 0) 
						{
							echo "<span class='error'<br>Usuario ya registrado<br></span>";
						}

					echo "<br><br>";
					echo "<input name='BtnEnviar' type='submit' id='BtnEnviar' value='Enviar' >";	
				}
				else {

                //Insertar en la Base de Datos
				$queryInsertar = $mysqli->query("INSERT INTO datospersonales( iddatosper, cedula, nombre, apellido, correo, fecha, genero, idedocivil ) values ( null, '$cedula', '$nombre', '$apellido', '$correo' , '$fecha', '$radio', '$seleccion' ) ");

				//Buscar Datos
				$querybuscar = $mysqli->query("SELECT iddatosper FROM urbe.datospersonales where correo ='$correo' ");
					while (($fila=mysqli_fetch_array($querybuscar)	)) 
					{
						$iddatosper= $fila['iddatosper'];
						//echo "<br> el id es $iddatosper <br>";
					}

				if ($querybuscar) {
					// Insertar en la Base de Datos
					$queryInsertar2 = $mysqli->query("INSERT INTO usuario( idusuario, usuario, clave, iddatosper ) values ( null, '$usuario', '$clave', '$iddatosper') ");
				}

				foreach ($_POST['CheckBox'] as $idinteres)
					{
						// Insertar en la Base de Datos
						$queryInsertar3 = $mysqli->query("INSERT INTO interper( idinterper, iddatosper, idinteres, estatus) values ( null, '$iddatosper', '$idinteres', '1' )") or die ( "<br>No se puede ejecutar query para insertar datos intereses". $mysqli->error);
					}

				if ($queryInsertar && $queryInsertar2) {
				 	echo "<span class='error'><br><br>Datos enviados exitosamente<br><br></span>";
				     }
				 	else
				 	{
				 	  echo"<span class='error'><br><br> No se pudo cargar la informacion<br><br></span>";
			          echo "<input name='BtnEnviar' type='submit' id='BtnEnviar' value='Enviar' >";
				 	}
				  
			}

			}//Cierre else
		}
		else
		{
			echo "<br><br>";
			echo "<input name='BtnEnviar' type='submit' id='BtnEnviar' value='Enviar' >";
		}
				
		echo "<br>";
		echo "<br>";

	echo "</form>";
	echo "</fieldset>";
  ?>
         </form>
        </center>
</div>
</div>
<?php 
	include_once('footer.php')
 ?>
</body>
</html>