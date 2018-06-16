<?php 
    session_start();
    // if (!isset($_SESSION['user_id'])){
    //     header("Location: ./index.php?pleaseloginorsignup=".mt_rand()."");
    //     exit();
    // }
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
                            <div style="text-align: center;">
                                <a href="./index.php">Index page dev mode</a>
                            </div>
                            <div class="u_new_grade_form_ctr">
                                <div class="u_new_grade_btn_ctr">
                                    <button class="u_new_grade_btn">Ny <i class="fas fa-plus"></i></button>
                                </div>
                                <div class="u_new_grade_form_box">
                                    <form action="./assets/php/g_act_upload.php" method="post" class="u_new_grade_form">
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
                                        include_once './assets/php/u_grade_box_maker.php';
                                    ?>
                                </div>
                                <div class="u_conclusion_ctr"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</body>
	</html>