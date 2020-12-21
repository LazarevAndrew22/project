<?php

require_once __DIR__.'/Worker.php';

$worker = new Worker();
$worker->name = 'Andrew';
$worker->age = 20;
$worker->salary = 1000;

$worker1 = new Worker();
$worker1->name='Sasha';
$worker1->age = 20;
$worker1->salary=1300;

$sumAge = $worker->age + $worker1->age;
var_dump('Сумма возрастов двух роботников '. $sumAge. ' лет');

$sumSalary = $worker->salary + $worker1->salary;
var_dump('Сумма зарплат двух роботников '. $sumSalary. ' $');
