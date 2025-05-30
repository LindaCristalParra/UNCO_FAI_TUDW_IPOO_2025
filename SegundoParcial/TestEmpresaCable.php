<?php
$empresa = new EmpresaCable();
$canal1 = new Canal("Canal 1", "Descripción del Canal 1");
$canal2 = new Canal("Canal 2", "Descripción del Canal 2");

$canal3 = new Canal("Canal 3", "Descripción del Canal 3");
$plan1 = new Plan("Plan Básico", 100, 10, [$canal1, $canal2]);
$plan2 = new Plan("Plan Premium", 200, 20, [$canal1, $canal2, $canal3]);
$cliente = new Cliente("Juan Pérez", "12345678", "Calle Falsa 123");