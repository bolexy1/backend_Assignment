<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userSearch = $_POST["usersearch"];
    try {

        require_once 'include/dbh.inc.php';
        $query = "SELECT * FROM user1 WHERE username = :usersearch;";
        $stmt = $pdo->prepare($query);
    
        $stmt->bindparam(":usersearch", $userSearch);
        $stmt->execute();
    
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    
        $pdo = null;
        $stmt = null;
    
        
    } catch (PDOException $e) {
        die("Query failed: ". $e->getmessage());
    }
} else {
    header("location: ../index.php");
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Search results:</h3>
    <?php
    if (empty($result)){
        echo "no result found";
        
    }else {
        foreach ($result as $row){
            echo htmlspecialchars($row['username']);
            echo "<br>";
            echo htmlspecialchars ($row['email']);
            echo "<br>";
            echo htmlspecialchars ($row['pwd']);
            echo "<br>";
            echo htmlspecialchars ($row['created_at']);

        }
        
    }
    ?>
</body>
</html>