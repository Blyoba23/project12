<?php

class MyModel
{
    public function registerUser(string $login, string $password)
    {
        return Database::register($login, $password);
    }

    public function loginUser(string $login, string $password)
    {
        return Database::login($login, $password);
    }
}