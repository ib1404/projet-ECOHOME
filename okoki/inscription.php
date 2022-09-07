<?php
                ob_start();
                session_start();
                // Enter your host name, database username, password, and database name.
                // If you have not set database password on localhost then set empty.
                $con = mysqli_connect("localhost","root","","config2");
                // Check connection
                if (mysqli_connect_errno()){
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }
                
                
                ?>

<!DOCTYPE html>
<html lang = "fr">

    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="style.css" media="all" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
        <script src="event.js"></script>   
        <title>Ecohome</title>
    </head>

    <body  class="scrollbody">

        <script src="event.js"></script>

        <header>
            <div id="top" class="top">
                <a href="login.php" class="logo"><img src="https://i.goopics.net/kdv184.png" class="ecohome"></a>
                <div class="profil">
                    <a href="connexion.php">Se connecter</a>
                    <a href="connexion.php"><img src="https://i.goopics.net/p5sdhc.png" class="profil_picture"></a>
                </div>
            </div>

            <nav>
                <li id="underhead" class="underhead">
                    <a href="login.php">Accueil</a>
                    <a href="connection_needed.php">Classement</a>
                    <a href="connection_needed.php">Gérer les capteurs</a>
                    <a href="connection_needed.php">Notifications</a>
                    <a href="connection_needed.php">Forum</a>
                    <a href="connection_needed.php">Paramètres</a>
                </li>
            </nav>

        </header>

        
            <div id="inscrip">

                <div class="img_pasdeco">
                    <img src="https://i.goopics.net/m8obrd.jpg" height="100%" width="100%" alt>
                </div>
                
                <form id="connect_send" class="form" action="" method="post" class="box_connexion">
                    <h1 align="center">Inscription</h1>
                    <div class="barre-de-séparation"></div>
                        <div class="corps">
                            <br>
                            <div class="groupe">
                            <label>Nom d'utilisateur :</label>
                            <br>
                            <input type="text" class="login-input" name="username-register" placeholder="Nom d'utilisateur" required />
                            <i class="fas fa-user-plus"></i>
                            <br><br>
                        </div>
                        <div class="groupe">
                            <label>Adresse mail :</label>
                            <br>
                            <input type="email" class="login-input" name="email-register" placeholder="Adresse e-mail" required>
                                <i class="far fa-paper-plane"></i>
                            <br><br>
                        </div>
            
                        <div class="groupe">
                            <label>Mot de passe :</label>
                            <br>
                            <input type="password" class="login-input" name="password-register" placeholder="Mot de passe" id="password-regis" required>
                            <i class="fas fa-key"></i>
                                    <br>
                            <input type="checkbox" onclick="Afficher()">

                            <script>
                                function Afficher()
                                {
                                var input = document.getElementById("password-regis")
                                if (input.type === "password")
                            
                                {
                                input.type = "text";
                                }else
                                {
                                    input.type = "password";
                                }
                                }
                            </script>

                            <label>Afficher</label>
                            <br><br>
                        </div>

                        <!--<div class="groupe">
                                    <label>Confirmer le mot de passe :</label>
                                    <br>
                                    <input type="password" class="login-input" name="password-register2" placeholder="Confirmer mot de passe" id="password-regis2" required>
                                <i class="fas fa-key"></i>
                                    <br>
                            <input type="checkbox" onclick="Afficher2()">
                            <script>
                            function Afficher2()
                            {
                                var input = document.getElementById("password-regis2")
                                if (input.type === "password")
                            
                            {
                            input.type = "text";
                            }else
                            {
                                input.type = "password";
                            }
                            }
                            </script>
                            <label>Afficher</label>
                            <br><br><br>
                        </div>-->
                
                    </div>
                    <div class="piedinscrip" align="center">
                        <a name="back" value="Retour" class="back-button" href="connexion.php">Retour</a>
                        <input type="submit" name="submit" value="S'inscrire" class="login-button">
                    </div>
                

                    <?php
                //php register - add database
                if (isset($_REQUEST['username-register'])) {
                    // removes backslashes
                    $username = stripslashes($_REQUEST['username-register']);
                    //escapes special characters in a string
                    $username = mysqli_real_escape_string($con, $username);
                    $email    = stripslashes($_REQUEST['email-register']);
                    $email    = mysqli_real_escape_string($con, $email);
                    $password = stripslashes($_REQUEST['password-register']);
                    $password = mysqli_real_escape_string($con, $password);
                    $inscrip    = "INSERT into users (name, password, mail)
                                VALUES ('$username', '" . md5($password) . "', '$email')";
                    $result   = mysqli_query($con, $inscrip);

                    if ($result) {
                        
                        $_SESSION['username'] = $username;
                        $get = mysqli_query($con, "SELECT * FROM users WHERE name = '" . $_SESSION['username'] . "'");
                        $load= mysqli_fetch_assoc($get);
                        $_SESSION['id'] = $load['id'];
                        $_SESSION['mail'] = $load['mail'];

                        $get2 = mysqli_query($con, "SELECT * FROM adresses WHERE id = '" . $_SESSION['id'] . "'");
                        $load2= mysqli_fetch_assoc($get2);
                        $_SESSION['Ville'] = $load2['Ville'];
                        $_SESSION['Pays'] = $load2['Pays'];

                        $get3 = mysqli_query($con, "SELECT score FROM score WHERE id = '11'");               
                        $load3= mysqli_fetch_assoc($get3);
                        $_SESSION['score'] = $load3['score'];
                        

                        function updatescore($con){
                            $score1 ="UPDATE score SET score=score+50 WHERE id ='" . $_SESSION['id'] . "'";

                            // on exécute la requête (mysql_query) et on affiche un message au cas où la requête ne se passait pas bien (or die)
                            $updatescore= mysqli_query($con,$score1) ;
                        }

                        updatescore($con);
                        
                        
                        // Redirect to user dashboard page
                        header("Location:index.php");
                        ob_end_flush();
                    } else {
                        
                        echo "<script>alert(\"Cet utilisateur ou cette adresse mail n'est pas disponible.\");</script>";
                        
                    }
                } else {
                ?>

                <?php
                }
                ?>
    
                </form>
            </div>
        
    </body>

    <footer class="footer-distributed">

<div class="footer-left">

    <!-- https://i.goopics.net/y008ct.png-->

    <h3>Eco<span>Home</span></h3>

    <p class="footer-company-name">Gaatis Environment © 2021</p>

    <div class="footer-icons">

        <a href="https://fr-fr.facebook.com/"><i class="fab fa-facebook"></i></a>
        <a href="https://twitter.com"><i class="fab fa-twitter"></i></a>
        <a href="https://www.linkedin.com"><i class="fab fa-linkedin"></i></a>
        <a href="https://github.com/gigi11111/ecohome/tree/Final-bicomposante"><i class="fab fa-github"></i></a>

    </div>

</div>

<div class="footer-right">

    <p>Contact Us</p>
    <form action="#" method="post">

        <input type="text" name="email" placeholder="Email">
        <textarea name="message" placeholder="Message"></textarea>
        <button>Send</button>

    </form>

</div>

</footer>
</html>