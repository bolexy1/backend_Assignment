<?php
require_once 'include/config_session.inc.php';
require_once 'include/login_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css?v=3.0">
    <title>Document</title>
</head>
<body>
<h3>Login</h3>
<div id="check">
        <center>
<form action="include/login.inc.php" method="POST">
        <input type="text" name="username" value= "<?php if(isset($_COOKIE['username'])) {echo htmlspecialchars($_COOKIE['username']);}?>" placeholder = "username/email/phoneNumber"required><br><br>
        <input type="password" name="pwd" value= "<?php if(isset($_COOKIE['pwd'])){echo htmlspecialchars($_COOKIE['pwd']);} ?>"placeholder = "password" required><br><br>
        <button>Login</button>  
        <a href="forgot.php">forgot password</a></center> <br><input type="checkbox" class="check"  name="remember_me" <?php if(isset($_COOKIE['username'])) { echo 'checked'; } ?>><label for="" class="rem">remember me</label><br>
        
        <?php
        check_login_errors(); 
        
        ?>
        
</form> 

</div>
        
</body>
</html>