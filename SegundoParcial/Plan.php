<?php 
class Plan {

    private int $codigo;
    private array $colCanales;
    private float $importe;
    private bool $mgIncluido;

    public function __construct(int $codigo, array $colCanales, float $importe) {
        $this->codigo = $codigo;
        $this->colCanales = $colCanales;
        $this->importe = $importe;
        $this->mgIncluido = 100; // Por defecto, el MG está incluido
    }

    public function getCodigo(): int {
        return $this->codigo;
    }

    public function getColCanales(): array {
        return $this->colCanales;
    }   

    public function getImporte(): bool {
        return $this->importe;
    }

    public function getMgIncluido(): bool {
        return $this->mgIncluido;
    }

    public function setCodigo(int $codigo): void {
        $this->codigo = $codigo;
    }

    public function setColCanales(array $colCanales): void {
        $this->colCanales = $colCanales;
    }

    public function setImporte(bool $importe): void {
        $this->importe = $importe;
    }

    public function setMgIncluido(bool $mgIncluido): void {
        $this->mgIncluido = $mgIncluido;
    }

    public function __toString(): string {
        $output = "═══════════════════════════════════\n";
        $output .= "          PLAN         \n";
        $output .= "═══════════════════════════════════\n";
        $output .= "Código:".$this->getCodigo()."\n";
        $output .= "Importe: ".$this->getImporte()."\n";
        $output .= "Canales:\n";
        $output .= "-----------------------------------\n"; 
        $output .= $this->convertirAstring($this->getColCanales()) . "\n";
        $output .= "¿Incluye MG?: " . ($this->getMgIncluido() ? 'Sí' : 'No') . "\n";

        return $output;
    }

        private function convertirAstring(array $miArray): string
    {
        $output = "";
        if (empty($miArray)) {
            $output .= "No hay elementos.\n";
        } else {
            foreach ($miArray as $i => $objeto) {
                $output .= "#" . ($i + 1) . ":\n";
                $output .= $objeto . "\n";
            }
        }
        return $output;
    }
}

?>