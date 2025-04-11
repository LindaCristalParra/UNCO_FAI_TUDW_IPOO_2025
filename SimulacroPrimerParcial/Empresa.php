<?php
class Empresa
{
    private string $denominacion;
    private string $direccion;
    private array $clientes = [];
    private array $motos = [];
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
        $output .= "Denominación: {$this->denominacion}\n";
        $output .= "Dirección: {$this->direccion}\n";
        $output .= "\nCLIENTES:\n";
        $output .= "-----------------------------------\n";
        $output .= $this->convertirAstring($this->clientes) . "\n"; 
        $output .= "\nMOTOS:\n";
        $output .= "-----------------------------------\n";
        $output .= $this->convertirAstring($this->motos) . "\n";  
        $output .= "\nVENTAS:\n";
        $output .= "-----------------------------------\n";
        $output .= $this->convertirAstring($this->ventas) . "\n";  
        $output .= "═══════════════════════════════════\n";

        return $output;
    }

    private function convertirAstring($array): string
    {
        $output="";
        if (empty($this->$array)) {
            $output .= "No hay elementos.\n";
        } else {
            foreach ($array as $i => $objeto) {
                $output .= "#" . ($i + 1) . ":\n";
                $output .= $objeto . "\n";
            }
        }
        return $output;
    }
}
