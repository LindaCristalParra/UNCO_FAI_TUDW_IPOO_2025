<?
class Cliente
{
    private string $nombre;
    private string $apellido;
    private string $tipoDoc;
    private int $numDoc;
    private bool $alta;

    public function __construct(string $nombre, string $apellido, string $tipoDoc, int $numDoc, bool $alta)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->tipoDoc = $tipoDoc;
        $this->numDoc = $numDoc;
        $this->alta = $alta;
    }
    public function getNombre(): string
    {
        return $this->nombre;
    }
    public function getApellido(): string
    {
        return $this->apellido;
    }
    public function getTipoDoc(): string
    {
        return $this->tipoDoc;
    }
    public function getNumDoc(): int
    {
        return $this->numDoc;
    }
    public function getAlta(): bool
    {
        return $this->alta;
    }
    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }
    public function setApellido(string $apellido): void
    {
        $this->apellido = $apellido;
    }
    public function setTipoDoc(string $tipoDoc): void
    {
        $this->tipoDoc = $tipoDoc;
    }
    public function setNumDoc(int $numDoc): void
    {
        $this->numDoc = $numDoc;
    }
    public function setAlta(bool $alta): void
    {
        $this->alta = $alta;
    }
    public function __toString(): string
    {
        $output = "Nombre: {$this->getNombre()}\n";
        $output .= "Apellido: {$this->getApellido()}\n";
        $output .= "Tipo de Documento: {$this->getTipoDoc()}: ";
        $output .= "Número de Documento: {$this->getNumDoc()}\n";
        $output .= "Alta: " . ($this->getAlta() ? 'Si' : 'No') . "\n";

        return $output;
    }
}
?>

   