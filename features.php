<?php session_start() ?>
<html>
<?php include_once 'templates/libs.php' ?>

<body>

<?php

$dsn = "mysql:host=127.0.0.1;dbname=store";
$pdo = new PDO($dsn, 'root', '');

$statement = $pdo->query("SELECT * FROM `Goods`");
$goods = $statement->fetchAll();

//$statement = $pdo->prepare("INSERT INTO `Goods`(`Name`, `Price`, `isHere`, `StorageID`) VALUES (:name, :price, :isHere, :sid)");
//$statement->execute(array(
//    "name" => 'Stepler',
//    "price" => 30,
//    "isHere" => 1,
//    "sid" => 2
//));

$statement->closeCursor();

$goodName = $_POST['goodName'];
$goodPrice = $_POST['goodPrice'];

$statement = $pdo->prepare("INSERT INTO `goods`(`Name`, `Price`) VALUES (:good_name, :prcie)");
$statement->bindParam(':good_name', $goodName);
$statement->bindParam(':prcie', $goodPrice);
$statement->execute();

?>

<div class="container">
    <div class="row mt-3">
        <div class="col">
            <?php foreach ($goods as $good) { ?>
                <div class="alert alert-primary">
                    <?php echo $good['Name'] . ' - ' . $good['Price'] ?>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <form method="post" action="/features.php">
                <label>Good name:</label>
                <input type="text" name="goodName">
                <label>Good price:</label>
                <input type="text" name="goodPrice">
                <input type="submit" value="Сохранить">
            </form>
        </div>
    </div>
    <hr>
    <div class="row mt-3">
        <div class="col" id="goods-list"></div>
    </div>
</div>
</body>
<script src="js/features-ajax.js" type="text/javascript"></script>
</html>
