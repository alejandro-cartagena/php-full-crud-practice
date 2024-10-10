<?php 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];

    try {
        require_once "dbh.inc.php";
        require_once "login_model.inc.php";
        require_once "login_controller.inc.php";

        // Error Handlers
        $errors = [];

        if (is_input_empty($username, $pwd)) {
            $errors["empty_input"] = "Please fill out all input fields!";
        }

        $user_info = get_user($pdo, $username);

        if (is_username_wrong($user_info)) {
            $errors["invalid_username"] = "Username does not exist!";
        }
        if (!is_username_wrong($user_info) && is_password_wrong($pwd, $user_info["pwd"])) {
            $errors["invalid_password"] = "Password is incorrect!";
        }

        // Start Session
        require_once "config_session.inc.php";

        if ($errors) {
            $_SESSION["login_errors"] = $errors;
            header("Location: ../login.php");
            die();
        }

        // Create a New Session ID for Logged In User
        $newSessionId = session_regenerate_id(true);
        $sessionId = $newSessionId . "_" . $user_info["id"];
        session_id($sessionId);

        $_SESSION["user_id"] = $user_info["id"];
        $_SESSION["user_username"] = htmlspecialchars($user_info["username"]);

        header("Location: ../loggedIn.php");

        $pdo = null;
        $stmt = null;

        die();

    } catch (PDOException $e) {
        echo "Query Failed: " . $e->getMessage();
    }
}
else {
    header("Location: ../login.php");
    die();
}
