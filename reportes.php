<?php
require('fpdf/fpdf.php');

$conexion = mysqli_connect("localhost", "root", "", "urbe");
$orders = mysqli_query($conexion, "SELECT * FROM ordenes") or die("Problemas de conexion");

ini_set('date.timezone', 'America/Caracas');
$time3 = date('H:i:s', time());

class pdf extends FPDF {
  function footer(){
    $this->SetY(-15);
    $this->Setfont('Arial','I','10');
    $this->Cell(0,5,$this->PageNo()."/{nb}",0,1,"C");
  }
}

$pdf = new PDF('P','mm','Letter');

$pdf->AliasNbPages();
$pdf->AddPage();
  while($orden = mysqli_fetch_array($orders)) {
    $id_orden = $orden['id_orden'];

    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','B','12');
    $pdf->Cell(0,10,utf8_decode('ORDEN DE MANTENIMIENTO N° ').$orden['id_orden'] ,0,1,'C');
    $pdf->SetFont('Arial','B','12');
    $pdf->Cell(0,7,utf8_decode('De: Gestor de operaciones                Para: Gestor de mantenimiento '),0,1,'L');
    $pdf->Cell(0,7,utf8_decode('Tipo de mantenimiento: ').$orden['tipo_mantenimiento'] ,0,1,'L');
    $pdf->Cell(15,7,utf8_decode("Usuario equipo: ".$orden['usuario_equipo']."  
            Mecanico asignado: ".$orden['mecanico_asignado']),0,1,'L');
    $pdf->Ln(2);
    $pdf->SetTextColor(250,250,250);
    $pdf->SetFont('Arial','B','10');
    $pdf->Cell(40,5,"Fecha Reporte",1,0,'C',true);
    $pdf->Cell(20,5,"Hora",1,0,'C',true);
    $pdf->Cell(25,5,"Fecha Inicio",1,0,'C',true);
    $pdf->Cell(20,5,"Hora",1,0,'C',true);
    $pdf->Cell(40,5,utf8_decode("Fecha culminación"),1,0,'C',true);
    $pdf->Cell(20,5,"Hora",1,0,'C',true);
    $pdf->Cell(30,5,"KM",1,1,'C',true);
  
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(40,8,$orden['fecha_reporte'],1,0,'C');
    $pdf->Cell(20,8,$orden['hora_reporte'],1,0,'C');
    $pdf->Cell(25,8,$orden['fecha_inicio'],1,0,'C');
    $pdf->Cell(20,8,$orden['hora_inicio'],1,0,'C');
    $pdf->Cell(40,8,$orden['fecha_culminacion'],1,0,'C');
    $pdf->Cell(20,8,$orden['hora_culminacion'],1,0,'C');
    $pdf->Cell(30,8,$orden['km'],1,1,'C');

    $pdf->Ln(2);

    $pdf->SetTextColor(250,250,250);
    $pdf->SetFont('Arial','B','10');
    $pdf->Cell(20,5,"UNIDAD",1,0,'C',true);
    $pdf->Cell(20,5,"PLACA",1,0,'C',true);
    $pdf->Cell(54,5,"ULTIMA ACTIVIDAD",1,0,'C',true);
    $pdf->Cell(5,5,"",0,0,'C');
    $pdf->Cell(25,5,"Fecha Inicio",0,0,'C',true);
    $pdf->Cell(25,5,"Fecha Fin",0,0,'C',true);
    $pdf->Cell(16,5,"Hora",0,0,'C',true);
    $pdf->Cell(30,5,"Garantia",0,1,'C',true);
  
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(20,8,$orden['unidad_equipo'],1,0,'C');
    $pdf->Cell(20,8,$orden['placa_equipo'],1,0,'C');
    $pdf->Cell(54,8,$orden['ultima_actividad'],1,0,'C');
    $pdf->Cell(5,8,"",0,0,'C');
    $pdf->Cell(25,8,$orden['fecha_inicio_taller'],1,0,'C');
    $pdf->Cell(25,8,$orden['fecha_culminacion_taller'],1,0,'C');
    $pdf->Cell(16,8,$orden['hora_taller'],1,0,'C');
    $pdf->Cell(30,8,$orden['garantia'],1,1,'C');

    $pdf->Ln(2);

    $pdf->SetTextColor(255,255,255);
    $pdf->MultiCell(0,10,utf8_decode("Descripción de la falla: ".$orden['descripcion_falla']."         "),0 ,1,'L');          
    
    $pdf->Ln(2);

    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','B','14');
    $pdf->Cell(0,5,"Reparaciones realizadas",0,1,'L');
    $pdf->SetFont('Arial','B','10');
    $pdf->Ln(2);
    $query_reparaciones_realizadas = mysqli_query(
      $conexion,
      "SELECT * FROM ordenes
       JOIN reparaciones_realizadas
       ON ordenes.id_orden = reparaciones_realizadas.id_orden  
       WHERE reparaciones_realizadas.id_orden = $id_orden") or die($mysqli->error);

    $count = 1;
    while($reparaciones_realizadas = mysqli_fetch_array($query_reparaciones_realizadas)) {
      if($count % 2 !== 0) {
        $pdf->Cell(0,2,$count.". ".$reparaciones_realizadas['descripcion'],0,0,'L');
      } else {
        $pdf->Cell(120,2,$count.". ".$reparaciones_realizadas['descripcion'],0,1,'R');
      }
      $pdf->Ln(1);
      $count++;
    }
  $pdf->Ln(5);
  
  $pdf->SetFont('Arial','B','14');
  $pdf->Cell(0,5,"Repuestos suministrados",0,1,'L');
  $pdf->Ln(2);  
  $pdf->SetFont('Arial','B','10');
  $pdf->SetTextColor(250,250,250);
  $pdf->SetFont('Arial','B','10');
  $pdf->Cell(15,5,"Cant",1,0,'C',true);
  $pdf->Cell(20,5,utf8_decode("Código"),1,0,'C',true);
  $pdf->Cell(40,5,utf8_decode("Descripción"),1,0,'C',true);
  $pdf->Cell(30,5,"Procedencia",1,0,'C',true);
  $pdf->Cell(40,5,utf8_decode("Req. Mant. No."),1,0,'C',true);
  $pdf->Cell(20,5,"Precio Unit.",1,0,'C',true);
  $pdf->Cell(31,5,"Precio Total",1,1,'C',true);
    $query_reparaciones = mysqli_query(
      $conexion,
      "SELECT * FROM ordenes
       JOIN repuestos
       ON ordenes.id_orden = repuestos.id_orden  
       WHERE repuestos.id_orden = $id_orden") or die($mysqli->error);

    $query_respuesta = mysqli_query(
      $conexion,
      "SELECT * FROM ordenes
      JOIN respuesta
      ON ordenes.id_orden = respuesta.id_orden
      WHERE respuesta.id_orden = $id_orden ORDER BY respuesta.id_respuesta DESC LIMIT 1") or die($mysqli->error);

    $respuesta = mysqli_fetch_array($query_respuesta);
       
    while($repuestos_suministrados = mysqli_fetch_array($query_reparaciones)) {
      $pdf->SetTextColor(0,0,0);
      $pdf->Cell(15,8,$repuestos_suministrados['cantidad'],1,0,'C');
      $pdf->Cell(20,8,$repuestos_suministrados['codigo'],1,0,'C');
      $pdf->Cell(40,8,$repuestos_suministrados['descripcion'],1,0,'C');
      $pdf->Cell(30,8,$repuestos_suministrados['procedencia'],1,0,'C');
      $pdf->Cell(40,8,$repuestos_suministrados['req_mant_no'],1,0,'C');
      $pdf->Cell(20,8,$repuestos_suministrados['precio_unit'],1,0,'C');
      $pdf->Cell(31,8,$repuestos_suministrados['precio_total'],1,1,'C');
    }
    $pdf->Cell(0,8,"Total: ".$respuesta['monto_repuesto'],1,1,'R');
  $pdf->Ln(3);
  $pdf->SetFont('Arial','B','14');
  $pdf->Cell(0,5,"Reparaciones Efectuadas por taller externo",0,1,'L');
  $pdf->Ln(2);
  $pdf->SetFont('Arial','B','10');
  $pdf->SetTextColor(250,250,250);
  $pdf->SetFont('Arial','B','10');
  $pdf->Cell(15,5,"Cant",1,0,'C',true);
  $pdf->Cell(20,5,utf8_decode("Código"),1,0,'C',true);
  $pdf->Cell(40,5,utf8_decode("Descripción"),1,0,'C',true);
  $pdf->Cell(30,5,"Procedencia",1,0,'C',true);
  $pdf->Cell(40,5,utf8_decode("Req. Mant. No."),1,0,'C',true);
  $pdf->Cell(20,5,"Precio Unit.",1,0,'C',true);
  $pdf->Cell(31,5,"Precio Total",1,1,'C',true);
    $query_reparaciones = mysqli_query(
      $conexion,
      "SELECT * FROM ordenes
       JOIN reparaciones
       ON ordenes.id_orden = reparaciones.id_orden  
       WHERE reparaciones.id_orden = $id_orden") or die($mysqli->error);
       
    while($reparaciones = mysqli_fetch_array($query_reparaciones)) {
      $I = 1;
      $pdf->SetTextColor(0,0,0);
      $pdf->Cell(15,8,$reparaciones['cantidad'],1,0,'C');
      $pdf->Cell(20,8,$reparaciones['codigo'],1,0,'C');
      $pdf->Cell(40,8,$reparaciones['descripcion'],1,0,'C');
      $pdf->Cell(30,8,$reparaciones['procedencia'],1,0,'C');
      $pdf->Cell(40,8,$reparaciones['req_mant_no'],1,0,'C');
      $pdf->Cell(20,8,$reparaciones['precio_unit'],1,0,'C');
      $pdf->Cell(31,8,$reparaciones['precio_total'],1,1,'C');
      $I++;
    }
    $pdf->Cell(0,8,"Total: ".$respuesta['monto_reparaciones'],1,1,'R');

  $pdf->Ln(5);
  $pdf->SetTextColor(255,255,255);
  $pdf->MultiCell(0,10,utf8_decode("Observación: ".$respuesta['observacion']."         "),0 ,1,'L');         
  $pdf->Ln(140);
}


$pdf->Output();

?>
