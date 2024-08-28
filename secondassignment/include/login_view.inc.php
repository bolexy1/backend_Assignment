<?php

declare(strict_types=1);


function output_username(){
    

    if (isset($_SESSION["user_id"])){
        echo '<h4> You are logged in as </h4> <br> ' .'<h1>'.$_SESSION["user_username"].'<br>'.$_SESSION["user_Fullname"] .'<br>'.$_SESSION["user_email"].'<br>'.$_SESSION["user_phone"].'<br>'.$_SESSION["user_gender"].'<br>'.$_SESSION["user_state"].'<br>'.$_SESSION["address"].'<br>';;
    } else {
        echo '<p>Your are not logged in </p>';
    }
}

function check_login_errors()
{
    if (isset($_SESSION['errors_login'])) {
        $errors = $_SESSION['errors_login'];

        echo "<br>";
        foreach ($errors as $error) {
            echo '<p>'.$error.'</p>';
        }

        unset($_SESSION['errors_login']);
    } else if (isset($_GET["login"]) && $_GET["login"] ==="success") {
        echo '<br>';
        echo '<h4>login success</h4>';
    }
}