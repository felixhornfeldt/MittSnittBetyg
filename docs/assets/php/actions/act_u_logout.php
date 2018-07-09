<?php

session_start();

if (isset($_SESSION['user_id'])) {
    if (isset($_POST['sbtn_logout'])) {
        session_destroy();
        header("Location: ./../../../index.php?".mt_rand()."=logoutsuccess");
        exit();
    } else {
        header("Location: ./../../../index.php?".mt_rand()."=cantaccessfile");
        exit();
    }
} else {
    header("Location: ./../../../index.php?".mt_rand()."=cantaccessfile");
    exit();
}