<?php
class Cliente {
    private string $tipoDoc;
    private string $numeroDoc;

    public function __construct(string $tipoDoc, string $numeroDoc) {
        $this->tipoDoc = $tipoDoc;
        $this->numeroDoc = $numeroDoc;
    }

    public function getTipoDoc(): string {
        return $this->tipoDoc;
    }

    public function getNumeroDoc(): string {
        return $this->numeroDoc;
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
        $output .= "Tipo de Documento: " . $this->getTipoDoc() . "\n";
        $output .= "Número de Documento: " . $this->getNumeroDoc() . "\n";
        $output .= "═══════════════════════════════════\n";
        return $output;
    }
}

?>