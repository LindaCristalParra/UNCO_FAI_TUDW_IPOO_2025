<?php
class Persona
{
    private $nombre, $apellido, $tipoDoc, $nroDoc;
    public function __construct($nombre, $apellido, $tipoDoc, $nroDoc)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->tipoDoc = $tipoDoc;
        $this->nroDoc = $nroDoc;
    }
    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function getTipoDoc()
    {
        return $this->tipoDoc;
    }

    public function getNroDoc()
    {
        return $this->nroDoc;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    public function setTipoDoc($tipoDoc)
    {
        $this->tipoDoc = $tipoDoc;
    }

    public function setNroDoc($nroDoc)
    {
        $this->nroDoc = $nroDoc;
    }

    public function __toString()
    {
        return "Nombre: " . $this->nombre . ", Apellido: " . $this->apellido . ", Tipo de Documento: " . $this->tipoDoc . ", Número de Documento: " . $this->nroDoc;
    }
}
