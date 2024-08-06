
<?php

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
        }echo "i am here";
        

        if (is_username_wrong($result) && is_password_wrong($pwd, $result["pwd"])) {
            $errors["login_incorrect"] = "incorrect login details";
        }


        // if (is_password_wrong($pwd, $result["pwd"])) {
        //     $errors["pwd_incorrect"] = "incorrect password";
        // }
        

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
        $_SESSION['user_username'] = htmlspecialchars($result["username"]);
        $_SESSION['user_email'] = htmlspecialchars($result["email"]);
        $_SESSION['user_phone'] = htmlspecialchars($result["phoneNumber"]);
        $_SESSION['user_gender'] = htmlspecialchars($result["gender"]);
        $_SESSION['user_state'] = htmlspecialchars($result["state"]);
        $_SESSION["last_regeneration"] = time();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();


            
            if (password_verify($pwd, $user['password'])) {
                // Successful login
                header("Location: ../dash.php");
                die();
            }
        }

        header("Location: ../dash.php");
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
 

