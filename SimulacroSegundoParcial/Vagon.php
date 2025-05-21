<?php

class Vagon
{
    private int $anioInstalacion;
    private float $largo;
    private float $ancho;
    private float $pesoVagonVacio;

    public function __construct($anioInstalacion, $largo, $ancho, $pesoVagonVacio)
    {
        $this->anioInstalacion = $anioInstalacion;
        $this->largo = $largo;
        $this->ancho = $ancho;
        $this->pesoVagonVacio = $pesoVagonVacio;
    }

    public function getAnioInstalacion(): int
    {
        return $this->anioInstalacion;
    }

    public function getLargo(): float
    {
        return $this->largo;
    }

    public function getAncho(): float
    {
        return $this->ancho;
    }

    public function getPesoVagonVacio(): float
    {
        return $this->pesoVagonVacio;
    }

    public function setAnioInstalacion($anioInstalacion): void
    {
        $this->anioInstalacion = $anioInstalacion;
    }

    public function setLargo($largo): void
    {
        $this->largo = $largo;
    }
    public function setAncho($ancho): void
    {
        $this->ancho = $ancho;
    }
    public function setPesoVagonVacio($pesoVagonVacio): void
    {
        $this->pesoVagonVacio = $pesoVagonVacio;
    }
    public function __toString(): string
    {

        $output = "Año de Instalación: " . $this->getAnioInstalacion() . "\n" ;
        $output = "Largo: ". $this->getLargo() ."\n";        
        $output = "Ancho: " . $this->getAncho() . "\n" ;
        $output = "Peso del Vagón Vacío: " . $this->getPesoVagonVacio() . "\n";

        return $output;
    }

    public function calcularPesoVagon(): float
    {
        $peso = $this->pesoVagonVacio;
        return $peso;
    }
}
?>