<?php

include_once './assets/php/dbh_conn.php';
$userId = $_SESSION['user_id'];

$sql = "SELECT * FROM grades WHERE user_id='$userId'";
$sqlQuery = mysqli_query($conn, $sql);
$sqlQueryRows = mysqli_num_rows($sqlQuery);

if ($sqlQueryRows > 0) {
    while ($sqlRow = mysqli_fetch_assoc($sqlQuery)) {
        $sqlCourseName = $sqlRow['g_course_name'];
        $sqlCourseGrade = $sqlRow['g_course_grade'];
        $sqlCourseValue = $sqlRow['g_course_value'];
        $sqlCourseUniqueId = $sqlRow['g_course_unique_id'];
        $sqlCourseDeleteId = $sqlRow['g_course_delete_id'];

        // REFER POINT 1
        echo '<div class="u_grade_box"><div class="u_grade_hold_ctr" data-grade-id="'.$sqlCourseUniqueId.'"><div class="u_grade_name_ctr"><p class="u_grade_parg">'.$sqlCourseName.'</p></div><div class="u_grade_grade_ctr"><p class="u_grade_parg">'.$sqlCourseGrade.'</p></div><div class="u_grade_value_ctr"><p class="u_grade_parg">'.$sqlCourseValue.'</p></div></div><div class="u_grade_manage_ctr" id="'.$sqlCourseUniqueId.'"><div class="u_manage_content_ctr"><div class="u_manage_edit_ctr"><i class="far fa-edit u_manage_edit"></i></div><div class="u_manage_delete_ctr"><i class="fas fa-trash-alt u_manage_delete" data-delete-id="'.$sqlCourseDeleteId.'"></i></div><div class="u_manage_delete_form_ctr" id="'.$sqlCourseDeleteId.'"><div class="u_manage_delete_form_box"><form action="./user.php" method="post" class="u_manage_delete_form"><input type="text" style="display: none" name="'.$sqlCourseDeleteId.'"><div class="u_manage_delete_form_message_ctr"><p class="u_manage_delete_form_message">Är du säker?</p></div><div class="u_manage_delete_form_btn_ctr"><button type="submit" class="u_manage_delete_form_btn" name="delete_submit">Ja</button></div></form></div></div></div></div></div>';
    }
}

// READABLE REFER POINT 1

// echo '<div class="u_grade_box">';
// echo    '<div class="u_grade_hold_ctr" data-grade-id="'.$sqlCourseUniqueId.'">';
// echo        '<div class="u_grade_name_ctr">';
// echo            '<p class="u_grade_parg">'.$sqlCourseName.'</p>';
// echo        '</div>';
// echo        '<div class="u_grade_grade_ctr">';
// echo            '<p class="u_grade_parg">'.$sqlCourseGrade.'</p>';
// echo        '</div>';
// echo        '<div class="u_grade_value_ctr">';
// echo            '<p class="u_grade_parg">'.$sqlCourseValue.'</p>';
// echo        '</div>';
// echo    '</div>';
// echo    '<div class="u_grade_manage_ctr" id="'.$sqlCourseUniqueId.'">';
// echo        '<div class="u_manage_content_ctr">';
// echo            '<div class="u_manage_edit_ctr">';
// echo               '<i class="far fa-edit u_manage_edit"></i>';
// echo            '</div>';
// echo            '<div class="u_manage_delete_ctr">';
// echo                '<i class="fas fa-trash-alt u_manage_delete" data-delete-id="'.$sqlCourseDeleteId.'"></i>';
// echo            '</div>';
// echo            '<div class="u_manage_delete_form_ctr" id="'.$sqlCourseDeleteId.'">';
// echo                '<div class="u_manage_delete_form_box">';
// echo                    '<form action="./user.php" method="post" class="u_manage_delete_form">';
// echo                        '<input type="text" style="display: none" name="'.$sqlCourseDeleteId.'">';
// echo                        '<div class="u_manage_delete_form_message_ctr">';
// echo                            '<p class="u_manage_delete_form_message">Är du säker?</p>';
// echo                        '</div>';
// echo                        '<div class="u_manage_delete_form_btn_ctr">';
// echo                            '<button type="submit" class="u_manage_delete_form_btn" name="delete_submit">Ja</button>';
// echo                        '</div>';
// echo                    '</form>';
// echo                '</div>';
// echo            '</div>';
// echo        '</div>';
// echo    '</div>';
// echo '</div>';