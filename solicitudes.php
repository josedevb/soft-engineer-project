<?php
error_reporting(E_ERROR | E_PARSE);
	include_once ("sesion.php");
  include_once('conexion.php');
  session_start();
  $seleccion_buscar=$_POST['seleccion_buscar'];
  $buscar= $_POST['txtBuscar'];
?>
<div class="container-fluid" style="height:85vh;">
  <h2 class="fgray">Ordenes</h2>
  
  <?php
  	$id = $_REQUEST['id'];
    echo "<a href='index.php?art=crearsolicitud&id=$id'>
    <div style='margin-bottom:20px;' class='btn btn-success'>Crear nueva orden</div></a>";

    $querybuscarU= $mysqli->query("SELECT * FROM ordenes") or 
      die ("<br> No se puede ejecutar query para buscar datos P".$mysqli->error);

    if (mysqli_num_rows($querybuscarU) > 0)
    {
      echo "<table class='w3-table bgreen fwhite1'>";
      echo "<tr>";
      echo "<th> Orden nº </th>";
      echo "<th> Tipo </th>";
      echo "<th> Usuario asignado </th>";
      echo "<th> Mecanico asignado </th>";
      echo "<th> Fecha reporte </th>";
      echo "<th> Hora Reporte </th>";
      echo "<th> Unidad equipo </th>";
      echo "<th> Estado </th>";

      //empieza a filtrar la tabla con el query
      while (($fila=mysqli_fetch_array($querybuscarU)))
      {
        $id_orden=$fila['id_orden'];
        $tipo_mantenimiento=$fila['tipo_mantenimiento'];
        $usuario_equipo=$fila['usuario_equipo'];
        $mecanico_asignado=$fila['mecanico_asignado'];
        $fecha_reporte=$fila['fecha_reporte'];
        $hora_reporte=$fila['hora_reporte'];
        $unidad_equipo=$fila['unidad_equipo'];
        $estado_orden = $fila['estado_orden'];

          echo "<tr>";
          echo "<td>$id_orden</td>";
          echo "<td>$tipo_mantenimiento</td>";
          echo "<td>$usuario_equipo</td>";
          echo "<td>$mecanico_asignado</td>";
          echo "<td>$fecha_reporte</td>";
          echo "<td>$hora_reporte</td>";
          echo "<td>$unidad_equipo</td>";
          echo "<td>$estado_orden</td>";
          echo "<td>
                  <a href='index.php?art=editar&id=$id_orden'>
                    <button class='btn btn-primary'>Editar</button>
                  </a>";
          if($estado_orden !== 'Cancelada')
            echo  "<a href='index.php?art=declineorder&id=$id_orden&operator=true'>
                    <button class='btn btn-danger'>Cancelar</button>
                  </a>
                </td>";
          else 
            echo  "<a href='index.php?art=reactivateorder&id=$id_orden'>
                      <button class='btn btn-danger'>Reactivar</button>
                    </a>
                  </td>";
            
      }

     echo "</tr>";
    echo "</tr>";
  echo "<table>";
    }
    else {
      echo "<h2>No tiene ordenes realizadas.</h2>";
    }
  ?>
</div>