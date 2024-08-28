<?php
require_once "include/config_session.inc.php";
require_once 'include/otp_model.inc.php';
if(!isset($_SESSION['email'])){
    header("Location: login.php");
     die();
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css?v=2.0">
    <title>Document</title>
</head>
<body>
<h3>Enter OTP</h3>
<div class= "lin">
<form action="include/otp.inc.php" method="POST">
    <p class="text"> Enter the otp.</p>
        <input type="number" name="otp" placeholder = "input your otp code"required><br><br>
        <button>submit</button>

        <?php
        check_otp_errors();

        ?>
</form> 

</div>
    
</body>
</html>