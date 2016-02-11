<!-- conexion.php -->
<?php
$mysqli = new mysqli("localhost", "root", "", "urbe");
if ($mysqli->connect_error)
{
echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
?>
