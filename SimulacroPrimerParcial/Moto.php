<?php
class Moto
{
    private int $codigo;
    private float $costo;
    private int $anioFabric;
    private string $descripcion;
    private float $porcentajeIncAnual;
    private bool $activa;

    public function __construct(int $codigo, float $costo, int $anioFabric, string $descripcion, float $porcentajeIncAnual, bool $activa)
    {
        $this->codigo = $codigo;
        $this->costo = $costo;
        $this->anioFabric = $anioFabric;
        $this->descripcion = $descripcion;
        $this->porcentajeIncAnual = $porcentajeIncAnual;
        $this->activa = $activa;
    }
    public function getCodigo(): int
    {
        return $this->codigo;
    }
    public function getCosto(): float
    {
        return $this->costo;
    }
    public function getAnioFabric(): int
    {
        return $this->anioFabric;
    }   
    public function getDescripcion(): string
    {
        return $this->descripcion;
    }   
    public function getPorcentajeIncAnual(): float
    {
        return $this->porcentajeIncAnual;
    }   
    public function getActiva(): bool
    {
        return $this->activa;
    }
    public function setCodigo(int $codigo): void
    {
        $this->codigo = $codigo;
    }
    public function setCosto(int $costo): void
    {
        $this->costo = $costo;
    }
    public function setAnioFabric(int $anioFabric): void
    {
        $this->anioFabric = $anioFabric;
    }
    public function setDescripcion(string $descripcion): void
    {
        $this->descripcion = $descripcion;
    }
    public function setPorcentajeIncAnual(float $porcentajeIncAnual): void
    {
        $this->porcentajeIncAnual = $porcentajeIncAnual;
    }
    public function setActiva(bool $activa): void
    {
        $this->activa = $activa;
    }
    
    public function __toString(): string
    {
        $output = "Código: {$this->getCodigo()}\n";
        $output .= "Costo: \$" . number_format($this->getCosto(), 2)."\n";
        $output .= "Año de Fabricación:  {$this->getAnioFabric()}\n";
        $output .= "Descripción: {$this->getDescripcion()}\n";
        $output .= "Incremento Anual:". ($this->getPorcentajeIncAnual() * 100) . "%\n";
        $output .= "Disponible: " . ($this->getActiva() ? "Si" : "No") . "\n";

        return $output;
    }

    /**
     * Calcula el valor por el cual puede ser vendida una moto.
     * 
     * Si la moto no se encuentra disponible para la venta, retorna un valor menor a 0.
     * Si la moto está disponible para la venta, el método realiza el siguiente cálculo:
     * 
     * $_venta = $_compra + $_compra * (anio * por_inc_anual)
     * 
     * Donde:
     * - $_compra: Es el costo de la moto.
     * - anio: Cantidad de años transcurridos desde que se fabricó la moto.
     * - por_inc_anual: Porcentaje de incremento anual de la moto.
     */
    public function calcularValorVenta(): float
    {
        if ($this->activa) {
           return $this->costo + ($this->costo * ($this->anioFabric * $this->porcentajeIncAnual));

        } else {
            return -1; // Moto no disponible para la venta
        }
    }
}
    