<?php 
if (isset($_POST['register-submit'])){

    require 'dbHandler.incl.php';

    $name= $_POST['name'];
    $email= $_POST['email'];
    $pwd= $_POST['pwd'];
    $pwdAgain= $_POST['pwdAgain'];

    if(empty($name) || empty($email) || empty($pwd) || empty($pwdAgain)){
        header("Location: ../register.php?error=emptyfields&name=".$name."&email=".$email);
        exit();
    }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../register.php?error=invalidemail&name=".$name."&email=".$email);
        exit();
    }else if($pwd !== $pwdAgain){
        header("Location: ../register.php?error=pwdcheck&name=".$name."&email=".$email);
        exit();
    }else{
        $res = $con->prepare("SELECT email FROM users WHERE email=?");
        $res->bindparam(1, $email);
        $row = $res->execute();
        $row = $res->fetch();
        if($row > 0){
            header("Location: ../register.php?error=emailtaken&name=".$name."&email=".$email);
            exit();
        }else{
            $res = $con->prepare("INSERT INTO users (name, email, pwd) VALUES (?, ?, ?)");
            $res->bindparam(1, $name);
            $res->bindparam(2, $email);
            $res->bindparam(3, password_hash($pwd, PASSWORD_DEFAULT));
            $res->execute();
            header("Location: ../login.php?registration=success");
            exit();
        }
    }

}else{
    header("Location: ../index.php");
    exit();
}