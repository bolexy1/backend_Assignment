<?php
require_once 'include/config_session.inc.php';
require_once 'include/signup_view.inc.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css?v=1.0">
    <title>signup_page</title>
</head>
<body>
    
    <h3>Sign up/ Register</h3><br>
    <div>
    <form action="include/signup.inc.php" method="POST">
        
    <input class = "cl" type="text" name="name" placeholder="Enter your full name" required><br><br>
        <input class = "cl" type="text" name="username" placeholder="Username" required><br><br>
        <input class = "cl" type="password" name="pwd" placeholder="Password" required><br><br>
        <input class = "cl"  type="password" name="cpwd" placeholder="confirm Password" required><br><br>
        <input class = "cl" type="text" name="email" placeholder="Email"required><br><br>
        <input class = "cl" type="number" name="phone" placeholder="phone number"required><br><br>
        <select class = "cl" name="state" id="" required>
            <option value="1">select state</option>    
            <option value="oyo">Oyo</option>
            <option value="abia">Abia</option>
            <option value="Adamawa">Adamawa</option>
            <option value="Akwa-ibom">Akwa-ibom</option>
            <option value="anambra">Anambra</option>
            <option value="bauchi">Bauchi</option>
            <option value="lagos">Lagos</option>
            <option value="osun">Osun</option>
            <option value="ondo">Ondo</option>

        </select>
        <br><br>

        <label for="Gender">Genders</label><br><br>
        <label for="male">Male</label>
        <input type="radio" id="male" name="gender" value="male" required>
        <label for="female">Female</label>
        <input type="radio" id="female" name="gender" value="female" required>
        <br><br>
        
        <button>SignUp</button>
        <button><a href="login.php">login here</a></button>
<?php
    check_signup_errors() 
        ?>
    </form>
</div>
</body>
</html>