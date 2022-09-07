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
<html>
  <head>
    <meta charset="utf-8">
    <title>classement</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer"
      />
  </head>
  <body class="scrollbody">

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

  <header>
          <div id="top" class="top">
              <a href="index.php" class="logo"><img src="https://i.goopics.net/kdv184.png" class="ecohome"></a>
              <div class="profil">
                  <a href="profil.php"><?php echo ucwords($_SESSION['username']); ?></a>
                  <a href="profil.php"><img src="https://i.goopics.net/p5sdhc.png" class="profil_picture"></a>
                  <!--<li> <div class="notification">
                      <a class="notification-number" href="">3</a>
                      <svg viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
                      <path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9M13.73 21a2 2 0 01-3.46 0" />
                      </svg>
                  </div></li>-->
              </div>
          </div>
      
          <nav>
              <li id="underhead" class="underhead">
                  <a href="index.php">Accueil</a>
                  <a href="classement.php" style="color:#00FF00;">Classement</a>
                  <a href="glc.php">Gérer les capteurs</a>
                  <a href="notification.php">Notifications</a>
                  <a href="forum.php">Forum</a>
                  <a href="parametre.php">Paramètres</a>
              </li>
          </nav>

  </header>

  <div  id="connex3">

      <div class="img_pasdeco">
          <img src="https://i.goopics.net/5loehf.jpg" height="100%" width="100%" alt>
      </div>
    
    <form class="form" method="post">
      <h1 align="center">Réinitialiser les scores</h1>
      <br>
      <div class="barre-de-séparation"></div>
        <br><br>
        <div class="corps">  
          <div class="groupe">Numéro: <input  type="text" class="login-input" name="name">
            <br><br>
          </div>
          <div class="groupe">Code: <input type="text"  class="login-input" name="code">
            <br><br>
          </div><br><br>
          <div class="piedrei">
            <a name="back" value="Retour" class="back-button" href="classement.php">Retour</a>
            <input type="submit"  class="login-button" name="submit" value="Réinitialiser les scores">       
          </div>
        
        </div>
      <?php
        // define variables and set to empty values
        $name = $code = "";

        if (isset($_POST['submit'])) {
          function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }
          $name = test_input($_POST["name"]);
          $code = test_input($_POST["code"]);

          if($code == 1234 AND $name == 1234 )
          {
            $resetscore1 = "UPDATE score SET score = 0";
            $resetscore = mysqli_query($con, $resetscore1) or (mysqli_error()) ;
            echo "<script>alert(\"Les scores ont été réinitialisés.\");</script>";
          }
          else {
            echo "<script>alert(\"Les scores n'ont pas pu être réinitialisé.\");</script>";
            
          }
        }


      ?>
    </form>
    </div>
  </body>
</html>