<?php 
  include_once ('sesion.php');
  include_once('conexion.php');
  $id = $_SESSION['idusuario'];
?>
<div class="container-fluid">
  <div class="formBox">
    <form name="createorder_form" action="createorder.php" method="post" class="form">
      <div class="row">
        <div class="col-sm-12">
          <h2>Nueva orden</h2>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-6">
          <div class="inputBox focus">
            <div class="inputText ">De</div>
            <input type="text" name="usuario_emisor" value="OPERACIONES" disabled class="input">
          </div>
        </div>

        <div class="col-sm-6">
          <div class="inputBox focus">
            <div class="inputText">Para</div>
            <input type="text" name="usuario_receptor" value="MANTENIMIENTO" disabled class="input">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-4">
          <div class="inputBox focus" style="display:flex;">
            <div class="inputText">Tipo de mantenimiento</div>
            <div class="radio-box">
              <input type="radio" checked name="tipoMantenimiento" value="preventivo"> Preventivo<br>
              <input type="radio" name="tipoMantenimiento" value="predictivo"> Predictivo<br>
              <input type="radio" name="tipoMantenimiento" value="correctivo"> Correctivo
            </div>
          </div>
        </div>

        <div class="col-sm-4">
          <div class="inputBox focus">
            <div class="inputText">Usuario del equipo</div>
            <input type="text" name="usuario_equipo" placeholder="Ingrese el nombre" required class="input">
          </div>
        </div>

        <div class="col-sm-4">
          <div class="inputBox focus">
            <div class="inputText">Mecanico asignado</div>
            <input type="text" name="mecanico_asignado" placeholder="Ingrese el nombre" required class="input">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-4">
          <div class="inputBox focus">
            <div class="inputText ">Fecha reporte</div>
            <input type="date" required name="fecha_reporte" class="input">
          </div>
        </div>

        <div class="col-sm-4">
          <div class="inputBox focus">
            <div class="inputText">Hora del reporte</div>
            <input type="time" placeholder="HH:mm" required name="hora_reporte" class="input">
          </div>
        </div>

        <div class="col-sm-4">
          <div class="inputBox focus">
            <div class="inputText">Fecha inicio</div>
            <input type="date" name="fecha_inicio" class="input">
          </div>
        </div>

        <div class="col-sm-4">
          <div class="inputBox focus">
            <div class="inputText">Hora inicio</div>
            <input type="time" required placeholder="HH:mm" name="hora_inicio" class="input">
          </div>
        </div>

        <div class="col-sm-4">
          <div class="inputBox focus">
            <div class="inputText">Fecha culminación</div>
            <input type="date" required name="fecha_culminacion" class="input">
          </div>
        </div>

        <div class="col-sm-4">
          <div class="inputBox focus">
            <div class="inputText">Hora culminación</div>
            <input type="time" required name="hora_culminacion" class="input">
          </div>
        </div>

        <div class="col-sm-4">
          <div class="inputBox focus">
            <div class="inputText">KM</div>
            <input type="number" required name="km" class="input">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="title-row">
          <h3>CARACTERISTICAS DEL EQUIPO</h3>
        </div>
        <div class="col-sm-4">
          <div class="inputBox focus">
            <div class="inputText">Unidad</div>
            <input type="text" required placeholder="Ingrese unidad" name="unidad_equipo" class="input">
          </div>
        </div>

        <div class="col-sm-4">
          <div class="inputBox focus">
            <div class="inputText">Placa</div>
            <input type="text" placeholder="Ingrese placa" required name="placa_equipo" class="input">
          </div>
        </div>

        <div class="col-sm-4">
          <div class="inputBox focus">
            <div class="inputText">Ultima actividad realizada</div>
            <input type="text" placeholder="Ingrese actividad" required name="ultima_actividad" class="input">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="title-row">
          <h3>TALLER EXTERNO</h3>
        </div>

        <div class="col-sm-3">
          <div class="inputBox focus">
            <div class="inputText">Nombre del taller</div>
            <input type="text" placeholder="Indique el nombre" required name="taller_externo" class="input">
          </div>
        </div>

        <div class="col-sm-3">
          <div class="inputBox focus">
            <div class="inputText">Fecha de inicio</div>
            <input type="date" required name="fecha_inicio_taller" class="input">
          </div>
        </div>

        <div class="col-sm-3">
          <div class="inputBox focus">
            <div class="inputText">Fecha culminación</div>
            <input type="date" required name="fecha_culminacion_taller" class="input">
          </div>
        </div>

        <div class="col-sm-3">
          <div class="inputBox focus">
            <div class="inputText">Hora</div>
            <input type="time" required placeholder="HH:mm" name="hora_taller" class="input">
          </div>
        </div>

        <div class="col-sm-3">
          <div class="inputBox focus">
            <div class="inputText">Garantia</div>
            <input type="text" required name="garantia" class="input">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-12">
          <div class="inputBox focus">
            <div class="inputText">Descripción de la falla</div>
            <textarea required name="descripcion_falla" class="input"></textarea>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-12">
          <input type="submit" name="" class="button" value="Crear orden">
        </div>
      </div>
    </form>
  </div>
</div>

<div class="row clearfix" style="height: 5vh"></div>
