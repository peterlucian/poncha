<?php
    session_start();
    require_once("connection.php");
      
    if(isset($_POST['save'])){
        
       
        $nome = $_POST["nome"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["psw"];
        // query
        $sql = "INSERT INTO `users`(`nome`, `username`, `email`, `password`)
        VALUES (?, ?, ?, ?)";
        $query = $pdo->prepare($sql);
        $query->execute(array($nome, $username, $email, $password));
        if($query->rowCount() >= 1) {
            $_SESSION['validate'] = "You have sign succefully";
            header("location: index.php");
        } else {
            $_SESSION['error_sign']="Something went wrong";
            header("location: index.php");
        }
            
        
    }
    
?>