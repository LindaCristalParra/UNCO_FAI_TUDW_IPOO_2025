<?php
/**En la clase Vuelo:

Se registra la siguiente información: número, importe, fecha, destino, hora arribo, hora partida, cantidad asientos totales y disponibles, y una referencia a la persona responsable del vuelo. 

Se cuenta con la implementación de:

 un Método constructor que recibe como parámetros los valores iniciales para los atributos definidos en la clase.
los métodos de acceso de cada uno de los atributos de la clase. */

class Vuelo{
    private int $numero;
    private float $importe;
    private date $fecha;
    private string $destino;
    private date $horaArribo;
    private date $horaPartida;
    private int $asientosTotales;
    private int $asientosDisponibles;
    private Persona $responsable;

    public function __construct(int $numero, 
                                float $importe, 
                                date $fecha, 
                                string $destino, 
                                date $horaArribo, 
                                date $horaPartida, 
                                int $asientosTotales, 
                                int $asientosDisponibles, 
                                Persona $responsable)
        {
        $this->numero = $numero;
        $this->importe = $importe;
        $this->fecha = $fecha;
        $this->destino = $destino;
        $this->horaArribo = $horaArribo;
        $this->horaPartida = $horaPartida;
        $this->asientosTotales = $asientosTotales;
        $this->asientosDisponibles = $asientosDisponibles;
        $this->responsable = $responsable;
    }

    public function getNumero(): int{
        return $this->numero;
    }
    public function getImporte(): float{
        return $this->importe;
    }
    public function getFecha(): date{
        return $this->fecha;
    }
    public function getDestino(): string{
        return $this->destino;
    }
    public function getHoraArribo(): date{
        return $this->horaArribo;
    }
    public function getHoraPartida(): date{
        return $this->horaPartida;
    }
    public function getAsientosTotales(): int{
        return $this->asientosTotales;
    }
    public function getAsientosDisponibles(): int{
        return $this->asientosDisponibles;
    }
    public function getResponsable(): Persona{
        return $this->responsable;
    }
    public function setNumero(int $numero): void{
        $this->numero = $numero;
    }
    public function setImporte(float $importe): void{
        $this->importe = $importe;
    }
    public function setFecha(date $fecha): void{
        $this->fecha = $fecha;
    }
    public function setDestino(string $destino): void{
        $this->destino = $destino;
    }
    public function setHoraArribo(date $horaArribo): void{
        $this->horaArribo = $horaArribo;
    }
    public function setHoraPartida(date $horaPartida): void{
        $this->horaPartida = $horaPartida;
    }
    public function setAsientosTotales(int $asientosTotales): void{
        $this->asientosTotales = $asientosTotales;
    }
    public function setAsientosDisponibles(int $asientosDisponibles): void{
        $this->asientosDisponibles = $asientosDisponibles;
    }
    public function setResponsable(Persona $responsable): void{
        $this->responsable = $responsable;
    }
    public function __toString(): string {
        $output = "═══════════════════════════════════\n";
        $output .= "               VUELO         \n";
        $output .= "═══════════════════════════════════\n";
        $output .= "Número: {$this->getNumero()}\n";
        $output .= "Importe: {$this->getImporte()}\n";
        $output .= "Fecha: {$this->getFecha()}\n";
        $output .= "Destino: {$this->getDestino()}\n";
        $output .= "Hora Arribo: {$this->getHoraArribo()}\n";
        $output .= "Hora Partida: {$this->getHoraPartida()}\n";
        $output .= "Asientos Totales: {$this->getAsientosTotales()}\n";
        $output .= "Asientos Disponibles: {$this->getAsientosDisponibles()}\n";
        $output .= "Responsable: {$this->getResponsable()->__toString()}\n";
        $output .= "═══════════════════════════════════\n";
        return $output;
    }
}
?>
