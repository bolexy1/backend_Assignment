<?php

if ($_SERVER['REQUEST_METHOD'] === "POST"){
    $pwd = $_POST["pwd"];
    $cpwd = $_POST["cpwd"];

    try {
        require_once 'dbh.inc.php';
        require_once 'login_contr.inc.php';
        require_once 'signup_contr.inc.php';
        require_once 'config_session.inc.php';
        require_once 'forgotpwd_contr.inc.php';
        

        $errors = [];

        if (is_inputs_empty($cpwd, $pwd)) {
            $errors["empty_input"] = "fill in all fields!";
        }

        if (notValidPwd($pwd)) {
            $errors["pwd_error"] = "input both text and number";
         }

         if (does_pwd_match($pwd, $cpwd)){
            $errors["pwd_match"] = "password don't match";
        }

        if(pass_verif($pwd)){
            $errors["ped_short"] = "password not enough"; 
        }

        if ($errors) {
            $_SESSION["errors_pwd"] = $errors;
            header("Location: ../forgotpwd.php");
            die();
        }

         $email = $_SESSION['email'];
         

        update_pwd($pdo,$pwd,$email);
        header("Location: ../login.php?update=success");
        $pdo = null;
        $stmt = null;
        die();



    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }

} else {
    header("Location: ../forgotpwd.php");
    die();
}
