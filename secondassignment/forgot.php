<?php 
require_once 'include/config_session.inc.php';
require_once 'include/forgot_contr.inc.php';
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
    
<h3>Forgot password</h3>
<div class= "lin">
<form action="include/forgot.inc.php" method="POST">
    <p class="text"> Enter your email address below and we'll send you an email with instructions. kindly check your spam if mail is not found in your inbox.</p>
        <input type="text" name="email" placeholder = "input your registered  email"required><br><br>
        <button>submit</button>

        <?php
check_forgot_errors();

?>
</form> 
</div>


</body>
</html>