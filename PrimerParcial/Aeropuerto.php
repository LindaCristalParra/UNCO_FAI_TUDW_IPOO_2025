<?php

/**Se registra la siguiente información: 
 * denominación, dirección y la colección de aerolíneas que arriban a el */
class Aeropuerto
{
    private string $denominacion;
    private string $direccion;
    /** @var Aerolinea[] */
    private array $aerolineas = [];

    public function __construct(string $denominacion, string $direccion, array $aerolineas = [])
    {
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->aerolineas = $aerolineas;
    }

    public function getDenominacion(): string
    {
        return $this->denominacion;
    }

    public function getDireccion(): string
    {
        return $this->direccion;
    }
    public function getAerolineas(): array
    {
        return $this->aerolineas;
    }
    public function setDenominacion(string $denominacion): void
    {
        $this->denominacion = $denominacion;
    }
    public function setDireccion(string $direccion): void
    {
        $this->direccion = $direccion;
    }
    public function setAerolineas(array $aerolineas): void
    {
        $this->aerolineas = $aerolineas;
    }

    public function __toString()
    {
        $output = "═══════════════════════════════════\n";
        $output .= "           AEROPUERTO            \n";
        $output .= "═══════════════════════════════════\n";
        $output .= "Denominación: {$this->getDenominacion()}\n";
        $output .= "Dirección: {$this->getDireccion()}\n";
        $output .= "Aerolineas: \n";
        if (!empty($this->getAerolineas())) {
            foreach ($this->getAerolineas() as $aerolinea) {
                $output .= $aerolinea->__toString();
            }
        } else {
            $output .= "No hay aerolíneas registradas.\n";
        }
        $output .= "═══════════════════════════════════\n";
        return $output;
    }

    /**Implementar el método retornarVuelosAerolinea que recibe por parámetro una aerolínea 
     * y retorna todos los vuelos asignados a esa aerolínea. */

    public function retornarVuelosAerolinea(Aerolinea $aerolinea): ?array
    {
        $vuelos = null;
        $colAerolineas = $this->getAerolineas();
        $totalAerolineas = count($colAerolineas);
        $cont = 0;
        while ($vuelos == null && $cont < $totalAerolineas) {
            if ($colAerolineas[$cont]->getIdentificacion() == $aerolinea->getIdentificacion()) {
                $vuelos = $aerolinea->getVuelosProgramados();
            }
            $cont++;
        }
        return $vuelos;
    }

    /**Implementar el método ventaAutomatica que recibe por parámetro la cantidad de asientos, 
     * una fecha y un destino y el aeropuerto realiza automáticamente la asignación al vuelo. 
     * Para la implementación de este método debe utilizarse uno de los métodos implementados en la clase Vuelo.  */
    public function ventaAutomatica(int $asientos, DateTime $fecha, string $destino): ?Vuelo
    {
        $vueloDisponible = null;
        $colAerolineas = $this->getAerolineas();
        $totalAerolineas = count($colAerolineas);
        $cont = 0;
        while ($vueloDisponible == null && $cont < $totalAerolineas) {

            $vuelosAerolinea = $colAerolineas[$cont]->darVueloADestino($destino, $asientos);
            if (!empty($vuelosAerolinea)) {
                $vueloDisponible = $colAerolineas[$cont]->venderVueloADestino($destino, $asientos, $fecha);
            }
        }
        $cont++;
        $vueloDisponible->setAsientosDisponibles($vueloDisponible->getAsientosDisponibles() - $asientos);

        return $vueloDisponible;
    }

    /**Implementar en la clase Aeropuerto el método promedioRecaudadoXAerolinea,  
     * que recibe por parámetro la identificación de una Aerolínea y 
     * retorna el promedio de lo recaudado por esa Aerolínea en ese Aeropuerto. */
    public function promedioRecaudadoXAerolinea(int $identificacion): float
    {
        $promedio = 0;
        $colAerolineas = $this->getAerolineas();
        $cont = 0;
        while ($promedio != 0 && $cont < count($colAerolineas)) {
            if ($colAerolineas[$cont]->getIdentificacion() == $identificacion) {
                $promedio = $colAerolineas[$cont]->montoPromedioRecaudado();
            }
            $cont++;
        }
        return $promedio;
    }
}
?>
