<?
class Persona{
    private string $nombre;
    private string $apellido;
    private int $dni;
    private string $direccion;
    private string $mail;
    private string $telefono;
    private float $neto;

    public function __construct(string $nombre, string $apellido, int $dni, string $direccion, string $mail, string $telefono, float $neto) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->dni = $dni;
        $this->direccion = $direccion;
        $this->mail = $mail;
        $this->telefono = $telefono;
        $this->neto = $neto;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function getApellido(): string {
        return $this->apellido;
    }

    public function getDni(): int {
        return $this->dni;
    }

    public function getDireccion(): string {
        return $this->direccion;
    }

    public function getMail(): string {
        return $this->mail;
    }

    public function getTelefono(): string {
        return $this->telefono;
    }

    public function getNeto(): float {
        return $this->neto;
    }

    public function setNombre(string $nombre): void {
        $this->nombre = $nombre;
    }

    public function setApellido(string $apellido): void {
        $this->apellido = $apellido;
    }

    public function setDni(int $dni): void {
        $this->dni = $dni;
    }

    public function setDireccion(string $direccion): void {
        $this->direccion = $direccion;
    }

    public function setMail(string $mail): void {
        $this->mail = $mail;
    }

    public function setTelefono(string $telefono): void {
        $this->telefono = $telefono;
    }

    public function setNeto(float $neto): void {
        $this->neto = $neto;
    }

    public function __toString(): string {

        $output = "═══════════════════════════════════\n";
        $output .= "               PERSONA         \n";
        $output .= "═══════════════════════════════════\n";
        $output .= "Nombre: {$this->getNombre()}\n";
        $output .= "Apellido: {$this->getApellido()}\n";
        $output .= "DNI: {$this->getDni()}\n";
        $output .= "Dirección: {$this->getDireccion()}\n";
        $output .= "Mail: {$this->getMail()}\n";
        $output .= "Teléfono: {$this->getTelefono()}\n";
        $output .= "Neto: {$this->getNeto()}\n";

        return $output;
    }
}
?>