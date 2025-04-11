<?php

require_once "Cliente.php";
require_once "Moto.php";
require_once "Empresa.php";
require_once "Venta.php";
echo"Comienzo de test empresa\n\n";
echo"-----------------------\n\n";
echo"--Consigna 1\n\n";
echo "Cree 2 instancias de la clase Cliente: $ objCliente1, $ objCliente2 \n\n";
$objCliente1 = new Cliente("Juan", "Pérez","DNI", 12345678, true);
$objCliente2 = new Cliente( "Ana", "Gómez", "DNI",87654321, true);
echo "Cliente 1 - ".$objCliente1->__toString().". \n";

echo "Cliente 2 - ".$objCliente2->__toString().". \n\n";
echo"-----------------------\n\n";

echo"--Consigna 2\n\n";
echo "Cree 3 objetos Motos con la información visualizada en la tabla: código, costo, año fabricación, descripción, porcentaje incremento anual, activo. \n";
echo"\n\n";
$objMoto1 = new Moto(11, 2230000, 2022, "Benelli Imperiale 400 ", 0.85, true);
$objMoto2 = new Moto(12,584000,2021, "Zanella Zr 150 Ohc ", 0.70, true);
$objMoto3 = new Moto(13,999900, 2023,"Zanella Patagonian Eagle 250 ", 0.55, false);
echo "Moto 1\n ".$objMoto1->__toString()."\n\n";
echo "Moto 2\n ".$objMoto2->__toString()."\n\n";  
echo "Moto 3\n ".$objMoto3->__toString()."\n\n"; 
echo"-----------------------\n\n";

echo"--Consigna 3\n\n";
echo "Cree un objeto Empresa con la siguiente información: denominación =” Alta Gama”, dirección= “Av Argenetina 123”, colección de motos= [$ obMoto1, $ obMoto2, $ obMoto3] , colección de clientes = [$ objCliente1, $ objCliente2 ], la colección de ventas realizadas=[]\n\n";
$objEmpresa = new Empresa("Alta Gama", "Av Argentina 123",  [$objCliente1, $objCliente2], [$objMoto1, $objMoto2, $objMoto3],[]);
echo "Empresa 1\n ".$objEmpresa->__toString()."\n\n";

echo"Invocar al método registrarVenta($ colCodigosMoto, $ objCliente) de la Clase Empresa donde el $ objCliente es una referencia a la clase Cliente almacenada en la variable $ objCliente2 (creada en el
punto 1) y la colección de códigos de motos es la siguiente [11,12,13]. Visualizar el resultado obtenido.
\n";
echo $objEmpresa->registrarVenta([11,12,13], $objCliente2);
