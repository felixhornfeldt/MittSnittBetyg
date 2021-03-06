<?php session_start();session_destroy(); ?>

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
                <div class="ix_home">
                    <!-- <div style="text-align: center;">
                        <a href="./user.php">User page dev mode</a>
                    </div> -->
                    <div class="ix_name_ctr">
                        <h1 class="ix_name">MittSnittBetyg</h1>
                    </div>
                    <div class="ix_start_hold">
                        <div class="ix_form_btns">
                            <div class="ix_form_btn_ctr" id="ix_form_btn_login_ctr">
                                <button class="ix_form_btn" id="ix_form_btn_login">Logga in</button>
                            </div>
                            <div class="ix_form_btn_ctr" id="ix_form_btn_signup_ctr">
                                <button class="ix_form_btn" id="ix_form_btn_signup">Registrera</button>
                            </div>
                        </div>
                    </div>
                    <div class="ix_login_hold">
                        <div class="ix_login_form_ctr">
                            <i class="far fa-arrow-alt-circle-left ix_login_back_b"></i>
                            <form action="./assets/php/actions/act_ix_login.php" method="post" class="ix_login_form">
                                <input type="text" name="uid" class="ix_login_input" placeholder="Användarnman">
                                <input type="password" name="pwd" class="ix_login_input" placeholder="Lösenord">
                                <button type="submit" name="login_submit_b" class="ix_login_btn">Logga in</button>
                            </form>
                        </div>
                    </div>
                    <div class="ix_signup_hold">
                        <div class="ix_signup_form_ctr">
                            <form action="./assets/php/actions/act_ix_signup.php" method="post" class="ix_signup_form">
                                <input type="text" name="firstname" class="ix_signup_input" placeholder="Förnamn">
                                <input type="text" name="lastname" class="ix_signup_input" placeholder="Efternamn">
                                <input type="email" name="mail" class="ix_signup_input" placeholder="Email">
                                <input type="text" name="uid" class="ix_signup_input" placeholder="Användarnman">
                                <input type="password" name="pwd" class="ix_signup_input" placeholder="Lösenord">
                                <button type="submit" name="signup_submit_b" class="ix_signup_btn">Registrera</button>
                            </form>
                            <i class="far fa-arrow-alt-circle-left ix_signup_back_b"></i>
                        </div>
                    </div>
                </div>
            </div>
		</body>
	</html>