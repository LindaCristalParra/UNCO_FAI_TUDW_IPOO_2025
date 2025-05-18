<?php

class Cliente extends Persona {
    private int $nroCliente;

    public function __construct(int $dni, string $nombre, string $apellido, int $nroCliente) {
        parent::__construct($dni, $nombre, $apellido);
        $this->nroCliente = $nroCliente;
    }

    public function getNroCliente(): int {
        return $this->nroCliente;
    }

    public function setNroCliente(int $nroCliente): void {
        $this->nroCliente = $nroCliente;
    }

    public function __toString(): string {
        $cadena = parent::__toString();
        $cadena .= "\nNúmero de Cliente: " . $this->getNroCliente();
    }
}

?>