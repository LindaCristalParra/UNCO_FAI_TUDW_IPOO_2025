<?php
class VagonPasajero extends Vagon
{
    private int $cantidadMaxpasajeros;
    private int $cantPasajeros;
    private float $pesoPromPasajero;

    public function __construct($anioInstalacion, $largo, $ancho, $pesoVagonVacio, $cantidadMaxpasajeros, $cantPasajeros, $pesoPromPasajero=50)
    {
        parent::__construct($anioInstalacion, $largo, $ancho, $pesoVagonVacio);
        $this->cantidadMaxpasajeros = $cantidadMaxpasajeros;
        $this->cantPasajeros = $cantPasajeros;
        $this->pesoPromPasajeros = $pesoPromPasajeros;
    }

    public function getCantidadMaxpasajeros(): int
    {
        return $this->cantidadMaxpasajeros;
    }

    public function getCantPasajeros(): int
    {
        return $this->cantPasajeros;
    }

    public function getPesoPromPasajeros(): float
    {
        return $this->pesoPromPasajeros;
    }

    public function setCantidadMaxpasajeros($cantidadMaxpasajeros): void
    {
        $this->cantidadMaxpasajeros = $cantidadMaxpasajeros;
    }

    public function setCantPasajeros($cantPasajeros): void
    {
        $this->cantPasajeros = $cantPasajeros;
    }

    public function setPesoPromPasajeros($pesoPromPasajeros): void
    {
        $this->pesoPromPasajeros = $pesoPromPasajeros;
    }

    public function __toString(): string
    {
        $output = parent::__toString(). "\n";
        $output = "Cantidad Maxima de Pasajeros: " . $this->getCantidadMaxpasajeros() . "\n" ;
        $output = "Cantidad de Pasajeros: " . $this->getCantPasajeros() . "\n" .
        $output = "Peso Promedio de Pasajeros: " . $this->getPesoPromPasajeros() . "\n";

        return $output;
    }

    public function calcularPesoVagon(): float
    {
        $pesoVagon = $this->getPesoVagonVacio() + ($this->getPesoPromPasajeros() * $this->getCantPasajeros());
        return $pesoVagon;
    }

    public function incorporarPasajeVagon(): bool
    {
        $incorporado = false;
        if ($this->getCantPasajeros() < $this->getCantidadMaxpasajeros()) {
            $this->setCantPasajeros($this->getCantPasajeros() + 1);
            $incorporado = true;
        } 
        return $incorporado;
    }       

}

?>