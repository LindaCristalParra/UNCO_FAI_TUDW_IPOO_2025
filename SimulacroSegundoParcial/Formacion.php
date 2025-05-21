<?php
class Formacion
{
    private Locomotora $objLocomotora;
    private array $colVagones;
    private int $cantMaxVagones;

    public function __construct(Locomotora $objLocomotora, int $cantMaxVagones, array $colVagones = [])
    {
        $this->objLocomotora = $objLocomotora;
        $this->cantMaxVagones = $cantMaxVagones;
        $this->colVagones;
    }

    public function getObjLocomotora(): Locomotora
    {
        return $this->objLocomotora;
    }

    public function getColVagones(): array
    {
        return $this->colVagones;
    }

    public function getCantMaxVagones(): int
    {
        return $this->cantMaxVagones;
    }

    public function setObjLocomotora(Locomotora $objLocomotora): void
    {
        $this->objLocomotora = $objLocomotora;
    }

    public function setColVagones(array $colVagones): void
    {
        $this->colVagones = $colVagones;
    }

    public function setCantMaxVagones(int $cantMaxVagones): void
    {
        $this->cantMaxVagones = $cantMaxVagones;
    }

    public function __tostring(): string
    {
        $output = "Locomotora:\n" . $this->getObjLocomotora() . "\n";
        $output .= "Cantidad Maxima de Vagones: " . $this->getCantMaxVagones() . "\n";
        $output .= "Vagones:\n";

        foreach ($this->colVagones as $vagon) {
            $output .= $vagon . "\n";
        }

        return $output;
    }

    // Implementar el método incorporarPasajeroFormacion que recibe la cantidad de pasajeros que se
    // desea incorporar a la formación y busca dentro de la colección de vagones aquel vagón capaz de
    // incorporar esa cantidad de pasajeros. Si no hay ningún vagón en la formación que pueda ingresar la
    // cantidad de pasajeros, el método debe retornar un valor falso y verdadero en caso contrario. Puede
    // utilizar la función is_a para saber si se trata de un vagón de carga o de pasajeros. 
    public function incorporarPasajeroFormacion(int $pasajeros): bool
    {
        $incorporado = false;
        $vagones = $this->getColVagones();
        $cantVagones = count($vagones);
        $contador = 0;

        do {

            if (var_dump(is_a($vagones[$contador], 'VagonPasajero'))) {
                $vagon = $vagones[$contador];
                if ($vagon->getCantPasajeros() + $pasajeros <= $vagon->getCantidadMaxpasajeros()) {
                    $vagon->incorporarPasajeVagon($pasajeros);
                    $incorporado = true;
                } else {
                    $contador++;
                }
            }

        } while ($contador <= $cantVagones && $incorporado == false);

        return $incorporado;
    }

    // Implementar el método incorporarVagonFormacion que recibe por parámetro un objeto vagón y lo
    // incorpora a la formación. El método retorna verdadero si la incorporación se realizó con éxito 
    // y falso en caso contrario
    public function incorporarVagonFormacion(Vagon $vagon): bool
    {
        $incorporado = false;

        if (count($this->getColVagones()) < $this->cantMaxVagones) {
            $vagones = $this->getColVagones();
            array_push($vagones, $vagon);
            $this->setColVagones($vagones);
            $incorporado = true;
        }
        return $incorporado;
    }

    // Implementar el método promedioPasajeroFormacion el cual recorre la colección de vagones y retorna
    // un valor que represente el promedio de pasajeros por vagón que se encuentran en la formación. Puede
    // utilizar la función is_a para saber si se trata de un vagón de carga o de pasajeros. 
    public function promedioPasajerosFormacion(): float
    {

        $promedio = 0;
        $cantPasajeros = 0;

        $vagones = $this->getColVagones();
        foreach ($vagones as $vagon) {
            if (is_a($vagon, 'VagonPasajero')) {
                $cantPasajeros += $vagon->getCantPasajeros();
            }
        }
        if ($cantPasajeros != 0) {
            $promedio = $cantPasajeros / count($vagones);
        }
        return $promedio;
    }

    // Implementar el método pesoFormacion el cual retorna el peso de la formación completa.

    public function pesoFormacion(): float
    {
        $pesoFormacion = 0;
        $pesoLocomotora = $this->getObjLocomotora()->getPeso();
        $pesoFormacion += $pesoLocomotora;

        $vagones = $this->getColVagones();
        foreach ($vagones as $vagon) {
            $vagon->calcularPesoVagon();
            $pesoFormacion += $vagon->calcularPesoVagon();
        }
        return $pesoFormacion;

    }

    // Implementar el método retornarVagonSinCompletar el cual retorna el primer vagón de la formación que
    // aún no se encuentra completo

    public function retornarVagonSinCompletar(): ?Vagon
    {
        $vagones = $this->getColVagones();
        $cantVagones = count($vagones);
        $contador = 0;
        $vagonSinCompletar = null;

        do {
            if (is_a($vagones[$contador], 'VagonPasajero')) {
                if ($vagones[$contador]->getCantPasajeros() < $vagones[$contador]->getCantidadMaxpasajeros()) {
                    $vagonSinCompletar = $vagones[$contador];
                }
            }
            $contador++;
        } while ($contador <= $cantVagones && $vagonSinCompletar == null);

        return $vagonSinCompletar;
    }


}
?>