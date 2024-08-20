<?php
    require_once "include/config_session.inc.php";
    require_once "include/edit_model.inc.php";
     if(!isset($_SESSION['user_id'])){
        header("Location: login.php");
         die();
     }
        
     
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
<h3>Edit profile</h3><br>
    <div>
    <form action="include/edit.inc.php" method="POST">   
    <input class = "cl" type="text" name="name" placeholder="Edit your full name" value="<?php echo htmlspecialchars( $_SESSION['user_Fullname']) ?>" required><br><br>
        <input class = "cl" type="text" name="username" placeholder=" Username" value="<?php echo htmlspecialchars( $_SESSION['user_username']) ?>" readonly><br><br>
        <input class = "cl" type="password" name="crpwd" placeholder=" current Password" required><br><br>
        <input class = "cl" type="password" name="pwd" placeholder=" edit Password" required><br><br>
        <input class = "cl"  type="password" name="cpwd" placeholder="confirm Password" required><br><br>
        <input class = "cl" type="text" name="email" placeholder=" edit Email"value="<?php echo htmlspecialchars( $_SESSION['user_email']) ?>"required><br><br>
        <input class = "cl" type="number" name="phone" placeholder="edit phone number" value="<?php echo htmlspecialchars( $_SESSION['user_phone']) ?>"required><br><br>
        <input class = "cl" type="text" name="address" placeholder="Enter your address" ><br><br>
       
        <button>SignUp</button>
       <?php
        check_edit_errors();

        ?>
    
</body>
</html>