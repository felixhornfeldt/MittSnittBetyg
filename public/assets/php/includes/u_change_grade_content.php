<?php
    include_once './assets/php/dbh_conn.php';
    
    if (!isset($_SESSION['user_id'])) {
        header("Location: ./../../../index.php?pleaseloginorsignup=".mt_rand()."");
        exit();
    } else {
        $userId = $_SESSION['user_id'];
        $sql = "SELECT * FROM users WHERE user_id='$userId'";
        $sqlQuery = mysqli_query($conn, $sql);
        $sqlQueryRows = mysqli_num_rows($sqlQuery);
        if ($sqlQueryRows < 1) {
            header("Location: ./../../../index.php?pleaseloginorsignup=".mt_rand()."");
            exit();
        }
    }
?>

<div class="u_change_grade_close_ctr">
    <i class="fas fa-times u_change_grade_close"></i>
</div>
<div class="u_change_grade_content_ctr" style="display: none;">
    <div class="u_change_grade_ct_form_ctr">
        <form action="./assets/php/actions/act_u_change_grade.php" method="POST" class="u_change_grade_ct_form">
            <div class="u_change_grade_ct_form_content">
                <?php
                    $divClassName = ["name", "letter", "value"];
                    $courseHeading = ["Kursnamn", "Betyg", "Kurspoäng"];
                    $inputType = ["text", "text", "number"];
                    $inputName = ["new_grade_name", "new_grade_letter", "new_grade_value"];
                    $inputId = ["ucgctfikn", "ucgctfib", "ucgctfikp"];
                    $inputMax = ["", "", "max='999'"];
                    $paragraphId = ["ucgctfspkn", "ucgctfspb", "ucgctfspkp"];
                    $i = 0;
                    while ($i < sizeof($divClassName)) {
                        echo '<div class="u_change_grade_ct_form_ct_'.$divClassName[$i].'_ctr"><label for="'.$inputId[$i].'" class="u_change_grade_ct_form_label">'.$courseHeading[$i].'</label><input type="'.$inputType[$i].'" name="'.$inputName[$i].'" class="u_change_grade_ct_form_input" id="'.$inputId[$i].'" data-para-id="'.$paragraphId[$i].'" '.$inputMax[$i].'><p class="u_change_grade_ct_form_sp" id="'.$paragraphId[$i].'"></p></div>';
                        $i++;
                    }
                ?>
            </div>
            <div class="u_change_grade_ct_form_btn_ctr">
                <button class="u_change_grade_ct_form_btn ucgctbtn" type="submit" name="ucgbtn_submit">Spara</button>
            </div>
            <input type="text" id="change_grade_id_input" name="grade_id" style="display: none;">
        </form>
    </div>
    <div class="u_change_grade_ct_re_ctr">
        <button class="u_change_grade_ct_re_btn ucgctbtn">Ångra</button>
    </div>
</div>