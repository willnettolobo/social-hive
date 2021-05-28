<?php
require_once '../../services/PostService.php';
require_once '../../services/UserService.php';
session_start(); 

if ($_SESSION["username"]) {


    $userService = new UserService();

    $userService->addSeguidor($_SESSION["id"], $_GET["id"]);
    header("location:profile.php");

} else {
    header("location:login.php");
}

?>