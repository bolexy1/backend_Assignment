<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $fullname = htmlspecialchars($_POST['name']);
    $username = htmlspecialchars($_POST['username']);
    $pwd = htmlspecialchars($_POST['pwd']);
    $phoneNumber = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);
    try {
            require_once "dbh.inc.php";
           
            
                $query = "INSERT INTO raolakschoolusers(username, fullname, email, phoneNumber, pwd) VALUES(:username,:fullname, :email, :phoneNumber, :pwd);";
                $stmt = $pdo->prepare($query);
                $stmt ->bindParam(":username", $username);
                $stmt -> bindParam(":fullname", $fullname);
                $stmt-> bindParam(":email", $email);
                $stmt -> bindParam(":pwd", $pwd);
                $stmt -> bindParam(":phoneNumber", $phoneNumber);
                $stmt -> execute();
            $pdo= null;
            $stmt = null;  

            die();        
    } catch (PDOException $e) {
          die("Query failed". $e->getMessage());
    }
}
else{
    header('Location: ../index.php');

}