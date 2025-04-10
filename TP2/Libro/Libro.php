<?php
class Libro
{
    private $isbn, $titulo, $anioEdicion, $editorial, $cantPaginas, $sinopsisLibro, $persona;
    public function __construct($isbn, $titulo, $anioEdicion, $editorial, $cantPaginas, $sinopsisLibro, $persona)
    {
        $this->isbn = $isbn;
        $this->titulo = $titulo;
        $this->anioEdicion = $anioEdicion;
        $this->editorial = $editorial;
        $this->cantPaginas = $cantPaginas;
        $this->sinopsisLibro = $sinopsisLibro;
        $this->persona = $persona;
    }
}

 
