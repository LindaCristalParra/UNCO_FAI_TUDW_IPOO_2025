<?php

/**
 * Diseñar e implementar la clase Reloj que simule el comportamiento de un cronómetro digital 
 * (con los comportamientos: puesta_a_cero, incremento, etc.). 
 * Cuando el contador llegue a 23:59:59 y reciba el mensaje de incremento deberá pasar a 00:00:00. 
 * @param $hora
 * @param $minuto
 * @param $segundo
 */

class Reloj
{
    private $segundo, $minuto, $hora;

    public function __construct($hra, $min, $seg)
    {
        $this->hora = $hra;
        $this->minuto = $min;
        $this->segundo = $seg;
    }

    public function setSegundo($seg)
    {
        $this->segundo = $seg;
    }

    public function setMinuto($min)
    {
        $this->minuto = $min;
    }

    public function setHora($hra)
    {
        $this->hora = $hra;
    }

    public function getSegundo()
    {
        return $this->segundo;
    }

    public function getMinuto()
    {
        return $this->minuto;
    }

    public function getHora()
    {
        return $this->hora;
    }

    public function __toString()
    {
        return $this->getHora() . ":" . $this->getMinuto() . ":" . $this->getSegundo();
    }

    public function puesta_a_cero()
    {
        $this->setHora(0);
        $this->setMinuto(0);
        $this->setSegundo(0);
    }

    public function incremento()
    {
        if ($this->hora < 24) {
            if ($this->segundo < 59) {
                $this->segundo++;
            } else {
                $this->setSegundo(0);
                if ($this->minuto < 59) {
                    $this->minuto++;
                } else {
                    $this->setMinuto(0);
                    $this->hora++;
                }
            }
        }
    }

    public function contador()
    {
        while ($this->hora < 24) {
            echo $this->__toString() . "\n";
            $this->incremento();
        }
        $this->puesta_a_cero();
        echo $this->__toString() . "\n";
    }
}
