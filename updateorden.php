<?php
  include_once ('sesion.php');
  include_once('conexion.php');
  $id = $_SESSION['idusuario'];
  $id_orden = $_GET['id'];
  $reparaciones_realizadas = [];
  $repuestos_suministrados = [];
  $reparaciones_externas = [];

  $repRealizadas = $mysqli-> query(
    " SELECT reparaciones_realizadas.descripcion FROM ordenes
      JOIN reparaciones_realizadas on ordenes.id_orden = reparaciones_realizadas.id_orden
      WHERE ordenes.id_orden = $id_orden") or die($mysqli->error);
  if (mysqli_num_rows($repRealizadas) > 0)
    while (($repRealizada = mysqli_fetch_array($repRealizadas)))
      array_push($reparaciones_realizadas, $repRealizada['descripcion']);

  $repuestosSums = $mysqli-> query(
    " SELECT * FROM ordenes
      JOIN repuestos on ordenes.id_orden = repuestos.id_orden
      WHERE ordenes.id_orden = $id_orden") or die($mysqli->error);
  if (mysqli_num_rows($repuestosSums) > 0)
    while (($repuestoSum = mysqli_fetch_array($repuestosSums)))
      array_push(
        $repuestos_suministrados,
        array(
          'cantidad' => $repuestoSum['cantidad'],
          'codigo' => $repuestoSum['codigo'],
          'descripcion' => $repuestoSum['descripcion'],
          'procedencia' => $repuestoSum['procedencia'],
          'req_mant_no' => $repuestoSum['req_mant_no'],
          'precio_unit' => $repuestoSum['precio_unit'],
          'precio_total' => $repuestoSum['precio_total']
        )
      );

  $repExternas = $mysqli-> query(
    " SELECT * FROM ordenes
      JOIN reparaciones on ordenes.id_orden = reparaciones.id_orden
      WHERE ordenes.id_orden = $id_orden") or die($mysqli->error);
  if (mysqli_num_rows($repExternas) > 0)
    while (($repExterna = mysqli_fetch_array($repExternas)))
      array_push(
        $reparaciones_externas,
        array(
          'cantidad' => $repExterna['cantidad'],
          'codigo' => $repExterna['codigo'],
          'descripcion' => $repExterna['descripcion'],
          'procedencia' => $repExterna['procedencia'],
          'req_mant_no' => $repExterna['req_mant_no'],
          'precio_unit' => $repExterna['precio_unit'],
          'precio_total' => $repExterna['precio_total']
        )
    );

  $respuestas = $mysqli-> query(
    " SELECT * FROM ordenes
      JOIN respuesta on ordenes.id_orden = respuesta.id_orden
      WHERE ordenes.id_orden = $id_orden") or die($mysqli->error);
  if (mysqli_num_rows($respuestas) > 0)
    while (($respuesta = mysqli_fetch_array($respuestas))) {
      $monto_repuesto = $respuesta['monto_respuesto'];
      $monto_reparaciones = $respuesta['monto_reparaciones'];
      $observacion = $respuesta['observacion'];
    }
?>

<div class="container-fluid">
  <div class="formBox">
    <form name="respondorder_form" action="update_control.php" method="post" class="form">
      <div class="row">
        <div class="col-sm-12">
          <h2>Responder orden nº <?php echo "$id_orden"; ?></h2>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-6">
          <div class="inputBox focus">
            <div class="inputText">Reparaciones realizadas</div>
              <?php
                for($j = 0, $e = 1; $j < 5; $j++, $e++)
                  echo "<input type='text' placeholder='$e' name='reparacion$e' value='$reparaciones_realizadas[$j]' class='input'>";
              ?>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="inputBox focus">
            <div class="inputText">Reparaciones realizadas</div>
              <?php
                for($j = 5, $e = 6; $j < 10; $j++, $e++)
                  echo "<input type='text' placeholder='$e' name='reparacion$e' value='$reparaciones_realizadas[$j]' class='input'>";
              ?>
          </div>
        </div>
      </div>
 
      <input style="position: absolute; display: none;">

      <div class="row">
        <div class="title-row">
          <h3>Repuestos suministrados</h3>
        </div>

        <div style="overflow-x:auto;">
          <div class="col-md-12 column">
            <table style="width:100%" class="table table-bordered table-hover" id="tab_logic">
              <thead>
                <tr>
                  <th class="text-center">No.</th>
                  <th class="text-center">Cant.</th>
                  <th class="text-center">Código</th>
                  <th class="text-center">Descripción</th>
                  <th class="text-center">Procedencia</th>
                  <th class="text-center">Req Mant</th>
                  <th class="text-center">Precio unitario</th>
                  <th class="text-center">Precio total</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  for($i=0, $x=1; $i < 5; $i++, $x++) {
                    echo "<tr id='addr$x'>";
                      echo "<td> $x </td>";
                      echo "<td> <input type='number' min='0' name='cant_repuesto$x' value='".$repuestos_suministrados[$i]['cantidad']."' placeholder='Cantidad' class='form-control'/> </td>";
                      echo "<td> <input type='text' name='code$x'  placeholder='Código' value='".$repuestos_suministrados[$i]['codigo']."' class='form-control'/> </td>";
                      echo "<td> <input type='text' name='desc$x' placeholder='Descripción' value='".$repuestos_suministrados[$i]['descripcion']."' class='form-control'/> </td>";
                      echo "<td> <input type='text' name='proce$x' placeholder='Procedencia' value='".$repuestos_suministrados[$i]['procedencia']."' class='form-control'/> </td>";
                      echo "<td> <input type='text' name='reqmant$x' placeholder='Req Mant.' value='".$repuestos_suministrados[$i]['req_mant_no']."' class='form-control'/> </td>";
                      echo "<td> <input type='number' min='0' name='precio_unitario$x' placeholder='Precio unitario' value='".$repuestos_suministrados[$i]['precio_unit']."' class='form-control'/> </td>";
                      echo "<td> <input type='number' min='0' name='precio_total$x' readonly placeholder='Precio total' value='".$repuestos_suministrados[$i]['precio_total']."' class='form-control'/> </td>";
                    echo "</tr>";
                  }
                ?>
                <tr id='addr6'>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>
                    <h6>Total</h6>
                  </td>
                  <td>
                    <input type='number' min='0' name='total_repuestos' value="<?php $monto_repuesto ?>" readonly placeholder='Precio total' class='form-control'/>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="title-row">
          <h3>Reparaciones efectuadas por taller externo</h3>
        </div>
        <div style="overflow-x:auto;">
          <div class="col-md-12 column">
            <table style="width:100%" class="table table-bordered table-hover" id="tab_logic">
              <thead>
                <tr>
                  <th class="text-center">No.</th>
                  <th class="text-center">Cant.</th>
                  <th class="text-center">Código</th>
                  <th class="text-center">Descripción</th>
                  <th class="text-center">Procedencia</th>
                  <th class="text-center">Req Mant</th>
                  <th class="text-center">Precio unitario</th>
                  <th class="text-center">Precio total</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  for($i=0, $y=1;  $i < 5; $i++, $y++) {
                    echo "<tr id='addr$i'>";
                      echo "<td> $y </td>";
                      echo "<td> <input type='number' min='0' name='cant_reparaciones$y' value='".$reparaciones_externas[$i]['cantidad']."' placeholder='Cantidad' class='form-control'/> </td>";
                      echo "<td> <input type='text' name='code_re$y'  placeholder='Código' value='".$reparaciones_externas[$i]['codigo']."' class='form-control'/> </td>";
                      echo "<td> <input type='text' name='desc_re$y' placeholder='Descripción' value='".$reparaciones_externas[$i]['descripcion']."' class='form-control'/> </td>";
                      echo "<td> <input type='text' name='proce_re$y' placeholder='Procedencia' value='".$reparaciones_externas[$i]['procedencia']."' class='form-control'/> </td>";
                      echo "<td> <input type='text' name='reqmant_re$y' placeholder='Req Mant.' value='".$reparaciones_externas[$i]['req_mant_no']."' class='form-control'/> </td>";
                      echo "<td> <input type='number' min='0' name='precio_unitario2$y' placeholder='Precio unitario' value='".$reparaciones_externas[$i]['precio_unit']."' class='form-control'/> </td>";
                      echo "<td> <input type='number' min='0' name='precio_total2$y' readonly placeholder='Precio total' value='".$reparaciones_externas[$i]['precio_total']."' class='form-control'/> </td>";
                    echo "</tr>";
                  }
                ?>
                <tr id='addr6'>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>
                    <h6>Total</h6>
                  </td>
                  <td>
                    <input type="number" min="0" name='total_reparaciones' readonly placeholder='Precio total' class="form-control"/>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-12">
          <div class="inputBox focus">
            <div class="inputText">Observación</div>
            <?php echo " <textarea required name='observacion' class='input'>$observacion</textarea>"; ?>
          </div>
        </div>
      </div>

      <?php echo "<input type='text' name='id_orden' style='display:none' value='$id_orden' >"; ?>

      <div class="row">
        <div class="col-sm-6">
          <input type="submit" name="" class="btn btn-success" value="Responder orden">
        </div>
        <div class="col-sm-6">
          <?php echo"<a href='index.php?art=declineorder&id=$id_orden' class='btn btn-danger'>Rechazar orden </a>"; ?>
        </div>
      </div>
    </form>
  </div>
</div>

<script>
  const attr = ['cant_repuesto', 'precio_unitario', 'cant_reparaciones', 'precio_unitario2'];

  function calculate(e) {
    var totalPriceRepuesto = 0, 
        totalPriceReparacion = 0,
        different = [
        {
          name: 'cant_repuesto',
          price: 'precio_unitario',
          totalPrice: 'precio_total',
          total: 0
        },
        {
          name: 'cant_reparaciones',
          price:'precio_unitario2',
          totalPrice: 'precio_total2',
          total: 0
        }
      ];
    for(var i = 1; i <= 5; i++) 
      different.forEach(function(obj, j) {
        var quantity = document.getElementsByName(obj.name + i)[0].value,
            precioUnitario = document.getElementsByName(obj.price + i)[0].value,
            precioTotal = parseInt(quantity) * parseFloat(precioUnitario);
          document.getElementsByName(obj.totalPrice + i)[0].value = precioTotal;
          different[j].total += precioTotal ? precioTotal : 0;
      })

    document.getElementsByName('total_repuestos')[0].value = different[0].total;
    document.getElementsByName('total_reparaciones')[0].value = different[1].total;
  }

  for(var i = 1; i <= 5; i++ )
    attr.forEach(name => document.getElementsByName(name + i)[0].addEventListener("change", calculate))
  calculate();

</script>
