<?php
session_start();

if (isset($_POST['login-submit'])){

    require 'dbHandler.incl.php';

    $email= $_POST['email'];
    $pwd= $_POST['pwd'];

    $res = $con->prepare("SELECT * FROM users WHERE email=?");
    $res->bindparam(1, $email);
    $row = $res->execute();
    $row = $res->fetch();
    if ($row > 0){
        $pwdCheck = password_verify($pwd, $row['pwd']);
        if($pwdCheck == true){
            session_start();
            $_SESSION['userId'] = $row['id'];
            $_SESSION['userName'] = $row['name'];
            $_SESSION['userEmail'] = $row['email'];
            header("Location: ../mywines.php?login=success");
            exit();
        }else{
            header("Location: ../login.php?login=failure");
            exit();
        }

    }else{
        header("Location: ../login.php?login=failure");
        exit();
    }
}else{
    header("Location: ../index.php");
    exit();
}