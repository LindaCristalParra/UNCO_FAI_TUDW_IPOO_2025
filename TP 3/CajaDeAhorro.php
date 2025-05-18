<?php
class CajaDeAhorro extends Cuenta {
    public function __construct(int $nroCuenta, float $saldo, Cliente $cliente) {
        parent::__construct($nroCuenta, $saldo, $cliente);
    }
    public function __toString(): string {
        $cadena = parent::__toString();
        $cadena .= "Tipo de Cuenta: Caja de Ahorro\n";
        return $cadena;
    }
}
?>