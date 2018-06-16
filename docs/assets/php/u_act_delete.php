<?php

session_start();

include_once './dbh_conn.php';

if (!isset($_POST['delete_submit'])) {
    header("Location: ./../../user.php?".mt_rand()."");
    exit();
} else {
    $courseDeleteId = $_POST['delete_id'];
    $sql = "SELECT * FROM grades WHERE g_course_delete_id='$courseDeleteId'";
    $sqlQuery = mysqli_query($conn, $sql);
    $sqlQueryRows = mysqli_num_rows($sqlQuery);
    if ($sqlQueryRows > 0) {
        $sql = "DELETE FROM grades WHERE g_course_delete_id='$courseDeleteId'";
        $sqlQuery = mysqli_query($conn, $sql);
        header("Location: ./../../user.php?".mt_rand()."=coursedeleted");
        exit();
    } else {
        header("Location: ./../../user.php?".mt_rand()."=coursenotfound");
        exit();
    }
}
