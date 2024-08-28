<?php
// require_once 'forgot_contr.inc.php';
require_once 'dbh.inc.php';
function is_input_empty( $otps) {
    if (empty($otps) ) {
        return true;
    }
    else {
        return false;
    }
}

require_once 'config_session.inc.php';
$email = $_SESSION['email']; 
// echo $email;
// die();
function select_otp($pdo, $email){
    $query = 'SELECT * FROM users WHERE email =:email;';
    $stmt = $pdo->prepare($query);
    $stmt->bindparam(":email", $email);
    $stmt->execute();
    $result = $stmt ->fetch(PDO::FETCH_ASSOC);
    return $result;
}
$result = select_otp($pdo,$email);



 $otpp=$result['otp'];

function check_otp($otpp, $otps){
    if($otpp == $otps){        
        return true;
    }else{
        return false;
    } 
}
date_default_timezone_set('Africa/Lagos');

$ct = time();
$exptime = 60*5;

$ts =strtotime($result['updated_at']);

$diff = $ct - $ts;




function exp_otp($diff,$exptime){
    if(($diff)>$exptime){
        return true;
    }else {
        return false;
    }      
}


function check_otp_errors(){
    if (isset($_SESSION['errors_otp'])) {
        $errors = $_SESSION['errors_otp'];
    
        echo "<br>";
        foreach ($errors as $error) {
            echo '<p>'.$error.'</p>';
        }
    
        unset($_SESSION['errors_otp']);
    } else if (isset($_GET["otp"]) && $_GET["otp"] ==="success") {
        echo '<br>';
        echo '<h4> success</h4>';
    }
    }