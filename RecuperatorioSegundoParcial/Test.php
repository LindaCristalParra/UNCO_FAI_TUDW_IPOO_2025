<?php

$cabinaPeaje = new CabinaPeaje();

$camion = new RegistroCamion("ABC123", 15000, 3);
$peajeCamion = $camion->valorPeaje();
echo "Peaje Camión: $peajeCamion\n";

$transporteEscolar = new RegistroTransporteEscolar("DEF456", 20);
$peajeTransporteEscolar = $transporteEscolar->valorPeaje();
echo "Peaje Transporte Escolar: $peajeTransporteEscolar\n";

$vehiculoParticular = new RegistroVehiculo("GHI789");
$peajeVehiculoParticular = $vehiculoParticular->valorPeaje();
echo "Peaje Vehículo Particular: $peajeVehiculoParticular\n";

$reciboCamion = $cabinaPeaje->cobrarPeaje("camion", [
    "patente" => "ABC123",
    "peso" => 15000,
    "cantidadEjes" => 3
]);
echo "Recibo Camión: " . $reciboCamion . "\n"; 

$reciboMayor = $cabinaPeaje->reciboMayorMonto("15/06/2024");
echo "Recibo Mayor: " . $reciboMayor . "\n";

$totalRecaudado = $cabinaPeaje->totalRecaudado("15/06/2024");
echo "Total Recaudado: " . $totalRecaudado . "\n";