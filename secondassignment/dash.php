<?php
require_once 'include/config_session.inc.php';
require_once 'include/login_view.inc.php';
require_once 'include/login_model.inc.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css?v=1.0">
</head>
<body>
 <h3>welcome to my world</h3>


    <?php
    
     output_username();    
    ?>
    Logout

<form action="include/logout.inc.php" method="POST">
        
        <button>Logout</button>  
</form> 

<button><a href="edit.php"> Edit info</a></button>


   
</body>
</html>