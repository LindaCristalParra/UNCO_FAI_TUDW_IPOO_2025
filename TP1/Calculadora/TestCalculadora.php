<?php
include 'Calculadora.php';

$calc = new Calculadora(10, 2);
echo "\n----- Inicio de test calculadora -----\n\n";

echo "SUMAR\n";
echo $calc->getA()." + ". $calc->getB()." = ".$calc->sumar(10, 2)."\n\n";
echo "RESTAR\n";
echo $calc->getA()." - ". $calc->getB()." = ".$calc->restar(10, 2)."\n\n";
echo "MULTIPLICAR\n";
echo $calc->getA()." * ". $calc->getB()." = ".$calc->multiplicar(10, 2)."\n\n";
echo "DIVIDIR\n";
echo $calc->getA()." / ". $calc->getB()." = ".$calc->dividir(10, 2)."\n\n";
echo "Test división por cero\n\n";
$calcInv = new Calculadora(10, 0);
echo $calcInv->getA()." / ". $calcInv->getB()." = ".$calcInv->dividir(10, 0)."\n\n";
$calcDecimal = new Calculadora(10.5, 2.5);
echo "SUMAR DECIMAL\n"; 
echo $calcDecimal->getA()." + ". $calcDecimal->getB()." = ".$calcDecimal->sumar(10.5, 2.5)."\n\n";
echo "RESTAR DECIMAL\n";
echo $calcDecimal->getA()." - ". $calcDecimal->getB()." = ".$calcDecimal->restar(10.5, 2.5)."\n\n";
echo "MULTIPLICAR DECIMAL\n";
echo $calcDecimal->getA()." * ". $calcDecimal->getB()." = ".$calcDecimal->multiplicar(10.5, 2.5)."\n\n";
echo "DIVIDIR DECIMAL\n";
echo $calcDecimal->getA()." / ". $calcDecimal->getB()." = ".$calcDecimal->dividir(10.5, 2.5)."\n\n";


?>


