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

    public function actualizarEstadoContrato()
    {
        //(al día, moroso, suspendido, finalizado) 
        // Un contrato se considera en estado moroso cuando su fecha de vencimiento ha sido superada, 
        // en caso de que pasen 10 días al vencimiento el estado cambiará de moroso a suspendido; 
        // caso contrario el contrato se encuentra al día. 
        // Antes de que un cliente realice un pago se debe verificar su estado.

        $dias = $this->diasContratoVencido($this);

        if ($dias <= 0) {
            $this->setEstado('al día');
        } elseif ($dias > 0 && $dias <= 10) {
            $this->setEstado('moroso');
        } elseif ($dias > 10 && $dias <= 30) {
            $this->setEstado('suspendido');
        } else {
            $this->setEstado('finalizado');
        }
    }

    private function diasContratoVencido($this): int
    {
        $diasVencido = 0;

        //calcula dias vencidos
        $fechaActual = new DateTime();
        $fechaVencimiento = $$this->getFechaVencimiento();
        if ($fechaActual > $fechaVencimiento) {
            $intervalo = $fechaActual->diff($fechaVencimiento);
            $diasVencido = $intervalo->days;
        }

        return $diasVencido;
    }

    public function calcularImporte(): float
    {
        // El costo del contrato es el costo del plan contratado
        $importePlan = $this->getPlanContrato()->getImporte();
        if ($this->getEstado() === 'moroso') {
            // Si el contrato está moroso, se aplica un recargo del 10%
            $recargo = $importePlan * 0.10;
            $importePlan = +$recargo;
        }
        $this->setCosto($importePlan);

        return $importePlan;

    }

}

?>