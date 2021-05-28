<?php
require_once '../../services/UserService.php';
require_once '../../services/PostService.php';

session_start(); 
?>


<?php
if ($_SESSION["username"]) {
$userService = new UserService();
$postService = new PostService();

$followers = mysqli_fetch_assoc($userService->maxSeguidor($_SESSION["id"]));
$followings = mysqli_fetch_assoc($userService->maxSeguindo($_SESSION["id"]));
$maxPost = mysqli_fetch_assoc($postService->quantifyPosts($_SESSION["id"]));
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/profile.css">
    

    <title>Post - Social Hive</title>
</head>

<body>

    <?php 
    require_once '../layout/header.php';
    ?>

    <main class="card">
        <div class="login-box">
        <label class="user-title"><?php echo $_SESSION["username"] ?></label>
        <a href="following.php?id=<?php $_SESSION["id"] ?>"><span class="followers"><?php echo $followings["followings"] ?> Following</span></a>
        <?php if(empty( $followers["followers"])) { ?>
            <a href="#"><span class="followers">0 Followers</span></a>
        <?php 
        }  else {
        ?>
        <a href="followers.php?id=<?php $_SESSION["id"] ?>"><span class="followers"><?php  echo $followers["followers"]; ?> Followers</span></a>
        <?php } ?>
        <a href="edit_profile.php?id=<?php echo $_SESSION["id"] ?>"><span class="edit_profile">Edit Profile</span></a>
        <a href="my_posts.php?id=<?php echo $_SESSION["id"] ?>"><span class="edit_profile"><?php echo $maxPost["quantifyPosts"]?> Posts</span></a>
        </div>    
    </main>

</body>
</html>


<?php
} else {
    header("location:login.php");
}

?>