<?php
class Libro
{
    private $isbn, $titulo, $anioEdicion, $editorial, $nombreAutor, $apellidoAutor;
public function __construct($isbn, $titulo, $anioEdicion, $editorial, $nombreAutor, $apellidoAutor)
{
    $this->isbn = $isbn;
    $this->titulo = $titulo;
    $this->anioEdicion = $anioEdicion;
    $this->editorial = $editorial;
    $this->nombreAutor = $nombreAutor;
    $this->apellidoAutor = $apellidoAutor;
}

    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function setAnioEdicion($anioEdicion)
    {
        $this->anioEdicion = $anioEdicion;
    }

    public function setEditorial($editorial)
    {
        $this->editorial = $editorial;
    }
    public function setNombreAutor($nombreAutor)
    {
        $this->nombreAutor = $nombreAutor;
    }
    public function setApellidoAutor($apellidoAutor)
    {
        $this->apellidoAutor = $apellidoAutor;
    }
    public function getIsbn()
    {
        return $this->isbn;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function getAnioEdicion()
    {
        return $this->anioEdicion;
    }

    public function getEditorial()
    {
        return $this->editorial;
    }

    public function getNombreAutor()
    {
        return $this->nombreAutor;
    }

    public function getApellidoAutor()
    {
        return $this->apellidoAutor;
    }
    public function __toString()
    {
        return "Fin de utilidad";
    }
    public function perteneceEditorial($unaEditorial)
    {
        return $this->getEditorial() == $unaEditorial;
    }
    public function aniosDeEdicion()
    {
        return date("Y") - $this->getAnioEdicion();
    }

}