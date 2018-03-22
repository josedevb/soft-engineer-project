<?php 
  include_once ('sesion.php');
  include_once('conexion.php');
  $id = $_SESSION['idusuario'];
  $id_orden = $_GET['id'];
?>
<div class="container-fluid">
  <div class="formBox">
    <form name="respondorder_form" action="respond_order.php" method="post" class="form">
      <div class="row">
        <div class="col-sm-12">
          <h2>Responder orden nº <?php echo "$id_orden"; ?></h2>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-12">
          <div class="inputBox focus">
            <div class="inputText ">Reparaciones realizadas</div>
            <input type="text" placeholder="1" name="usuario_emisor" value="" class="input">
            <input type="text" placeholder="2" name="usuario_receptor" value="" class="input">
            <input type="text" placeholder="3" name="usuario_receptor" value="" class="input">
            <input type="text" placeholder="4" name="usuario_receptor" value="" class="input">
            <input type="text" placeholder="5" name="usuario_receptor" value="" class="input">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="title-row">
          <h3>Repuestos suministrados</h3>
        </div>
        <div class="col-sm-3">
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
            <div class="inputText">Descripcion</div>
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
        </div>

        <div class="col-sm-12"></div>

          <div class="col-sm-3">
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
            <div class="inputText">Descripcion</div>
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
        </div>
      </div>

      <div class="row">
        <div class="title-row">
          <h3>Reparaciones efectuadas por taller externo</h3>
        </div>
        <div class="col-sm-3">
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
            <div class="inputText">Descripcion</div>
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
        </div>

        <div class="col-sm-12"></div>

          <div class="col-sm-3">
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
            <div class="inputText">Descripcion</div>
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

<div class="row clearfix" style="height: 5vh"></div>
