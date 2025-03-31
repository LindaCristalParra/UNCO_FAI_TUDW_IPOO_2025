<?php
/**
 * Clase Calculadora
 * 
 * Diseñar e implementar la clase Calculadora que permite realizar las operaciones básicas: 
 * suma (+), resta (-), multiplicación (*), y división (/).
 * 
 * @param float|int $a Primer operando.
 * @param float|int $b Segundo operando.
 */

class Calculadora
{

    private $a;
    private $b;

    public function __construct($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
    }

    public function getA()
    {
        return $this->a;
    }

    public function setA($a)
    {
        $this->a = $a;
    }

    public function getB()
    {
        return $this->b;
    }

    public function setB($b)
    {
        $this->b = $b;
    }
    public function sumar()
    {
        return $this->a + $this->b;
    }

    public function restar()
    {
        return $this->a - $this->b;
    }

    public function multiplicar()
    {
        return $this->a * $this->b;
    }

    public function dividir()
    {
        if ($this->b != 0) {
            return $this->a / $this->b;
        } else {
            throw new Exception("No se puede dividir entre cero");
        }
    }


    public function __toString()
    {
        return $this->getA() . "," . $this->getB();
    }

    public function __destruct()
    {
        echo $this . " instancia destruida, no hay referencias a este objeto \n";
    }
}
