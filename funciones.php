<!-- funciones.php -->
<?php
//funcion para sumar 2 valores

function suma ($A,$B) {
  $C = $A+$B;
  return $C;

}

function resta ($A,$B){
	$C = $A-$B;
	return $C;
}

function multi ($A,$B){
     $C = $A*$B;
     return $C;

}

function div ($A,$B){
	$C = $A/$B;
	return $C;
}

// funcion para validad un numero de punto flotante
function validarFlotante ($Cad) {
	// prueba si la entrada es un numero de punto flotante, con un signo opcional
	// preg_match realiza búsquedas en cadenas de texto mediante expresiones regulares. Devolverá el valor booleano.
	return preg_match("/^-?([0-9])+([\.]([0-9])*)?$/", $Cad );
	}
// funcion para validad cadenas alfabeticas
function validaAlfa ($Cad) {
	// prueba si la entrada son cadenas alfabeticas
	return preg_match("/^[a-zñÑáéíóúÁÉÍÓÚ]*$/i", $Cad );
	}

// funcion para validad cadenas alfabeticas con espacio
function validaAlfaEsp ($Cad) {
	// prueba si la entrada son cadenas alfabeticas con espacio
	return preg_match("/^[a-zñÑáéíóúÁÉÍÓÚ ]*$/i", $Cad );
	}

// funcion para validad cadenas alfabeticas con espacio especiales
function validaAlfaEspecial ($Cad) {
	// prueba si la entrada es una cadena alfanumerica con .
	return preg_match("/^[a-zñÑáéíóúÁÉÍÓÚ \.\,]*$/i", $Cad );
	}
	
// funcion para validad una cadena alfanumerica
function validaAlfaNum ($Cad) {
	// prueba si la entrada es una cadena alfanumerica
	return preg_match("/^[a-zñÑ0-9]*$/i", $Cad );
	}

// funcion para validad un entero
function validaEntero ($texto) {
	// prueba si la entrada es un entero, sin signo
	return preg_match("/^[0-9]+$/", $texto );
	}

// funcion para validad un entero con signo opcional
function validaEnteroConSigno ($Cad) {
	// prueba si la entrada es un entero, con un signo opcional
	return preg_match("/^-?([0-9])+$/", $Cad );
	}	
	
// funcion para validad una Direccion
function validaDir ($Cad) {
	// prueba si la entrada es una cadena alfanumerica con . - # y /
	return preg_match("/^[a-zñÑáéíóúÁÉÍÓÚ0-9 \-\.\#\/]*$/i", $Cad );
	}
	
// Funcion para validar una direccion de correo electronico
function validarDirCorreoElec ($Cad) {
	// prueba si la entrada coincide con los patrones de correo electronico
	return eregi ("^([a-z0-9_-])+([\.a-z0-9_-])*@([a-z0-9-])+(\.[a-z0-9-]+)*\.([a-z]{2,6})$", $Cad);
	}

// funcion para validad un Rif
function validaRif ($Cad) {
	// prueba si la entrada es una cadena alfanumerica con j v y numeros /
	return preg_match("/^[j,v0-9\/]*$/i", $Cad );
	}
	
// funcion para validad una Cedula
function validaCedula ($Cad) {
	// prueba si la entrada es una cadena alfanumerica con v e y numeros /
	return preg_match("/^[e,v0-9\/]*$/i", $Cad );
	}
	
// funcion para validad una cta facebook
function validafacebook ($Cad) {
	// prueba si la entrada es una cadena alfanumerica con . - # y /
	return preg_match("/^[a-zñÑ\.\/]*$/i", $Cad );
	}

// funcion para validad una cta twitter
function validatwitter ($Cad) {
	// prueba si la entrada es una cadena alfanumerica con . - # y /
	return preg_match("/^[@a-z0-9\_]*$/i", $Cad );
	}
	


	


// funcion para validar una fecha ingresada
 function datecheck($input,$format="")
    {
        $separator_type= array(
           //con  "/",
           //con  "-",
           //o con  "."
		   "-"
        );
        foreach ($separator_type as $separator) {
            $find= stripos($input,$separator);
            if($find<>false){
                $separator_used= $separator;
            }
        }
        $input_array= explode($separator_used,$input);
        if ($format=="mdY") {
            return checkdate($input_array[0],$input_array[1],$input_array[2]);
        } elseif ($format=="Ymd") {
            return checkdate($input_array[1],$input_array[2],$input_array[0]);
        } else {
            return checkdate($input_array[1],$input_array[0],$input_array[2]);
        }
        $input_array=array();
    }


//Cambiar la fecha al formato año-mes-día
 function cambiarfecha($fecha){
 list($year,$mes,$dia)=explode("-",$fecha);
 $fecha="$dia-$mes-$year";
 return $fecha;
 }
 
//Cambiar la fecha al formato día-mes-año
 function cambiarfechadeBD($fecha){
	//formato fecha americana
	$fecha=date("d-m-Y",strtotime($fecha));
	//El nuevo valor de la variable: $fecha2="dd-mm-aaaa"
	return $fecha;
}

 

//Funcion para Verificar el Rango de Años de una Fecha
function verificaryears($fecha,$yearsmax,$yearsmin) {

	list($d,$m,$a) = explode("-",$fecha);


	if ( $a >= date("Y")-$yearsmax and $a <= date("Y")-$yearsmin )
	{
		$year = true; // Rango correcto
	}else
	{
		$year = false; // Rango incorreto
	}
	return $year;
}


//Funcion para calcular la edad a partir de la fecha de nacimiento
//Recibe parametro $nacimiento (debe ser en formato yyyy-mm-dd)
//Devuelve la edad calculada

function Calcularedad($nacimiento) { 
	list($ano, $mes, $dia) = explode("-", $nacimiento);
	$anodif = date("Y") - $ano;
	$mesdif = date("m") - $mes;
	$diadif = date("d") - $dia;
	
	if (($diadif < 0) or ($mesdif < 0)) {
		$anodif = $anodif - 1;
	}
	
	if ($nacimiento == '') { $anodif = ''; }	
	
	return $anodif;
	
}


//Funcion para restar años a la fecha actual
//Salida bajo el formato yyyy-mm-dd
function subtractyearsBD($years) { 
	date("d-m-Y");
	$Y=date("Y")-$years;
	$fecha=date($Y."-m-d");
	
	return $fecha;
	
}


//Funcion para restar años a la fecha actual
//Salida bajo el formato yyyy-mm-dd
function subtractyears($years) { 
	date("d-m-Y");
	$Y=date("Y")-$years;
	$fecha=date("d-m-".$Y);
	
	return $fecha;
	
}
	
?>