<?php 

require_once 'Contrato.php';
class ContratoWeb extends Contrato {

    private float $porcentajeDescuento;

    public function __construct(DateTime $fechaInicio, 
                                DateTime $fechaVencimiento, 
                                Plan $planContrato, 
                                string $estado, 
                                float $costo, 
                                bool $renueva, 
                                Cliente $cliente) {
        parent::__construct($fechaInicio, $fechaVencimiento, $planContrato, $estado, $costo, $renueva, $cliente);
        $this->porcentajeDescuento = 0.1; // 10% de descuento por defeccto
    }

    public function getPorcentajeDescuento(): float {
        return $this->porcentajeDescuento;
    }

    public function setPorcentajeDescuento(float $porcentajeDescuento): void {
        $this->porcentajeDescuento = $porcentajeDescuento;
    }

    public function __toString() {
        $output = parent::__toString();
        $output .= "Porcentaje de Descuento: " . ($this->getPorcentajeDescuento() * 100) . "%\n";
        $output .= "Costo con Descuento: " . $this->calcularCosto() . "\n";
        return $output;
    }

    public function calcularCosto(): float {
        $costoBase = $this->getCosto();
        $descuento = $costoBase * $this->porcentajeDescuento;
        return $costoBase - $descuento;
    }
}

?>