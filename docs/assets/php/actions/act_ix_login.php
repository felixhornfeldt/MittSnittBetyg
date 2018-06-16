<?php

session_start();

include_once './../dbh_conn.php';

if (isset($_POST["login_submit_b"])) {

    $username = strtolower(mysqli_real_escape_string($conn, $_POST["uid"]));
    $password = mysqli_real_escape_string($conn, $_POST["pwd"]);

    if (empty($username) || empty($password)) {
        header("Location: ./../../../index.php?input=empty");
        exit();
    } else {
        if (!preg_match("/^[a-z0-9]*$/", $username)) {
            header("Location: ./../../../index.php?username=invalid");
            exit();
        } else {
            $sql = "SELECT * FROM users WHERE user_username='$username'";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck < 1) {
                header("Location: ./../../../index.php?login=error");
                exit();
            } else {
                if ($row = mysqli_fetch_assoc($result)) {
                    $hashedPwdCheck = password_verify($password, $row['user_password']);
                    if ($hashedPwdCheck === false) {
                        header("Location: ./../../../index.php?login=error");
                        exit();
                    } elseif ($hashedPwdCheck === true) {
                        $_SESSION['user_id'] = $row['user_id'];
                        echo $_SESSION['user_id'];
                        header("Location: ./../../../user.php");
                        exit();
                    } else {
                        header("Location: ./../../../index.php?error");
                        exit();
                    }
                }
            }
        }
    }
    
} else {
    header("Location: ./../../../index.php?=cant_acesses_this_login_document");
    exit();
}