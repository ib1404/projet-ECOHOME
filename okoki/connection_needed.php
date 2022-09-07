<?php
?>

<!DOCTYPE html>

<html lang="fr">

    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="style.css" media="all" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
        <script src="event.js"></script>   
        <title>Ecohome</title>
    </head>

    <style>
        
    </style>

    <body class="scrollbody">

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

        <div class="container_nonco">
            
            <div class="container-middle">
                <h1>Connexion requise</h1>
                <hr class="border-grey">
                <ul class="container_txt_connection_needed">
                    <li class="connection_needed_txt"><span>Pour accéder à cette section, vous devez avoir un compte et être connecté.</span></li>
                    <br><br>


                    <li class="connection_needed_txt"><a href="connexion.php"><button class="btn_inscription2">Se connecter</button></a></li>

                    
                </ul>
            </div>
            

            <div class="img_pasdeco">
                <img src="https://i.goopics.net/m8obrd.jpg" height="100%" width="100%" alt>
            </div>
        </div>

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

    </body>

</html>