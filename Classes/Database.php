<?php

namespace Classes;

class Database
{
    public static function getPDO()
    {
        $host = '127.0.0.1';
        $db = 'test_project';
        $user = 'root';
        $passwordMySql = '1234';

        $dsn = "mysql:host=$host;dbname=$db";
        $pdo = new \PDO($dsn, $user, $passwordMySql);

        return $pdo;
    }
}