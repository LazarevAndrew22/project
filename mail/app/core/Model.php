<?php


namespace app\core;

use app\lib\Db;
use JetBrains\PhpStorm\NoReturn;

abstract class Model
{
    public Db $db;
    public string $error = 'OK';

    public function __construct()
    {
        $this->db = new Db;
    }

//    public function inboxLetters($array): array
//    {
//        $letters = [];
//        foreach ($array as $el){
//            $letters[] = $el;
//        }
//        return $letters;
//    }


}