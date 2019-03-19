<?php
require 'core.php';

use Classes\User;

$login = $_POST['login'];
$password = $_POST['password'];

$user = new User();
$user->setLogin($login);
$user->setPassword($password);
$user->save();

//$statement = $pdo->prepare(
//    "SELECT * FROM `Users`
//WHERE `login` = :login LIMIT 2 OFFSET :page");
//$statement->bindValue(':login', $login, PDO::PARAM_STR);
//$statement->bindValue(':page', (int)$page, PDO::PARAM_INT);
//$statement->execute();
//
//$users = $statement->fetchAll();
//
//foreach ($users as $user) {
//    echo $user['password'] . '<br>';
//}

?>