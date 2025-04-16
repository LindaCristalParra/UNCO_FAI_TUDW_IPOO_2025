<?php
include_once "Persona.php";
include_once "Vuelo.php";
include_once "Aerolinea.php";
include_once "Aeropuerto.php";

/**Crear  2 instancias de la clase Aerolíneas. */
$objAerolinea1 = new Aerolinea("01", "Aerolínea 1", []);
$objAerolinea2 = new Aerolinea("02", "Aerolínea 2", []);

/**Crear  4 instancias de la clase vuelo.
A cada instancia de Aerolínea creada en T1, incorporar 2 de los vuelos.  */

$objVuelo1 = new Vuelo(1,1000,new DateTime("2025-10-01"),"Buenos Aires",new DateTime("2025-10-01 10:00"),new DateTime("2025-10-01 12:00"),100,100,new Persona("Linda","Parra","calle1","asd@mail.com","123456789"));
$objVuelo2 = new Vuelo(2,2000,new DateTime("2025-10-02"),"Cordoba",new DateTime("2025-10-02 10:00"),new DateTime("2025-10-02 12:00"),100,10,new Persona("Maria","Flores","calle2","asd@mail.com","123456789"));
$objVuelo3 = new Vuelo(3,3000,new DateTime("2025-10-03"),"Rosario",new DateTime("2025-10-03 10:00"),new DateTime("2025-10-03 12:00"),100,11,new Persona("Mario","Lopez","calle3","asd@mail.com","123456789"));
$objVuelo4 = new Vuelo(4,4000,new DateTime("2025-10-04"),"Bariloche",new DateTime("2025-10-04 10:00"),new DateTime("2025-10-04 12:00"),100,48,new Persona("Pablo","Castillo","calle4","asd@mail.com","123456789"));

/**Crear  4 instancias de la clase vuelo.
A cada instancia de Aerolínea creada en T1, incorporar 2 de los vuelos */
$objAerolinea1->incorporarVuelo($objVuelo1);
$objAerolinea1->incorporarVuelo($objVuelo2);
$objAerolinea2->incorporarVuelo($objVuelo3);
$objAerolinea2->incorporarVuelo($objVuelo4);

/**Crea un objeto de la clase Aeropuerto con la colección de aerolíneas creadas */
$objAeropuerto = new Aeropuerto("Aeropuerto 1", "Calle Aeropuerto 1", [$objAerolinea1, $objAerolinea2]);

/**Invocar y visualizar el resultado del método  ventaAutomatica con cantidad de asientos 3 
 * y como destino alguno de los destinos de los vuelos creados. */
$objVueloAsignado = $objAeropuerto->ventaAutomatica(3, new DateTime("2025-10-01"), "Buenos Aires");


echo $objVueloAsignado;

?>

