# FACULTAD DE INFORMÁTICA  
**CÁTEDRA INTRODUCCIÓN POO**  

# Primer Parcial, Tema 1: Banco  

Un banco desea gestionar información de préstamos y cuotas. Se implementarán las clases:  
- `Financiera`  
- `Préstamo`  
- `Cuota`  
- `Persona`  

---

## Clase `Persona`  
**Atributos:**  
- `nombre`, `apellido`, `dni`, `dirección`, `mail`, `teléfono`, `neto`.  

**Métodos:**  
1. **Constructor**: Recibe valores iniciales para todos los atributos.  
2. **Getters/Setters** para cada atributo.  
3. **`__toString()`**: Retorna la información de los atributos.  

---

## Clase `Cuota`  
**Atributos:**  
- `número`, `monto_cuota`, `monto_interes`, `cancelada` (inicialmente `false`).  

**Métodos:**  
1. **Constructor**: Recibe `número`, `monto_cuota`, `monto_interes`.  
2. **Getters/Setters**.  
3. **`__toString()`**: Retorna información de la cuota.  
4. **`darMontoFinalCuota()`**: Retorna `monto_cuota + monto_interes`.  

---

## Clase `Préstamo`  
**Atributos:**  
- `identificación`, `fecha_otorgamiento`, `monto`, `cantidad_de_cuotas`, `taza_interés`, `colección_cuotas`, `persona` (referencia).  

**Métodos:**  
1. **Constructor**: Recibe `identificación`, `monto`, `cantidad_de_cuotas`, `taza_interés`, `persona`.  
2. **Getters/Setters**.  
3. **`__toString()`**: Retorna datos del préstamo.  
4. **`_calcularInteresPrestamo(numCuota)`** (privado):  
   - Calcula intereses sobre saldo deudor.  
   - *Ejemplo:*  
     ```  
     Cuota 1: 50,000 * 0.01 = 500  
     Cuota 2: (50,000 - (50,000/5)) * 0.01 = 400  
     ```  
5. **`_otorgarPrestamo()`**:  
   - Establece `fecha_otorgamiento` (fecha actual).  
   - Genera cuotas con `monto_cuota = monto / cantidad_de_cuotas` + intereses.  
6. **`darSiguienteCuotaPagar()`**: Retorna la próxima cuota no cancelada. Si todas están pagas, retorna `null`.  

---

## Clase `Financiera`  
**Atributos:**  
- `denominación`, `dirección`, `colección_préstamos`.  

**Métodos:**  
1. **Constructor**: Recibe `denominación` y `dirección`.  
2. **Getters/Setters**.  
3. **`__toString()`**: Retorna información de la financiera.  
4. **`incorporarPrestamo($préstamo)`**: Agrega un préstamo a la colección.  
5. **`_otorgarPrestamoSiCalifica()`**:  
   - Verifica que el monto por cuota no supere el 40% del `neto` del solicitante.  
   - Si cumple, invoca `_otorgarPrestamo()`.  
6. **`_informarCuotaPagar($idPrestamo)`**: Retorna la próxima cuota a pagar del préstamo (usa `darSiguienteCuotaPagar`).  

---

## Script `TestFinanciera`  
**Pasos a implementar:**  
1. Crear objeto `Financiera`:  
   - Denominación: "Money"  
   - Dirección: "Av. Arg 1234"  
2. Crear 3 préstamos con estos datos:  

   | ID | Monto | Cuotas | Tasa Interés | Persona (nombre, apellido, dirección, mail, teléfono, neto) |  
   |----|-------|--------|-------------|------------------------------------------------------------|  
   | 1  | 50,000| 5      | 0.1         | Pepe, Florez, Bs As 12, dir@mail.com, 299444567, 40000      |  
   | 2  | 10,000| 4      | 0.1         | Luis, Suarez, Bs As 123, dir@mail.com, 2994455, 4000        |  
   | 3  | 10,000| 2      | 0.1         | Luis, Suarez, Bs As 123, dir@mail.com, 2994455, 4000        |  

3. Invocar `incorporarPrestamo()` para cada préstamo.  
4. Mostrar el objeto `Financiera` con `echo`.  
5. Invocar `_otorgarPrestamoSiCalifica()`.  
6. Mostrar `Financiera` nuevamente.  
7. Llamar `_informarCuotaPagar(2)` y guardar resultado en `$objCuota`.  
8. Mostrar `$objCuota`.  
9. Invocar `darMontoFinalCuota()` con `$objCuota` y mostrar el resultado.  
10. Marcar cuota como pagada: `$objCuota->setCancelada(true)`.  
11. Volver a llamar `_informarCuotaPagar(2)` y mostrar la nueva cuota.  

---
