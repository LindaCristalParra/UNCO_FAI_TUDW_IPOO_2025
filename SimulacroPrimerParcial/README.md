# Simulacro Primer Parcial IPOO - Sistema para un local de venta de motos

## Descripción General
Una empresa de venta de motos desea implementar una aplicación para gestionar información de clientes, motos y ventas. Se deben implementar las clases: `Empresa`, `Venta`, `Cliente` y `Moto`.

---

## Clase Cliente
### Atributos:
- `nombre` (string)
- `apellido` (string)
- `dadoDeBaja` (bool)
- `tipoDocumento` (string)
- `numeroDocumento` (string)

### Métodos:
1. **Constructor**: Recibe valores iniciales para todos los atributos.
2. **Métodos de acceso** (getters/setters) para cada atributo.
3. **`__toString()`**: Retorna la información de los atributos.

---

## Clase Moto
### Atributos:
- `codigo` (int)
- `costo` (float)
- `anioFabricacion` (int)
- `descripcion` (string)
- `porcentajeIncrementoAnual` (float)
- `activa` (bool)

### Métodos:
1. **Constructor**: Recibe valores iniciales para todos los atributos.
2. **Métodos de acceso** (getters/setters) para cada atributo.
3. **`__toString()`**: Retorna la información de los atributos.
4. **`darPrecioVenta()`**: Calcula el valor de venta de la moto:
   - Si `activa = false`, retorna `-1`.
   - Fórmula:  
     `precioVenta = costo + (costo * (aniosTranscurridos * porcentajeIncrementoAnual))`

---

## Clase Venta
### Atributos:
- `numero` (int)
- `fecha` (DateTime)
- `cliente` (Cliente)
- `motos` (array de objetos `Moto`)
- `precioFinal` (float)

### Métodos:
1. **Constructor**: Recibe `numero`, `fecha`, `cliente` y opcionalmente `motos` (array).
2. **Métodos de acceso** (getters/setters) para cada atributo.
3. **`__toString()`**: Retorna información de la venta.
4. **`incorporarMoto(Moto $objMoto)`**:  
   - Agrega la moto a la colección si está activa (`darPrecioVenta() >= 0`).
   - Actualiza `precioFinal` sumando el precio de venta de la moto.

---

## Clase Empresa
### Atributos:
- `denominacion` (string)
- `direccion` (string)
- `clientes` (array de objetos `Cliente`)
- `motos` (array de objetos `Moto`)
- `ventas` (array de objetos `Venta`)

### Métodos:
1. **Constructor**: Recibe valores iniciales para todos los atributos.
2. **Métodos de acceso** (getters/setters) para cada atributo.
3. **`__toString()`**: Retorna información de la empresa.
4. **`retornarMoto(int $codigoMoto)`**:  
   - Busca y retorna la moto con el código especificado.
5. **`registrarVenta(array $colCodigosMoto, Cliente $objCliente)`**:  
   - Crea una venta y agrega las motos disponibles (códigos válidos y activas).  
   - Retorna el importe final de la venta.
6. **`retornarVentasXCliente(string $tipo, string $numDoc)`**:  
   - Retorna un array de ventas asociadas al cliente con el documento especificado.

---

## Script `TestEmpresa`
### Pasos a implementar:
1. Crear 2 clientes (`$objCliente1`, `$objCliente2`).
2. Crear 3 motos con los siguientes datos:

   | Código | Costo    | Año Fabricación | Descripción                     | % Incremento | Activa |
   |--------|----------|------------------|----------------------------------|--------------|--------|
   | 11     | 2,230,000| 2022             | Benelli Imperiale 400            | 85%          | true   |
   | 12     | 584,000  | 2021             | Zanella Zr 150 Ohe               | 70%          | true   |
   | 13     | 999,900  | 2023             | Zanella Patagonian Eagle 250     | 55%          | false  |

3. Crear una empresa:  
   - Denominación: "Alta Gama"  
   - Dirección: "Av Argentina 123"  
   - Motos: `[$obMoto1, $obMoto2, $obMoto3]`  
   - Clientes: `[$objCliente1, $objCliente2]`  
   - Ventas: `[]`

4. Ejecutar pruebas:  
   - `registrarVenta([11, 12, 13], $objCliente2)`  
   - `registrarVenta([0], $objCliente2)`  
   - `registrarVenta([2], $objCliente2)`  
   - `retornarVentasXCliente(...)` para `$objCliente1` y `$objCliente2`.  
   - Mostrar datos de la empresa con `echo`.

---

