<?php
class RegistroTransporteEscolar extends RegistroVehiculo
{
    private $capMaxPasajeros;

    public function __construct($patente, $capMaxPasajeros)
    {
        parent::__construct($patente);
        $this->capMaxPasajeros = $capMaxPasajeros;
    }

    public function getCapMaxPasajeros()
    {
        return $this->capMaxPasajeros;
    }

    public function setCapMaxPasajeros($capMaxPasajeros)
    {
        $this->capMaxPasajeros = $capMaxPasajeros;
    }

    public function __toString(): string
    {
        return parent::__toString() . ", Capacidad Máxima de Pasajeros: " . $this->getCapMaxPasajeros();
    }

    // Los registros de vehículos que funcionan como transporte escolar deben pagar un monto fijo que 
    // se calcula en base a un monto base de  $25 (valor base por defecto de los transportes) 
    // por la capacidad (ej: si puede transportar hasta 10 niños el adicional de peaje es de $250).

    public function valorPeaje() {
        $valorBase=25; // Monto base por defecto para transporte escolar
        $totalPeaje = $valorBase * $this->getCapMaxPasajeros();
        return $totalPeaje;

    }
}
