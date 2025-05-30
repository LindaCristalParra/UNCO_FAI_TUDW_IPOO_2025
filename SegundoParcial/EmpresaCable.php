<?php
class EmpresaCable
{
    private array $colPlanes;
    private array $colCanales;
    private array $colClientes;
    private array $colContratos;

    public function __construct()
    {
        $this->colPlanes = [];
        $this->colCanales = [];
        $this->colClientes = [];
        $this->colContratos = [];
    }

    public function getColPlanes(): array
    {
        return $this->colPlanes;
    }

    public function getColCanales(): array
    {
        return $this->colCanales;
    }

    public function getColClientes(): array
    {
        return $this->colClientes;
    }

    public function getColContratos(): array
    {
        return $this->colContratos;
    }

    public function setColPlanes(array $colPlanes): void
    {
        $this->colPlanes = $colPlanes;
    }

    public function setColCanales(array $colCanales): void
    {
        $this->colCanales = $colCanales;
    }

    public function setColClientes(array $colClientes): void
    {
        $this->colClientes = $colClientes;
    }

    public function setColContratos(array $colContratos): void
    {
        $this->colContratos = $colContratos;
    }

    public function __toString(): string
    {
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

    // Implementar la función incorporarPlan que incorpora a la colección de planes un nuevo plan 
    // siempre y cuando no haya un plan con los mismos canales y los mismos MG 
    // (en caso de que el plan incluyera).
    public function incorporarPlan(Plan $plan): void
    {
        // Verifica si ya existe un plan con los mismos canales y MG con una busqueda parcial
        $cantPlanes = count($this->getColPlanes());
        $planesVigentes = $this->getColPlanes();
        $i = 0;
        $existePlan = false;
        while ($i < $cantPlanes && !$existePlan) {
            if (
                $planesVigentes[$i]->getColCanales() === $plan->getColCanales() &&
                $planesVigentes[$i]->getMgIncluido() === $plan->getMgIncluido()
            ) {
                $existePlan = true;
            }
            $i++;
        }
        // Si no existe un plan con los mismos canales y MG, lo agrega a la colección
        if (!$existePlan) {
            $this->colPlanes[] = $plan;
            $this->setColPlanes($this->colPlanes);
        }
    }

    // Implementar la función BuscarContrato que  recibe un tipo y numero de documento 
    // correspondiente a un cliente y retorna el contrato que tiene el cliente con la empresa. 
    // Si no existe ningún contrato el método retorna un valor nulo.
    public function buscarContrato(string $tipo, int $nro): Contrato
    {
        $contratoEncontrado = false;
        $contrato = null;
        $cantContratos = count($this->getColContratos());
        $contratosVigentes = $this->getColContratos();
        $i = 0;

        while ($i < $cantContratos && !$contratoEncontrado) {
            if (
                $contratosVigentes[$i]->getCliente()->getTipoDocumento() === $tipo &&
                $contratosVigentes[$i]->getCliente()->getNroDocumento() === $nro
            ) {
                $contratoEncontrado = true;
                $contrato = $contratosVigentes[$i];
            }
            $i++;
        }

        return $contratoEncontrado;
    }

    // Implementar la función incorporarContrato: 
    // que recibe por parámetro el plan, una referencia al cliente, 
    // la fecha de inicio y de vencimiento del mismo y si se trata de un contrato realizado en la empresa 
    // o vía web (si el valor del parámetro es True se trata de un contrato realizado vía web). 
    // El método corrobora que no exista un contrato previo con el cliente, 
    // en caso de existir y encontrarse activo se debe dar de baja. 
    // Por política de la empresa, solo existe la posibilidad de tener un contrato activo 
    // con un cliente determinado.
    public function incorporarContrato(Plan $plan, Cliente $objCliente, DateTime $fechaIni, DateTime $fechaVen, bool $web): void
    {
        $contratos = $this->getColContratos();
        // Verifica si el cliente ya tiene contrato activo
        $contratoExistente = $this->buscarContrato($objCliente->getTipoDocumento(), $objCliente->getNroDocumento());
        if (!($contratoExistente->getEstado() === 'activo')) {
            $nuevoContrato = new Contrato($fechaIni, $fechaVen, $plan, 'activo', 0, false, $objCliente);

            $this->contratos[] = $nuevoContrato;
            $this->setColContratos($this->contratos);
        }

    }

    // Implementar la función  retornarPromImporteContratos que 
    // recibe por parámetro el código de un plan 
    // y retorna el promedio de los importes de los contratos realizados usando ese plan.

    public function retornarPromImporteContratos(): float
    {
        $promedio = 0;
        return $promedio;
    }

    // Implementar la función pagarContrato: que recibe como parámetro el código de un contrato, 
    // actualiza el estado del contrato y retorna el importe final que debe ser abonado por el cliente.

    public function pagarContrato(int $codigoContrato): float
    {

        $importe = 0;
        return $importe;

    }
}