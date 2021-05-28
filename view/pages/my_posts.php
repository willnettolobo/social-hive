<?php 
require_once '../../services/PostService.php';
require_once '../../services/UserService.php';
session_start(); 

$postService = new PostService();
$userService = new UserService();


if ($_SESSION["username"]) {
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/my_posts.css">

    <title>My Posts - Social Hive</title>
</head>

<body>

    <?php 
    require_once '../layout/header.php';
    ?>
   
    <main>
        <div class="container">
        
    <?php 
        $posts = $postService->listMyPosts($_SESSION["id"]);
        while($post = mysqli_fetch_assoc($posts)){
    ?>
        <label for="post"><?php echo $post["username"]; ?></label>

        <textarea id="post" name="post" maxlength="500" rows="5" cols="33" readonly="true"><?php echo $post["description"]; ?></textarea>
        <a href="delete_post.php?id=<?php echo $post["post_id"]; ?>"><span class="delete-post">Delete Post</span></a>
        
    <?php
    }
    ?>
    </div>
<!-- SCRIPT JS-->
<script src="https://kit.fontawesome.com/0617e48d0b.js" crossorigin="anonymous"></script>
<script src="../../assets/js/like.js"></script>
</body>
</html>

<?php 
} else {
     header("location:login.php");
} 
?>