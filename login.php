<html>
<?php include_once 'templates/libs.php';
$auth = false;
$login = $_POST['login'];
$password = $_POST['password'];

$dsn = "mysql:host=127.0.0.1;dbname=store";
$pdo = new PDO($dsn, 'root', '1234');

$statement = $pdo->prepare("SELECT * FROM `Users` WHERE `Login` = :login");
$statement->bindParam(':login', $login, PDO::PARAM_STR);
$statement->execute();
$user = $statement->fetch();

$hash = hash('sha256', $password);
if ($user['Password'] == $hash) {
    $auth = true;
}

?>
<body>
<div class="cloginontainer">
    <div class="row">
        <div class="col-6 offset-3 mt-5">
            <form class="form-signin" action="login.php" method="post">
                <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt=""
                     width="72" height="72">
                <h1 class="h3 mb-3 font-weight-normal">Please log in</h1>
                <label for="inputLogin" class="sr-only">Login</label>
                <input type="text" name="login" id="inputLogin" class="form-control" placeholder="Login" required
                       autofocus>
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password"
                       required>
                <button class="mt-2 btn btn-lg btn-primary btn-block" type="submit">Log in</button>
                <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
            </form>
            <?php if ($auth && $login) { ?>
                <div class="alert alert-success">
                    Hello, <?php echo $login ?>!
                </div>
            <?php } elseif ($login) { ?>
                <div class="alert alert-danger">
                    No such user. Wrong login or password
                </div>
            <?php } ?>
        </div>
    </div>
</div>
</body>
</html>
