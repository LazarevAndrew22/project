<?php


class Flash {
    protected $saveSession;

    public function __construct() {
        $this->saveSession = new Session();
    }

    public function setMessage($id, $val): void
    {
        $this->saveSession->createSession($id, $val);
    }

    public function getMessage($name): string
    {
        if($this->saveSession->checkSession($name)) {
            return $this->saveSession->getNameSession();
        }
    }
}

