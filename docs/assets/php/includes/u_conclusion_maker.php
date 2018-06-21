<?php

include_once './assets/php/dbh_conn.php';

// echo "Found file".mt_rand()."";

if (!isset($_SESSION['user_id'])) {
    header("Location: ./../../../index.php?pleaseloginorsignup=".mt_rand()."");
    exit();
} else {

    $userId = $_SESSION['user_id'];
    $sql = "SELECT * FROM grades WHERE user_id='$userId'";
    $sqlQuery = mysqli_query($conn, $sql);
    $sqlQueryRows = mysqli_num_rows($sqlQuery);

    if ($sqlQueryRows < 1) {
        echo "No course ".mt_rand()."";
        exit();
    } else {
        $totalPoints = 0; 
        $allCourseValues = 0;
        while ($sqlRow = mysqli_fetch_assoc($sqlQuery)) {
            $totalPoints += $sqlRow['g_course_value'];
            $courseGrade = $sqlRow['g_course_grade'];
            switch ($courseGrade) {
                case 'A':
                    $allCourseValues += (20 * $sqlRow['g_course_value']);
                    break;
                case 'B':
                    $allCourseValues += (17.5 * $sqlRow['g_course_value']);
                    break;
                case 'C':
                    $allCourseValues += (15 * $sqlRow['g_course_value']);
                    break;
                case 'D':
                    $allCourseValues += (12.5 * $sqlRow['g_course_value']);
                    break;
                case 'E':
                    $allCourseValues += (10 * $sqlRow['g_course_value']);
                    break;
                case 'F':
                    $allCourseValues += (0 * $sqlRow['g_course_value']);
                    break;
                default:
                    $allCourseValues += 0;
                    break;
            }
        }
        $gradeCut = $allCourseValues/$totalPoints;
        echo '<div class="u_conclusion_grade_cut_ctr"><label for="conclusion_grade_cut" class="u_conclusion_label">Snittbetyg:</label><p class="u_conclusion_parg" id="conclusion_grade_cut">'.$gradeCut.'</p></div><div class="u_conclusion_total_points_ctr"><label for="conclusion_total_points" class="u_conclusion_label">Lästa poäng:</label><p class="u_conclusion_parg" id="conclusion_total_points">'.$totalPoints.'</p></div>';
        exit();
    }
}