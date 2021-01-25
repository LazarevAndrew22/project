<?php


namespace app\core;

use app\core\View;
use JetBrains\PhpStorm\Pure;

abstract class Controller
{

    public $route;
    public $view;
    public $access;

    public function __construct($route)
    {
        $this->route = $route;
        if (!$this->checkAccess()) {
            View::errorCode(403);
        }
        $this->view = new View($route);
        $this->model = $this->loadModel($route['controller']);


    }

    public function loadModel($name)
    {
        $path = 'app\models\\' . ucfirst($name);
        if (class_exists($path)) {
            return new $path;
        }
    }



    public function checkAccess(): bool
    {
        $this->access = require 'app/access/'.$this->route['controller'].'.php';
        if ($this->isAccess('all'))
        {
            return true;
        }
        if (isset($_SESSION['userEmail']) && $this->isAccess('authorized')) {
            return true;
        }
        if (!isset($_SESSION['account']['id']) && $this->isAccess('guest')) {
            return true;
        }
        return false;
    }

    public function isAccess($key): bool
    {
        return in_array($this->route['action'], $this->access[$key], true);
    }
}