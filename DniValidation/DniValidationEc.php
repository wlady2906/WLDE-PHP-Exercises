<?php
/******************************************************************************
Validación de número de cédula
   
    Se procede a usar el algoritmo del número verificador para multiplicar los diez digitos
    de la cédula por los coeficientes 2.1.2.1.2.1.2.1.2
    
    (Cuando el residuo es 0, el digito verificador es 0)
    
    Pasos para obtener el cálculo de la verificación
    
    1)Multiplicar cada dígito del número de cédula por cada uno de los coeficientes
    2) Si el resultado de la multiplicación es mayor o igual a 10. restamos -9 a ese resultado
    3) Sumar las multiplicaciones
    4) realizar una division entre la suma de las multiplicaciones por el la longitud del número de cedula (10)
    5) Restar el residuo de la división - la longitud del número de cédula
    
    
*******************************************************************************/
//Variable para el número de la cédula, que debe ser del tipo string
$cedula = "0940127996";

//Arreglo con cada uno de los coeficientes necesarios para realizar el cálculo
$coeficientes = array(2,1,2,1,2,1,2,1,2);
$multiplicacion = array();


//Utilizo un bucle para recorrer cada posición de la cadena de caracteres de la cédula
for ($i=0; $i<strlen($cedula)-1; $i++)
{
    //Realizamos la multiplicacion de los coeficientes de la cedula hasta el noveno digito
    $multiplicacion[] = $cedula[$i] * $coeficientes[$i];
    if($multiplicacion[$i] >= 10)
    {
        $multiplicacion[$i] = $multiplicacion[$i] - 9;
    }
}

//Se procede a dividir el resultado de la suma de las multiplicaciones sobre la longitud del numero de cédula(10) 
//y almacenamos su residuo con el operador % (mod)
$division = array_sum($multiplicacion) % 10;


//Restamos el residuo de la division entre la longitud del numero de cedula
$resta = strlen($cedula) - $division;

/*
Hacemos una condición que nos haga saber cuando el ultimo digito es igual (==) al obtenido de la resta 
o( || ) cuando la resta sea igual a la longitud del número cédula
    si es true - la cédula es válida
    si es false - la cédula es incorrecta
*/
if (intval(substr($cedula,9)) == $resta || $resta == strlen($cedula)) 
{
    echo 'La cédula es válida, felicidades';
}
else 
{
    echo 'La cédula es incorrecta';
}

?>
