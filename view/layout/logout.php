<?php session_start(); ?>
<?php require_once "../../services/UserService.php"; ?>

<?php
$userService = new UserService();
?> 

<?php
$userService->signout();
?>


