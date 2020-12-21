<?php


class Session
{
    private string $name;
    private string $val;
    public function __construct(){
        if(!isset($_SESSION))
        {
            session_start();
        }
    }

    public function createSession($name, $val): string
    {
        $this->name = $name;
        $this->val = $val;
        return $_SESSION[$this->name] = $this->val;

    }
    public function getNameSession(): string
    {
        return $this->val;
    }

    public function checkSession($name): string
    {
        $this->name = $name;
        if (isset($_SESSION[$name])) {
            return "Переменная сессии есть!";
        }
        return "Переменная сессии отсутствует";
    }
    public function delSession($name):void
    {
        unset($_SESSION[$name]);
    }




}