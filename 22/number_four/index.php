<?php

require __DIR__ . '/Worker.php';

$worker = new Worker('Andrew', 20, 1000);
$result = $worker->getSalary() * $worker->getAge();
var_dump("Произведение возраста и зарплаты равняется {$result}");