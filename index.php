<?php 
require_once "./includes/config_session.inc.php";
require_once "./includes/signup_view.php";
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

    <h3 style="font-size: 2rem; margin: 1em;">Signup</h3>
    <form action="./includes/signup.inc.php" method="post">
        <input required type="text" name="username" placeholder="Username">
        <input required type="text" name="email" placeholder="Email">
        <input required type="password" name="pwd" placeholder="Password">
        <button type="submit">Signup</button>
    </form>
    <p style="margin-top: 1em;">Already have an account? <a href="./login.php">Click Here to Login</a></p>

    <?php 
    check_errors(); 
    ?>
    
    
</body>
</html>