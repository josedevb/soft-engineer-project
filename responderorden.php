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
            <div class="inputText ">Reparaciones realizadas</div>
            <input type="text" placeholder="1" name="usuario_emisor" value="" class="input">
            <input type="text" placeholder="2" name="usuario_receptor" value="" class="input">
            <input type="text" placeholder="3" name="usuario_receptor" value="" class="input">
            <input type="text" placeholder="4" name="usuario_receptor" value="" class="input">
            <input type="text" placeholder="5" name="usuario_receptor" value="" class="input">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="inputBox focus">
            <div class="inputText ">Reparaciones realizadas</div>
            <input type="text" placeholder="6" name="usuario_emisor" value="" class="input">
            <input type="text" placeholder="7" name="usuario_receptor" value="" class="input">
            <input type="text" placeholder="8" name="usuario_receptor" value="" class="input">
            <input type="text" placeholder="9" name="usuario_receptor" value="" class="input">
            <input type="text" placeholder="10" name="usuario_receptor" value="" class="input">
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
                    <input type="number" min="0" name='cant1'  placeholder='Cantidad' class="form-control"/>
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
                    <input type="number" min="0" name='preciou1' placeholder='Precio unitario' class="form-control"/>
                  </td>
                  <td>
                    <input type="number" min="0" name='preciot1'disabled placeholder='Precio total' class="form-control"/>
                  </td>
                </tr>
                <tr id='addr2'>
                  <td>
                  2
                  </td>
                  <td>
                    <input type="number" min="0" name='cant2'  placeholder='Cantidad' class="form-control"/>
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
                    <input type="number" min="0" name='preciou2' placeholder='Precio unitario' class="form-control"/>
                  </td>
                  <td>
                    <input type="number" min="0" name='preciot2'disabled placeholder='Precio total' class="form-control"/>
                  </td>
                </tr>
                <tr id='addr3'>
                  <td>
                  3
                  </td>
                  <td>
                    <input type="number" min="0" name='cant3'  placeholder='Cantidad' class="form-control"/>
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
                    <input type="number" min="0" name='preciou3' placeholder='Precio unitario' class="form-control"/>
                  </td>
                  <td>
                    <input type="number" min="0" name='preciot3'disabled placeholder='Precio total' class="form-control"/>
                  </td>
                </tr>
                <tr id='addr4'>
                  <td>
                  4
                  </td>
                  <td>
                    <input type="number" min="0" name='cant4'  placeholder='Cantidad' class="form-control"/>
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
                    <input type="number" min="0" name='preciou4' placeholder='Precio unitario' class="form-control"/>
                  </td>
                  <td>
                    <input type="number" min="0" name='preciot4'disabled placeholder='Precio total' class="form-control"/>
                  </td>
                </tr>
                <tr id='addr5'>
                  <td>
                  5
                  </td>
                  <td>
                    <input type="number" min="0" name='cant5'  placeholder='Cantidad' class="form-control"/>
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
                    <input type="number" min="0" name='preciou5' placeholder='Precio unitario' class="form-control"/>
                  </td>
                  <td>
                    <input type="number" min="0" name='preciot5'disabled placeholder='Precio total' class="form-control"/>
                  </td>
                </tr>
                <tr id='addr6'>
                  <td>
                  6
                  </td>
                  <td>
                    <input type="number" min="0" name='cant6'  placeholder='Cantidad' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='code6' placeholder='Código' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='desc6' placeholder='Descripción' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='proce6' placeholder='Procedencia' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='reqmant6' placeholder='Req Mant.' class="form-control"/>
                  </td>
                  <td>
                    <input type="number" min="0" name='preciou6' placeholder='Precio unitario' class="form-control"/>
                  </td>
                  <td>
                    <input type="number" min="0" name='preciot6'disabled placeholder='Precio total' class="form-control"/>
                  </td>
                </tr>
                <tr id='addr7'>
                  <td>
                  7
                  </td>
                  <td>
                    <input type="number" min="0" name='cant7'  placeholder='Cantidad' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='code7' placeholder='Código' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='desc7' placeholder='Descripción' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='proce7' placeholder='Procedencia' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='reqmant7' placeholder='Req Mant.' class="form-control"/>
                  </td>
                  <td>
                    <input type="number" min="0" name='preciou7' placeholder='Precio unitario' class="form-control"/>
                  </td>
                  <td>
                    <input type="number" min="0" name='preciot7'disabled placeholder='Precio total' class="form-control"/>
                  </td>
                </tr>
                <tr id='addr8'>
                  <td>
                  8
                  </td>
                  <td>
                    <input type="number" min="0" name='cant8'  placeholder='Cantidad' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='code8' placeholder='Código' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='desc8' placeholder='Descripción' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='proce8' placeholder='Procedencia' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='reqmant8' placeholder='Req Mant.' class="form-control"/>
                  </td>
                  <td>
                    <input type="number" min="0" name='preciou8' placeholder='Precio unitario' class="form-control"/>
                  </td>
                  <td>
                    <input type="number" min="0" name='preciot8'disabled placeholder='Precio total' class="form-control"/>
                  </td>
                </tr>
                <tr id='addr9'>
                  <td>
                  9
                  </td>
                  <td>
                    <input type="number" min="0" name='cant9'  placeholder='Cantidad' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='code9' placeholder='Código' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='desc9' placeholder='Descripción' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='proce9' placeholder='Procedencia' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='reqmant9' placeholder='Req Mant.' class="form-control"/>
                  </td>
                  <td>
                    <input type="number" min="0" name='preciou9' placeholder='Precio unitario' class="form-control"/>
                  </td>
                  <td>
                    <input type="number" min="0" name='preciot9'disabled placeholder='Precio total' class="form-control"/>
                  </td>
                </tr>
                <tr id='addr10'>
                  <td>
                  10
                  </td>
                  <td>
                    <input type="number" min="0" name='cant10'  placeholder='Cantidad' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='code10' placeholder='Código' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='desc10' placeholder='Descripción' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='proce10' placeholder='Procedencia' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='reqmant10' placeholder='Req Mant.' class="form-control"/>
                  </td>
                  <td>
                    <input type="number" min="0" name='preciou10' placeholder='Precio unitario' class="form-control"/>
                  </td>
                  <td>
                    <input type="number" min="0" name='preciot10disabled' placeholder='Precio total' class="form-control"/>
                  </td>
                </tr>
                <tr id='addr11'>
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
                    <input type="number" min="0" name='total' disabled placeholder='Precio total' class="form-control"/>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- <div class="col-sm-3">
          <div class="inputBox focus" style="display:flex;">
            <div class="inputText">Cant</div>
              <input type="number" placeholder="nº" name="usuario_receptor" value="" class="input">
          </div>
        </div>

        <div class="col-sm-3">
          <div class="inputBox focus">
            <div class="inputText">Código</div>
            <input type="text" name="usuario_equipo" placeholder="Ingrese el código" required class="input">
          </div>
        </div>

        <div class="col-sm-3">
          <div class="inputBox focus">
            <div class="inputText">Descripción</div>
            <input type="text" name="mecanico_asignado" placeholder="Ingrese la descripción" required class="input">
          </div>
        </div>

        <div class="col-sm-3">
          <div class="inputBox focus">
            <div class="inputText">Procedencia</div>
            <input type="text" name="mecanico_asignado" placeholder="Ingrese la procedencia" required class="input">
          </div>
        </div>
        
        <div class="col-sm-3">
          <div class="inputBox focus">
            <div class="inputText">Req mant</div>
            <input type="text" name="mecanico_asignado" placeholder="Req mant. nº" required class="input">
          </div>
        </div>

        <div class="col-sm-2">
          <div class="inputBox focus">
            <div class="inputText">Precio unitario</div>
            <input type="text" name="mecanico_asignado" placeholder="Precio unitario" required class="input">
          </div>
        </div>

        <div class="col-sm-3">
          <div class="inputBox focus">
            <div class="inputText">Precio total</div>
            <input type="text" name="mecanico_asignado" placeholder="Precio total" required class="input">
          </div>
        </div>-->

        
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
                    <input type="number" min="0" name='cant1'  placeholder='Cantidad' class="form-control"/>
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
                    <input type="number" name='preciou1' placeholder='Precio unitario' class="form-control"/>
                  </td>
                  <td>
                    <input type="number" min="0" name='preciot1'disabled placeholder='Precio total' class="form-control"/>
                  </td>
                </tr>
                <tr id='addr2'>
                  <td>
                  2
                  </td>
                  <td>
                    <input type="number" min="0" name='cant2'  placeholder='Cantidad' class="form-control"/>
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
                    <input type="number" min="0" name='preciou2' placeholder='Precio unitario' class="form-control"/>
                  </td>
                  <td>
                    <input type="number" min="0" name='preciot2'disabled placeholder='Precio total' class="form-control"/>
                  </td>
                </tr>
                <tr id='addr3'>
                  <td>
                  3
                  </td>
                  <td>
                    <input type="number" min="0" name='cant3'  placeholder='Cantidad' class="form-control"/>
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
                    <input type="number" min="0" name='preciou3' placeholder='Precio unitario' class="form-control"/>
                  </td>
                  <td>
                    <input type="number" min="0" name='preciot3'disabled placeholder='Precio total' class="form-control"/>
                  </td>
                </tr>
                <tr id='addr4'>
                  <td>
                  4
                  </td>
                  <td>
                    <input type="number" min="0" name='cant4'  placeholder='Cantidad' class="form-control"/>
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
                    <input type="number" min="0" name='preciou4' placeholder='Precio unitario' class="form-control"/>
                  </td>
                  <td>
                    <input type="number" min="0" name='preciot4'disabled placeholder='Precio total' class="form-control"/>
                  </td>
                </tr>
                <tr id='addr5'>
                  <td>
                  5
                  </td>
                  <td>
                    <input type="number" min="0" name='cant5'  placeholder='Cantidad' class="form-control"/>
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
                    <input type="number" min="0" name='preciou5' placeholder='Precio unitario' class="form-control"/>
                  </td>
                  <td>
                    <input type="number" min="0" name='preciot5'disabled placeholder='Precio total' class="form-control"/>
                  </td>
                </tr>
                <tr id='addr6'>
                  <td>
                  6
                  </td>
                  <td>
                    <input type="number" min="0" name='cant6'  placeholder='Cantidad' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='code6' placeholder='Código' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='desc6' placeholder='Descripción' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='proce6' placeholder='Procedencia' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='reqmant6' placeholder='Req Mant.' class="form-control"/>
                  </td>
                  <td>
                    <input type="number" min="0" name='preciou6' placeholder='Precio unitario' class="form-control"/>
                  </td>
                  <td>
                    <input type="number" min="0" name='preciot6'disabled placeholder='Precio total' class="form-control"/>
                  </td>
                </tr>
                <tr id='addr7'>
                  <td>
                  7
                  </td>
                  <td>
                    <input type="number" min="0" name='cant7'  placeholder='Cantidad' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='code7' placeholder='Código' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='desc7' placeholder='Descripción' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='proce7' placeholder='Procedencia' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='reqmant7' placeholder='Req Mant.' class="form-control"/>
                  </td>
                  <td>
                    <input type="number" min="0" name='preciou7' placeholder='Precio unitario' class="form-control"/>
                  </td>
                  <td>
                    <input type="number" min="0" name='preciot7'disabled placeholder='Precio total' class="form-control"/>
                  </td>
                </tr>
                <tr id='addr8'>
                  <td>
                  8
                  </td>
                  <td>
                    <input type="number" min="0" name='cant8'  placeholder='Cantidad' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='code8' placeholder='Código' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='desc8' placeholder='Descripción' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='proce8' placeholder='Procedencia' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='reqmant8' placeholder='Req Mant.' class="form-control"/>
                  </td>
                  <td>
                    <input type="number" min="0" name='preciou8' placeholder='Precio unitario' class="form-control"/>
                  </td>
                  <td>
                    <input type="number" min="0" name='preciot8'disabled placeholder='Precio total' class="form-control"/>
                  </td>
                </tr>
                <tr id='addr9'>
                  <td>
                  9
                  </td>
                  <td>
                    <input type="number" min="0" name='cant9'  placeholder='Cantidad' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='code9' placeholder='Código' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='desc9' placeholder='Descripción' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='proce9' placeholder='Procedencia' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='reqmant9' placeholder='Req Mant.' class="form-control"/>
                  </td>
                  <td>
                    <input type="number" min="0" name='preciou9' placeholder='Precio unitario' class="form-control"/>
                  </td>
                  <td>
                    <input type="number" min="0" name='preciot9' disabled  placeholder='Precio total' class="form-control"/>
                  </td>
                </tr>
                <tr id='addr10'>
                  <td>
                  10
                  </td>
                  <td>
                    <input type="number" min="0" name='cant10'  placeholder='Cantidad' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='code10' placeholder='Código' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='desc10' placeholder='Descripción' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='proce10' placeholder='Procedencia' class="form-control"/>
                  </td>
                  <td>
                    <input type="text" name='reqmant10' placeholder='Req Mant.' class="form-control"/>
                  </td>
                  <td>
                    <input type="number" min="0" name='preciou10' placeholder='Precio unitario' class="form-control"/>
                  </td>
                  <td>
                    <input type="number" min="0" name='preciot10disabled' disabled placeholder='Precio total' class="form-control"/>
                  </td>
                </tr>
                <tr id='addr11'>
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
                    <input type="number" min="0" name='total' disabled placeholder='Precio total' class="form-control"/>
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
            <textarea required name="descripcion_falla" class="input"></textarea>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-12">
          <input type="submit" name="" class="button" value="Responder orden">
        </div>
      </div>
    </form>
  </div>
</div>

<script>
</script>

<div class="row clearfix" style="height: 5vh"></div>
