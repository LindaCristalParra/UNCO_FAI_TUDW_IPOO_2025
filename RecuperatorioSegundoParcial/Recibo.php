<?php

// Implementar dentro de la clase  Recibo , la definición de las variables instancias y el método contructor.

// class Recibo{ 

// # Definir cada var instancia.

// #  Definir método constructor
class Recibo {
    private $nroRecibo;
    private $valor;
    private $fecha;
    private $hora;
    private $refRegistroVehiculo;

    public function __construct($nroRecibo, $valor, $fecha, $hora, $refRegistroVehiculo) {
        $this->nroRecibo = $nroRecibo;
        $this->valor = $valor;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->refRegistroVehiculo = $refRegistroVehiculo;
    }

}
?>