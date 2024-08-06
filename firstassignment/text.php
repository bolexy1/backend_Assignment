<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = htmlspecialchars( $_POST["firstname"]);
    $lastname = htmlspecialchars( $_POST["lastname"]);
    $middlename = htmlspecialchars( $_POST["middlename"]);
    $lastname = htmlspecialchars( $_POST["lastname"]);
    $gender = htmlspecialchars( $_POST["gender"]);
    $phone = htmlspecialchars( $_POST["phone"]);
    $wallet = htmlspecialchars( $_POST["wallet"]);
    $email = htmlspecialchars( $_POST["email"]);

    if (empty($firstname || $lastname || $middlename || $email || $gender || $phone || $wallet )){
        exit();
        header("Location: error404.php");
    } 
    echo  $gender; 
    echo  $firstname;
    echo  $lastname; 
    echo  $wallet;
    echo  $middlename;
    echo  $phone;
}