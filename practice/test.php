<?php

function generateOTP($length = 6) {
    // Ensure the length is at least 6
    if ($length < 6) {
        $length = 6;
    }
    
    // Generate a random number with the specified length
    $otp = '';
    for ($i = 0; $i < $length; $i++) {
        $otp .= rand(0, 9);
    }
    
    return $otp;
   
}

$otp=generateOTP();

echo $otp;