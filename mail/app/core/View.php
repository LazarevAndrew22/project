<?php


namespace app\core;


use JetBrains\PhpStorm\NoReturn;

class View
{

    public $path;
    public $route;
    public $layout = 'default';
    public $letters = [];

    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $route['controller'] . '/' . $route['action'];

    }

    public function render($title, $letters = [], $mailers= [], $themes = [], $sentLetters=[], $sentThemes=[], $recipients = []): void
    {

        $path = 'app/views/' . $this->path . '.php';
        if (file_exists($path)) {

            ob_start();
            require $path;
            $content = ob_get_clean();


            require 'app/views/layouts/' . $this->layout . '.php';
        } else {
            echo "The view not found" . $this->path;
        }
    }

    public function redirect($url): void
    {
        header('location: /' . $url);
        exit;
    }


    public static function errorCode($code): void
    {
        http_response_code($code);
        $path = 'app/views/errors/' . $code . '.php';
        if (file_exists($path)) {
            require $path;
        }
        exit;
    }

    public function message($status, $message): void
    {
        exit(json_encode(['status' => $status, 'message' => $message], JSON_THROW_ON_ERROR));
    }

    public function location($url): void
    {
        exit(json_encode(['url' => $url]));
    }
}