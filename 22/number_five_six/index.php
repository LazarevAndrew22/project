<?php


require __DIR__ . '/User.php';
require __DIR__ . '/Worker.php';
require __DIR__ . '/Student.php';
require __DIR__ . '/Driver.php';

$worker = new Worker('Иван', 25, 1000);

$worker1 = new Worker('Вася', 26, 2000);

$student = new Student('Андрей', 20, 3, 50);

$driver = new Driver('Dima', 45, 2000, 5, 'C');
$sumSalary = $worker->getSalary() + $worker1->getSalary();
var_dump("Сумма зарплат Ивана и Васи равняется {$sumSalary}");
