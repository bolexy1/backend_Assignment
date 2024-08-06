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
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h3>welcome to my world</h3>


    <?php
    
     output_username();
    // if (empty($result)){
    //     // echo "no result found";
        
    // }else {
    //     foreach ($result as $row){
    //         echo htmlspecialchars($row['username']);
    //         echo "<br>";
    //         echo htmlspecialchars ($row['email']);
    //         echo "<br>";
    //         echo htmlspecialchars ($row['created_at']);

    //     }
        
    // }
    
    
    
    ?>
   
</body>
</html>