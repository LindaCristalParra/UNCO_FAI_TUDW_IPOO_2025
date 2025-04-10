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

    public function __construct(int $numero, DateTime $fecha, Cliente $cliente, array $motos = [])
    {
        $this->numero = $numero;
        $this->fecha = $fecha;
        $this->cliente = $cliente;
        $this->motos = $motos;
        $this->precioFinal = 0.0;
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
        $motosInfo = "";
        foreach ($this->motos as $moto) {
            $motosInfo .= (string)$moto . ", ";
        }
        $motosInfo = rtrim($motosInfo, ", ");
        return "Venta Número: {$this->numero}\n" .
               "Fecha: {$this->fecha->format('d/m/Y')}\n" .
               "Cliente: {$this->cliente}\n" .
               "Motos: {$motosInfo}\n" .
               "Precio Final: {$this->precioFinal}";
    }

    /**
     * Implementar el método incorporarMoto($objMoto) que recibe por parámetro un objeto moto y lo
     * incorpora a la colección de motos de la venta, siempre y cuando sea posible la venta. El método cada
     * vez que incorpora una moto a la venta, debe actualizar la variable instancia precio final de la venta.
     * Utilizar el método que calcula el precio de venta de la moto donde crea necesario.
     */
    public function incorporarMoto(Moto $objMoto): bool
    {
        if ($objMoto->calcularValorVenta()!=-1) {
            $this->motos[] = $objMoto;
            $this->precioFinal += $objMoto->calcularValorVenta();
            return true;
        }
        return false;
    }
}