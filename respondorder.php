<?php
  include_once('conexion.php');
  $id_orden = $_POST['id_orden'];
  $total_reparaciones = $_POST['total_reparaciones'];
  $total_repuestos = $_POST['total_repuestos'];
  $total_facturado = $total_reparaciones + $total_reparaciones;
  $observacion = $_POST['observacion'];

  for($i = 1; $i <= 10; $i++)
    if($_POST['reparacion'.$i]){
      $reparacion = $_POST['reparacion'.$i];
      $mysqli-> query(
        " INSERT INTO reparaciones_realizadas(
            id_reparacion,
            descripcion,
            id_orden, )
          values (null, '$reparacion' $id_orden)
        "
      );
    }
  
  for($i = 5; $i <= 5; $i++) {
    if($_POST['cant_repuesto'.$i]) {
      $cant = $_POST['cant_repuesto'.$i];
      $code = $_POST['code'.$i];
      $desc = $_POST['desc'.$i];
      $proce = $_POST['proce'.$i];
      $reqmant = $_POST['reqmant'.$i];
      $precio_unitario = $_POST['precio_unitario'.$i];
      $precio_total = $_POST['precio_total'.$i];
      $mysqli-> query(
        " INSERT INTO repuestos(
            id_repuesto,
            cantidad,
            codigo,
            descripcion,
            req_mant,
            precio_unit
            precio_total,
            id_orden )
          values (null, $cant, '$code', '$desc', '$proce', '$reqmant', $precio_unitario, $precio_total, $id_orden)
        "
      );
    }
    if($_POST['cant_reparaciones'.$i]) {
      $cant = $_POST['cant_reparaciones'.$i];
      $code = $_POST['code_re'.$i];
      $desc = $_POST['desc_re'.$i];
      $proce = $_POST['proce_re'.$i];
      $reqmant = $_POST['reqmant_re'.$i];
      $precio_unitario = $_POST['precio_unitario2'.$i];
      $precio_total = $_POST['precio_total2'.$i];
      $mysqli-> query(
        " INSERT INTO reparaciones(
            id_reparacion,
            cantidad,
            codigo,
            descripcion,
            req_mant,
            precio_unit
            precio_total,
            id_orden )
          values (null, $cant, '$code', '$desc', '$proce', '$reqmant', $precio_unitario, $precio_total, $id_orden)
        "
      );
    }
  }

  $mysqli-> query(
    " INSERT INTO respuesta(
      id_respuesta,
      id_orden,
      observacion,
      monto_repuesto,
      monto_reparaciones,
      total_facturado,
      fecha_respuesta,
      hora_respuesta )
      VALUES ( 
        null, 
        $id_orden, 
        '$observacion', 
        $total_repuestos, 
        $total_reparaciones, 
        $total_facturado,
        date('Y/m/d'),
        date('H:i:s')
      )
    "
  );

  $mysqli->query("UPDATE ordenes set estado_orden = 'Aprobado' where id_orden=$id_orden");

  //header("Location: index.php?art=adminsolicitudes");
?>