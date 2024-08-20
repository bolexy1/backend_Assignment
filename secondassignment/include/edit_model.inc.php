<?php

declare(strict_types=1);

function update_fullname (object $pdo, string $username,string $fullname,string $email,string $pwd,string $phoneNumber,string $address){
        $query = "UPDATE users SET fullname = :fullname, email = :email , phoneNumber = :phoneNumber, pwd = :pwd, address = :address  WHERE username = :username;";
        $stmt = $pdo->prepare($query);
        $options = [
            'cost' =>  12
        ];    
        $hashpwd = password_hash($pwd, PASSWORD_BCRYPT, $options);
        $stmt->bindparam(":fullname",$fullname);
        $stmt->bindparam(":username", $username);
        $stmt->bindparam(":email", $email);
        $stmt->bindparam(":phoneNumber", $phoneNumber);
        $stmt -> bindparam(":pwd", $hashpwd);
        $stmt -> bindparam(":address", $address);
        $stmt->execute();

        echo $stmt->execute();
    
      
    
    }

    function password(object $pdo, string $username) {
            $query = 'SELECT * FROM users WHERE username =:username;';
            $stmt = $pdo->prepare($query);
            $stmt->bindparam(":username",$username);
            
            $stmt->execute();

            $result = $stmt ->fetch(PDO::FETCH_ASSOC);
            return $result;
           

    }

    function check_edit_errors()
{
    if (isset($_SESSION['errors_edit'])) {
        $errors = $_SESSION['errors_edit'];

        echo "<br>";
        foreach ($errors as $error) {
            echo '<p>'.$error.'</p>';
        }

        unset($_SESSION['errors_edit']);
    } else if (isset($_GET["edit"]) && $_GET["edit"] ==="success") {
        echo '<br>';
        echo '<h4>edit success</h4>';
    }
}