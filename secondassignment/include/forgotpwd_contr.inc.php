<?php

 
// session_start();
$email = $_SESSION['email'];
function update_pwd ($pdo,$pwd,$email){
    $query = "UPDATE users SET pwd = :pwd   WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $options = [
        'cost' =>  12
    ]; 

    $hashpwd = password_hash($pwd, PASSWORD_BCRYPT, $options);
    $stmt->bindparam(":pwd",$hashpwd);
    $stmt->bindparam(":email", $email);
    $stmt->execute();    
}


function check_pwd_errors(){
    if (isset($_SESSION['errors_pwd'])) {
        $errors = $_SESSION['errors_pwd'];
    
        echo "<br>";
        foreach ($errors as $error) {
            echo '<p>'.$error.'</p>';
        }
    
        unset($_SESSION['errors_pwd']);
    } else if (isset($_GET["pwd"]) && $_GET["pwd"] ==="success") {
        echo '<br>';
        echo '<h4> success</h4>';
    }
    }