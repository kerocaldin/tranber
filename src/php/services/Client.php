<?php
namespace tramber\services;

use tramber\structures\Service;

class Client extends Sercice implements ClientInterface
{
    public static function getInstance()
    {
        return self::getSingletonInstance(self::class);
    }

    public function isLogged() :bool {

        return $_SESSION['logged'] ?? false;

    }

    public function logIn(iterable $user) :ClientInterface{
        $_SESSION['logged'] = true;
        $_SESSION['user']   = $user;
        return $this;

    }

    public function logOut() :ClientInterface{
        $_SESSION['logged'] = false;
        $_SESSION['user']   = [];
        return $this;
    }
}