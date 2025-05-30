<?php
class Canal
{
    private string $tipoCanal;
    private float $importe;
    private bool $esHD;

    public function __construct(string $tipoCanal, float $importe, bool $esHD)
    {
        $this->tipoCanal = $tipoCanal;
        $this->importe = $importe;
        $this->esHD = $esHD;
    }

    public function getTipoCanal(): string
    {
        return $this->tipoCanal;
    }

    public function getImporte(): float
    {
        return $this->importe;
    }

    public function getEsHD(): bool
    {
        return $this->esHD;
    }

    public function setTipoCanal(string $tipoCanal): void
    {
        $this->tipoCanal = $tipoCanal;
    }

    public function setImporte(float $importe): void
    {
        $this->importe = $importe;
    }

    public function setEsHD(bool $esHD): void
    {
        $this->esHD = $esHD;
    }
    public function __toString(): string
    {
        $output = "═══════════════════════════════════\n";
        $output .= "          CANAL         \n";
        $output .= "═══════════════════════════════════\n";
        $output .= "Tipo de Canal: " . $this->getTipoCanal() . "\n";
        $output .= "Importe: " . $this->getImporte() . "\n";
        $output .= "¿Es HD?: " . ($this->getEsHD() ? 'Sí' : 'No') . "\n";
        $output .= "═══════════════════════════════════\n";
        return $output;
    }
}

?>