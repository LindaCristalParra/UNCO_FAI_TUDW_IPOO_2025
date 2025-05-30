<?php
class canal
{
    private DateTime $fechaInicio;
    private DateTime $fechaVencimiento;
    private Plan $planContrato;
    private string $estado;
    private float $costo;
    private bool $renueva;
    private Cliente $cliente;

    public function __construct(DateTime $fechaInicio, DateTime $fechaVencimiento, Plan $planContrato, string $estado, float $costo, bool $renueva, Cliente $cliente)
    {
        $this->fechaInicio = $fechaInicio;
        $this->fechaVencimiento = $fechaVencimiento;
        $this->planContrato = $planContrato;
        $this->estado = $estado;
        $this->costo = $costo;
        $this->renueva = $renueva;
        $this->cliente = $cliente;
    }

    public function getFechaInicio(): DateTime
    {
        return $this->fechaInicio;
    }

    public function getFechaVencimiento(): DateTime     
    {
        return $this->fechaVencimiento;
    }

    public function getPlanContrato(): Plan
    {
        return $this->planContrato;
    }

    public function getestado(): string
    {
        return $this->estado;
    }

    public function getCosto(): string
    {
        return $this->costo;
    }

    public function getrenueva(): bool
    {
        return $this->renueva;
    }

    public function getCliente(): Cliente
    {
        return $this->cliente;
    }

    public function setFechaInicio(DateTime $fechaInicio): void
    {
        $this->fechaInicio = $fechaInicio;
    }

    public function setFechaVencimiento(DateTime $fechaVencimiento): void
    {
        $this->fechaVencimiento = $fechaVencimiento;
    }

    public function setPlanContrato(Plan $planContrato): void
    {
        $this->planContrato = $planContrato;
    }

    public function setEstado(string $estado): void
    {
        $this->estado = $estado;
    }

    public function setCosto(float $costo): void
    {
        $this->costo = $costo;
    }

    public function setRenueva(bool $renueva): void
    {
        $this->renueva = $renueva;
    }

    public function setCliente(Cliente $cliente): void
    {
        $this->cliente = $cliente;
    }

    public function __toString(): string
    {
        $output = "═══════════════════════════════════\n";
        $output .= "          CONTRATO         \n";
        $output .= "═══════════════════════════════════\n";
        $output .= "Fecha de Inicio: " . $this->getFechaInicio()->format('Y-m-d') . "\n";
        $output .= "Fecha de Vencimiento: " . $this->getFechaVencimiento()->format('Y-m-d') . "\n";
        $output .= "Plan Contratado: " . $this->getPlanContrato()->getCodigo() . "\n";
        $output .= "Estado: " . $this->getestado() . "\n";
        $output .= "Costo: $" . number_format($this->getCosto(), 2) . "\n";
        $output .= "Renueva Automáticamente: " . ($this->getrenueva() ? 'Sí' : 'No') . "\n";
        $output .= "Cliente: " . $this->getCliente() . "\n"; 
        $output .= "═══════════════════════════════════\n";
        return $output;
    }

}

?>