<?php
class CuentaCorriente extends Cuenta {
    private float $montoDescubierto;
    
    public function __construct(int $nroCuenta, float $saldo, Cliente $cliente, float $montoDescubierto) {
        parent::__construct($nroCuenta, $saldo, $cliente);
        $this->montoDescubierto = $montoDescubierto;
    }
    
    public function getMontoDescubierto(): float {
        return $this->montoDescubierto;
    }
    
    public function setMontoDescubierto(float $montoDescubierto): void {
        $this->montoDescubierto = $montoDescubierto;
    }
    
    public function __toString(): string {
        $cadena = parent::__toString();
        $cadena .= "Tipo de Cuenta: Cuenta Corriente\n";
        return $cadena;
    }

    public function realizarRetiro(float $monto): bool {
        $retirado = false;
        $montoHabilitado = $this->getSaldo() + $this->getMontoDescubierto();
        if ($monto > 0 && $montoHabilitado >= $monto) {
            $this->setSaldo($montoHabilitado - $monto);
            $retirado = true;
        }
        return $retirado;
    }
}
?>