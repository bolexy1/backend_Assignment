<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $fullname = ($_POST['name']);
    $username = $_POST['username'];    
    $crpwd =($_POST['crpwd']);
    $phoneNumber = ($_POST['phone']);
    $email = ($_POST['email']);
    $address = ($_POST['address']);
   

    try {
        require_once 'dbh.inc.php';
        require_once 'edit_model.inc.php';       
        require_once 'signup_contr.inc.php';

        echo "i am here";


        $errors = [];
        if (is_edit_empty($fullname,$username,$phoneNumber,$email,$address,$crpwd )) {
            $errors["empty_input"] = "fill in all fields!";

        }

        $result = password($pdo, $username);



        if (is_email_invalid($email)) {
            $errors["invalid_email"] = "invalid email used!";

        }

        if (!validatePhoneNumber($phoneNumber)){
            $errors[" invalid_phonenumber"] = "incorrect phone number formart";

        }
        if (!password_verify($crpwd,$result['pwd'])){
           $errors["invalid_password"]="incorect password";
        }
        if (is_fullname_long($fullname)){
            $errors["fullname_long"] =  "characters too long kindly reduce!";
        }

        require_once 'config_session.inc.php';


        if ($errors){
            $_SESSION["errors_edit"] = $errors;
            header("Location: ../edit.php");
            die();
        }

      

        echo "i am here";


        update_fullname ($pdo,  $username, $fullname,$email, $phoneNumber, $address);
        
        $_SESSION['user_Fullname'] = htmlspecialchars($fullname);
        $_SESSION['user_email'] = htmlspecialchars($email);
        $_SESSION['user_phone'] = htmlspecialchars($phoneNumber);
        $_SESSION['user_gender'] = htmlspecialchars($result["gender"]);
        $_SESSION['user_state'] = htmlspecialchars($result["state"]);
        $_SESSION['address'] = htmlspecialchars($address);
        $_SESSION["last_regeneration"] = time(); 
        header("Location: ../test.php?edit=success"); 
        $pdo = null;
        $stmt = null;
        die();        
    } catch (PDOException $e){
        die("Query failed: ". $e->getmessage());
    } 
}else {
    header("Location: ../edit.php");
    die();
}
