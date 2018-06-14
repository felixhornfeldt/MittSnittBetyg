<?php

include_once './dbh_conn.php';

if (!isset($_POST["btn_submit"])) {
    header("Location: ./../../user.html?".mt_rand());
    exit();
} else {

    $courseName = mysqli_real_escape_string($conn, $_POST["course_name"]);
    $courseValue = mysqli_real_escape_string($conn, $_POST["course_value"]);
    $courseGrade = strtoupper(mysqli_real_escape_string($conn, $_POST["course_grade"]));

    if (empty($courseName) || empty($courseValue) || empty($courseGrade)) {
        header("Location: ./../../user.html?".mt_rand()."=emptyinput");
        exit();
    } else {
        if (!preg_match("/^[a-öA-Ö0-9 ]*$/", $courseName)) {
            header("Location: ./../../user.html?".mt_rand()."=coursenameinvalid");
            exit();
        } else {
            if (!preg_match("/^[A-F]*$/", $courseGrade)) {
                header("Location: ./../../user.html?".mt_rand()."=coursegradeinvalid");
                exit();
            } else {
                $sql = "SELECT * FROM grades WHERE g_course_name='$courseName'";
                $sqlQuery = mysqli_query($conn, $sql);
                $sqlQueryCheck = mysqli_num_rows($sqlQuery);
                if ($sqlQueryCheck > 0) {
                    header("Location: ./../../user.html?".mt_rand()."=coursealreadymade");
                    exit();
                } else {
                    $courseUniqueId = mt_rand();
                    $courseDeleteId = mt_rand();
                    $sql = "SELECT * FROM grades WHERE g_course_unique_id='$courseUniqueId' OR g_course_unique_id='$courseDeleteId' OR g_course_delete_id='$courseUniqueId' OR g_course_delete_id='$courseDeleteId'";
                    $sqlQuery = mysqli_query($conn, $sql);
                    $sqlQueryCheck = mysqli_num_rows($sqlQuery);
                    if ($sqlQueryCheck > 0) {
                        $newIdRun = true;
                        while ($newIdRun) {
                            $courseUniqueId = mt_rand();
                            $courseDeleteId = mt_rand();
                            $sql = "SELECT * FROM grades WHERE g_course_unique_id='$courseUniqueId' OR g_course_unique_id='$courseDeleteId' OR g_course_delete_id='$courseUniqueId' OR g_course_delete_id='$courseDeleteId'";
                            $sqlQuery = mysqli_query($conn, $sql);
                            $sqlQueryCheck = mysqli_num_rows($sqlQuery);
                            if ($sqlQueryCheck <= 0) {
                                $newIdRun = false;
                            }
                        }
                        $hashedCourseGrade = password_hash($courseGrade, PASSWORD_BCRYPT);
                        $sqlInsert = "INSERT INTO grades (user_id, g_course_name, g_course_grade, g_course_value, g_course_unique_id, g_course_delete_id) VALUES (1, '$courseName', '$hashedCourseGrade', $courseValue, $courseUniqueId, $courseDeleteId)";
                        mysqli_query($conn, $sqlInsert);
                        header("Location: ./../../user.html?gradeaddsucess=".mt_rand()."");
                        exit();
                    } else {
                        $hashedCourseGrade = password_hash($courseGrade, PASSWORD_BCRYPT);
                        $sqlInsert = "INSERT INTO grades (user_id, g_course_name, g_course_grade, g_course_value, g_course_unique_id, g_course_delete_id) VALUES (1, '$courseName', '$hashedCourseGrade', $courseValue, $courseUniqueId, $courseDeleteId)";
                        mysqli_query($conn, $sqlInsert);
                        header("Location: ./../../user.html?gradeaddsucess=".mt_rand()."");
                        exit();
                    }
                }
            }  
        }
    }
}