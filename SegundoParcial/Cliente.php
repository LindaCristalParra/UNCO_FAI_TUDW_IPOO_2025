<?php
class Cliente {

    private string $nombre;
    private string $apellido;
    private string $tipoDoc;
    private string $numeroDoc;

    public function __construct(string $nombre, string $apellido, string $tipoDoc, string $numeroDoc) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->tipoDoc = $tipoDoc;
        $this->numeroDoc = $numeroDoc;
    }

    public function getNombre(): string {
        return $this->nombre;
    }
    public function getApellido(): string {
        return $this->apellido;
    }    

    public function getTipoDoc(): string {
        return $this->tipoDoc;
    }

    public function getNumeroDoc(): string {
        return $this->numeroDoc;
    }

    public function setNombre(string $nombre): void {
        $this->nombre = $nombre;
    }

    public function setApellido(string $apellido): void {
        $this->apellido = $apellido;
    }

    public function setTipoDoc(string $tipoDoc): void {
        $this->tipoDoc = $tipoDoc;
    }

    public function setNumeroDoc(string $numeroDoc): void {
        $this->numeroDoc = $numeroDoc;
    }

    public function __toString(): string {  
        $output = "═══════════════════════════════════\n";
        $output .= "          CLIENTE         \n";
        $output .= "═══════════════════════════════════\n";
        $output .= "Nombre: " . $this->getNombre() . "\n";
        $output .= "Apellido: " . $this->getApellido() . "\n";
        $output .= "Tipo de Documento: " . $this->getTipoDoc() . "\n";
        $output .= "Número de Documento: " . $this->getNumeroDoc() . "\n";
        $output .= "═══════════════════════════════════\n";
        return $output;
    }
}

?>