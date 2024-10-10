<?php

declare(strict_types = 1);

function create_post(object $pdo, int $userId, string $username, string $postText) {
    $query = "INSERT INTO posts (user_id, username, post_text) VALUES (:user_id, :username, :post_text);";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":user_id", $userId);
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":post_text", $postText);

    $stmt->execute();
}

function get_all_posts(object $pdo) {
    $query = "SELECT * FROM posts ORDER BY created_at DESC;";
    $stmt = $pdo->prepare($query);

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

function get_post(object $pdo, int $postId) {
    $query = "SELECT * FROM posts WHERE post_id = :postId";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":postId", $postId);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function delete_post(object $pdo, int $postId) {
    $query = "DELETE FROM posts WHERE post_id = :postId;";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":postId", $postId);

    $stmt->execute();
}

function edit_post(object $pdo, int $postId, string $postText) {
    $query = "UPDATE posts SET post_text = :postText WHERE post_id = :postId;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":postText", $postText);
    $stmt->bindParam(":postId", $postId);
    
    if ($stmt->execute()) {
        return true;
    }
    else {
        return false;
    }
}