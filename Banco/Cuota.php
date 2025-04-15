<?php
class Cuota
{
    private int $numero;
    private float $monto_cuota;
    private float $monto_interes;
    private bool $cancelada = false;

    public function __construct(int $numero, float $monto_cuota, float $monto_interes)
    {
        $this->numero = $numero;
        $this->monto_cuota = $monto_cuota;
        $this->monto_interes = $monto_interes;
    }

    public function getNumero(): int
    {
        return $this->numero;
    }

    public function getMontoCuota(): float
    {
        return $this->monto_cuota;
    }

    public function getMontoInteres(): float
    {
        return $this->monto_interes;
    }

    public function isCancelada(): bool
    {
        return $this->cancelada;
    }

    public function setNúmero(int $numero): void
    {
        $this->numero = $numero;
    }

    public function setMontoCuota(float $monto_cuota): void
    {
        $this->monto_cuota = $monto_cuota;
    }

    public function setMontoInteres(float $monto_interes): void
    {
        $this->monto_interes = $monto_interes;
    }

    public function setCancelada(bool $cancelada): void
    {
        $this->cancelada = $cancelada;
    }

    public function __toString(): string
    {
        $output = "═══════════════════════════════════\n";
        $output .= "               CUOTA         \n";
        $output .= "═══════════════════════════════════\n";
        $output .= "Número cuota: {$this->getNumero()}\n";
        $output .= "Monto: {$this->getMontoCuota()}\n";
        $output .= "Monto Interes: {$this->getMontoInteres()}\n";
        $output .= "Cancelada: " . ($this->isCancelada() ? "Si" : "No") . "\n";

        return $output;
    }

    public function darMontoFinalCuota(): float
    {
        return $this->getMontoCuota() + $this->getMontoInteres();
    }
}
?>
