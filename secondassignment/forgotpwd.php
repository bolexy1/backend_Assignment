<?php
require_once "include/config_session.inc.php";
require_once 'include/forgotpwd_contr.inc.php';
if(!isset($_SESSION['otp'])){
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
<h3>UPDATE PASSWORD</h3>
<div class= "lin">
        <center>
<form action="include/forgotpwd.inc.php" method="POST">
        <input type="password" name="pwd" placeholder = "new password"required><br><br>
        <input type="password" name="cpwd" placeholder = " confirm password" required><br><br>
        <button>submit</button>  

        <?php

check_pwd_errors();
?>
</form> 
</center>
</div>


    
</body>
</html>