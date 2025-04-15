<?php
class Prestamo
{
    private int $identificacion;
    private DateTime $fecha_otorgamiento;
    private float $monto;
    private int $cantidad_de_cuotas;
    /** @var Cuota[] */
    private array $cuotas = [];
    private float $taza_interes;
    private Persona $persona;

    public function __construct(
        int $identificacion,
        float $monto,
        int $cantidad_de_cuotas,
        float $taza_interes,
        Persona $persona
    ) {
        $this->identificacion = $identificacion;
        $this->monto = $monto;
        $this->cantidad_de_cuotas = $cantidad_de_cuotas;
        $this->taza_interes = $taza_interes;
        $this->persona = $persona;
    }

    public function getIdentificacion(): int
    {
        return $this->identificacion;
    }

    public function getFechaOtorgamiento(): DateTime
    {
        return $this->fecha_otorgamiento;
    }

    public function getMonto(): float
    {
        return $this->monto;
    }

    public function getCantidadDeCuotas(): int
    {
        return $this->cantidad_de_cuotas;
    }
    public function getCuotas(): array
    {
        return $this->cuotas;
    }

    public function getTazaInteres(): float
    {
        return $this->taza_interes;
    }

    public function getPersona(): Persona
    {
        return $this->persona;
    }

    public function setIdentificacion(int $identificacion): void
    {
        $this->identificacion = $identificacion;
    }

    public function setFechaOtorgamiento(DateTime $fecha_otorgamiento): void
    {
        $this->fecha_otorgamiento = $fecha_otorgamiento;
    }

    public function setMonto(float $monto): void
    {
        $this->monto = $monto;
    }

    public function setCantidadDeCuotas(int $cantidad_de_cuotas): void
    {
        $this->cantidad_de_cuotas = $cantidad_de_cuotas;
    }

    public function setCuotas(array $cuotas): void
    {
        $this->cuotas = $cuotas;
    }

    public function setTazaInteres(float $taza_interes): void
    {
        $this->taza_interes = $taza_interes;
    }

    public function setPersona(Persona $persona): void
    {
        $this->persona = $persona;
    }
    public function __toString(): string
    {
        $output = "═══════════════════════════════════\n";
        $output .= "          PRESTAMO         \n";
        $output .= "═══════════════════════════════════\n";
        $output .= "Identificación: {$this->getIdentificacion()}\n";
        $output .= "Monto: {$this->getMonto()}\n";
        $output .= "Cantidad de Cuotas: {$this->getCantidadDeCuotas()}\n";
        $output .= "\CUOTAS:\n";
        $output .= "-----------------------------------\n";
        $output .= $this->convertirAstring($this->getCuotas()) . "\n";
        $output .= "Persona:{$this->getPersona()} \n";

        return $output;
    }

    private function convertirAstring(array $miArray): string
    {
        $output = "";
        if (empty($miArray)) {
            $output .= "No hay elementos.\n";
        } else {
            foreach ($miArray as $i => $objeto) {
                $output .= "#" . ($i + 1) . ":\n";
                $output .= $objeto . "\n";
            }
        }
        return $output;
    }

    private function calcularInteresPrestamo(int $numCuota): float
    {
        $interesCuota = ($this->getMonto() - (($this->getMonto() / count($this->getCuotas())) * ($numCuota - 1))) * $this->getTazaInteres() / 0.01;
        return $interesCuota;
    }

    public function otorgarPrestamo():void
    {
        $this->setFechaOtorgamiento(new DateTime());
        for ($i = 1; $i <= $this->getCantidadDeCuotas(); $i++) {            
            $cuota = new Cuota($i, ($this->getMonto()/$this->getCantidadDeCuotas()) , $this->calcularInteresPrestamo($i));
            $this->cuotas[] = $cuota;
        }
        $this->setCuotas($this->cuotas);
    }

    public function darSiguienteCuotaPagar(): ?Cuota
    {
        foreach ($this->getCuotas() as $cuota) {
            if (!$cuota->isCancelada()) {
                return $cuota;
            }
        }
        return null;
    }
}
?>
