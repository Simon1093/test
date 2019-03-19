<?php

namespace Classes;

use Classes\Database;

class User extends Database
{
    private $login;
    private $password;

    public function getLogin()
    {
        return $this->login;
    }

    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function save()
    {
        $pdo = Database::getPDO();
        $statement = $pdo->prepare(
            "INSERT INTO `Users`(`login`, `password`) VALUES (:login, :password)");
        $statement->bindValue(':login', $this->login, $pdo::PARAM_STR);
        $statement->bindValue(':password', $this->password, $pdo::PARAM_STR);
        $statement->execute();
    }
}