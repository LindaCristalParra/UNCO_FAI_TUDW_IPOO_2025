<?php
class VagonPasajero extends Vagon
{
    private float $pesoMaxPermitido;
    private float $pesoCarga;
    private float $indice;

    public function __construct($anioInstalacion, 
                                $largo, 
                                $ancho, 
                                $pesoVagonVacio, 
                                $pesoMaxPermitido, 
                                $pesoCarga, 
                                $indice = 0.2)
    {
        parent::__construct($anioInstalacion, $largo, $ancho, $pesoVagonVacio);
        $this->pesoMaxPermitido = $pesoMaxPermitido;
        $this->pesoCarga = $pesoCarga;
        $this->indice = $indice;
    }

    public function getPesoMaxPermitido(): float
    {
        return $this->pesoMaxPermitido;
    }

    public function getPesoCarga(): float
    {
        return $this->pesoCarga;
    }

    public function getIndice(): int
    {
        return $this->indice;
    }

    public function setPesoMaxPermitido($pesoMaxPermitido): void
    {
        $this->pesoMaxPermitido = $pesoMaxPermitido;
    }

    public function setPesoCarga($pesoCarga): void
    {
        $this->pesoCarga = $pesoCarga;
    }

    public function setIndice(int $indice): void
    {
        $this->indice = $indice;
    }

    public function __toString(): string
    {
        $output = parent::__toString() . "\n";
        $output .= "Peso Maximo Permitido: " . $this->getPesoMaxPermitido() . "\n";
        $output .= "Peso de la Carga: " . $this->getPesoCarga() . "\n" .
        $output .= "Indice: " . $this->getIndice() . "\n";

        return $output;
    }

    public function calcularPesoVagon(): float
    {
        $pesoVagon = $this->getPesoVagonVacio() + ($this->getIndice() * $this->getPesoCarga());
        return $pesoVagon;
    }

    public function incorporarCargaVagon(float $carga): float
    {
        $incorporado = false;
        $totalCarga = $this->getPesoCarga() + $carga;
        if ($totalCarga <= $this->getPesoMaxPermitido()) {
            $this->setPesoCarga($totalCarga);
            $incorporado = true;
        }
        return $incorporado;
    }
}
?>

