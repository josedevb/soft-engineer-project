<?php
error_reporting(E_ERROR | E_PARSE);
	include_once ("sesion.php");
  include_once('conexion.php');
  session_start();
  $seleccion_buscar=$_POST['seleccion_buscar'];
  $buscar= $_POST['txtBuscar'];
?>
<div class="container-fluid">
  <h2 class="fgray">Ordenes</h2>
  
  <?php
  	$id = $_REQUEST['id'];
    echo "<a href='index.php?art=crearsolicitud&id=$id'><div class='btn btn-success'>Crear nueva solicitud</div></a>";

      $querybuscarU= $mysqli->query(
          "SELECT
            *
            FROM ordenes
            join usuario on usuario.id_persona = ordenes.id_usuario_emisor
            where usuario.idusuario = $id ") or 
          die ("<br> No se puede ejecutar query para buscar datos P".$mysqli->error);

      $querybuscarA= $mysqli->query("
        SELECT * 
        FROM datospersonales 
        join usuario 
        on datospersonales.id_persona = usuario.id_persona 
        where usuario.idusuario = $id ") or 
      die ("<br> No se puede ejecutar query para buscar datos P".$mysqli->error);

      /*while (($fila=mysqli_fetch_array($querybuscarA)))
      {
        $cedula=$fila['cedula'];
        $nombre=$fila['nombre'];
        $apellido=$fila['apellido'];
      }*/

    if (mysqli_num_rows($querybuscarU) > 0)
    {
      echo "<table class='w3-table bgreen fwhite1'>";
      echo "<tr>";
      echo "<th> Cédula </th>";
      echo "<th> Nombre </th>";
      echo "<th> Apellido </th>";
      echo "<th> Equipo </th>";
      echo "<th> Fecha Inicial </th>";
      echo "<th> Fecha Final </th>";
      echo "<th> Motivo </th>";
      echo "<th> Estado </th>";

      //empieza a filtrar la tabla con el query
      while (($fila=mysqli_fetch_array($querybuscarU)))
      {
        $usuario=$fila['usuario'];
        $equipo=$fila['descripcion'];
        $fechaini=$fila['fechaini'];
        $fechafin=$fila['fechafin'];
        $motivo=$fila['motivo'];
        $estado=$fila['estado'];

          echo "<tr>";
          //echo "<td> $iddatosp</td>";
          echo "<td>$cedula</td>";
          echo "<td>$nombre</td>";
          echo "<td>$apellido</td>";
          echo "<td>$equipo</td>";
          echo "<td>$fechaini</td>";
          echo "<td>$fechafin</td>";
          echo "<td>$motivo</td>";
          echo "<td>$estado</td>";
      }

     echo "</tr>";
    echo "<br>";
    echo "</tr>";

  echo "<table>";
    }
    else {
      echo "<h2>No tiene ordenes realizadas.</h2>";
    }


  ?>

	</div>
