<?php
if (isset($_POST['login-submit'])){
    require '../php_scripts/dbh.php';

    $username=$_POST['userlogin'];
    $password=$_POST['passlogin'];
    $sql="SELECT * FROM accounts WHERE username=?";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: login.php?error=sqlerror");
        exit();
    }
    else{
        mysqli_stmt_bind_param($stmt,"s",$username);
        mysqli_stmt_execute($stmt);
        $result=mysqli_stmt_get_result($stmt);
        if($row=mysqli_fetch_assoc($result))
        {
            $pwdcheck=password_verify($password,$row['password']);
            if($pwdcheck==false){
                header("Location: login.php?error=wrongpassword");
                exit();
            }
            else if($pwdcheck==true){
                session_start();
                $_SESSION['loggedin']=true;
                $_SESSION['email']=$row['email'];
                $_SESSION['username']=$row['username'];
                $_SESSION['permission']=$row['permission'];
                header("Location: ../index.php?login=success");
                exit();
            }
            else{
                header("Location: login.php?error=wrongpassword");
                exit();
            }
        }
        else{
            header("Location: login.php?error=nouser");
            exit();
        }
    }
}
else{
    header("Location: login.php");
    exit();
}