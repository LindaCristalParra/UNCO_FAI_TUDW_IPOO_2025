<?php

/**
 * Class Venta
 * @param int $numero Número de la venta.
 * @param DateTime $fecha Fecha de la venta.
 * @param Cliente $cliente Cliente asociado a la venta.
 * @param Moto[] $motos Colección de motos incluidas en la venta.
 * @param float $precioFinal Precio final de la venta.
 */
class Venta
{
    private int $numero;
    private DateTime $fecha;
    private Cliente $cliente;
    /** @var Moto[] */
    private array $motos = [];

    private float $precioFinal;

    public function __construct(int $numero, DateTime $fecha, Cliente $cliente, array $motos = [], float $precioFinal= 0.0)    
    {
        $this->numero = $numero;
        $this->fecha = $fecha;
        $this->cliente = $cliente;
        $this->motos = $motos;
        $this->precioFinal = $precioFinal;
    }
    public function getNumero(): int
    {
        return $this->numero;
    }
    public function getFecha(): DateTime
    {
        return $this->fecha;
    }
    public function getCliente(): Cliente
    {
        return $this->cliente;
    }
    public function getMotos(): array
    {
        return $this->motos;
    }
    public function getPrecioFinal(): float
    {
        return $this->precioFinal;
    }
    public function setNumero(int $numero): void
    {
        $this->numero = $numero;
    }
    public function setFecha(DateTime $fecha): void
    {
        $this->fecha = $fecha;
    }
    public function setCliente(Cliente $cliente): void
    {
        $this->cliente = $cliente;
    }
    public function setMotos(array $motos): void
    {
        $this->motos = $motos;
    }
    public function setPrecioFinal(float $precioFinal): void
    {
        $this->precioFinal = $precioFinal;
    }

    public function __toString(): string
    {
        $output = "═══════════════════════════════════\n";
        $output .= "          DETALLE DE VENTA          \n";
        $output .= "═══════════════════════════════════\n";
        $output .= "Número: {$this->getNumero()}\n";
        $output .= "Fecha: {$this->getFecha()->format('d/m/Y H:i')}\n";
        
        $output .= "\nCLIENTE:\n";
        $output .= "-----------------------------------\n";
        $output .= $this->getCliente() . "\n";  // Usa el __toString() de Cliente
        
        $output .= "\nMOTOS:\n";
        $output .= "-----------------------------------\n";
        
        if (empty($this->getMotos())) {
            $output .= "No hay motos en esta venta.\n";
        } else {
            foreach ($this->getMotos() as $index => $moto) {
                $output .= "Moto #" . ($index + 1) . ":\n";
                $output .= $moto . "\n";  // Usa el __toString() de Moto
            }
        }
        
        $output .= "\nTOTAL:\n";
        $output .= "-----------------------------------\n";
        $output .= "$ " . $this->getPrecioFinal() . "\n";
        $output .= "═══════════════════════════════════\n";
        
        return $output;
    }
    /**
     * Implementar el método incorporarMoto($objMoto) que recibe por parámetro un objeto moto y lo
     * incorpora a la colección de motos de la venta, siempre y cuando sea posible la venta. El método cada
     * vez que incorpora una moto a la venta, debe actualizar la variable instancia precio final de la venta.
     * Utilizar el método que calcula el precio de venta de la moto donde crea necesario.
     */
    public function incorporarMoto(Moto $objMoto): bool
    {
        if ($objMoto->darPrecioVenta() != -1) {
            $this->motos[] = $objMoto;
            $this->setPrecioFinal($this->getPrecioFinal() + $objMoto->darPrecioVenta()) ;
            return true;
        }
        return false;
    }
}
?>
