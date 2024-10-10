<?php
require_once "config_session.inc.php";
require_once "dbh.inc.php";
require_once "post_model.inc.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the JSON input from the request body
    $input = json_decode(file_get_contents("php://input"), true);

    // Get the post id from the request
    $postId = $input["post_id"] ?? null;

    // Validate the post id
    if ($postId) {
        // Call the delete_post function 
        delete_post($pdo, (int)$postId);
        http_response_code(200); // Success
    }
    else {
        http_response_code(400); // Bad Request
    }
}
else {
    http_response_code(405); // Method Not Allowed
}

