<?php

declare(strict_types=1);
function is_input_empty(string $username, string $pwd,string $email, string $fullname, string $phoneNumber, string $gender, string $state) {
    if (empty($username) || empty($pwd) || empty($email) || empty($fullname)|| empty($gender) || empty($phoneNumber)|| empty($state)) {
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

function is_username_taken(object $pdo ,string $username) {
    if (get_username($pdo,$username)) {
        return true;
    }
    else {
        return false;
    }

}

function is_email_registered(object $pdo, string $email) {
    if (get_email($pdo, $email)) {
        return true;
    }
    else {
        return false;
    }

}


function is_phone_registered(object $pdo, string $phoneNumber) {
    if (get_phone($pdo, $phoneNumber)) {
        return true;
    }
    else {
        return false;
    }

}
function get_match(string $pwd, String $cpwd){
    if ($pwd===$cpwd){
        return true;
    }else {
        return false;
    }

}
function pass (string $pwd){
   
    $newpwd = strlen($pwd);
    if ($newpwd > 5) {
        return true;
    }else {
        return false;
    }

}

function pass_verif(string $pwd){
    if(!pass($pwd)){
        return true;
    }else{
        return false;
    }
}
function notValidPwd(string $pwd){
    if(!(preg_match('/[a-zA-Z]/', $pwd) && preg_match('/[0-9]/', $pwd))){
        return true;
    }else{
        return false;
    }
}

function does_pwd_match(string $pwd, string $cpwd) {
    if(!get_match($pwd, $cpwd)){
    return true;
    }
    else {
        return false;
    }
    
} 

function long_name (string $fullname){

    $newname = strlen($fullname);
    if ($newname < 50){

        return true;
    }else {
        return false;
    }
}

function is_fullname_long(string $fullname){
    if(!long_name($fullname)){
        return true;
    } else{
        return false;
    }

}



function validatePhoneNumber($phoneNumber) {
    // Remove all non-digit characters
    $justNums = preg_replace("/[^0-9]/", '', $phoneNumber);
    
    // Remove leading '1' if present
    if (strlen($justNums) == 12) {
        $justNums = preg_replace("/^1/", '', $justNums);
    }
    
    // Check if we have 10 digits left
    return strlen($justNums) == 11;
}

// Example usage:
 // Replace with the phone number you want to validate
// if (validatePhoneNumber($phoneNumber)) {
//     return true;
// } else {
//     return false;
// }

function create_user(object $pdo, string $username, string $fullname,  string $email, String $phoneNumber, string $pwd, string $gender, string $state ) 
{
    set_user ($pdo,$username,$fullname,$email,$phoneNumber,$pwd,$gender,$state);
    
}

     