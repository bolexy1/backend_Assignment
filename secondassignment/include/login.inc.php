<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST['username'];
    $pwd = $_POST['pwd'];

    try {
        require_once 'dbh.inc.php';
        require_once 'login_model.inc.php';
        require_once 'login_contr.inc.php'; 

        // error handlers
        $errors = [];

        if (is_input_empty($username, $pwd)) {
            $errors["empty_input"] = "fill in all fields!";
        }

        $result = get_user($pdo, $username);
        
        if (is_username_wrong($result)) {
            $errors["login_incorrect"] = "incorrect login details";
        }

        if (is_phoneNumber_wrong($result)) {
            $errors["login_incorrect"] = "incorrect login details";
        }

        if (is_email_wrong($result)) {
            $errors["login_incorrect"] = "incorrect login details";
        }


        if (!is_username_wrong($result) && is_password_wrong($pwd, $result['pwd'])){
            $errors["pwd_incorrect"] = "incorrect password";
        }

        require_once 'config_session.inc.php';

        if ($errors) {
            $_SESSION["errors_login"] = $errors;
            header("Location: ../login.php");
            die();
        }

        $newSessionid = session_create_id();
        $sessionid = $newSessionid . "_" . $result["id"];
        session_id($sessionid); 

        $_SESSION['user_id'] = $result["id"];
        $_SESSION['user_Fullname'] = htmlspecialchars($result["fullname"]);
        $_SESSION['user_username'] = htmlspecialchars($result["username"]);
        $_SESSION['user_email'] = htmlspecialchars($result["email"]);
        $_SESSION['user_phone'] = htmlspecialchars($result["phoneNumber"]);
        $_SESSION['user_gender'] = htmlspecialchars($result["gender"]);
        $_SESSION['user_state'] = htmlspecialchars($result["state"]);
        $_SESSION['user_pwd'] = htmlspecialchars($result["pwd"]);
        $_SESSION["last_regeneration"] = time();

        header("Location: ../dash.php?login=success");
        $pdo = null;
        $stmt = null;
        die();

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }

} else {
    header("Location: ../login.php");
    die();
}
