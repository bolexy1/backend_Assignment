<?php

if ($_SERVER['REQUEST_METHOD']=== "POST"){
    $otps = $_POST["otp"];

    try {
        require_once 'dbh.inc.php';
        require_once 'otp_model.inc.php';
        require_once 'forgot_contr.inc.php';
        
        

        $errors = [];

        if(is_input_empty($otps)){
            $errors["empty_input"] = "fill in  field!";                       
        }
        // session_start();
        

        // require_once 'config_session.inc.php';
        $email = $_SESSION['email']; 

        if(!($otpp == $otps)){
            $errors["otp_error"] = "incorrect otp retry!";
        }
//         echo ($otpp);
//         echo "<br>";
// echo ($otps);
// die();
        $ct = date('Y:m:d H:i:s');
        $exptime = 60*5;
        
        if(exp_otp($diff,$exptime) && ($otpp == $otps)){
            $errors["otp_expired"] = "expired otp try again!";
            update_otp($pdo,$email,$otp); 
        }
        
        if ($errors) {
            $_SESSION["errors_otp"] = $errors;
            header("Location: ../otp.php");
            die();
        }
        if(!exp_otp($diff,$exptime) && ($otpp == $otps)){
            header("Location: ../forgotpwd.php");
        }
       
        $_SESSION['otp'] = $otps;
        $pdo = null;
        $stmt = null;
        die();

 }  catch (PDOException $e){
    die("Query failed: ". $e->getmessage());
}
}else {
header("Location:../otp.php");
die();
}