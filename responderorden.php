<?php 
  include_once ('sesion.php');
  include_once('conexion.php');
  $id = $_SESSION['idusuario'];
  $id_orden = $_GET['id'];
?>

<script>
  $('#mainTable').editableTableWidget().numericInputExample().find('td:first').focus();
  $('#textAreaEditor').editableTableWidget({editor: $('<textarea>')});
  window.prettyPrint && prettyPrint();
</script>

<div class="container-fluid">
  <div class="formBox">
    <form name="respondorder_form" action="respond_order.php" method="post" class="form">
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
            <table id="mainTable" class="table" style="width:100%;" style="cursor: pointer;">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Cant.</th>
                  <th>Código</th>
                  <th>Descripción</th>
                  <th>Procedencia</th>
                  <th>Req Mant</th>
                  <th>Precio unitario</th>
                  <th>Precio total</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td tabindex="1">1</td>
                  <td tabindex="1"></td>
                  <td tabindex="1"></td>
                  <td tabindex="1"></td>
                  <td tabindex="1"></td>
                  <td tabindex="1"></td>
                  <td tabindex="1"></td>
                  <td tabindex="1"></td>
                </tr>
                <tr>
                  <td tabindex="1">2</td>
                  <td tabindex="1"></td>
                  <td tabindex="1"></td>
                  <td tabindex="1"></td>
                  <td tabindex="1"></td>
                  <td tabindex="1"></td>
                  <td tabindex="1"></td>
                  <td tabindex="1"></td>
                </tr>
                <tr>
                  <td tabindex="1">3</td>
                  <td tabindex="1"></td>
                  <td tabindex="1"></td>
                  <td tabindex="1"></td>
                  <td tabindex="1"></td>
                  <td tabindex="1"></td>
                  <td tabindex="1"></td>
                  <td tabindex="1"></td>
                </tr>
                <tr>
                  <td tabindex="1">4</td>
                  <td tabindex="1"></td>
                  <td tabindex="1"></td>
                  <td tabindex="1"></td>
                  <td tabindex="1"></td>
                  <td tabindex="1"></td>
                  <td tabindex="1"></td>
                  <td tabindex="1"></td>
                </tr>
                <tr>
                  <td tabindex="1">5</td>
                  <td tabindex="1"></td>
                  <td tabindex="1"></td>
                  <td tabindex="1"></td>
                  <td tabindex="1"></td>
                  <td tabindex="1"></td>
                  <td tabindex="1"></td>
                  <td tabindex="1"></td>
                </tr>
                <tr>
                  <td tabindex="1">6</td>
                  <td tabindex="1"></td>
                  <td tabindex="1"></td>
                  <td tabindex="1"></td>
                  <td tabindex="1"></td>
                  <td tabindex="1"></td>
                  <td tabindex="1"></td>
                  <td tabindex="1"></td>
                </tr>
                <tr>
                  <td tabindex="1">7</td>
                  <td tabindex="1"></td>
                  <td tabindex="1"></td>
                  <td tabindex="1"></td>
                  <td tabindex="1"></td>
                  <td tabindex="1"></td>
                  <td tabindex="1"></td>
                  <td tabindex="1"></td>
                </tr>
                <tr>
                  <td tabindex="1">8</td>
                  <td tabindex="1"></td>
                  <td tabindex="1"></td>
                  <td tabindex="1"></td>
                  <td tabindex="1"></td>
                  <td tabindex="1"></td>
                  <td tabindex="1"></td>
                  <td tabindex="1"></td>
                </tr>
                <tr>
                  <td tabindex="1">9</td>
                  <td tabindex="1"></td>
                  <td tabindex="1"></td>
                  <td tabindex="1"></td>
                  <td tabindex="1"></td>
                  <td tabindex="1"></td>
                  <td tabindex="1"></td>
                  <td tabindex="1"></td>
                </tr>
                <tr>
                  <td tabindex="1">10</td>
                  <td tabindex="1"></td>
                  <td tabindex="1"></td>
                  <td tabindex="1"></td>
                  <td tabindex="1"></td>
                  <td tabindex="1"></td>
                  <td tabindex="1"></td>
                  <td tabindex="1"></td>
                </tr>
              </tbody>
              <tfoot> 
                <tr>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                </tr>
              </tfoot>
            </table>
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
          <table id="mainTable" class="table" style="width:100%;" style="cursor: pointer;">
            <thead>
              <tr>
                <th>No.</th>
                <th>Cant.</th>
                <th>Código</th>
                <th>Descripción</th>
                <th>Procedencia</th>
                <th>Req Mant</th>
                <th>Precio unitario</th>
                <th>Precio total</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td tabindex="1">1</td>
                <td tabindex="1"></td>
                <td tabindex="1"></td>
                <td tabindex="1"></td>
                <td tabindex="1"></td>
                <td tabindex="1"></td>
                <td tabindex="1"></td>
                <td tabindex="1"></td>
              </tr>
              <tr>
                <td tabindex="1">2</td>
                <td tabindex="1"></td>
                <td tabindex="1"></td>
                <td tabindex="1"></td>
                <td tabindex="1"></td>
                <td tabindex="1"></td>
                <td tabindex="1"></td>
                <td tabindex="1"></td>
              </tr>
              <tr>
                <td tabindex="1">3</td>
                <td tabindex="1"></td>
                <td tabindex="1"></td>
                <td tabindex="1"></td>
                <td tabindex="1"></td>
                <td tabindex="1"></td>
                <td tabindex="1"></td>
                <td tabindex="1"></td>
              </tr>
              <tr>
                <td tabindex="1">4</td>
                <td tabindex="1"></td>
                <td tabindex="1"></td>
                <td tabindex="1"></td>
                <td tabindex="1"></td>
                <td tabindex="1"></td>
                <td tabindex="1"></td>
                <td tabindex="1"></td>
              </tr>
              <tr>
                <td tabindex="1">5</td>
                <td tabindex="1"></td>
                <td tabindex="1"></td>
                <td tabindex="1"></td>
                <td tabindex="1"></td>
                <td tabindex="1"></td>
                <td tabindex="1"></td>
                <td tabindex="1"></td>
              </tr>
              <tr>
                <td tabindex="1">6</td>
                <td tabindex="1"></td>
                <td tabindex="1"></td>
                <td tabindex="1"></td>
                <td tabindex="1"></td>
                <td tabindex="1"></td>
                <td tabindex="1"></td>
                <td tabindex="1"></td>
              </tr>
              <tr>
                <td tabindex="1">7</td>
                <td tabindex="1"></td>
                <td tabindex="1"></td>
                <td tabindex="1"></td>
                <td tabindex="1"></td>
                <td tabindex="1"></td>
                <td tabindex="1"></td>
                <td tabindex="1"></td>
              </tr>
              <tr>
                <td tabindex="1">8</td>
                <td tabindex="1"></td>
                <td tabindex="1"></td>
                <td tabindex="1"></td>
                <td tabindex="1"></td>
                <td tabindex="1"></td>
                <td tabindex="1"></td>
                <td tabindex="1"></td>
              </tr>
              <tr>
                <td tabindex="1">9</td>
                <td tabindex="1"></td>
                <td tabindex="1"></td>
                <td tabindex="1"></td>
                <td tabindex="1"></td>
                <td tabindex="1"></td>
                <td tabindex="1"></td>
                <td tabindex="1"></td>
              </tr>
              <tr>
                <td tabindex="1">10</td>
                <td tabindex="1"></td>
                <td tabindex="1"></td>
                <td tabindex="1"></td>
                <td tabindex="1"></td>
                <td tabindex="1"></td>
                <td tabindex="1"></td>
                <td tabindex="1"></td>
              </tr>
            </tbody>
            <tfoot> 
              <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
              </tr>
            </tfoot>
          </table>
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
  $('#mainTable').editableTableWidget().numericInputExample().find('td:first').focus();
  $('#textAreaEditor').editableTableWidget({editor: $('<textarea>')});
  window.prettyPrint && prettyPrint();
</script>

<div class="row clearfix" style="height: 5vh"></div>
