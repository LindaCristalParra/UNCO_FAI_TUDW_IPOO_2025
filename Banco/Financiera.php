<?php
include_once 'Prestamo.php';
include_once 'Cuota.php';
class Financiera
{
    private string $denominacion;
    private string $direccion;
    /** @var Prestamo[] */
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
    public function incorporarPrestamo(Prestamo $nuevoPrestamo): void
    {
        $prestamos=$this->getColeccionPrestamos();
        array_push($prestamos, $nuevoPrestamo);
        $this->setColeccionPrestamos($prestamos);
    }

    public function otorgarPrestamoSiCalifica():array
    {
    /**Implementar el método otorgarPrestamoSiCalifica, método que recorre la lista de préstamos que no
        han sido generadas sus cuotas. Por cada préstamo, se corrobora que su monto dividido la
        cantidad_de_cuotas no supere el 40 % del neto del solicitante, si la verificación es satisfactoria se invoca
        al método otorgarPrestamo.
    */
        foreach ($this->getColeccionPrestamos() as $prestamo) {
            if ($prestamo->getCuotas() == null) {
                $montoCuota = $prestamo->getMonto() / $prestamo->getCantidadDeCuotas();
                // Verifica si el monto de la cuota no supera el 40% del neto del solicitante
                $solicitante = $prestamo->getPersona();
                $montoNeto= $solicitante->getNeto() * 0.4;
                if ($montoCuota <= $montoNeto) {
                    $prestamo->otorgarPrestamo();
                    // Agregar el préstamo a la colección de préstamos
                    $this->incorporarPrestamo($prestamo);
                }                
            }
        }
        return $this->getColeccionPrestamos();
    }
    public function informarCuotaPagar($idPrestamo)
    {
        /**Implementar el método informarCuotaPagar(idPrestamo) que recibe por parámetro la identificación del
        préstamo, se busca el préstamo en la colección de prestamos y si es encontrado se obtiene la siguiente
        cuota a pagar. El método debe retornar la referencia a la cuota. Utilizar para su implementación el
        método darSiguienteCuotaPagar */
        foreach ($this->getColeccionPrestamos() as $prestamo) {
            if ($prestamo->getIdentificacion() == $idPrestamo) {
                return $prestamo->darSiguienteCuotaPagar();
            }
        }
    }
}
