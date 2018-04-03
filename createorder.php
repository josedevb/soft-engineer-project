<?php
  include_once('conexion.php');

  $id_usuario_emisor = 1;
  $id_usuario_receptor = 2;
  $tipo_mantenimiento = $_POST['tipoMantenimiento'];
  $usuario_equipo = $_POST['usuario_equipo'];
  $mecanico_asignado = $_POST['mecanico_asignado'];
  $fecha_reporte= $_POST['fecha_reporte'];
  $hora_reporte= $_POST['hora_reporte'];
  $fecha_inicio= $_POST['fecha_inicio'];
  $hora_inicio= $_POST['hora_inicio'];
  $fecha_culminacion= $_POST['fecha_culminacion'];
  $hora_culminacion= $_POST['hora_culminacion'];
  $km= $_POST['km'];
  $unidad_equipo= $_POST['unidad_equipo'];
  $placa_equipo= $_POST['placa_equipo'];
  $ultima_actividad= $_POST['ultima_actividad'];
  $taller_externo= $_POST['taller_externo'];
  $fecha_inicio_taller= $_POST['fecha_inicio_taller'];
  $fecha_culminacion_taller= $_POST['fecha_culminacion_taller'];
  $hora_taller= $_POST['hora_taller'];
  $garantia= $_POST['garantia'];
  $descripcion_falla= $_POST['descripcion_falla'];
  $estado_orden= 'Pendiente';

  $queryOrder = $mysqli->query(
    "INSERT INTO 
      ordenes(
        id_usuario_emisor, 
        id_usuario_receptor, 
        tipo_mantenimiento, 
        usuario_equipo, 
        mecanico_asignado, 
        fecha_reporte, 
        hora_reporte, 
        fecha_inicio, 
        hora_inicio, 
        fecha_culminacion, 
        hora_culminacion, 
        km, 
        unidad_equipo, 
        placa_equipo, 
        ultima_actividad, 
        taller_externo, 
        fecha_inicio_taller, 
        fecha_culminacion_taller, 
        hora_taller, 
        garantia, 
        descripcion_falla, 
        estado_orden ) 
      VALUES (
        $id_usuario_emisor,
        $id_usuario_receptor, 
        '$tipo_mantenimiento',
        '$usuario_equipo',
        '$mecanico_asignado',
        '$fecha_reporte', 
        '$hora_reporte', 
        '$fecha_inicio', 
        '$hora_inicio', 
        '$fecha_culminacion', 
        '$hora_culminacion', 
        $km, 
        '$unidad_equipo', 
        '$placa_equipo', 
        '$ultima_actividad', 
        '$taller_externo', 
        '$fecha_inicio_taller', 
        '$fecha_culminacion_taller', 
        '$hora_taller', 
        '$garantia', 
        '$descripcion_falla', 
        '$estado_orden') 
      ")
      or die ( "<br>No se puede ejecutar query para buscar datos P ". $mysqli->error);
  
  header("Location: index.php?art=solicitudes&id=$id_usuario_emisor");
?>