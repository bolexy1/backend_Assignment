<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $fullname = ($_POST['name']);
    $username = ($_POST['username']);
    $pwd = ($_POST['pwd']);
    $phoneNumber = ($_POST['phone']);
    $email = ($_POST['email']);
    $cpwd =($_POST['cpwd']);
    $gender =($_POST['gender']);
    $state =($_POST['state']);

    try {
        require_once 'dbh.inc.php';
        require_once 'signup_model.inc.php';
        require_once 'signup_contr.inc.php';  
        
        // error handlers

        $errors = [];
        if (is_input_empty($fullname,$username,$pwd,$phoneNumber,$email,$cpwd,$gender,$state)) {
            $errors["empty_input"] = "fill in all fields!";

        } 
        if (is_email_invalid($email)) {
            $errors["invalid_email"] = "invalid email used!";

        }
        if (is_username_taken($pdo, $username)) {
            $errors["username_taken"] = "username already taken!";

        }
        if (is_email_registered($pdo, $email)) { 
            $errors["email_used"] = "email already registered!";

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
        if (!validatePhoneNumber($phoneNumber)){
            $errors[" invalid_phonenumber"]= "incorrect phone number formart";

        }
        
        if (is_phone_registered($pdo,$phoneNumber)){
            $errors["phonenumber_used"]="phone number already registered!";
        }
        if (is_fullname_long($fullname)) {
            $errors["fullname_long"]=  "characters too long kindly reduce!";
        }

        require_once 'config_session.inc.php';


        if ($errors){
            $_SESSION["errors_signup"] = $errors;
            
            $signupdata = [
                "username" => $username,
                "email" => $email,
                "phoneNumber"=> $phoneNumber,
                "gender" => $gender,
                "state" => $state
            ];
            $_SESSION["signup_data"] = $signupdata;
            
            header("Location: ../index.php".var_dump($errors));
            die();

        }
        


        create_user($pdo, $username,$fullname, $email,$phoneNumber,$pwd,$gender,$state);


        header("Location: ../login.php? signup=success");
        
        $pdo = null;
        $stmt = null;

        die();

    } catch (PDOException $e){
        die("Query failed: ". $e->getmessage());
    }
}else {
    header("Location:../index.php");
    die();
}

