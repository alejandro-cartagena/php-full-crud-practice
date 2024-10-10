<?php 
require_once "./includes/config_session.inc.php";
require_once "./includes/post_model.inc.php";
require_once "./includes/dbh.inc.php";
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

    <h1 style="margin: 1em 0;">Edit Your Post</h1>

    <?php 
    $postId = $_GET["post_id"];
    $post = get_post($pdo, $postId);

    echo "<form action='./includes/edit_post.inc.php' method='post'>";
    echo "<input type='hidden' name='post_id' value='" . htmlspecialchars($postId) . "'>"; // Store postId in a hidden field
    echo "<textarea rows='6' name='post_edit_text'>" . htmlspecialchars($post["post_text"]) . "</textarea>";
    echo "<button type='submit'>Edit</button>";
    echo "</form>";
    ?>
    
    
    
</body>
</html>