<?php 
require_once "./includes/config_session.inc.php";
require_once "./includes/login_view.inc.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="./css/style.css">
</head>
<body>

    <h3 style="font-size: 2rem; margin: 1em;">Login</h3>
    <form action="./includes/login.inc.php" method="post">
        <input required type="text" name="username" placeholder="Username">
        <input required type="password" name="pwd" placeholder="Password">
        <button type="submit">Login</button>
    </form>
    <p style="margin-top: 1em;">Don't have an account? <a href="./index.php">Click Here to Signup</a></p>
    <?php  
    check_login_errors();
    ?>
    
    
</body>
</html>