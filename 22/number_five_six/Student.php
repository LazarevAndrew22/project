<?php


class Student extends User
{
    private int $courseNumber;
    private int $scholarship;



    public function __construct($name, $age, $courseNumber, $scholarship)
    {
        $this->name = $name;
        $this->age = $age;
        $this->scholarship = $scholarship;
        $this->courseNumber = $courseNumber;
        var_dump("Меня зовут {$name}, мне {$age}. Я студент {$courseNumber}-го курса и моя стипендия {$scholarship}");
    }

    /**
     * @return int
     */
    public function getScholarship(): int
    {
        return $this->scholarship;
    }

    /**
     * @param int $scholarship
     */
    public function setScholarship(int $scholarship): void
    {
        $this->scholarship = $scholarship;
    }

    /**
     * @return int
     */
    public function getCourseNumber(): int
    {
        return $this->courseNumber;
    }

    /**
     * @param int $courseNumber
     */
    public function setCourseNumber(int $courseNumber): void
    {
        $this->courseNumber = $courseNumber;
    }

}