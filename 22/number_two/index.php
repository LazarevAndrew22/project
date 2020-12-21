<?php

require_once __DIR__ .'/Worker.php';

$ivan = new Worker();
$vasya = new Worker();

$ivan->setName('Иван');
$ivan->setAge(25);
$ivan->setSalary(1000);

$vasya->setName('Вася');
$vasya->setAge(26);
$vasya->setSalary(2000);

$sumSalary = $ivan->getSalary() + $vasya->getSalary();
var_dump('Сумма зарплат роботников ' .$sumSalary .' $');

$sumAge = $ivan->getAge() + $vasya->getAge();
var_dump('Сумма возрастов роботников ' . $sumAge .' лет/год');

