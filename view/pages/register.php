<?php 
require_once '../../db.mysql/database.php'; 
require_once '../../services/UserService.php';
session_start();
?>

<?php 
$userService = new UserService();
?>

<?php
if(isset($_POST["username"])) 
{
    if($userService->create($_POST["username"], $_POST["password"]))
    {
        header("location:login.php");
    }
    else 
    {
        $mensagem = "Erro ao cadastrar o registro no banco!";
        echo $mensagem;
    }
}


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/register.css">

    <title>Register - Social Hive</title>
</head>

<body>
    <main class="card">
        <div class="login-box">
        <h1>Register</h1>

        <form method="post">
            <label for="username">
                <span>Username</span>
                <input type="text" class="text-field" name="username" id="username">
            </label>

            <label for="password">
                <span>Password</span>
                <input type="password" class="text-field" name="password" id="password">
            </label>
           
            <input type="submit" class="button" value="Confirm">
            
        </form>
        </div>    
    </main>
</body>
</html>