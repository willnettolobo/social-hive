<?php 
require_once '../../db.mysql/database.php'; 
require_once '../../services/UserService.php';
require_once '../../services/PostService.php';
session_start();
?>

<?php 
$userService = new UserService();

if ($_SESSION["username"]) {
?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/search.css">
    

    <title>Search - Social Hive</title>
</head>

<body>

    <?php 
    require_once '../layout/header.php';
    ?>

    <main>
    <div class="container">
        <form method="POST">
               
        <div class="search">
            <label for="user">Search for a User: </label>
            <input type="text" name="user" class="text"> 
        </div>

        <input type="submit" value="Search">
        </form>

        <?php
        if(isset($_POST["user"])) {
        ?>
        <div class="login-box">
        <label class="user-title">List User</label>
        <?php 
        $searchUsers = $userService->searchUser($_POST["user"], $_POST["user"]);
        while($search = mysqli_fetch_assoc($searchUsers)) {
        ?>
        <ul class="list-user">
            <?php 
                $get =  $search["id"] ."&username=". $search["username"];
            ?>
           <a href="profileusers.php?id=<?php echo $get ?>"><li>User: <?php  echo $search["username"];?></li></a>
        </ul>
    <?php } ?>
        <?php } ?>
        </div>    
    
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