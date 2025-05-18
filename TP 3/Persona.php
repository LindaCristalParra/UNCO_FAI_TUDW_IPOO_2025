<?php
class Persona {

    private int $dni;
    private string $nombre;
    private string $apellido;

    public function __construct(int $dni, string $nombre,string $apellido) {
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }

    public function getDni(): int {
        return $this->dni;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function getApellido(): string {
        return $this->apellido;
    }

    public function setDni(int $dni): void {
        $this->dni = $dni;
    }

    public function setNombre(string $nombre): void {
        $this->nombre = $nombre;
    }

    public function setApellido(string $apellido): void {
        $this->apellido = $apellido;
    }

    public function __toString() {
        return "DNI: " . $this->dni . ", Nombre: " . $this->nombre . ", Apellido: " . $this->apellido;
    }
    
}

?>