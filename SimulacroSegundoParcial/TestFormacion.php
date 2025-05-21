<?php
// 1. Se crea un objeto locomotora con un peso de 188 toneladas y una velocidad de 140 km/h.
$objLocomotora = new Locomotora(188000, 140);

// 2. Se crea 3 objetos vagones.
$vagon1 = new VagonPasajero(2000, 20, 3, 15000, 30, 25);
$vagonCarga = new VagonCarga(2000, 20, 3, 15000, 60000, 55000, 0.2);
$vagon = new VagonPasajero(2000, 20, 3, 15000, 50, 50);

// 3. Se crea un objeto formación que tiene la locomotora y los vagones creados en (1) y (2) usando el método
// incorporarVagonFormacion.
$objFormacion = new Formacion( $objLocomotora, 3, []);
$objFormacion->incorporarVagonFormacion($vagon1);
$objFormacion->incorporarVagonFormacion($vagonCarga);   
$objFormacion->incorporarVagonFormacion($vagon);

// 4. Invocar al método incorporarPasajeroFormacion con el parámetros cantidad de pasajero = 6 y
// visualizar el resultado.
$objFormacion->incorporarPasajeroFormacion(6);
echo $objFormacion->__tostring();

// 5. Realizar un print de los 3 objetos vagones creados.
echo $vagon1->__tostring();
echo $vagon2->__tostring();
echo $vagon3->__tostring();

// 6. Invocar al método incorporarPasajeroFormacion con el parámetros cantidad de pasajero = 14 y
// visualizar el resultado
$objFormacion->incorporarPasajeroFormacion(14);
echo $objFormacion->__tostring();

// 7. Realizar un print del objeto locomotora
echo $objLocomotora->__tostring();

// 8. Invocar al método promedioPasajeroFormacion y visualizar el resultado obtenido.
echo $objFormacion->promedioPasajerosFormacion();

// 9. Invocar al método pesoFormacion y visualizar el resultado obtenido
echo $objFormacion->pesoFormacion();

// 10. Realizar un print de los 3 objetos vagones creados.
echo $vagon1->__tostring();
echo $vagon2->__tostring();
echo $vagon3->__tostring();


