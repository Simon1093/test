<?php session_start() ?>
<html>
<?php include_once 'templates/libs.php' ?>

<body>

<?php

$dsn = "mysql:host=127.0.0.1;dbname=store";
$pdo = new PDO($dsn, 'root', '1234');

$statement = $pdo->query("SELECT * FROM `Goods`");
$goods = $statement->fetchAll();

//$statement = $pdo->prepare("INSERT INTO `Goods`(`Name`, `Price`, `isHere`, `StorageID`) VALUES (:name, :price, :isHere, :sid)");
//$statement->execute(array(
//    "name" => 'Stepler',
//    "price" => 30,
//    "isHere" => 1,
//    "sid" => 2
//));


?>

<div class="container">
    <div class="row mt-3">
        <div class="col">
            <?php foreach ($goods as $good) { ?>
            <div class="alert alert-light">
                <?php
                echo $_SESSION['login'];
                echo $good['Name'] . ' - ' . $good['Price'] ?>
            </div>
            <?php } ?>
        </div>
    </div>

</div>


</body>
</html>

