<?php 
require_once "./includes/config_session.inc.php";
require_once "./includes/dbh.inc.php";
require_once "./includes/post_view.inc.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://kit.fontawesome.com/ac4dc93457.js" crossorigin="anonymous"></script>
</head>
<body class="logged-in-body">
    <?php  
    echo "<h1 class='user-welcome-heading'> Welcome, " . $_SESSION["user_username"] . "</h1>";
    ?>

    <?php
    if (isset($_SESSION["user_id"])) { ?>
        <form action="./includes/logout.inc.php" method="post">
            <button class="logout-btn" type="submit">Logout</button>
        </form>    
    <?php } else {
        header("Location: ./includes/logout.inc.php");
        exit();
    } ?>

    
    

    <h2 style="margin-top: 2em; margin-bottom: 0.5em">Add a new Post!</h2>
    <form action="./includes/post.inc.php" method="post">
        <textarea rows="6" name="post_text" id="" placeholder="Add your post here..."></textarea>
        <button  type="submit">Post</button>
    </form>

    <?php 
    show_errors();
    ?>
    

    <?php   
    show_posts($pdo, $_SESSION["user_id"]);
    ?>

    <script>
        // DELETE POST
        function deletePost(postId) {
            if (confirm("Are you sure you want to delete this post?")) {
                fetch("./includes/delete_post.inc.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({ post_id: postId}) // Send post_id in the request body
                })
                .then(response => {
                    if (response.ok) {
                        const postElement = document.getElementById(postId);
                        if (postElement) {
                            postElement.remove(); // Remove the parent div
                        }
                    }
                    else {
                        alert("Failed to delete post. Please try again");
                    }
                })
                .catch(error => {
                    console.error("Error: ", error);
                });
            }
        }

        function redirectToEditPost(postId) {
            window.location.href = "editpost.php?post_id=" + postId;
        }
    </script>
    
    
    
    
</body>
</html>