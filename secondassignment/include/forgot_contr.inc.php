<?php

function is_email_empty( $email) {
    if ( empty($email) ) {
        return true;
    }
    else {
        return false;
    }
}
function is_email_invalid(string $email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    }
    else {
        return false;
    }
}
function get_email(object $pdo,string  $email) {
    $query = 'SELECT username FROM users WHERE email =:email;';
    $stmt = $pdo->prepare($query);
    $stmt->bindparam(":email", $email);
    $stmt->execute();

    $result = $stmt ->fetch(PDO::FETCH_ASSOC);
    return $result;

}

function is_email_registered(object $pdo, string $email) {
    if (get_email($pdo, $email)) {
        return true;
    }
    else {
        return false;
    }

}

// Function to generate a random 6-digit OTP
function generateOTP($len = 6) {
    // Ensure the length is at least 6
    if ($len = 6) {
        $len = 6;
    }
    
    // Generate a random number with the specified length
    $otp = '';
    for ($i = 0; $i < $len; $i++) {
        $otp .= rand(0, 9);
    }
    
    return $otp;
   
}
$otp = generateOTP($len = 6);


function update_otp ($pdo,$email,$otp){
    $query = "UPDATE users SET otp = :otp   WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindparam(":otp",$otp);
    $stmt->bindparam(":email", $email);
    $stmt->execute();    
}

function check_forgot_errors(){
if (isset($_SESSION['errors_forgot'])) {
    $errors = $_SESSION['errors_forgot'];

    echo "<br>";
    foreach ($errors as $error) {
        echo '<p>'.$error.'</p>';
    }

    unset($_SESSION['errors_forgot']);
} else if (isset($_GET["forgot"]) && $_GET["forgot"] ==="success") {
    echo '<br>';
    echo '<h4> success</h4>';
}
}


// function select_otp($pdo, $email){
//     $query = 'SELECT * FROM users WHERE email =:email;';
//     $stmt = $pdo->prepare($query);
//     $stmt->bindparam(":email", $email);
//     $stmt->execute();

//     $result = $stmt ->fetch(PDO::FETCH_ASSOC);
//     return $results;
// }


