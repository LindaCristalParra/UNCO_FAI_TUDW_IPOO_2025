<?php
class EmpresaCable {
    private array $colPlanes;
    private array $colCanales;
    private array $colClientes;
    private array $colContratos;

    public function __construct() {
        $this->colPlanes = [];
        $this->colCanales = [];
        $this->colClientes = [];
        $this->colContratos = [];
    }

    public function getColPlanes(): array {
        return $this->colPlanes;
    }

    public function getColCanales(): array {
        return $this->colCanales;
    }

    public function getColClientes(): array {
        return $this->colClientes;
    }   

    public function getColContratos(): array {
        return $this->colContratos;
    }

    public function setColPlanes(array $colPlanes): void {
        $this->colPlanes = $colPlanes;
    }

    public function setColCanales(array $colCanales): void {
        $this->colCanales = $colCanales;
    }

    public function setColClientes(array $colClientes): void {
        $this->colClientes = $colClientes;
    }

    public function setColContratos(array $colContratos): void {
        $this->colContratos = $colContratos;
    }

    public function __toString(): string {
        $output = "═══════════════════════════════════\n";
        $output .= "          EMPRESA CABLE         \n";
        $output .= "═══════════════════════════════════\n";
        $output .= "Planes: " . $this->convertirAstring($this->getColPlanes()) . "\n";
        $output .= "Canales: " . $this->convertirAstring($this->getColCanales()) . "\n";
        $output .= "Clientes: " . $this->convertirAstring($this->getColClientes()) . "\n";
        $output .= "Contratos: " . $this->convertirAstring($this->getColContratos()) . "\n";
        $output .= "═══════════════════════════════════\n";
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

    public function incorporarPlan (Plan $plan): void {


        $this->colPlanes[] = $plan;
    }   

    public function buscarContrato(int $id):void {
        // Busca un contrato por su ID y lo retorna con while recorrido parcial
    }
}