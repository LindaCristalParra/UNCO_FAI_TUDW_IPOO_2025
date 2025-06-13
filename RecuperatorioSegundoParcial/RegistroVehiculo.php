<?php
class RegistroVehiculo {
    private $patente;

    public function __construct($patente) {
        $this->patente = $patente;
    }

    public function getPatente() {
        return $this->patente;
    }

    public function setPatente($patente) {
        $this->patente = $patente;
    }

    public function __toString(): string {
        return "Patente: " . $this->getPatente();
    }

    // Por defecto el valor base del peaje es de $20
    public function valorPeaje() {
        $valorPorDefecto = 20;
        return $valorPorDefecto;
    }

}