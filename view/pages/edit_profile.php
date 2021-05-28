<?php 
require_once '../../db.mysql/database.php'; 
require_once '../../services/UserService.php';
session_start();
?>

<?php 
$userService = new UserService();
?>

<?php
$row = mysqli_fetch_assoc($userService->listUserById($_GET["id"]));

if(isset($_POST["name"])) {
    if($userService->update($_POST["name"], $_POST["email"], $_POST["gender"], $_GET["id"])) 
    {
        header("location:profile.php");
    } else {
        $mensagem = "Erro ao dar update!";
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
    <link rel="stylesheet" href="../../assets/css/edit_profile.css">

    <title>Edit Profile</title>
</head>

<body>
    <main class="card">
        <div class="login-box">
        <h1>Edit your Profile</h1>

        <form action="edit_profile.php?id=<?php echo $_GET["id"] ?>" method="post">
            <label for="username">
                <span>Username</span>
                <input type="text" class="text-field-grey" value="<?php echo $row["username"] ?>" name="username" id="username" readonly>
            </label>
            
            <label for="name">
                <span>Name</span>
                <input type="text" class="text-field" value="<?php echo $row["name"] ?>" name="name" id="name" required>
            </label>
            
            <label for="email">
                <span>E-mail</span>
                <input type="email" class="text-field" value="<?php echo $row["email"] ?>" name="email" id="email" required>
            </label>
            
            <label for="gender">
                <span>Gender</span>
                <select name="gender" required>
                    <option value="null" selected>Confirm your gender:</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </label>
            
           
           
            <input type="submit" class="button" value="Confirm">
            
        </form>
        </div>    
    </main>
</body>
</html>