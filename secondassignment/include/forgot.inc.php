<?php 

if ($_SERVER['REQUEST_METHOD'] === "POST"){
    $email = $_POST['email'];

    try {
        require_once 'dbh.inc.php';
        // require_once 'signup_contr.inc.php';
        require_once 'forgot_contr.inc.php';

        $errors = [];

        if (is_email_empty($email)) {
            $errors["empty_input"] = "fill in field!";
        }
        

        if(!is_email_registered($pdo, $email)){
            $errors["unregistered_email"] = " email not registered!";

        }
        if (is_email_invalid($email)) {
            $errors["invalid_email"] = "invalid email used!";
        }

        require_once 'config_session.inc.php';

        if ($errors) {
            $_SESSION["errors_forgot"] = $errors;
            header("Location: ../forgot.php");
            die();
        }
        if(is_email_registered($pdo, $email)){
            update_otp($pdo,$email,$otp); 
            $_SESSION["email"] = $email;
            header("Location: ../otp.php");
        }                      
        
        
        $pdo = null;
        $stmt = null;

        die();

 }  catch (PDOException $e){
    die("Query failed: ". $e->getmessage());
}
}else {
header("Location:../forgot.php");
die();
}