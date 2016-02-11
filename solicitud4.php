<?php 
include_once ('sesion.php');
include_once('conexion.php');
$id = $_SESSION['idusuario'];
$query1 = $mysqli->query("SELECT * FROM equipos where idequipo=4 ");
        while (($fila=mysqli_fetch_array($query1)))
        {
            $idequipo= $fila['idequipo'];
            $cantidad= $fila['cantidad'];
            $disponible= $fila['disponible'];
            $descripcion= $fila['descripcion'];
        }
    $motivo = $_POST['descripcion'];
    $fechaini = $_POST['fechaini'];
    $fechafin = $_POST['fechafin'];
 ?>

<div class="row clearfix" style="height: 5vh"></div>

<div class="container-fluid">
    <div class="row">
                <div class="col-md-7">
                    <img src="image/op4.jpg" style="display:block; margin-top: 10%"  alt="">
                </div>

                <div class="col-md-4" >
                    <h2 style="color: black">Notebook HP ENVY 15-k049la</h2>
                    <p style="color: black" style="font-size: 50%">La portátil más veloz del mercado, dándote confiabilidad e integración en donde quieras.</p>
                    <h3 style="color: black">Detalles</h3>
                    <ul style="color: black;margin: 2px;padding: 2px;">
                         <li style="color: black;margin: 5px;padding: 5px;" >Cantidad Disponible: <?php echo "$cantidad" ?></li>
                        <li style="color: black;margin: 10px;padding: 10px;" >
                        <?php 
                        if ($disponible == 1 && $cantidad > 0) {
                            echo "<span style='color:green;'>Habilitado";
                          echo "</li>";
                         echo "<form action='' name='solicitud' method='post'>";
                        echo "<li>Fecha Inicio: <input type='date' required class='form-control' id='fechaini' name='fechaini' ></input></li><br>";
                        echo "<li>Fecha Fin:<input type='date' required class='form-control' id='fechafin' name='fechafin' ></input></li><br>";
                        echo "<list style='color: black;margin: 10px;padding: 10px;' > <textarea placeholder='Indique sus razones' required cols='40' rows='4' id='descripcion' name='descripcion'></textarea></li>"; 
                           
                           if ( isset($_POST['BtnEnviar']) )
                                {
                    $query2 = $mysqli->query("INSERT INTO solicitudes (idsolicitud, idusuario, idequipo, idestado, fechaini, fechafin, vencido, motivo) values (null, $id, 4, 1, '$fechaini', '$fechafin', 0, '$motivo') ");

    $query3 = $mysqli->query("UPDATE equipos SET cantidad = cantidad - 1 where idequipo = 1 ");

                                 echo "<li>
                                        <h3 style='color:black'> Su Solicitud ha sido enviada en breve sera atendida</h3>
                                    </li>";
                                 echo "</form>";
                                }else{

                                echo "<li><input type='submit' id='BtnEnviar' name='BtnEnviar' value='Hacer Solicitud' class='btn btn-primary'></input></li>";
                                echo "</form>";
                                }
                        }else
                        {
                           echo "<span style='color:red;'>Deshabilitado";
                          echo "</li>";
                        echo "<li>";
                        echo "<input type='submit' disabled id='BtnEnviar' class='btn btn-primary' value='Hacer Solicitud'></input>
                        </li>";
                        echo "</form>";
                        }
                         ?>
            </ul>
        </div>
    </div>
</div>

<div class="row clearfix" style="height: 5vh"></div>