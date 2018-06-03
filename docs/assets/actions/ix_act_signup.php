<?php

include_once './../database/dbh_conn.php';

if (isset($_POST["signup_submit_b"])) {
    
    $firstname = mysqli_real_escape_string($conn, $_POST["firstname"]);
    $lastname = mysqli_real_escape_string($conn, $_POST["lastname"]);
    $mail = mysqli_real_escape_string($conn, $_POST["mail"]);
    $username = mysqli_real_escape_string($conn, $_POST["uid"]);
    $password = mysqli_real_escape_string($conn, $_POST["pwd"]);
    
    if (empty($firstname) || empty($lastname) || empty($mail) || empty($username) || empty($password)) {
        header("Location: ./../../index.html?input=empty");
        exit();
    } else {
        if (!preg_match("/^[a-öA-Ö]*$/", $firstname) || !preg_match("/^[a-öA-Ö]*$/", $lastname)) {
            header("Location: ./../../index.html?input=invalid");
            exit();
        } else {
            if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                header("Location: ./../../index.html?email=invalid");
                exit();
            } else {
                if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
                    header("Location: ./../../index.html?username=invalid");
                    exit();
                } else {
                    $sql = "SELECT * FROM users WHERE user_username='$username'";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    if ($resultCheck > 0) {
                        header("Location: ./../../index.html?signup=error");
                        exit();
                    } else {
                        $hashedPwd = password_hash($password, PASSWORD_BCRYPT);
                        $sqlInsert = "INSERT INTO users (user_firstname, user_lastname, user_mail, user_username, user_password) VALUES ('$firstname', '$lastname', '$mail', '$username', '$hashedPwd')";
                        mysqli_query($conn, $sqlInsert);
                        header("Location: ./../../index.html?signup=sucess");
                        exit();
                    }
                }
            }
        }
    }
    
} else {
    header("Location: ./../../index.html?=cant_acesses_this_signup_document");
    exit();
}