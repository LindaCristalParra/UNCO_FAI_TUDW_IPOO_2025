<?
class Locomotora {
    private float $peso;
    private float $velocidadmax;
    
    public function __construct(float $peso, float $velocidadmax) {
        $this->peso = $peso;
        $this->velocidadmax = $velocidadmax;
    }

    public function getPeso(): float {
        return $this->peso;
    }

    public function getVelocidadmax(): float {
        return $this->velocidadmax;
    }

    public function setPeso(float $peso): void {
        $this->peso = $peso;
    }

    public function setVelocidadmax(float $velocidadmax): void {
        $this->velocidadmax = $velocidadmax;
    }

    public function __toString(): string {
        $output = "Peso: " . $this->getPeso() . "\n";
        $output .= "Velocidad Maxima: " . $this->getVelocidadmax() . "\n";
        return $output;
    }
}
?>