<?php
require_once "config_session.inc.php";
require_once "dbh.inc.php";
require_once "post_model.inc.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $postId = $_POST["post_id"];
    $postText = $_POST["post_edit_text"];

    if (edit_post($pdo, $postId, $postText)) {
        header("Location: ../loggedIn.php");
    }
    else {
        echo "Failed to update Post";
    }

    try {
        edit_post($pdo, $postId, $postText);
    } catch (PDOException $e) {
        echo "Query Error: " . $e->getMessage();
    }
}