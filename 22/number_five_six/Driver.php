<?php


class Driver extends Worker
{
    private string $drivingExp;
    private string $drivingCategory;


    public function __construct ($name, $age, $salary, $drivingExp, $drivingCategory)
    {
        $this->name = $name;
        $this->age = $age;
        $this->salary = $salary;
        $this->drivingExp = $drivingExp;
        $this->drivingCategory = $drivingCategory;
        var_dump("My name is {$name}. I am {$age}. My salary is {$salary}, driving experience is {$drivingExp} years, driving category is {$drivingCategory}");

    }

    /**
     * @return string
     */
    public function getDrivingExp(): string
    {
        return $this->drivingExp;
    }

    /**
     * @param string $drivingExp
     */
    public function setDrivingExp(string $drivingExp): void
    {
        $this->drivingExp = $drivingExp;
    }

    /**
     * @return string
     */
    public function getDrivingCategory(): string
    {
        return $this->drivingCategory;
    }

    /**
     * @param string $drivingCategory
     */
    public function setDrivingCategory(string $drivingCategory): void
    {
        $this->drivingCategory = $drivingCategory;
    }

    /**
     * @return string
     */


}