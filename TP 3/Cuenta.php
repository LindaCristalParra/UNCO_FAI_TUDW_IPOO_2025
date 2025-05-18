<?php
class Cuenta {

    private int $nroCuenta;
    private float $saldo;
    private Cliente $cliente;

    public function __construct(int $nroCuenta, float $saldo, Cliente $cliente) {
        $this->nroCuenta = $nroCuenta;
        $this->saldo = $saldo;
        $this->cliente = $cliente;
    }

    public function getNroCuenta(): int {
        return $this->nroCuenta;
    }
    
    public function getSaldo(): float {
        return $this->saldo;
    }

    public function getCliente(): Cliente {
        return $this->cliente;
    }

    public function setNroCuenta(int $nroCuenta): void {
        $this->nroCuenta = $nroCuenta;
    }

    public function setSaldo(float $saldo): void {
        $this->saldo = $saldo;
    }

    public function setCliente(Cliente $cliente): void {
        $this->cliente = $cliente;
    }

    public function __toString(): string {
        $cadena = "Número de Cuenta: " . $this->getNroCuenta() . "\n";
        $cadena .= "Saldo: " . $this->getSaldo() . "\n";
        $cadena .= "Cliente: " . $this->getCliente()->__toString() . "\n";
        return $cadena;
    }

    public function saldoCuenta(){
        return $this->getSaldo();
    }

    public function reailizarDeposito(float $monto): bool {

        $depositado=false;

        if ($monto > 0) {
            $this->setSaldo($this->getSaldo() + $monto);
            $depositado=true;
        } 

        return $depositado;
    }

    public function realizarRetiro(float $monto): bool {

        $extraido=false;

        if ($monto > 0 && $this->getSaldo() >= $monto) {
            $this->setSaldo($this->getSaldo() - $monto);
            $extraido=true;
        } 

        return $extraido;
    }
}
?>