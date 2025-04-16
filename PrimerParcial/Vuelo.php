<?php
/**En la clase Vuelo:

Se registra la siguiente información: número, importe, fecha, destino, hora arribo, hora partida, cantidad asientos totales y disponibles, y una referencia a la persona responsable del vuelo. 

Se cuenta con la implementación de:

 un Método constructor que recibe como parámetros los valores iniciales para los atributos definidos en la clase.
los métodos de acceso de cada uno de los atributos de la clase. */

class Vuelo{
    private int $numero;
    private float $importe;
    private DateTime $fecha;
    private string $destino;
    private DateTime $horaArribo;
    private DateTime $horaPartida;
    private int $asientosTotales;
    private int $asientosDisponibles;
    private Persona $responsable;

    public function __construct(int $numero, 
                                float $importe, 
                                DateTime $fecha, 
                                string $destino, 
                                DateTime $horaArribo, 
                                DateTime $horaPartida, 
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
    public function getFecha(): DateTime{
        return $this->fecha;
    }
    public function getDestino(): string{
        return $this->destino;
    }
    public function getHoraArribo(): DateTime{
        return $this->horaArribo;
    }
    public function getHoraPartida(): DateTime{
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
    public function setFecha(DateTime $fecha): void{
        $this->fecha = $fecha;
    }
    public function setDestino(string $destino): void{
        $this->destino = $destino;
    }
    public function setHoraArribo(DateTime $horaArribo): void{
        $this->horaArribo = $horaArribo;
    }
    public function setHoraPartida(DateTime $horaPartida): void{
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
    /**En la clase Vuelo se debe implementar el método asignarAsientosDisponibles que recibe por parámetros la cantidad 
     * de asientos que desean asignarse y de ser necesario actualizando la información del vuelo.
     * El método retorna verdadero en caso que la asignación puedo concretarse y falso en caso contrario. */
    public function asignarAsientosDisponibles(int $cantPasajeros): bool
    {
        $disponibilidad=false;
        $asientosDisponibles=$this->getAsientosDisponibles();
        if($asientosDisponibles >= $cantPasajeros){
            $disponibilidad=true;
            $asientosDisponibles-=$cantPasajeros;
            $this->setAsientosDisponibles($asientosDisponibles);
        }
        return $disponibilidad;                
    }
}
?>
