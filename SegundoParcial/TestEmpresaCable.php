<?php
$empresa = new EmpresaCable();
$canal1 = new Canal("Canal 1", "Descripción del Canal 1");
$canal2 = new Canal("Canal 2", "Descripción del Canal 2");

$canal3 = new Canal("Canal 3", "Descripción del Canal 3");
$plan1 = new Plan("Plan Básico", 100, 10, [$canal1, $canal2]);
$plan2 = new Plan("Plan Premium", 200, 20, [$canal1, $canal2, $canal3]);
$cliente = new Cliente("Juan Pérez", "12345678", "Calle Falsa 123");
$cliente2 = new Cliente("Ana Gómez", "87654321", "Avenida Siempre Viva 456");
$cliente3 = new Cliente("Carlos López", "11223344", "Boulevard de los Sueños Rotos 789");

$contrato1 = new Contrato($cliente, $plan1, "2023-01-01", "2024-01-01");
$contrato2 = new Contrato($cliente, $plan2, "2023-02-01", "2024-02-01");
$contrato3 = new Contrato($cliente, $plan1, "2023-03-01", "2024-03-01");
$empresa->incorporarContrato($contrato1, $$cliente, new DateTime("2023-01-01"), new DateTime("2024-01-01"), true) ;
$empresa2->incorporarContrato($contrato2, $cliente2, new DateTime("2023-02-01"), new DateTime("2024-02-01"), false);
$empresa3->incorporarContrato($contrato3, $cliente3, new DateTime(""), new DateTime(""),true) ;