<?php
require_once "Vagon.php";
class VagonPasajero extends Vagon
{
    private int $cantidadMaxpasajeros;
    private int $cantPasajeros;
    private float $pesoPromPasajero;

    public function __construct($anioInstalacion, 
                                $largo, 
                                $ancho, 
                                $pesoVagonVacio, 
                                $cantidadMaxpasajeros, 
                                $cantPasajeros, 
                                $pesoPromPasajero = 50)
    {
        parent::__construct($anioInstalacion, $largo, $ancho, $pesoVagonVacio);
        $this->cantidadMaxpasajeros = $cantidadMaxpasajeros;
        $this->cantPasajeros = $cantPasajeros;
        $this->pesoPromPasajero = $pesoPromPasajero;
    }

    public function getCantidadMaxpasajeros(): int
    {
        return $this->cantidadMaxpasajeros;
    }

    public function getCantPasajeros(): int
    {
        return $this->cantPasajeros;
    }

    public function getPesoPromPasajero(): float
    {
        return $this->pesoPromPasajero;
    }

    public function setCantidadMaxpasajeros($cantidadMaxpasajeros): void
    {
        $this->cantidadMaxpasajeros = $cantidadMaxpasajeros;
    }

    public function setCantPasajeros($cantPasajeros): void
    {
        $this->cantPasajeros = $cantPasajeros;
    }

    public function setPesoPromPasajero($pesoPromPasajeros): void
    {
        $this->pesoPromPasajero = $pesoPromPasajeros;
    }

    public function __toString(): string
    {
        $output = "Vagón Persona:\n";
        $output .= "Cantidad Maxima de Pasajeros: " . $this->getCantidadMaxpasajeros() . "\n";
        $output .= "Cantidad de Pasajeros: " . $this->getCantPasajeros() . "\n" .
        $output .= "Peso Promedio de Pasajeros: " . $this->getPesoPromPasajero() . "\n";

        return $output;
    }

    public function calcularPesoVagon(): float
    {
        $pesoVagon = $this->getPesoVagonVacio() + ($this->getPesoPromPasajero() * $this->getCantPasajeros());
        return $pesoVagon;
    }

    public function incorporarPasajeVagon(int $pasajero): bool
    {
        $incorporado = false;
        if ($this->getCantPasajeros() < $this->getCantidadMaxpasajeros()) {
            $this->setCantPasajeros($this->getCantPasajeros() + $pasajero);
            $incorporado = true;
        }
        return $incorporado;
    }

}

?>