<?php

session_start();

include_once './../dbh_conn.php';

if (!isset($_POST["ucgbtn_submit"])) {
    header("Location: ./../../../user.php?".mt_rand()."");
    exit();
} else {
    header("Location: ./../../../user.php?".mt_rand()."");
    exit(); 
}
