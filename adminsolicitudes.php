<?php
error_reporting(E_ERROR | E_PARSE);
  include_once ("sesion.php");
  include_once('conexion.php');
  session_start();
  $seleccion_buscar=$_POST['seleccion_buscar'];
  $buscar= $_POST['txtBuscar'];
  ?>
<div class="container-fluid">

<h2 class="fgray">Solicitudes</h2>
  <?php
    $querybuscarU= $mysqli->query(
      "SELECT datospersonales.cedula, datospersonales.nombre, datospersonales.apellido, usuario.idusuario, camiones.marca, solicitudes.fecha_comienzo, solicitudes.fecha_fin, estados.estado, solicitudes.comentario
        FROM solicitudes
        join usuario
        on usuario.idusuario = solicitudes.id_persona
        join estados
        on solicitudes.id_estado = estados.id_estado
        join camiones
        on solicitudes.id_camion = camiones.id_camion
        join datospersonales
        on  datospersonales.id_persona = usuario.id_persona
        where usuario.idusuario ") or 
        die ("<br> No se puede ejecutar query para buscar datos P".$mysqli->error);



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
      echo "<th> Acción </th>";

      //empieza a filtrar la tabla con el query
      while (($fila=mysqli_fetch_array($querybuscarU)))
      {
        $id=$fila['idusuario'];
        $cedula = $fila['cedula'];
        $nombre = $fila['nombre'];
        $apellido=$fila['apellido'];
        $usuario=$fila['usuario'];
        $equipo=$fila['descripcion'];
        $fecha_comienzo=$fila['fecha_comienzo'];
        $fecha_fin=$fila['fecha_fin'];
        $motivo=$fila['motivo'];
        $estado=$fila['estado'];

          echo "<tr>";
          //echo "<td> $iddatosp</td>";
          echo "<td>$cedula</td>";
          echo "<td>$nombre</td>";
          echo "<td>$apellido</td>";
          echo "<td>$equipo</td>";
          echo "<td>$fecha_comienzo</td>";
          echo "<td>$fecha_fin</td>";
          echo "<td>$motivo</td>";
          echo "<td>$estado</td>";
          echo "<td>
                  <a href='index.php?art=aprobar&id=$id'><button class='btn btn-success'>Aprobar </button></a>
                  <a href='index.php?art=rechazar&id=$id'><button class='btn btn-danger'>Rechazar </button></a>
            </td>";
      }

     echo "</tr>";
    echo "<br>";
    echo "</tr>";

  echo "<table>";
    }


  ?>

  </div>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
