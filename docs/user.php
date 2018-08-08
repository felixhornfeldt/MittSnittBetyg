<?php 
    session_start();
    if (!isset($_SESSION['user_id'])){
        header("Location: ./index.php?pleaseloginorsignup=".mt_rand()."");
        exit();
    } else {
        include_once "./assets/php/dbh_conn.php";
        $sqlReq = "SELECT * FROM users WHERE user_id='$_SESSION[user_id]'";
        $sqlQuery = mysqli_query($conn, $sqlReq);
        $sqlResult = mysqli_num_rows($sqlQuery);
        if ($sqlResult < 1) {
            header("Location: ./index.php?loginError=".mt_rand()."");
            exit();
        }
    }
?>

<!DOCTYPE html>
	<html lang="en">
		<head>
			<!--Fonts-->
            <link href="https://fonts.googleapis.com/css?family=Bungee|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet" />
            
            <!--CSS Stylesheets-->
            <link rel="stylesheet" href="./assets/style/style.css" />
            
            <!--scale and charset-->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            
            <!--Title of page-->
            <title>MittSnittBetyg</title>
            
            <!--Icon Head-->
            <link rel="icon" href="" sizes="32x32" />
            
            <!-- Icon library FB TW IG etc. -->
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"/>
             
            <!-- JS Code -->
            <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
            <script src="./assets/scripts/script.js"></script>
		</head>
		<body>
            <div class="ctr">
                <div class="u_ctr">
                    <div class="u_spin_ctr">
                        <i class="fas fa-circle-notch u_spin"></i>
                    </div>
                    <div class="u_content_ctr">
                        <div class="u_content_box">
                        <header>
                            <div class="header_ctr">
                                <div class="header_home_ctr">
                                    <a href="./user.php" class="header_home_link">
                                        <div class="header_home_content_ctr">
                                            <i class="fas fa-home"></i>
                                        </div>
                                    </a>
                                </div>
                                <div class="header_profile_ctr">
                                    <div class="header_profile_logo_ctr">
                                        <!-- <i class="fas fa-user-astronaut"></i> -->
                                        <i class="far fa-user"></i>
                                    </div>
                                </div>
                                <div class="header_profile_content_ctr">
                                    <div class="header_profile_content_close_ctr">
                                        <i class="fas fa-times u_header_profile_content_close"></i>
                                    </div>
                                    <div class="header_profile_content_name_ctr">
                                        <h1 class="header_profile_content_name">Hej <?php if(isset($_SESSION['user_firstname'])){echo $_SESSION['user_firstname'];}else{echo "";} ?></h1>
                                    </div>
                                    <div class="header_profile_content_links_ctr">
                                        <div class="header_profile_content_link_settings_ctr">
                                            <a href="./u_settings.php" class="header_profile_content_link">Inställningar <i class="fas fa-user-cog"></i></a>
                                        </div>
                                        <div class="header_profile_content_link_faq_ctr">
                                            <a href="./faq.php" class="header_profile_content_link">FAQ <i class="fas fa-question-circle"></i></a>
                                        </div>
                                        <div class="header_profile_content_link_logout_ctr">
                                            <form action="./assets/php/actions/act_u_logout.php" method="POST" class="logout_form">
                                                <button type="submit" class="header_profile_content_form_logout_btn" name="sbtn_logout">Logga ut <i class="fas fa-sign-out-alt"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </header>
                            <div class="u_new_grade_form_ctr">
                                <div class="u_new_grade_btn_ctr">
                                    <button class="u_new_grade_btn">Ny <i class="fas fa-plus"></i></button>
                                </div>
                                <div class="u_new_grade_form_box">
                                    <form action="./assets/php/actions/act_g_upload.php" method="post" class="u_new_grade_form">
                                        <div class="u_new_grade_form_course_name_ctr">
                                            <label for="course_name" class="u_new_grade_label_for_input">Kursnamn</label>
                                            <input type="text" name="course_name" class="u_new_grade_form_input" id="course_name">
                                        </div>
                                        <div class="u_new_grade_form_course_value_ctr">
                                            <label for="course_value" class="u_new_grade_label_for_input">Kurspoäng</label>
                                            <input type="number" name="course_value" class="u_new_grade_form_input" id="course_value">
                                        </div>
                                        <div class="u_new_grade_form_letter_ctr">
                                            <label for="grade_letter" class="u_new_grade_label_for_input">Betyg</label>
                                            <input type="text" name="course_grade" class="u_new_grade_form_input" id="grade_letter">
                                        </div>
                                        <div class="u_new_grade_form_submit_btn_ctr">
                                            <button type="submit" name="btn_submit" class="u_new_grade_form_submit_btn">Spara</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="u_grade_ctr">
                                <div class="u_grade_content_ctr">
                                    <?php
                                        include_once './assets/php/includes/u_grade_box_maker.php';
                                    ?>
                                </div>
                                <div class="u_conclusion_ctr">
                                    <?php
                                        include_once './assets/php/includes/u_conclusion_maker.php';
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="u_change_grade_ctr">
                    <div class="u_change_grade_close_ctr">
                        <i class="fas fa-times u_change_grade_close"></i>
                    </div>
                    <div class="u_change_grade_content_ctr" style="display: none;">
                        <div class="u_change_grade_ct_form_ctr">
                            <form action="./assets/php/actions/act_u_change_grade.php" method="POST" class="u_change_grade_ct_form">
                                <div class="u_change_grade_ct_form_content">
                                    <div class="u_change_grade_ct_form_ct_name_ctr">
                                        <label for="ucgctfikn" class="u_change_grade_ct_form_label">Kursnamn</label>
                                        <input type="text" class="u_change_grade_ct_form_input" id="ucgctfikn" data-para-id="ucgctfspkn">
                                        <p class="u_change_grade_ct_form_sp" id="ucgctfspkn"></p>
                                    </div>
                                    <div class="u_change_grade_ct_form_ct_letter_ctr">
                                        <label for="ucgctfib" class="u_change_grade_ct_form_label">Betyg</label>
                                        <input type="text" class="u_change_grade_ct_form_input" id="ucgctfib" data-para-id="ucgctfspb">
                                        <p class="u_change_grade_ct_form_sp" id="ucgctfspb"></p>
                                    </div>
                                    <div class="u_change_grade_ct_form_ct_value_ctr">
                                        <label for="ucgctfikp" class="u_change_grade_ct_form_label">Kurspoäng</label>
                                        <input type="number" class="u_change_grade_ct_form_input" id="ucgctfikp" data-para-id="ucgctfspkp" max="999">
                                        <p class="u_change_grade_ct_form_sp" id="ucgctfspkp"></p>
                                    </div>
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
                </div>
            </div>
		</body>
	</html>