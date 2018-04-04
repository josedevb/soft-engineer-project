<?php 
  include_once('conexion.php');
  $id = $_GET['id'];
  $queryOrder = $mysqli->query("UPDATE ordenes set estado_orden = 'Rechazada' where id_orden=$id");

  header("Location: index.php?art=adminsolicitudes");
?>