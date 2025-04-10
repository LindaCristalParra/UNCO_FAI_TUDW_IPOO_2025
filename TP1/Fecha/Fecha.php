<?php

/**
 * Diseñar e implementar la clase Fecha. 
 * La clase deberá disponer de los atributos mínimos y necesarios para almacenar el día, el mes y el año, además de métodos que devuelvan un String con la fecha en forma abreviada (16/02/2000) y extendida (16 de febrero de 2000) . 
 * Implementar una función incremento, que reciba como parámetros un entero y una fecha, que retorne una nueva fecha, resultado de incrementar la fecha recibida por parámetro en el número de días definido por el parámetro entero. 
 * Nota 1: Son años bisiestos los múltiplos de cuatro que no lo son de cien, salvo que lo sean de cuatrocientos, en cuyo caso si son bisiestos. 
 * Nota 2: Para la solución de este problema puede ser útil definir un método incrementa_un_dia.

 */
class Fecha
{
    private $dia, $mes, $anio;
    public function __construct($d, $m, $a)
    {
        $this->dia = $d;
        $this->mes = $m;
        $this->anio = $a;
    }

    public function setDia($d)
    {
        $this->dia = $d;
    }

    public function setMes($m)
    {
        $this->mes = $m;
    }

    public function setAnio($a)
    {
        $this->anio = $a;
    }

    public function getDia()
    {
        return $this->dia;
    }

    public function getMes()
    {
        return $this->mes;
    }

    public function getAnio()
    {
        return $this->anio;
    }

    public function __toString()
    {
        return "Fin de utilidad";
    }

    public function fecha_abreviada()
    {
        return $this->getDia() . "/" . $this->getMes() . "/" . $this->getAnio();
    }

    public function fecha_extendida()
    {
        $meses = array("enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre");
        return $this->getDia() . " de " . $meses[$this->getMes() - 1] . " de " . $this->getAnio();
    }

    public function incrementa_un_dia() {}

    public function bisiesto($anio)
    {
        if (($anio % 4 == 0 && $anio % 100 != 0) || ($anio % 400 == 0)) {
            return true;
        } else {
            return false;
        }
    }

    public function incremento($dias, $fecha)
    {   
        
        $diasAnio = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
        $this->bisiesto($fecha->getAnio()) ? $diasAnio[1] = 29 : $diasAnio[1] = 28;

        $diasMesActual = $diasAnio[$fecha->getMes() - 1];
        $diasRestantes=$dias;

        //TODO: Verificar si el mes es diciembre.
        //dias - get fecha, pregunto dias menos los das del mes siguiente hasta que dias de cero

        if($fecha->getDia() + $dias > $diasMesActual) {
            $diasRestantes=$dias - $fecha->getDia();
            $fecha->setMes($fecha->getMes() + 1);
        }

      /*  if($fecha->getDia() + $dias > $diasMesActual) {
            $dias = $dias - ($diasMesActual - $fecha->getDia());
            $fecha->setDia(1);
            if($fecha->getMes() == 12) {
                $fecha->setMes(1);
                $fecha->setAnio($fecha->getAnio() + 1);
            } else {
                $fecha->setMes($fecha->getMes() + 1);
            }
        } else {
            $fecha->setDia($fecha->getDia() + $dias);
        }*/
    }
}
