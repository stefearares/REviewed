<?php
session_start();

if (isset($_POST['signup-submit'])) {
    require '../php_scripts/dbh.php';

    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $passwordrepeat = $_POST['pwd-repeat'];

    if ($password !== $passwordrepeat) {
        header("Location: signup.php?error=passwordcheck&uid=" . $username);
        exit();
    } else {
        $sql = "SELECT username FROM accounts WHERE username=?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: signup.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);

            if ($resultCheck > 0) {
                header("Location: signup.php?error=usertaken");
                exit();
            } else {
                $sql = "INSERT INTO accounts (username, password, email, permission) VALUES (?, ?, ?, 0)";
                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: signup.php?error=sqlerror");
                    exit();
                } else {
                    // Validate email format
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        header("Location: signup.php?error=invalidemail");
                        exit();
                    }

                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "sss", $username, $hashedPwd, $email);
                    mysqli_stmt_execute($stmt);

                    $_SESSION['loggedin']=true;
                    $_SESSION['email']=$email;
                    $_SESSION['username'] = $username;
                    $_SESSION['permission'] = 0;

                    header("Location: ../index.php");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("Location: signup.php");
    exit();
}
?>
