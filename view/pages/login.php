<?php require_once "../../services/UserService.php" ?>
<?php session_start(); ?>

<?php
$userService = new UserService();
?>

<?php
        if (isset($_POST["username"])) {
            if ($userService->signin($_POST["username"], $_POST["password"])) {
                header("location:feed.php");
            } else {
                $mensagem = "Usuário ou senha inválidos";
                ?>
                <div class="alert-error"><?php echo $mensagem ?></div>
                <?php
            }
        }
    ?>


<!DOCTYPE html>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/login.css">

    <title>Login - Social Hive</title>
</head>

<body>
    <main class="card">
    
        <div class="login-box">
        <h1>Login</h1>
        
        <form method="post">
            <label for="username">
                <span>Username</span>
                <input type="text" class="text-field" name="username" id="username">
            </label>

            <label for="password">
                <span>Password</span>
                <input type="password" class="text-field" name="password" id="password">
            </label>

            <input type="submit" class="button1" value="Sign-in">    
        </form>
        <a class="create" href="register.php">Create account</a>
        </div>    
    </main>
</body>
</html>