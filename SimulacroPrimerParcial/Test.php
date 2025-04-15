<?php
require_once 'Cliente.php';
echo "Hola mundo\n";
$newCliente = new Cliente("Juan", "Pérez", "DNI", 12345678, true);
echo $newCliente->__toString();