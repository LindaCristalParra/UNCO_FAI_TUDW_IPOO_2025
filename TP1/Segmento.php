<?php
class Segmento
{
    private $punto1, $punto2;
    public function __construct($punto1, $punto2)
    {
        $this->punto1 = $punto1;
        $this->punto2 = $punto2;
    }
    public function getPunto1()
    {
        return $this->punto1;
    }
    public function getPunto2()
    {
        return $this->punto2;
    }
}
