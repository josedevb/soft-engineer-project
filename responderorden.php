<?php 
  include_once ('sesion.php');
  include_once('conexion.php');
  $id = $_SESSION['idusuario'];
  $id_orden = $_GET['id'];
?>

<div class="container-fluid">
  <div class="formBox">
    <form name="respondorder_form" action="respondorder.php" method="post" class="form">
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
                      echo "<td> <input type='number' min='0' name='cant_repuesto$x' placeholder='Cantidad' class='form-control'/> </td>";
                      echo "<td> <input type='text' name='code$x'  placeholder='Cantidad' class='form-control'/> </td>";
                      echo "<td> <input type='text' name='desc$x' placeholder='Descripción' class='form-control'/> </td>";
                      echo "<td> <input type='text' name='proce$x' placeholder='Procedencia' class='form-control'/> </td>";
                      echo "<td> <input type='text' name='reqmant$x' placeholder='Req Mant.' class='form-control'/> </td>";
                      echo "<td> <input type='number' min='0' name='precio_unitario$x' placeholder='Precio unitario' class='form-control'/> </td>";
                      echo "<td> <input type='number' min='0' name='precio_total$x' readonly placeholder='Precio total' class='form-control'/> </td>";
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
                    <input type="number" min="0" name='total_repuestos' readonly placeholder='Precio total' class="form-control"/>
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
                  for($i=0, $y=1;  $i <= 5; $i++, $y++) {
                    echo "<tr id='addr$i'>";
                      echo "<td> $i </td>";
                      echo "<td> <input type='number' min='0' name='cant_reparaciones$y' placeholder='Cantidad' class='form-control'/> </td>";
                      echo "<td> <input type='text' name='code_re$y'  placeholder='Cantidad' class='form-control'/> </td>";
                      echo "<td> <input type='text' name='desc_re$y' placeholder='Descripción' class='form-control'/> </td>";
                      echo "<td> <input type='text' name='proce_re$y' placeholder='Procedencia' class='form-control'/> </td>";
                      echo "<td> <input type='text' name='reqmant_re$y' placeholder='Req Mant.' class='form-control'/> </td>";
                      echo "<td> <input type='number' min='0' name='precio_unitario2$y' placeholder='Precio unitario' class='form-control'/> </td>";
                      echo "<td> <input type='number' min='0' name='precio_total2$y' readonly placeholder='Precio total' class='form-control'/> </td>";
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
            <textarea required name="observacion" class="input"></textarea>
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

</script>
