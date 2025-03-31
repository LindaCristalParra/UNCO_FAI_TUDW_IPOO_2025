<?php

include 'Reloj.php';
$test = new Reloj(23, 59, 0);
echo "HORA ACTUAL: ".$test->__toString()."\n";
echo "HORA: ".$test->getHora() . "\n";
echo "MUNUTOS: ".$test->getMinuto() . "\n";
echo "SEGUNDOS: ".$test->getSegundo() . "\n\n";
$test->incremento();
echo "--incremento 1\n";
echo $test->getHora() . "\n";
echo $test->getMinuto() . "\n";
echo $test->getSegundo() . "\n";

echo "\n--contador\n";
$test->contador();

echo "--puesta a cero\n";
$test->puesta_a_cero(); 
echo "HORA: ".$test->getHora() . "\n";
echo "MINUTO: ".$test->getMinuto() . "\n";
echo "SEGUNDO: ".$test->getSegundo() . "\n";
echo "--toString\n";
echo $test->__toString();