<?php
require_once '../../services/PostService.php';
require_once '../../services/UserService.php';
session_start(); 

if ($_SESSION["username"]) {


    $postService = new PostService();

    $post_id = $_GET["id"];
    $postService->delete($post_id);
    header("location:my_posts.php");

} else {
    header("location:login.php");
}

?>