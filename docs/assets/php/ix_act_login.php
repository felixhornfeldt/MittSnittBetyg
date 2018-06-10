<?php

include_once './dbh_conn.php';

if (isset($_POST["login_submit_b"])) {

    $username = mysqli_real_escape_string($conn, $_POST["uid"]);
    $password = mysqli_real_escape_string($conn, $_POST["pwd"]);

    if (empty($username) || empty($password)) {
        header("Location: ./../../index.html?input=empty");
        exit();
    } else {
        if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
            header("Location: ./../../index.html?username=invalid");
            exit();
        } else {
            $sql = "SELECT * FROM users WHERE user_username='$username'";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck < 1) {
                header("Location: ./../../index.html?login=error");
                exit();
            } else {
                if ($row = mysqli_fetch_assoc($result)) {
                    $hashedPwdCheck = password_verify($password, $row['user_password']);
                    if ($hashedPwdCheck === false) {
                        header("Location: ./../../index.html?login=error");
                        exit();
                    } elseif ($hashedPwdCheck === true) {
                        // $_SESSION['user'] = [$username];
                        // header("Location: ./../../index.html?login=sucess");
                        header("Location: ./../../user.html");
                        exit();
                    } else {
                        header("Location: ./../../index.html?error");
                        exit();
                    }
                }
            }
        }
    }
    
} else {
    header("Location: ./../../index.html?=cant_acesses_this_login_document");
    exit();
}