<?php 
require_once '../../db.mysql/database.php'; 
require_once '../../services/UserService.php';
require_once '../../services/PostService.php';
session_start();
?>

<?php 
$userService = new UserService();
$postService = new PostService();

if ($_SESSION["username"]) {
?>

<?php
if(isset($_POST["post"])) 
{
    if($postService->create($_POST["post"], $_SESSION["id"]))
    {
        header("location:feed.php");
        $mensagem = "Sucessuful";
        echo $mensagem;
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
    <link rel="stylesheet" href="../../assets/css/post.css">
    

    <title>Post - Social Hive</title>
</head>

<body>

    <?php 
    require_once '../layout/header.php';
    ?>

    <main>
    <div class="container">
        <form method="POST">
        <label for="post">Talk about your day!!</label>

        <textarea id="post" name="post" maxlength="500" rows="5" placeholder="What's happening?" cols="33"></textarea>

        <input type="submit" value="Post">
    </form>
    </div>  
    </div>
`   </main>

</body>
</html>

<?php
} else {
    header("location:login.php");
}

?>