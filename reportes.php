<?php
require('fpdf/fpdf.php');

include_once('conexion.php');

$orders = $mysqli->query("SELECT * FROM ordenes") or die("Problemas de conexion");
$ordenes = mysqli_fetch_array($orders);

ini_set('date.timezone', 'America/Caracas');
$time3 = date('H:i:s', time());

class pdf extends FPDF {
  function header() {
    $this->SetTextColor(255,255,255);
    $this->Setfont('Arial','B','14');
    $this->Cell(196,6,utf8_decode("Reporte de ordenes"),0,1,"R");
    $this->Cell(196,6,utf8_decode("Avenida 15, Delicias con 72"),0,1,"R");
    $this->Cell(196,6,utf8_decode("Tlf: +58(261) 765-3006"),0,1,"R");
    $this->Cell(196,6,utf8_decode("RIF: J-15165486"),0,1,"R");
    $this->Ln(20);
  }

  function footer() {
    $this->SetY(-15);
    $this->Setfont('Arial','I','10');
    $this->Cell(0,5,$this->PageNo()."/{nb}",0,1,"C");
  }
 }

$pdf = new PDF('P','mm','Letter');

$pdf->AliasNbPages();
$pdf->AddPage();
  while($orden = mysqli_fetch_array($ordenes)) {
    $id_orden = $orden['id_orden'];

    $query_reparaciones_realizadas = $mysqli->query(
      "SELECT * FROM ordenes
       JOIN reparacionez_realizadas
       ON ordenes.id_orden = reparaciones_realizadas.id_orden  
       WHERE id_orden = $id_orden");
    
    while($reparaciones_realizadas = mysqli_fetch_array($query_reparaciones_realizadas)) {

    }

    $tamaños = mysqli_fetch_array($tamañopizza);
    $titulopizza = $tamaños['nombre'];
    $dos = $fila['idtama'];

    $tamañopizza2= $mysqli->query("select * from pizzatam where idtama = $dos");
    $tamaños2 = mysqli_fetch_array($tamañopizza2);
    $tamanopizza = $tamaños2['size'];
    $preciopizza = $tamaños2['precio'];

    $factura= $fila['idfact'];

    $datosingredientes= $mysqli->query("select ingrediente.nombre as nombreingrediente, ingrediente.costo as costoingrediente  from ingrediente inner join costo on costo.idingre = ingrediente.idingre inner join catepizz on costo.idcatepizz = catepizz.idcatepizz where idfact = $factura");
    $nombreingre='';
    $precioingre='';
    while ($fila3 = mysqli_fetch_array($datosingredientes)){
      $nombreingre.=''.$fila3['nombreingrediente'].' ';
      $precioingre+=$fila3['costoingrediente'];
    }

  $preciototal = ($precioingre + $preciopizza) - (($precioingre + $preciopizza) * 0.12);

  $pdf->SetTextColor(250,250,250);
  $pdf->SetFont('Arial','B','24');
  $pdf->Cell(0,16,utf8_decode('Factura # ').$fila['idfact'] ,0,1,'C');

  $pdf->Ln(5);

  $pdf->SetTextColor(250,250,250);
  $pdf->SetFont('Arial','B','12');
  $pdf->Cell(0,10,"Detalles del comprador",1,1,'C',true);

  $pdf->SetTextColor(250,250,250);
  $pdf->Cell(98,10,"Nombre: ".$fila['nombre'],1,0);
  $pdf->Cell(98,10,"Apellido: ".$fila['apellido'],1,1);

  $pdf->Cell(98,10,"Correo: ".$fila['email'],1,0);
  $pdf->Cell(76,10,utf8_decode("Teléfono Celular: ".$fila['numero']),1,1);

  $pdf->SetFillColor(255,255,255);
  $pdf->SetTextColor(0,0,0);
  $pdf->MultiCell(0,10,utf8_decode("Dirección: ".$fila['direccion']."                                                                                                                                                                               "),1,1,'L',true);

  $pdf->Ln(10);

  $pdf->SetTextColor(255,255,255);
  $pdf->SetFillColor(0,0,0);
  $pdf->SetFont('Arial','B','12');
  $pdf->Cell(0,10,"Detalles de la compra",1,1,'C',true);

  $pdf->SetTextColor(255,255,255);
  $pdf->Cell(98,10,"Tipo de pizza: ".$titulopizza,1,0);
  $pdf->Cell(98,10,utf8_decode("Tamaño de pizza: ").$tamanopizza,1,1);
  $pdf->Cell(0,10,utf8_decode("Ingredientes: ").$nombreingre,1,1);

  $pdf->Cell(98,10,"IVA: 12%",1,0);
  $pdf->Cell(98,10,utf8_decode("Precio total: ".$preciototal),1,1);

  $pdf->Ln(140);

}

$pdf->Output();

?>
