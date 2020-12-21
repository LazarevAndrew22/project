<?php


class Cookie
{
    public function setCookie($cookieName, $cookieValue): void
    {
        setcookie($cookieName, $cookieValue, time() + 3600);
        echo "Cookie {$cookieName} is set!";
        echo "Value is: " . $_COOKIE[$cookieName];

    }

    public function deleteCookie($cookieName): void
    {
        setcookie($cookieName, time() - 6400);
        echo "Cookie {$cookieName} was deleted!";
    }

}


