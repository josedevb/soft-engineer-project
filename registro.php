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
	<h1>Envía tus Datos</h1>
<div class="row">
	<div class="col-md-6">
		<center>
		<?php 
			error_reporting(E_ERROR | E_PARSE); // Desactiva la notificación y warnings de error en php.
			include_once('funciones.php');
			include_once('conexion.php');
			$cedula=$_POST['cedula'];
			$nombre=$_POST['nombre'];
			$apellido=$_POST['apellido'];
			$fecha=$_POST['fecha'];
			$radio=$_POST['genero'];
			// $checkbox1=$_POST['checkbox1'];
			// $checkbox2=$_POST['checkbox2'];
			// $checkbox3=$_POST['checkbox3'];
			// $seleccion=$_POST['seleccion'];
			$correo=$_POST['correo'];
			$usuario=$_POST['usuario'];
			$clave=$_POST['clave'];
			$clave2=$_POST['clave2'];
		?>
<?php 

	echo "<form action='' name='Registro' method='post'>";

		echo "<label for='cedula'>Cédula :</label>
			<input name='cedula' type='text' class='form-control id='cedula' size='30' maxlength='8' placeholder='Ingrese la cedula' value='$cedula'>";

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

		echo "<br>";

		// Validación para Campo de Texto
		echo "<label>Nombre :</label>
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

		echo "<br>";

		// Validación para Campo de Texto
		echo "<label>Apellido :</label>
			<input name='apellido' type='text' class='form-control id='apellido' size='30' maxlength='30' placeholder='Ingrese Apellido' value='$apellido'>";
		
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

		//validacion para correo
		echo "<label for='correo'>Correo :</label>
			<input name='correo' type='email' class='form-control id='correo' size='30' maxlength='30' placeholder='Ingrese el correo' value='$correo'>";

		// if ( isset($correo) and ($correo != '') )
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
			<input name='usuario' type='text' class='form-control id='usuario' size='30' maxlength='30' placeholder='Ingrese el usuario' value='$usuario'>";

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
			<input name='clave' type='password' class='form-control  id='clave' size='30' maxlength='30' placeholder='Ingrese la clave' value='$clave'>";

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
			<input name='clave2' type='password' class='form-control id='clave2' size='30' maxlength='30' placeholder='Repetir la clave' value='$clave2'>";

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

			echo "<br>";

		// Validación de una Fecha
		 	echo "<label for='fecha'>Fecha :</label>
			<input name='fecha' type='text' class='form-control min='1900-01-01' max='2018-12-31' id='txtFecha' size='30' maxlength='30' placeholder='Fecha' value='$fecha'>
			<br><span class='error'>Formato (dd-mm-aaaa)</span>";

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

		echo "<br>";
		echo "</div>";
		echo "<div class='col-md-6'>";

		// Validación de Radiobox
		 echo "<label>Genero :</label><br> ";  
		 	
		 echo "<input name='genero' checked type='radio' id='genero' value='F' ";
		 	if($radio === 'F')
			{
	        	echo "checked ";
	    	}
				echo " > Femenino <br>";
				
		 echo "<input name='genero' type='radio' id='genero' value='M' ";
		 	if($radio === 'M')
			{
	        	echo "checked ";
	    	}
				echo " > Masculino";

		echo "<br>";

		// Validación de Checkbox
		// echo "<br><label>Pasatiempos : </label><br>";

		// Buscar en la Base de Datos
		// $querybuscarI = $mysqli->query("SELECT * FROM intereses ") or die ( "<br>No se puede ejecutar query para buscar Intereses ". $mysqli->error);
		// while (($fila=mysqli_fetch_array($querybuscarI)))
		// {
		// 	$idinteres= $fila['idinteres'];
		// 	$nombreint= $fila['nombreint'];

		// 	echo "$nombreint : <input name='CheckBox[]' class='form-control' type='checkbox' value='$idinteres' ";

		// 	foreach ($_POST['CheckBox'] as $idI)
		// 	{
		// 		if($idinteres == $idI )
		// 		{
		// 		   echo "checked ";
		// 		}
		// 	}
		// 	echo " >";
		// }


		// Validación de Selección
		// echo "<label>Estado Civíl  :</label><br>
		// 	<select name='seleccion'>
				
		// 		<option value=''>escoja su opción</option> ";

		// 		//Buscar en la Base de Datos
		// 	$querybuscarEdo = $mysqli->query("SELECT * FROM edocivil ") or die ( "<br> No se puede ejecutar query para buscar Edo Civil ". $mysqli->error);

		// 		while (($fila=mysqli_fetch_array($querybuscarEdo))) 
		// 		{
		// 			$idedocivil= $fila['idedocivil'];
		// 			$edocivil= $fila['edocivil'];

		// 			echo "$edocivil : <option value= '$idedocivil' ";
		// 			if($idedocivil == $seleccion) 
		// 			{
		// 				echo "selected";
		// 			}
		// 			echo " >$edocivil </option>";
		// 		}
		
		// 	echo "</select><br>";	
			
		if ( isset ($_POST['BtnEnviar']) )
		{
			if ( $campoobligado == 1 or $errorendato == 1 )
			{
				echo "</select><br><br>";
				echo "<input name='BtnEnviar' class='btn btn-primary' type='submit' id='BtnEnviar' value='Enviar' >";
			}
			else
			{
                //Consultar cedula existente para no repetirla
				$querybuscar = $mysqli->query("SELECT * FROM datospersonales join usuario on datospersonales.id_datopersonal = usuario.id_datopersonal where cedula='$cedula' or correo='$correo' or usuario='$usuario' ") or die ("<br> No se puede ejecutar query para buscar datos".$mysqli->error);

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
					echo "<input name='BtnEnviar' class='btn btn-primary' type='submit' id='BtnEnviar' value='Enviar' >";	
				}
				else {

                //Insertar en la Base de Datos
				$queryInsertar = $mysqli->query("INSERT INTO datospersonales( id_datopersonal, cedula, nombre, apellido, correo, fecha, genero, idedocivil ) values ( null, '$cedula', '$nombre', '$apellido', '$correo' , '$fecha', '$radio', '$seleccion' ) ");

				//Buscar Datos
				$querybuscar = $mysqli->query("SELECT id_datopersonal FROM datospersonales where correo ='$correo' ");
					while (($fila=mysqli_fetch_array($querybuscar)	)) 
					{
						$id_datopersonal= $fila['id_datopersonal'];
						//echo "<br> el id es $id_datopersonal <br>";
					}

				if ($querybuscar) {
					// Insertar en la Base de Datos
					$queryInsertar2 = $mysqli->query("INSERT INTO usuario( idusuario, usuario, clave, id_datopersonal, rol ) values ( null, '$usuario', '$clave', '$id_datopersonal', 0) ");
				}

				// foreach ($_POST['CheckBox'] as $idinteres)
				// 	{
				// 		// Insertar en la Base de Datos
				// 		$queryInsertar3 = $mysqli->query("INSERT INTO interper( idinterper, iddatosper, idinteres, estatus) values ( null, '$iddatosper', '$idinteres', '1' )") or die ( "<br>No se puede ejecutar query para insertar datos intereses". $mysqli->error);
				// 	}

				if ($queryInsertar && $queryInsertar2) {
				 	echo "<span class='error'><br><br>Datos enviados exitosamente<br><br></span>";
				     }
				 	else
				 	{
				 	  echo"<span class='error'><br><br> No se pudo cargar la informacion<br><br></span>";
			          echo "<input name='BtnEnviar' class='btn btn-primaryu' type='submit' id='BtnEnviar' value='Enviar' >";
				 	}
				  
			}

			}//Cierre else
		}
		else
		{
			echo "<br>";
			echo "<input name='BtnEnviar' class='btn btn-primary' type='submit' id='BtnEnviar' value='Enviar' >";
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
</div>
