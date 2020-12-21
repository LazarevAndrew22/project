<?php


class Worker
{
    protected string $name;
    protected int $age;
    protected int $salary;

    public function __construct($name, $age, $salary)
    {
        $this->name = $name;
        $this->age = $age;
        $this->salary = $salary;
        var_dump("Меня зовут {$name}, мне {$age} лет. И моя зарплата {$salary} $");
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getSalary(): int
    {
        return $this->salary;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }


}