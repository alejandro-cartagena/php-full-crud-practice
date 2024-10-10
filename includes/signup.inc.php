<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];

    try {
        require_once "dbh.inc.php";
        require_once "signup_model.inc.php";
        require_once "signup_controller.inc.php";

        // ERROR HANDLERS
        $errors = [];

        if (is_input_empty($username, $email, $pwd)) {
            $errors["input_empty"] = "Please fill in all input fields!";
        }
        if (is_username_taken($pdo, $username)) {
            $errors["username_taken"] = "That username is already taken!";
        }
        if (is_email_registered($pdo, $email)) {
            $errors["email_registered"] = "That email is already registered!";
        }
        if (is_email_invalid($email)) {
            $errors["email_invalid"] = "Invalid email, try again!";
        }

        // Start Session
        require_once "config_session.inc.php";

        if ($errors) {
            $_SESSION["errors_signup"] = $errors;

            $signupData = [
                "username" => $username,
                "email"    => $email
            ];

            $_SESSION["signup_data"] = $signupData;

            header("Location: ../index.php");
            die();
        }

        // Sets the user in the DB
        set_user($pdo, $username, $email, $pwd);

        header("Location: ../index.php?signup=success");
        $pdo = null;
        $stmt = null;

        die();


    } catch (PDOException $e) {
        echo "Query Failed: " . $e;
    }
}