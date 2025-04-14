<?php
class Empresa
{
    private string $denominacion;
    private string $direccion;
    /** @var Cliente[] */
    private array $clientes = [];
    /** @var Moto[] */
    private array $motos = [];
    /** @var Venta[] */
    private array $ventas = [];

    public function __construct(string $denominacion, string $direccion, array $clientes = [], array $motos = [], array $ventas = [])
    {
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->clientes = $clientes;
        $this->motos = $motos;
        $this->ventas = $ventas;
    }

    public function getDenominacion(): string
    {
        return $this->denominacion;
    }
    public function getDireccion(): string
    {
        return $this->direccion;
    }
    public function getClientes(): array
    {
        return $this->clientes;
    }
    public function getMotos(): array
    {
        return $this->motos;
    }
    public function getVentas(): array
    {
        return $this->ventas;
    }
    public function setDenominacion(string $denominacion): void
    {
        $this->denominacion = $denominacion;
    }
    public function setDireccion(string $direccion): void
    {
        $this->direccion = $direccion;
    }
    public function setClientes(array $clientes): void
    {
        $this->clientes = $clientes;
    }
    public function setMotos(array $motos): void
    {
        $this->motos = $motos;
    }
    public function setVentas(array $ventas): void
    {
        $this->ventas = $ventas;
    }
    public function __toString(): string
    {
        $output = "═══════════════════════════════════\n";
        $output .= "          DETALLE DE EMPRESA          \n";
        $output .= "═══════════════════════════════════\n";
        $output .= "Denominación: {$this->getDenominacion()}\n";
        $output .= "Dirección: {$this->getDireccion()}\n";
        $output .= "\nCLIENTES:\n";
        $output .= "-----------------------------------\n";
        $output .= $this->convertirAstring($this->getClientes()) . "\n";
        $output .= "\nMOTOS:\n";
        $output .= "-----------------------------------\n";
        $output .= $this->convertirAstring($this->getMotos()) . "\n";
        $output .= "\nVENTAS:\n";
        $output .= "-----------------------------------\n";
        $output .= $this->convertirAstring($this->getVentas()) . "\n";

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
    public function retornarMoto(int $codigo): ?Moto
    {
        foreach ($this->motos as $moto) {
            if ($moto->getCodigo() === $codigo) {
                return $moto;
            }
        }
        return null; // Retorna null si no se encuentra la moto
    }
    public function registrarVenta(array $codMoto, Cliente $cliente): float
    {
        // Verifica si el cliente está activo
        if (!$cliente->getAlta()) {
            return 0; // No se puede registrar la venta si el cliente no está activo
        }
        $motosVendidas = [];
        $precioFinal = 0;
        foreach ($codMoto as $codigo) {
            $moto = $this->retornarMoto($codigo);
            if ($moto !== null && $moto->getActiva()) {
                $motosVendidas[] = $moto;
                $precioFinal += $moto->getCosto();
                $moto->setActiva(false); // Desactiva la moto después de la venta
            }
        }
        if (!empty($motosVendidas)) {
            $venta = new Venta(count($this->getVentas()) + 1, new DateTime(), $cliente, $motosVendidas, $precioFinal);
            foreach ($motosVendidas as $moto) {
                $venta->incorporarMoto($moto);
            }
        }
        return $venta->getPrecioFinal(); // Retorna el precio total de la venta
    }
    public function retornarVentasXCliente(string $tipoDoc, int $numDoc): array
    {

        $ventasCliente = [];
        foreach ($this->getVentas() as $venta) {
            if (($venta->getCliente())->getTipoDoc() === $tipoDoc && ($venta->getCliente())->getNumDoc() === $numDoc) {
                $ventasCliente[] = $venta;
            }
        }
        return $ventasCliente;
    }
}
?>