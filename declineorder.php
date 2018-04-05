<?php 
  include_once('conexion.php');
  $id = $_GET['id'];
  $operator = $_GET['operator'];
  if($operator) {
    $queryOrder = $mysqli->query("UPDATE ordenes set estado_orden = 'Cancelada' where id_orden=$id");
    header("Location: index.php?art=solicitudes");
  }
  else {
    $queryOrder = $mysqli->query("UPDATE ordenes set estado_orden = 'Rechazada' where id_orden=$id");
    header("Location: index.php?art=adminsolicitudes"); 
  }
?>