<?php
class Financiera
{
    private string $denominacion;
    private string $direccion;
    private array $coleccion_prestamos;

    public function __construct(string $denominacion, string $direccion, array $coleccion_prestamos)
    {
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->coleccion_prestamos = $coleccion_prestamos;
    }

    public function getDenominacion(): string
    {
        return $this->denominacion;
    }

    public function getDireccion(): string
    {
        return $this->direccion;
    }

    public function getColeccionPrestamos(): array
    {
        return $this->coleccion_prestamos;
    }

    public function setDenominacion(string $denominacion): void
    {
        $this->denominacion = $denominacion;
    }

    public function setDireccion(string $direccion): void
    {
        $this->direccion = $direccion;
    }

    public function setColeccionPrestamos(array $coleccion_prestamos): void
    {
        $this->coleccion_prestamos = $coleccion_prestamos;
    }

    public function __toString(): string
    {
        $output = "═══════════════════════════════════\n";
        $output .= "          FINANCIERA         \n";
        $output .= "═══════════════════════════════════\n";
        $output .= "Denominación: {$this->getDenominacion()}\n";
        $output .= "Dirección: {$this->getDireccion()}\n";
        $output .= "\nPrestamos:\n";
        $output .= "-----------------------------------\n";
        $output .= $this->convertirAstring($this->getColeccionPrestamos()) . "\n";

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
    public function incorporarPrestamo($préstamo){
        //TODO:Agrega un préstamo a la colección.
    }
    public function otorgarPrestamoSiCalifica(){
        //TODO:Verifica que el monto por cuota no supere el 40% del `neto` del solicitante.  
        //- Si cumple, invoca `_otorgarPrestamo()*Clase Prestamo*`
    }
    public function informarCuotaPagar($idPrestamo){
        //TODO:Retorna la próxima cuota a pagar del préstamo (usa `darSiguienteCuotaPagar`*Clase Prestamo*).  
    }
}
