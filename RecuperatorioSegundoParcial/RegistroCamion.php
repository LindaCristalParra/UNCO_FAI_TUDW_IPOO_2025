<?php
class RegistroCamion extends RegistroVehiculo
{
    //peso en toneladas
    private $peso;

    private $cantidadEjes;

    public function __construct($patente, $peso, $cantidadEjes)
    {
        parent::__construct($patente);
        $this->peso = $peso;
        $this->cantidadEjes = $cantidadEjes;
    }

    public function getPeso()
    {
        return $this->peso;
    }


    public function getCantidadEjes()
    {
        return $this->cantidadEjes;
    }

    public function setPeso($peso)
    {
        $this->peso = $peso;
    }

    public function setCantidadEjes($cantidadEjes)
    {
        $this->cantidadEjes = $cantidadEjes;
    }

    public function __toString(): string
    {
        return parent::__toString() . ", Peso: " . $this->getPeso() . ", Altura: " . $this->getAltura() . ", Cantidad de Ejes: " . $this->getCantidadEjes();
    }

    // Adicionalmente los registros de  camiones que llegan a una cabina de peaje deben pagar $100 por cada eje 
    // y $15 por cada tonelada del peso total del camión. 
    // También se les cobrará un impuesto de transporte del 2% a los camiones que pesen menos de 5 toneladas 
    // y un impuesto del 5% a los camiones que pesen más de 5 toneladas.
    public function valorPeaje()
    {
        $adicionalEjes = 100 * $this->getCantidadEjes();
        $adicionalPeso = 15 * $this->getPeso();
        $peaje = parent::valorPeaje() + $adicionalEjes + $adicionalPeso;
        $totalPeaje = $peaje;

        if ($this->getPeso() < 5) {
            $totalPeaje = $peaje * 1.02; // Impuesto de transporte por peso menor a 5 toneladas
        } else {
            $totalPeaje = $peaje * 1.05; // Impuesto de transporte por peso mayor o igual a 5 toneladas
        }
        return $totalPeaje;
    }
}