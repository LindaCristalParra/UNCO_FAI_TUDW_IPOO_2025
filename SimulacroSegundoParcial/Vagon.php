<!-- Se registra la siguiente información: año de instalación, largo, ancho, peso del vagón vacío.
Si se trata de un vagón de pasajeros también se almacena la cantidad máxima de pasajeros que puede
transportar, la cantidad de pasajeros que está transportando y el peso promedio de los pasajeros. Es importante
tener en cuenta que la variable de instancia que representa el peso del vagón se calcula de acuerdo a la
cantidad de pasajeros que se está transportando y considerando un peso promedio por pasajero de 50 Kilos..
Si se trata de un vagón de carga se almacena el peso máximo que puede transportar y el peso de su carga
transportada. El peso del vagón va a depender del peso de su carga más un índice que coincide con un 20 % del
peso de la carga, dicho índice se guarda en cada vagón de carga. -->

<?php

class Vagon
{
    private int $anioInstalacion;
    private float $largo;
    private float $ancho;
    private float $pesoVagonVacio;

    public function __construct($anioInstalacion, $largo, $ancho, $pesoVagonVacio)
    {
        $this->anioInstalacion = $anioInstalacion;
        $this->largo = $largo;
        $this->ancho = $ancho;
        $this->pesoVagonVacio = $pesoVagonVacio;
    }

    public function getAnioInstalacion(): int
    {
        return $this->anioInstalacion;
    }

    public function getLargo(): float
    {
        return $this->largo;
    }

    public function getAncho(): float
    {
        return $this->ancho;
    }

    public function getPesoVagonVacio(): float
    {
        return $this->pesoVagonVacio;
    }

    public function setAnioInstalacion($anioInstalacion):void
    {
        $this->anioInstalacion = $anioInstalacion;
    }

    public function setLargo($largo):void
    {
        $this->largo = $largo;
    }
    public function setAncho($ancho):void
    {
        $this->ancho = $ancho;
    }
    public function setPesoVagonVacio($pesoVagonVacio):void
    {
        $this->pesoVagonVacio = $pesoVagonVacio;
    }
    public function __toString(): string
    {
        return "Año de Instalación: " . $this->anioInstalacion . "\n" .
            "Largo: " . $this->largo . "\n" .
            "Ancho: " . $this->ancho . "\n" .
            "Peso del Vagón Vacío: " . $this->pesoVagonVacio . "\n";
    }
}
?>
