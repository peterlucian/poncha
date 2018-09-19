<?php
    session_start();
    require_once("connection.php");
    $login= array(
        "email" => "admin@ponchaadvisor.com",
        "password" => "admin"
    );

     if(isset($_POST['email']) && isset($_POST['psw'])){
        
        $email=$_POST["email"];
        $password=$_POST["psw"];
        $remember=$_POST["remember"];
        
        $sql = "SELECT username, password FROM users WHERE username=? AND password=? ";
        $query = $pdo->prepare($sql);
        $query->execute(array($email,$password));
      
        if($query->rowCount() >= 1) {
            $_SESSION['login_user'] = $email;
            header("location: index.php");
        } else {
            $_SESSION['error_message']="Wrong Username or Password";
            header("location: index.php");
        }

        if($remember==1){
            setcookie("email",$email, time()+3600*24);
            setcookie("password",$password, time()+3600*24);
        }
    }

   
    /* if($email==$login["email"] && $password==$login["password"]){
        $_SESSION['login_user'] = $email;
        header('Location: index.php');
    }else {
        $_SESSION['error_message']="Wrong Username or Password";
        header("location: index.php");
    } */
?>