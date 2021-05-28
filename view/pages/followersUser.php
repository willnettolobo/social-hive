<?php
require_once '../../services/UserService.php';
session_start(); 
?>


<?php
if ($_SESSION["username"]) {
$userService = new UserService();


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/followers.css">
    

    <title>Followers - Social Hive</title>
</head>

<body>

    <?php 
    require_once '../layout/header.php';
    ?>

    <main class="card">
        <div class="login-box">
        <label class="user-title">Followers</label>
        <?php 
        $followers = $userService->listSeguidor($_GET["id"]);
        while($userfollowers = mysqli_fetch_assoc($followers)) {
        ?>
        <ul class="list-user">
            <li><?php echo $userfollowers["follows"] ?></li>
        </ul>
        <?php } ?>
        </div>    
    </main>

</body>
</html>


<?php
} else {
    header("location:login.php");
}

?>