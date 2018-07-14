<?php 
    session_start();
    if (!isset($_SESSION['user_id'])){
        header("Location: ./index.php?pleaseloginorsignup=".mt_rand()."");
        exit();
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
                <div class="faq_ctr">
                    <div class="faq_content_ctr">
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
                                        <i class="fas fa-times"></i>
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
                        <div class="faq_main_ctr"></div>
                    </div>
                </div>
            </div>
		</body>
	</html>