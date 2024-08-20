<?php
require_once 'include/config_session.inc.php';
require_once 'include/login_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css?v=1.0">
    <title>Document</title>
</head>
<body>
<h3>Login</h3>
<div class= "lin">
<form action="include/login.inc.php" method="POST">
        <input type="text" name="username" placeholder = "username/email/phoneNumber"required><br><br>
        <input type="password" name="pwd" placeholder = "password" required><br><br>
        <button>Login</button>  
</form> 
</div>
        <?php
        check_login_errors(); 
        
        ?>
</body>
</html>