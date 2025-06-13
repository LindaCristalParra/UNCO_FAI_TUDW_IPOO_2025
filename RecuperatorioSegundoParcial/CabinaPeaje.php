<?php

// Implementar dentro de la clase  CabinaPeaje, la definición de las variables instancias y el método contructor.

// class CabinaPeaje { 

// # Definir cada var instacia.

// #  Definir metodo constructor
class CabinaPeaje
{
    private $colRecibos;
    private $colRegistroVehiculos;

    public function __construct()
    {
        $this->colRecibos = [];
        $this->colRegistroVehiculos = [];
    }

    public function getColRecibos()
    {
        return $this->colRecibos;
    }

    public function getColRegistroVehiculos()
    {
        return $this->colRegistroVehiculos;
    }

    public function setColRecibos($colRecibos)
    {
        $this->colRecibos = $colRecibos;
    }

    public function setColRegistroVehiculos($colRegistroVehiculos)
    {
        $this->colRegistroVehiculos = $colRegistroVehiculos;
    }

    public function __toString(): string
    {
        $output = "═══════════════════════════════════\n";
        $output .= "          CABINA PEAJE         \n";
        $output .= "═══════════════════════════════════\n";
        $output .= "Recibos: " . $this->convertirAstring($this->getColRecibos()) . "\n";
        $output .= "Registro de Vehículos: " . $this->convertirAstring($this->getColRegistroVehiculos()) . "\n";
        $output .= "═══════════════════════════════════\n";
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

    public function cobrarPeaje($unTipoRegistroVehiculo, $info)
    {
        $registroVehiculo = null;
        $vehiculosCargados = $this->getColRegistroVehiculos();
        $recibosCargados = $this->getColRecibos();

        if($unTipoRegistroVehiculo === "camion"){
            $registroVehiculo = new RegistroCamion($info["patente"], $info["peso"], $info["cantidadEjes"]);
        } elseif($unTipoRegistroVehiculo === "transporte escolar"){
            $registroVehiculo = new RegistroTransporteEscolar($info["patente"], $info["capMaxPasajeros"]);
        } elseif ($unTipoRegistroVehiculo === "vehiculo particular"){
            $registroVehiculo = new RegistroVehiculoParticular($info["patente"]);
        }

        $valorPeaje = $registroVehiculo->valorPeaje();
        $recibo = new Recibo(count($this->colRecibos) + 1, $valorPeaje, date("Y-m-d"), date("H:i:s"), $registroVehiculo);

        array_push($vehiculosCargados, $registroVehiculo);
        $this->setColRegistroVehiculos($vehiculosCargados);   

        array_push($recibosCargados, $recibo);
        $this->setColRecibos($recibosCargados);

        return $recibo;    
    }

    // Implementar en la clase CabinaPeaje el método reciboMayorMonto($fecha) 
    // que retorna el recibo con mayor valor de peaje para una fecha dada.
    public function reciboMayorMonto($fecha)
    {
        $reciboMayor = null;
        $montoMayor = 0;
        $colRecibosFecha = [];

        foreach ($this->getColRecibos() as $recibo) {
            if ($recibo->getFecha() === $fecha) {
                array_push($colRecibosFecha, $recibo);
            }
        }

        foreach ($colRecibosFecha as $recibo) {
            if ($recibo->getMonto() > $montoMayor) {
                $montoMayor = $recibo->getMonto();
                $reciboMayor = $recibo;
            }
        }

        return $reciboMayor;
    }

    // Implementar en la clase CabinaPeaje el método totalRecaudado($fecha) 
    // que retorna el monto total recaudado por la cabina para una fecha dada.

    public function totalRecaudado($fecha)
    {
        $colRecibosFecha = [];
        $totalRecaudado = 0;

        foreach ($this->getColRecibos() as $recibo) {
            if ($recibo->getFecha() === $fecha) {
                array_push($colRecibosFecha, $recibo);
            }
        }

        foreach ($colRecibosFecha as $recibo) {
            $totalRecaudado += $recibo->getMonto();
        }
        return $totalRecaudado;
    }

    // Implementar en la clase CabinaPeaje el método recaudacionXTipoVehiculo($fecha,$tipoRegistroVehiculo) 
    // que retorna el monto total recaudado por la cabina, para una fecha y un tipo de vehículo dado. 
    // (Puede utilizar la función de PHP get_class($objeto) que retorna el nombre de la clase a la que pertenece 
    // el objeto. Por ejemplo get_class($unaInstanciaCamion) retorna el nombre la clase «Camion»   

    public function recaudacionXTipoVehiculo($fecha, $tipoRegistroVehiculo) {
        $totalRecaudado = 0;
        // Recorremos la colección de recibos
        foreach($this->getColRecibos() as $recibo) {
            if ($recibo->getFecha() === $fecha && get_class($recibo->getRefRegistroVehiculo()) === $tipoRegistroVehiculo) {
                $totalRecaudado += $recibo->getMonto();
            }
        }
        return $totalRecaudado;
    }
    


}
