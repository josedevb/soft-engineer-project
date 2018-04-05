<?php
  include_once('conexion.php');
  $id_orden = $_POST['id_orden'];
  $total_reparaciones = $_POST['total_reparaciones'];
  $total_repuestos = $_POST['total_repuestos'];
  $total_facturado = $total_reparaciones + $total_reparaciones;
  $fecha_ahora = date('y-m-d');
  $hora_ahora = date('H:i:s');
  $observacion = $_POST['observacion'];
  $ids_reparaciones_realizadas = [];
  $ids_repuestos_suministrados = [];
  $ids_reparaciones_externas = [];
 
  $repRealizadas = $mysqli-> query(
    " SELECT * FROM ordenes
      JOIN reparaciones_realizadas on ordenes.id_orden = reparaciones_realizadas.id_orden
      WHERE ordenes.id_orden = $id_orden") or die($mysqli->error);
  if (mysqli_num_rows($repRealizadas) > 0)
    while (($repRealizada = mysqli_fetch_array($repRealizadas)))
      array_push($ids_reparaciones_realizadas, $repRealizada['id_reparacion']);

  $repuestosSums = $mysqli-> query(
    " SELECT * FROM ordenes
      JOIN repuestos on ordenes.id_orden = repuestos.id_orden
      WHERE ordenes.id_orden = $id_orden") or die($mysqli->error);
  if (mysqli_num_rows($repuestosSums) > 0)
    while (($repuestoSum = mysqli_fetch_array($repuestosSums)))
      array_push($ids_repuestos_suministrados, $repuestoSum['id_repuesto']);


  $reparaciones_externas = $mysqli-> query(
    " SELECT * FROM ordenes
      JOIN reparaciones on ordenes.id_orden = reparaciones.id_orden
      WHERE ordenes.id_orden = $id_orden") or die($mysqli->error);
  if (mysqli_num_rows($reparaciones_externas) > 0)
    while (($reparacion_externa = mysqli_fetch_array($reparaciones_externas)))
      array_push($ids_reparaciones_externas, $reparacion_externa['id_reparacion']);

  //CRUD DE REPARACIONES REALIZADAS
  for($i=1, $j=0; $j < 10; $i++, $j++)
    if($_POST['reparacion'.$i]) {
      $reparacion = $_POST['reparacion'.$i];
      if(isset($ids_reparaciones_realizadas[$j])) {
        $mysqli-> query(
          "REPLACE INTO reparaciones_realizadas(id_reparacion, descripcion, id_orden)
           values ($ids_reparaciones_realizadas[$j], '$reparacion', $id_orden)
          ") or die($mysqli->error);
      } 
      else {
        $mysqli-> query(
          "INSERT INTO reparaciones_realizadas(id_reparacion, descripcion, id_orden)
           values (null, '$reparacion', $id_orden)
          ") or die($mysqli->error);
      }
    } else {
      $id = isset($ids_reparaciones_realizadas[$j]) ? $ids_reparaciones_realizadas[$j] : -1;
      $mysqli-> query(
        "DELETE FROM reparaciones_realizadas WHERE id_reparacion=$id") or die($mysqli->error);
    }
  //FIN DEL CRUD REPARACIONES REALIZADAS
  
  for($i = 1, $j=0; $j < 5; $i++, $j++) {
    //CRUD REPUESTOS SUMINISTRADOS

    if($_POST['cant_repuesto'.$i]) {
      $cant = $_POST['cant_repuesto'.$i];
      $code = $_POST['code'.$i];
      $desc = $_POST['desc'.$i];
      $proce = $_POST['proce'.$i];
      $reqmant = $_POST['reqmant'.$i];
      $precio_unitario = $_POST['precio_unitario'.$i];
      $precio_total = $_POST['precio_total'.$i];
      if(isset($ids_repuestos_suministrados[$j])) {
        $mysqli-> query(
          " REPLACE INTO repuestos(
              id_repuesto,
              cantidad,
              codigo,
              descripcion,
              procedencia,
              req_mant_no,
              precio_unit,
              precio_total,
              id_orden)
            values ($ids_repuestos_suministrados[$j],$cant, '$code', '$desc', '$proce', '$reqmant', $precio_unitario, $precio_total, $id_orden)
          ") or die($mysqli->error);
      } else {
        $mysqli-> query(
          " INSERT INTO repuestos(
              cantidad,
              codigo,
              descripcion,
              procedencia,
              req_mant_no,
              precio_unit,
              precio_total,
              id_orden)
            values ($cant, '$code', '$desc', '$proce', '$reqmant', $precio_unitario, $precio_total, $id_orden)
          ") or die($mysqli->error);
      }
    } else {
      $id = isset($ids_repuestos_suministrados[$j]) ? $ids_repuestos_suministrados[$j] : -1;
      $mysqli-> query("DELETE FROM repuestos WHERE id_repuesto=$id") or die($mysqli->error);
    }
    //FIN CRUD REPUESTOS SUMINISTRADOS

    //CRUD REPARACIONES EXTERNAS
    if($_POST['cant_reparaciones'.$i]) {
      $cant_re = $_POST['cant_reparaciones'.$i];
      $code_re = $_POST['code_re'.$i];
      $desc_re = $_POST['desc_re'.$i];
      $proce_re = $_POST['proce_re'.$i];
      $reqmant_re = $_POST['reqmant_re'.$i];
      $precio_unitario2 = $_POST['precio_unitario2'.$i];
      $precio_total2 = $_POST['precio_total2'.$i];
      if(isset($ids_reparaciones_externas[$j])) {
        echo "replacing ".$_POST['cant_reparaciones'.$i];
        $mysqli-> query(
          " REPLACE INTO reparaciones(
              id_reparacion,
              cantidad,
              codigo,
              descripcion,
              procedencia,
              req_mant_no,
              precio_unit,
              precio_total,
              id_orden)
            values ($ids_reparaciones_externas[$j],$cant_re, '$code_re', '$desc_re', '$proce_re', 
            '$reqmant_re', $precio_unitario2, $precio_total2, $id_orden)
          ") or die($mysqli->error);
      } else {
        $mysqli-> query(
          " INSERT INTO reparaciones(
              cantidad,
              codigo,
              descripcion,
              procedencia,
              req_mant_no,
              precio_unit,
              precio_total,
              id_orden)
            values ($cant, '$code', '$desc', '$proce', '$reqmant', $precio_unitario, $precio_total, $id_orden)
          ") or die($mysqli->error);
      }
    } else {
      $id = isset($ids_reparaciones_externas[$j]) ? $ids_reparaciones_externas[$j] : -1;
      $mysqli-> query("DELETE FROM reparaciones WHERE id_reparacion=$id") or die($mysqli->error);
    }
    //FIN CRUD REPARACIONES EXTERNAS
  }

  $mysqli-> query(
    " INSERT INTO respuesta(
      id_orden,
      observacion,
      monto_repuesto,
      monto_reparaciones,
      total_facturado,
      fecha_respuesta,
      hora_respuesta,
      tipo)
      VALUES (  
        $id_orden, 
        '$observacion', 
        $total_repuestos, 
        $total_reparaciones, 
        $total_facturado,
        '$fecha_ahora',
        '$hora_ahora',
        'Actualización')
    "
  ) or die($mysqli->error);

  $mysqli->query("UPDATE ordenes set estado_orden = 'Aprobado' where id_orden=$id_orden");

  header("Location: index.php?art=adminsolicitudes");
?>