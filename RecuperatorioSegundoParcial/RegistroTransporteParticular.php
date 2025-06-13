<?php
class RegistroTransporteParticular extends RegistroVehiculo {
    
    public function __construct($patente) {
        parent::__construct($patente);
    }


    public function valorPeaje() {
        return parent::valorPeaje();
    }
}