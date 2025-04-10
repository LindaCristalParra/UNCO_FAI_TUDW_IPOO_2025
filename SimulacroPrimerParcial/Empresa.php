<?php
class Empresa
{
    private string $denominacion;
    private array $clientes = [];
    private array $motos = [];
    private array $ventas = [];

    public function __construct(string $denominacion, array $clientes = [], array $motos = [], array $ventas = [])
    {
        $this->denominacion = $denominacion;
        $this->clientes = $clientes;
        $this->motos = $motos;
        $this->ventas = $ventas;
    }

    public function getDenominacion(): string
    {
        return $this->denominacion;
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
        $clientesInfo = "";
        foreach ($this->clientes as $cliente) {
            $clientesInfo .= $cliente->info() . ", ";
        }
        $clientesInfo = rtrim($clientesInfo, ", ");

        $motosInfo = "";
        foreach ($this->motos as $moto) {
            $motosInfo .= $moto->info() . ", ";
        }
        $motosInfo = rtrim($motosInfo, ", ");

        $ventasInfo = "";
        foreach ($this->ventas as $venta) {
            $ventasInfo .= $venta->info() . ", ";
        }
        $ventasInfo = rtrim($ventasInfo, ", ");

        return "Empresa: {$this->denominacion}\n" .
            "Clientes: [{$clientesInfo}]\n" .
            "Motos: [{$motosInfo}]\n" .
            "Ventas: [{$ventasInfo}]";
    }
}
