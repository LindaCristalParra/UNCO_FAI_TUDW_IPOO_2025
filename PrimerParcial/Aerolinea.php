<?php

/**En la clase Aerolíneas se registra la siguiente información: 
 * identificación, nombre y la colección de vuelos programados */

class Aerolínea
{
    private string $identificacion;
    private string $denominacion;
    /** @var Vuelo[] */
    private array $vuelosProgramados = [];

    public function __construct(string $identificacion, string $denominacion, array $vuelosProgramados = [])
    {
        $this->identificacion = $identificacion;
        $this->denominacion = $denominacion;
        $this->vuelosProgramados = $vuelosProgramados;
    }

    public function getIdentificacion(): string
    {
        return $this->identificacion;
    }
    public function getDenominacion(): string
    {
        return $this->denominacion;
    }
    public function getVuelosProgramados(): array
    {
        return $this->vuelosProgramados;
    }
    public function setIdentificacion(string $identificacion): void
    {
        $this->identificacion = $identificacion;
    }
    public function setDenominacion(string $denominacion): void
    {
        $this->denominacion = $denominacion;
    }
    public function setVuelosProgramados(array $vuelosProgramados): void
    {
        $this->vuelosProgramados = $vuelosProgramados;
    }

    public function __toString(): string
    {
        $output = "═══════════════════════════════════\n";
        $output .= "           AEROLÍNEA            \n";
        $output .= "═══════════════════════════════════\n";
        $output .= "Identificación: {$this->getIdentificacion()}\n";
        $output .= "Denominación: {$this->getDenominacion()}\n";
        $output .= "Vuelos Programados: \n";
        if (!empty($this->getVuelosProgramados())) {
            foreach ($this->getVuelosProgramados() as $vuelo) {
                $output .= $vuelo->__toString();
            }
        } else {
            $output .= "No hay vuelos programados.\n";
        }
        $output .= "═══════════════════════════════════\n";
        return $output;
    }

    /**Se debe implementar el método  darVueloADestino que recibe por parámetro un destino junto a una cantidad de asientos libres 
     * y se debe retornar una colección con los vuelos disponibles a ese destino. */
    public function darVueloADestino(string $destino, int $asientosLibres): array
    {
        $vuelosDisponibles = [];
        foreach ($this->getVuelosProgramados() as $vuelo) {
            if ($vuelo->getDestino() === $destino && $vuelo->getAsientosDisponibles() >= $asientosLibres) {
                array_push($vuelosDisponibles, $vuelo);
            }
        }
        return $vuelosDisponibles;
    }

    /**Implementar en la clase Aerolinea el método incorporarVuelo que recibe como parámetro un vuelo, 
     * verifica que no se encuentre registrado ningún otro vuelo al mismo destino, en la misma fecha y con el mismo horario de partida.
     * El método debe retornar verdadero si la incorporación del vuelo se realizó correctamente y falso en caso contrario. */

     public function incorporarVuelo(Vuelo $vuelo): bool
     {
        $incorporado = false;
        $vuelosProgramados = $this->getVuelosProgramados();
        $fechaVuelo = $vuelo->getFecha()->format('Y-m-d');
        $horaPartidaVuelo = $vuelo->getHoraPartida()->format('H:i:s');
        $destinoVuelo = $vuelo->getDestino();
        // Verificar si ya existe un vuelo programado con la misma fecha, hora de partida y destino
        foreach($vuelosProgramados as $vueloProgramado){
            $fechaVueloProgramado = $vueloProgramado->getFecha()->format('Y-m-d');
            $horaPartidaVueloProgramado = $vueloProgramado->getHoraPartida()->format('H:i:s');
            $destinoVueloProgramado = $vueloProgramado->getDestino();
            if($fechaVuelo != $fechaVueloProgramado && 
                $horaPartidaVuelo != $horaPartidaVueloProgramado && 
                $destinoVuelo != $destinoVueloProgramado){
                $incorporado = true;
            }            
        }
        if($incorporado){
            array_push($vuelosProgramados, $vuelo);
            $this->setVuelosProgramados($vuelosProgramados);
        }
        return $incorporado;
     }
}
