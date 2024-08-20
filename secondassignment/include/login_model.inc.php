<?php

declare(strict_types=1);


function get_user(object $pdo, string $username) {
    $query = "SELECT * FROM users WHERE username = :username or email = :email or phoneNumber = :phoneNumber && pwd = :pwd;";
    $stmt = $pdo->prepare($query);
    $stmt->bindparam(":username",$username);
    $stmt->bindparam(":email",$username);
    $stmt->bindparam(":phoneNumber",$username);
    $stmt -> bindparam(":pwd", $pwd);
    $stmt->execute();

    $result = $stmt ->fetch(PDO::FETCH_ASSOC);
    return $result;

}

// function get_password(object $pdo, string $username){
// $query = "SELECT * FROM raolakschoolusers WHERE username = :username";
//     $stmt = $pdo->prepare($query);
//     $stmt->bind_param(":username", $username);
//     $stmt->execute();
//     $results = $stmt->get_result();
// }

//     if ($results->num_rows === 1) {
//         $user = $results->fetch_assoc();
//         $storedHashedPassword = $user['pwd'];

//         // Verify the provided password against the stored hash
//         if (password_verify($pwd, $storedHashedPassword)) {
//             // Password is valid; proceed with login
//             echo "Login successful!";
//             // Redirect to the dashboard or home page
//             // header("Location: dashboard.php");
//             // exit;
//         } else {
//             echo "Invalid password.";
//         }
//     } else {
//         echo "User not found.";
//     }
   

// $storedHashedPassword = $result['pwd'];
//  function password( string $pwd, string $storedHashedPassword ){   
//      if(!password_verify($pwd,$storedHashedPassword)){
//         return true;
//      } else {
//         return false;
//      }   
//  }

