<?php
require('fpdf/fpdf.php');
require('core/core.php');
$usuario = $_SESSION['app_id'];

$conexion=mysqli_connect("localhost","tesis_charcuteri","tesis_tesis","ocrendbb");
$registros=mysqli_query($conexion,"select datospersonales.*,users.*,factura.*,catepizz.* from datospersonales inner join users on datospersonales.iduser = users.iduser inner join factura on users.iduser = factura.iduser inner join catepizz on factura.idfact = catepizz.idfact where users.iduser = $usuario")
                  or die("Problemas con la conexión");

$registros3=mysqli_query($conexion,"select (sum(ingrediente.costo)+ pizzatam.precio) as total, ingrediente.nombre as nombre3 FROM pizzatam inner join catepizz on pizzatam.idtama= catepizz.idtama inner join costo on catepizz.idcatepizz = costo.idcatepizz inner join ingrediente on costo.idingre = ingrediente.idingre where catepizz.idcatepizz = $usuario")
                  or die("Problemas con la conexión");
$fila4=mysqli_fetch_array($registros3);


ini_set('date.timezone', 'America/Caracas');
$time3 = date('H:i:s', time());
class pdf extends FPDF{
    function header(){
      $this->Image('views/images/backgroundcasaitaliana.jpg',0,0,217,280);
      $this->SetTextColor(255,255,255);
      $this->Setfont('Arial','B','14');
      $this->Cell(196,6,utf8_decode("Casa Italiana C.A"),0,1,"R");
      $this->Cell(196,6,utf8_decode("Avenida 15, Delicias con 72"),0,1,"R");
      $this->Cell(196,6,utf8_decode("Tlf: +58(261) 765-3006"),0,1,"R");
      $this->Cell(196,6,utf8_decode("RIF: J-15165486"),0,1,"R");
      $this->Ln(20);
    }

    function footer(){
      $this->SetY(-15);
      $this->Setfont('Arial','I','10');
      $this->Cell(0,5,$this->PageNo()."/{nb}",0,1,"C");
    }
 }

$pdf = new PDF('P','mm','Letter');



$pdf->AliasNbPages();
$pdf->AddPage();
while($fila=mysqli_fetch_array($registros)){
      $uno = $fila['idcate'];
      $tamañopizza=mysqli_query($conexion,"select nombre from categorias where idcate = $uno");
      $tamaños=mysqli_fetch_array($tamañopizza);
      $titulopizza = $tamaños['nombre'];
      $dos = $fila['idtama'];

      $tamañopizza2=mysqli_query($conexion,"select * from pizzatam where idtama = $dos");
      $tamaños2=mysqli_fetch_array($tamañopizza2);
      $tamanopizza = $tamaños2['size'];
      $preciopizza = $tamaños2['precio'];

      $factura= $fila['idfact'];

      $datosingredientes=mysqli_query($conexion,"select ingrediente.nombre as nombreingrediente, ingrediente.costo as costoingrediente  from ingrediente inner join costo on costo.idingre = ingrediente.idingre inner join catepizz on costo.idcatepizz = catepizz.idcatepizz where idfact = $factura");
$nombreingre='';
$precioingre='';
            while ($fila3=mysqli_fetch_array($datosingredientes)){
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
mysqli_close($conexion);


$pdf->Output();

?>
