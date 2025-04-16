<?php
/**En la clase Persona se registra la siguiente información:
 *  nombre, apellido, dirección, mail y teléfono.  */
class Persona{
    private string $nombre;
    private string $apellido;  
    private string $direccion;
    private string $mail;
    private string $telefono;

    public function __construct(string $nombre, string $apellido, string $direccion, string $mail, string $telefono){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->direccion = $direccion;
        $this->mail = $mail;
        $this->telefono = $telefono;
    }
    public function getNombre(): string{
        return $this->nombre;
    }
    public function getApellido(): string{
        return $this->apellido;
    }
    public function getDireccion(): string{
        return $this->direccion;
    }
    public function getMail(): string{
        return $this->mail;
    }
    public function getTelefono(): string{
        return $this->telefono;
    }
    public function setNombre(string $nombre): void{
        $this->nombre = $nombre;
    }
    public function setApellido(string $apellido): void{
        $this->apellido = $apellido;
    }
    public function setDireccion(string $direccion): void{
        $this->direccion = $direccion;
    }
    public function setMail(string $mail): void{
        $this->mail = $mail;
    }
    public function setTelefono(string $telefono): void{
        $this->telefono = $telefono;
    }    

    public function __toString(): string {

        $output = "═══════════════════════════════════\n";
        $output .= "               PERSONA         \n";
        $output .= "═══════════════════════════════════\n";
        $output .= "Nombre: {$this->getNombre()}\n";
        $output .= "Apellido: {$this->getApellido()}\n";
        $output .= "Dirección: {$this->getDireccion()}\n";
        $output .= "Mail: {$this->getMail()}\n";
        $output .= "Teléfono: {$this->getTelefono()}\n";
        $output .= "═══════════════════════════════════\n";
        return $output;
    }
}