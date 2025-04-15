<?php
class Prestamo
{
    private int $identificacion;
    private float $monto;
    private int $cantidad_de_cuotas;
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

    public function getMonto(): float
    {
        return $this->monto;
    }

    public function getCantidadDeCuotas(): int
    {
        return $this->cantidad_de_cuotas;
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

    public function setMonto(float $monto): void
    {
        $this->monto = $monto;
    }

    public function setCantidadDeCuotas(int $cantidad_de_cuotas): void
    {
        $this->cantidad_de_cuotas = $cantidad_de_cuotas;
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
        $output .= "Taza de Interés: {$this->getTazaInteres()}\n";
        //$output .= "Persona: \n";

        return $output;
    }
    private function calcularInteresPrestamo(int $numCuota)
    {
        /*TODO: Calcula intereses sobre saldo deudor.  
        Ejemplo:  
        Cuota 1: 50,000 * 0.01 = 500  
        Cuota 2: (50,000 - (50,000/5)) * 0.01 = 400 .
        */
    }
    public function otorgarPrestamo() {
        //TODO: Establece `fecha_otorgamiento` (fecha actual).  
        //Genera cuotas con `monto_cuota = monto / cantidad_de_cuotas` + intereses.
    }
    public function darSiguienteCuotaPagar(){
        //TODO: Retorna la próxima cuota no cancelada. Si todas están pagas, retorna `null`
    }
}   
