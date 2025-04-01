<?php
class Punto {
    private $x, $y;
    public function __construct($x, $y) {
        $this->x = $x;
        $this->y = $y;
    }
    public function getX() {
        return $this->x;
    }   
    public function getY() {
        return $this->y;
    }

    public function setX($x) {
        $this->x = $x;
    }

    public function setY($y) {
        $this->y = $y;
    }

    public function __toString() {
        return "Punto(" . $this->x . ", " . $this->y . ")";
    }
    public function distancia($puntox) {
        return sqrt(pow($this->x - $puntox->getX(), 2) + pow($this->y - $puntox->getY(), 2));
    }
    public function trasladar($deltax, $deltay){
        $this->x += $deltax;
        $this->y += $deltay;
    }



}