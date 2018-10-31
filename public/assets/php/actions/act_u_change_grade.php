<?php

session_start();

include_once './../dbh_conn.php';

if (!isset($_POST["ucgbtn_submit"])) {
    header("Location: ./../../../user.php?".mt_rand()."");
    exit();
} else {
    $gradeId = $_POST["grade_id"];
    $newGradeName = mysqli_real_escape_string($conn, $_POST["new_grade_name"]);
    $newGradeLetter = strtoupper(mysqli_real_escape_string($conn, $_POST["new_grade_letter"]));
    $newGradeValue = mysqli_real_escape_string($conn, $_POST["new_grade_value"]);
    
    if (empty($gradeId) || empty($newGradeName) || empty($newGradeLetter) || empty($newGradeValue)) {
        header("Location: ./../../../user.php?".mt_rand()."=emptyinput");
        exit();
    } else {
        if (!preg_match("/^[a-öA-Ö0-9 ]*$/", $newGradeName)) {
            header("Location: ./../../../user.php?".mt_rand()."=gradenameinvalid");
            exit();
        } else {
            if (!preg_match("/^[A-F]*$/", $newGradeLetter)) {
                header("Location: ./../../../user.php?".mt_rand()."=gradeletterinvalid");
                exit();
            } else {
                $sql = "SELECT * FROM grades WHERE g_course_unique_id='$gradeId'";
                $sqlQuery = mysqli_query($conn, $sql);
                $sqlQueryCheck = mysqli_num_rows($sqlQuery);
                if (!$sqlQueryCheck > 0) {
                    header("Location: ./../../../user.php?".mt_rand()."=nosuchcourse");
                    exit();
                } else {
                    $sql = "SELECT * FROM grades WHERE g_course_unique_id='$gradeId' AND g_course_name='$newGradeName' AND g_course_grade='$newGradeLetter' AND g_course_value='$newGradeValue'";
                    $sqlQuery = mysqli_query($conn, $sql);
                    $sqlQueryCheck = mysqli_num_rows($sqlQuery);
                    if ($sqlQueryCheck > 0) {
                        header("Location: ./../../../user.php?".mt_rand()."=samegradevalues");
                        exit();
                    } else {
                        $sqlUpdate = "UPDATE grades SET g_course_name='$newGradeName', g_course_grade='$newGradeLetter', g_course_value='$newGradeValue' WHERE g_course_unique_id='$gradeId'";
                        mysqli_query($conn, $sqlUpdate);
                        header("Location: ./../../../user.php?".mt_rand()."=changesuccessful");
                        exit();
                    }
                }
            }
        }
    }
}