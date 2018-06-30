<?php

session_start();

include_once './../dbh_conn.php';

if (isset($_POST["signup_submit_b"])) {
    
    $firstname = mysqli_real_escape_string($conn, $_POST["firstname"]);
    $lastname = mysqli_real_escape_string($conn, $_POST["lastname"]);
    $mail = mysqli_real_escape_string($conn, $_POST["mail"]);
    $username = strtolower(mysqli_real_escape_string($conn, $_POST["uid"]));
    $password = mysqli_real_escape_string($conn, $_POST["pwd"]);
    
    if (empty($firstname) || empty($lastname) || empty($mail) || empty($username) || empty($password)) {
        header("Location: ./../../../index.php?input=empty");
        exit();
    } else {
        if (!preg_match("/^[a-öA-Ö]*$/", $firstname) || !preg_match("/^[a-öA-Ö]*$/", $lastname)) {
            header("Location: ./../../../index.php?input=invalid");
            exit();
        } else {
            if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                header("Location: ./../../../index.php?email=invalid");
                exit();
            } else {
                $sql = "SELECT * FROM users WHERE user_mail='$mail'";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                if ($resultCheck > 0) {
                    header("Location: ./../../../index.php?signup=error");
                    exit();
                } else {
                    if (!preg_match("/^[a-z0-9]*$/", $username)) {
                        header("Location: ./../../../index.php?username=invalid");
                        exit();
                    } else {
                        $sql = "SELECT * FROM users WHERE user_username='$username'";
                        $result = mysqli_query($conn, $sql);
                        $resultCheck = mysqli_num_rows($result);
                        if ($resultCheck > 0) {
                            header("Location: ./../../../index.php?signup=error");
                            exit();
                        } else {
                            $hashedPwd = password_hash($password, PASSWORD_BCRYPT);
                            $sqlInsert = "INSERT INTO users (user_firstname, user_lastname, user_mail, user_username, user_password) VALUES ('$firstname', '$lastname', '$mail', '$username', '$hashedPwd')";
                            mysqli_query($conn, $sqlInsert);
                            $sql = "SELECT * FROM users WHERE user_username='$username'";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            $_SESSION['user_id'] = $row['user_id'];
                            $_SESSION['user_firstname'] = $row['user_firstname'];
                            header("Location: ./../../../user.php");
                            exit();
                        }
                    }
                }
            }
        }
    }
    
} else {
    header("Location: ./../../../index.php?=cant_acesses_this_signup_document");
    exit();
}