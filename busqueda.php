<?php
error_reporting(E_ERROR | E_PARSE);
	include_once ("sesion.php");
  include_once('conexion.php');
  $seleccion_buscar=$_POST['seleccion_buscar'];
  $buscar=$_POST['txtBuscar'];
	?>
<div class="container-fluid" >

<form name="miformulario" method="post" action=''>
  <?php
    if (!(isset($_POST['BtnEnviar']) ) )
    {
      echo "<label>Buscar: &nbsp; </label>";
      echo "<select name='seleccion_buscar'>
      <option value='todo'>Todo</option>
      <option value='cedula'>Cedula</option>

      </select>";
      echo "<input type='submit' class='btn-primary' name='BtnEnviar' value='Enviar'";
      echo "<br><br>";
    }

    if ((isset($_POST['BtnEnviar']) ) )
    {
      echo "<label>Buscar : &nbsp; </label>";
      echo "<select name='seleccion_buscar'>
      <option value='todo' ";

      if ($seleccion_buscar == 'todo' )
      {
        echo "selected";
      }

      echo ">Todo </option>

      <option value='cedula' ";

      if ($seleccion_buscar == 'cedula' )
      {
        echo "selected";
      }

      echo ">Cedula</option>
      </select>";
      echo "<input class='btn-primary' type='submit' name='BtnEnviar' value='enviar'";
      echo "<br><br>";

    }

    if ($seleccion_buscar=='todo')
    {
      $querybuscarU= $mysqli->query("SELECT * FROM datospersonales
        join usuario on datospersonales.id_persona = usuario.id_persona ") or die ("<br> No se puede ejecutar query para buscar datos P".$mysqli->error);
    }

    if ($seleccion_buscar=='cedula')
    {
			echo "<br>";
      echo "<label>Cédula: &nbsp;</label>";
      echo "<input type='text' name='txtBuscar' size='30' maxlength='20' value='$buscar'>";

      echo "<input type='submit'class='btn-primary' name='BtnEnviar' value='enviar'";
      echo "<br><br><br>";

      if (!$buscar=='')
      {
        $querybuscarU = $mysqli->query("SELECT * FROM datospersonales join usuario on datospersonales.id_persona = usuario.id_persona where cedula like '%$buscar%' ") or die ("<br> No se puede ejecutar query para buscar datos P".$mysqli->error);
      }
    }

    if (mysqli_num_rows($querybuscarU) > 0)
    {
      echo "<table class='w3-table bgreen fwhite1'>";
      echo "<tr>";
      echo "<th> Cédula </th>";
      echo "<th> Nombre </th>";
      echo "<th> Apellido </th>";
      echo "<th> Correo </th>";
      echo "<th> Fecha </th>";
      echo "<th> Genero </th>";
      //echo "<th> Edo civil </th>";
      //echo "<th> Intereses </th>";
      echo "<th> Usuario </th>";

      echo "<th id='th1'> </th>";
      echo "<th id='th1'> </th>";

      while (($fila=mysqli_fetch_array($querybuscarU)))
      {
        $id_persona=$fila['id_persona'];
        $cedula=$fila['cedula'];
        $nombre=$fila['nombre'];
        $apellido=$fila['apellido'];
        $correo=$fila['correo'];
        $fecha=$fila['fecha'];
        $genero=$fila['genero'];
        $usuario=$fila['usuario'];

          if ($genero == 'F')
          {
            $genero = 'Femenino';
          }
          if ($genero == 'M')
          {
            $genero = 'Masculino';
          }

          echo "<tr>";
          //echo "<td> $iddatosp</td>";
          echo "<td>$cedula</td>";
          echo "<td>$nombre</td>";
          echo "<td>$apellido</td>";
          echo "<td>$correo</td>";
          echo "<td>$fecha</td>";
          echo "<td>$genero</td>";


        //$querybuscaredoc= $mysqli->query("SELECT * FROM datospersonales join edocivil on datospersonales.idedocivil = edocivil.idedocivil where id_persona='$id_persona' " ) or die ("<br> No se puede ejecutar query para buscar datos edo civil". $mysqli->error);

        // if (mysqli_num_rows($querybuscaredoc) > 0)
        //  {
        //   while (($fila=mysqli_fetch_array($querybuscaredoc)))
        //    {
        //       $idedocivil= $fila['idedocivil'];
        //     $edocivil= $fila['edocivil'];
        //     echo "<td> $edocivil </td>";
        //      }
        //  }

        //  $querybuscarint= $mysqli->query("SELECT * FROM intereses join interper on intereses.idinteres = interper.idinteres where id_persona='$id_persona' and estatus='1' order by idinterper") or die ("<br> No se puede ejecutar query para buscar datos intereses". $mysqli->error);
        //  if (mysqli_num_rows($querybuscarint) > 0)
        //  {
        //   echo "<td> ";
        //     while (($fila=mysqli_fetch_array($querybuscarint)))
        //      {
        //         $idinterper= $fila['idinterper'];
        //         $nombreint= $fila['nombreint'];
        //       echo " $nombreint <br> ";
        //        }
        //   echo "</td>";
        //  }
         echo "<td> $usuario </td>";
         echo "<td><a href='eliminar.php?id=$id_persona'> <img src='image/eliminar.png' title='Eliminar'></a></td>";
      }

      echo "</tr>";
    echo "<br>";
    echo "</tr>";

  echo "<table>";
    }

  else

    if(!$buscar=='')

    {
      echo "<span class='error'>No existe registro</span>";
      echo "<br><br>";
    }

  ?>


</form>

</div>
<br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
