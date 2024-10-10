<?php

declare(strict_types = 1);
require_once "post_model.inc.php";

function show_posts(object $pdo, int $userId) {
    $posts = get_all_posts($pdo);
    foreach ($posts as $post) {
        echo "<div id='" . $post["post_id"] ."' class='post-container'>";
        echo "<div class='post-top-section'>";
        echo "<h3>" . $post["username"] . "</h3>";
        echo "<div>";
        // Only show the trash icon if the post belongs to the logged-in user
        if ($post["user_id"] === $userId) {
            echo "<i class='fa-solid fa-pen-to-square' onclick='redirectToEditPost(" . $post["post_id"] . ")'></i>";
            echo "<i class='fa-solid fa-trash'  onclick='deletePost(" . $post["post_id"] . ")'></i>";
            
        }
        echo "</div>";

        echo "</div>";

        echo "<p>" . $post["post_text"] . "</p>";
        echo "<p>" . date('m-d-Y H:i', strtotime($post["created_at"])) . "</p>";
        echo "</div>";
    }
}

function show_errors() {
    if (isset($_SESSION["post_errors"])) {
        $errors = $_SESSION["post_errors"];
        echo "<br>";
        foreach($errors as $error) {
            echo "<p class='form-error'>" . $error . "</p>";
        }
        unset($_SESSION["post_errors"]);
    }
}
