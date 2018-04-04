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
            <input type="text" placeholder="1" name="reparacion1" value="" class="input">
            <input type="text" placeholder="2" name="reparacion2" value="" class="input">
            <input type="text" placeholder="3" name="reparacion3" value="" class="input">
            <input type="text" placeholder="4" name="reparacion4" value="" class="input">
            <input type="text" placeholder="5" name="reparacion5" value="" class="input">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="inputBox focus">
            <div class="inputText">Reparaciones realizadas</div>
            <input type="text" placeholder="6" name="reparacion6" value="" class="input">
            <input type="text" placeholder="7" name="reparacion7" value="" class="input">
            <input type="text" placeholder="8" name="reparacion8" value="" class="input">
            <input type="text" placeholder="9" name="reparacion9" value="" class="input">
            <input type="text" placeholder="10" name="reparacion10" value="" class="input">
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
                  <th class="text-center">
                    No.
                  </th>
                  <th class="text-center">
                    Cant.
                  </th>
                  <th class="text-center">
                    Código
                  </th>
                  <th class="text-center">
                    Descripción
                  </th>
                  <th class="text-center">
                    Procedencia
                  </th>
                  <th class="text-center">
                    Req Mant
                  </th>
                  <th class="text-center">
                    Precio unitario
                  </th>
                  <th class="text-center">
                    Precio total
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr id='addr1'>
                  <td>
                  1
                  </td>
                  <td>
                    <input type="number" min="0" name='cant_repuesto1'  placeholder='Cantidad' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='code1' placeholder='Código' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='desc1' placeholder='Descripción' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='proce1' placeholder='Procedencia' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='reqmant1' placeholder='Req Mant.' class="form-control"/>
                  </td>
                  <td>
                    <input type="number" min="0" name='precio_unitario1' placeholder='Precio unitario' class="form-control"/>
                  </td>
                  <td>
                    <input type="number" min="0" name='precio_total1'disabled placeholder='Precio total' class="form-control"/>
                  </td>
                </tr>
                <tr id='addr2'>
                  <td>
                  2
                  </td>
                  <td>
                    <input type="number" min="0" name='cant_repuesto2'  placeholder='Cantidad' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='code2' placeholder='Código' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='desc2' placeholder='Descripción' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='proce2' placeholder='Procedencia' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='reqmant2' placeholder='Req Mant.' class="form-control"/>
                  </td>
                  <td>
                    <input type="number" min="0" name='precio_unitario2' placeholder='Precio unitario' class="form-control"/>
                  </td>
                  <td>
                    <input type="number" min="0" name='precio_total2'disabled placeholder='Precio total' class="form-control"/>
                  </td>
                </tr>
                <tr id='addr3'>
                  <td>
                  3
                  </td>
                  <td>
                    <input type="number" min="0" name='cant_repuesto3'  placeholder='Cantidad' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='code3' placeholder='Código' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='desc3' placeholder='Descripción' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='proce3' placeholder='Procedencia' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='reqmant3' placeholder='Req Mant.' class="form-control"/>
                  </td>
                  <td>
                    <input type="number" min="0" name='precio_unitario3' placeholder='Precio unitario' class="form-control"/>
                  </td>
                  <td>
                    <input type="number" min="0" name='precio_total3'disabled placeholder='Precio total' class="form-control"/>
                  </td>
                </tr>
                <tr id='addr4'>
                  <td>
                  4
                  </td>
                  <td>
                    <input type="number" min="0" name='cant_repuesto4'  placeholder='Cantidad' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='code4' placeholder='Código' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='desc4' placeholder='Descripción' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='proce4' placeholder='Procedencia' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='reqmant4' placeholder='Req Mant.' class="form-control"/>
                  </td>
                  <td>
                    <input type="number" min="0" name='precio_unitario4' placeholder='Precio unitario' class="form-control"/>
                  </td>
                  <td>
                    <input type="number" min="0" name='precio_total4'disabled placeholder='Precio total' class="form-control"/>
                  </td>
                </tr>
                <tr id='addr5'>
                  <td>
                  5
                  </td>
                  <td>
                    <input type="number" min="0" name='cant_repuesto5'  placeholder='Cantidad' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='code5' placeholder='Código' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='desc5' placeholder='Descripción' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='proce5' placeholder='Procedencia' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='reqmant5' placeholder='Req Mant.' class="form-control"/>
                  </td>
                  <td>
                    <input type="number" min="0" name='precio_unitario5' placeholder='Precio unitario' class="form-control"/>
                  </td>
                  <td>
                    <input type="number" min="0" name='precio_total5'disabled placeholder='Precio total' class="form-control"/>
                  </td>
                </tr>
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
                    <input type="number" min="0" name='total_repuestos' disabled placeholder='Precio total' class="form-control"/>
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
                  <th class="text-center">
                    No.
                  </th>
                  <th class="text-center">
                    Cant.
                  </th>
                  <th class="text-center">
                    Código
                  </th>
                  <th class="text-center">
                    Descripción
                  </th>
                  <th class="text-center">
                    Procedencia
                  </th>
                  <th class="text-center">
                    Req Mant
                  </th>
                  <th class="text-center">
                    Precio unitario
                  </th>
                  <th class="text-center">
                    Precio total
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr id='addr1'>
                  <td>
                  1
                  </td>
                  <td>
                    <input type="number" min="0" name='cant_reparaciones1'  placeholder='Cantidad' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='code_re1' placeholder='Código' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='desc_re1' placeholder='Descripción' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='proce_re1' placeholder='Procedencia' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='reqmant_re1' placeholder='Req Mant.' class="form-control"/>
                  </td>
                  <td>
                    <input type="number" name='precio_unitario21' placeholder='Precio unitario' class="form-control"/>
                  </td>
                  <td>
                    <input type="number" min="0" name='precio_total21'disabled placeholder='Precio total' class="form-control"/>
                  </td>
                </tr>
                <tr id='addr2'>
                  <td>
                  2
                  </td>
                  <td>
                    <input type="number" min="0" name='cant_reparaciones2'  placeholder='Cantidad' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='code_re2' placeholder='Código' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='desc_re2' placeholder='Descripción' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='proce_re2' placeholder='Procedencia' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='reqmant_re2' placeholder='Req Mant.' class="form-control"/>
                  </td>
                  <td>
                    <input type="number" min="0" name='precio_unitario22' placeholder='Precio unitario' class="form-control"/>
                  </td>
                  <td>
                    <input type="number" min="0" name='precio_total22'disabled placeholder='Precio total' class="form-control"/>
                  </td>
                </tr>
                <tr id='addr3'>
                  <td>
                  3
                  </td>
                  <td>
                    <input type="number" min="0" name='cant_reparaciones3'  placeholder='Cantidad' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='code_re3' placeholder='Código' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='desc_re3' placeholder='Descripción' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='proce_re3' placeholder='Procedencia' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='reqmant_re3' placeholder='Req Mant.' class="form-control"/>
                  </td>
                  <td>
                    <input type="number" min="0" name='precio_unitario23' placeholder='Precio unitario' class="form-control"/>
                  </td>
                  <td>
                    <input type="number" min="0" name='precio_total23'disabled placeholder='Precio total' class="form-control"/>
                  </td>
                </tr>
                <tr id='addr4'>
                  <td>
                  4
                  </td>
                  <td>
                    <input type="number" min="0" name='cant_reparaciones4'  placeholder='Cantidad' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='code_re4' placeholder='Código' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='desc_re4' placeholder='Descripción' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='proce_re4' placeholder='Procedencia' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='reqmant_re4' placeholder='Req Mant.' class="form-control"/>
                  </td>
                  <td>
                    <input type="number" min="0" name='precio_unitario24' placeholder='Precio unitario' class="form-control"/>
                  </td>
                  <td>
                    <input type="number" min="0" name='precio_total24'disabled placeholder='Precio total' class="form-control"/>
                  </td>
                </tr>
                <tr id='addr5'>
                  <td>
                  5
                  </td>
                  <td>
                    <input type="number" min="0" name='cant_reparaciones5'  placeholder='Cantidad' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='code_re5' placeholder='Código' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='desc_re5' placeholder='Descripción' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='proce_re5' placeholder='Procedencia' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='reqmant_re5' placeholder='Req Mant.' class="form-control"/>
                  </td>
                  <td>
                    <input type="number" min="0" name='precio_unitario25' placeholder='Precio unitario' class="form-control"/>
                  </td>
                  <td>
                    <input type="number" min="0" name='precio_total25'disabled placeholder='Precio total' class="form-control"/>
                  </td>
                </tr>
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
                    <input type="number" min="0" name='total_reparaciones' disabled placeholder='Precio total' class="form-control"/>
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
  const different = [
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

  function calculate(e) {
    let totalPriceRepuesto = 0, totalPriceReparacion = 0;
    
    for(let i = 1; i <= 5; i++) 
      different.forEach(({name, price, totalPrice}, j) => {
        let quantity = document.getElementsByName(name + i)[0].value,
            precioUnitario = document.getElementsByName(price + i)[0].value,
            precioTotal = parseInt(quantity) * parseFloat(precioUnitario);
          document.getElementsByName(totalPrice + i)[0].value = precioTotal;
          different[j].total += precioTotal ? precioTotal : 0;
      })

    document.getElementsByName('total_repuestos')[0].value = different[0].total;
    document.getElementsByName('total_reparaciones')[0].value = different[1].total;
  }

  for(let i = 1; i <= 5; i++ )
    attr.forEach(name => document.getElementsByName(name + i)[0].addEventListener("change", calculate))

</script>
