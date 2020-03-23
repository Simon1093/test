<?php

$dsn = "mysql:host=127.0.0.1;dbname=store";
$pdo = new PDO($dsn, 'root', '');

$statement = $pdo->query("SELECT * FROM `Goods`");
$goods = $statement->fetchAll();

echo json_encode($goods);