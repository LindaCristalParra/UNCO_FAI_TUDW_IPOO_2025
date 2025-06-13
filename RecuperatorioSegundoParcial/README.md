Ejercicio


Se desea desarrollar una aplicación para un organismo encargado de las autopistas de un país, el cual está instalando un sistema de cobro de peajes en varias de sus carreteras más importantes. Para ello se emiten recibos correspondientes al cobro del peaje. De los recibos de cobro del peaje se conoce el número del recibo, el valor, la fecha, hora y se almacena una referencia al registro del vehículo. Los registros de vehículos pueden ser de: camiones, transportes escolares o vehículos particulares. En los registros de  vehículos se almacena el número de patente,  si se trata del registro de  camiones se almacena el peso y la cantidad de ejes de los mismos. por último de los registros de vehículos que trabajan como transporte escolar se almacena la capacidad máxima de niños que puede transportar.

Cada registro de un vehículo sabe cómo calcular el valor correspondiente al peaje, por defecto el valor base del peaje es de $20.  Adicionalmente los registros de  camiones que llegan a una cabina de peaje deben pagar $100 por cada eje y $15 por cada tonelada del peso total del camión. También se les cobrará un impuesto de transporte del 2% a los camiones que pesen menos de 5 toneladas y un impuesto del 5% a los camiones que pesen más de 5 toneladas. Por otro lado, los los registros de vehículos que funcionan como transporte escolar deben pagar un monto fijo que se calcula en base a un monto base de  $25 (valor base por defecto de los transportes) por la capacidad (ej: si puede transportar hasta 10 niños el adicional de peaje es de $250).﻿ 

La cabina de peaje se encarga de almacenar y gestionar toda la información de los recibos y de los registros (se almacena una única colección con los registros de vehículos). Al final del día se analiza la información de cada cabina de peaje en función de los recibos que registró.

1- Implementar dentro de la clase  CabinaPeaje, la definición de las variables instancias y el método contructor.

class CabinaPeaje { 

# Definir cada var instacia.

#  Definir metodo constructor

}

2  Implementar el método __toString de la clase CabinaPeaje 
3  Implementar dentro de la clase  Recibo , la definición de las variables instancias y el método contructor.

class Recibo{ 

# Definir cada var instancia.

#  Definir método constructor

} 

4  Implementar dentro de la clase  RegistroVehículo , la definición de las variables instancias y el método contructor.

class RegistroVehículo { 

# Definir cada var instancia.

#  Definir método constructor

} 

Ademas  implementar   las clases correspondientes a la jerarquía de RegistroVehículo que puede identificar del enunciado

5  Implementar en la clase RegistroVehículo  el método valorPeaje(), que calcula y retorna el valor final a pagar por un vehículo. 

Redefinir según corresponda, indicando la clase en la que se debe encontrar el método y detallando su implementación.

Ej

Class RegistroVehículo {

 public function valorPeaje.......{

                  ## cada una de las sentencias del método

}

Class XXXX extends YYYY  {     · ## siendo XXXX y  YYYY   el nombre de las clases 

 public function valorPeaje..........{

                  ## cada una de las sentencias del método

}

6  Implementar en la clase CabinaPeaje el método cobrarPeaje($unTipoRegistroVehículo, $info)﻿ que obtiene el valor del peaje del vehículo, genera y retorna el recibo correspondiente. 

La función recibe por parámetro un tipo que permite identificar el tipo de registro que corresponde y un arreglo asociativo $info con la información correspondiente según el tipo de registro. Crear el tipo de registro correspondiente, el recibo y retornarlo como resultado de la función

7 Implementar en la clase CabinaPeaje el método reciboMayorMonto($fecha) que retorna el recibo con mayor valor de peaje para una fecha dada.

8  Implementar en la clase CabinaPeaje el método recaudacionXTipoVehiculo($fecha,$tipoRegistroVehiculo) que retorna el monto total recaudado por la cabina, para una fecha y un tipo de vehículo dado. (Puede utilizar la función de PHP get_class($objeto) que retorna el nombre de la clase a la que pertenece el objeto. Por ejemplo get_class($unaInstanciaCamion) retorna el nombre la clase «Camion»   )

9  Implementar en la clase CabinaPeaje el método totalRecaudado($fecha) que retorna el monto total recaudado por la cabina para una fecha dada.

10   Se crea 1 instancia de la clase CabinaPeaje. 
Se crean 3 instancias de RegistroVehículo , 1 correspondiente a un Scania, 1 a una Trafic que funciona como transporte escolar, 1 a un Toyota Corolla. Los demás atributos/características pueden contener los valores que defina
Invocar con cada instancia del inciso anterior al método valorPeaje() y visualizar el resultado.

11  Invocar al método cobrarPeaje() y visualizar el resultado.. 
Invocar al método reciboMayorMonto(“15/06/2024”) a partir de la instancia CabinaPeaje y visualizar el resultado. 
Invocar al método totalRecaudado(“15/06/2024”) a partir de la instancia CabinaPeaje y visualizar el resultado.