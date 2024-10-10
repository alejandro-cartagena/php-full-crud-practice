<?php

require_once "config_session.inc.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $userId = $_SESSION["user_id"];
    $username = $_SESSION["user_username"];
    $postText = htmlspecialchars($_POST["post_text"]);

    try {
        require_once "dbh.inc.php";
        require_once "post_controller.inc.php";
        require_once "post_model.inc.php";


        // Error handlers
        $errors = [];
        
        if (text_area_empty($postText)) {
            $errors["empty_text"] = "Please fill in the input field!";
        }

        if ($errors) {
            $_SESSION["post_errors"] = $errors;
            $postData = [
                "user_id" => $userId,
                "user_name" => $username,
                "post_text" => $postText
            ];
            $_SESSION["post_data"] = $postData;

            header("Location: ../loggedIn.php?post=success");
            die();
        }

        create_post($pdo, $userId, $username, $postText);

        header("Location: ../loggedIn.php");
        $pdo = null;
        $stmt = null;

        die();

    } catch (PDOException $e) {
        echo "Query failed: " . $e->getMessage();
    }
    
}
else {
    header("Location: ../loggedIn.php");
    die();
}