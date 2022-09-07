
<?php
session_start();
$con = mysqli_connect("localhost","root","","config2");
    // Check connection
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css" media="all" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <!-- lien de la blibliotèque d'icon fontawesome -->
    <title>Ecohome</title>


</head>

<body onload="afficher_capteur()" class="scrollbody">

    <script src="event.js"></script>

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
                <a href="classement.php">Classement</a>
                <a href="glc.php" style="color:#00FF00;">Gérer les capteurs</a>
                <a href="notification.php">Notifications</a>
                <a href="forum.php">Forum</a>
                <a href="parametre.php">Paramètres</a>
            </li>
        </nav>

    </header>
<section data-section="1">

<div class="bgcolor2"></div>


        <div class="container-titre-param">

            <h1 class="titre_parametre"> Capteurs </h1>

            <div class="barre-de-séparation"></div>

            <br>

            <div class="btn_mon_compte_box">
                <button class="btn_mon_compte" onclick="afficher_capteur();">Afficher les capteurs</button>
            </div>

             <br>

            <div class="btn_parametre_de_notifications_box">
                <button class="btn_parametre_de_notifications" onclick="ajouter_cap();">Ajouter un capteur</button>
            </div>

            <br>

            <div class="btn_mentions_legales_box">
                <button class="btn_mentions_legales" onclick="supprimer_cap();">Supprimer un capteur</button>
            </div>

        </div>
        



        <div class="container_cap1" id="capteurs">



            

            <label class="titre_mon_compte"><b>Mes capteurs :</b></label><br>
                <!-- AFFICHER LES CAPTEURS --------------->        
                           
                <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">     <!--bouton de scroll avec les adresses de l'utilisateur en fonction de son id -->
                    <label class="titre_mon_compte">rentrer l'adresse de votre propriété :</label>
                    <input list="browsers" name="fadresse" class="capteuradresse">
                    <datalist id="browsers">
                            <?php   $alltype = $con->query("SELECT adresse FROM adresses where id_users = 25 ORDER BY id DESC"); /*rmplacer 25 par le id user*/

                                while($type = mysqli_fetch_assoc($alltype)){
                                    ?>
                                    <option value="<?= $type['adresse'];?>">
                            <?php }?>
                    </datalist>
                    <input type="submit" value="Submit">
                </form>



                <?php 
                            if ($_SERVER["REQUEST_METHOD"] =="POST" and !empty($_REQUEST['fadresse'])){
                            $ad = $_POST['fadresse'];
                            $allrooms = $con->query("SELECT type FROM rooms WHERE id_adresse IN (SELECT id FROM adresses WHERE adresse LIKE '%".$ad."%')");
                            $allroomid = $con->query("SELECT id FROM rooms WHERE id_adresse LIKE (SELECT id FROM adresses WHERE adresse LIKE '%".$ad."%')");
                            if (! empty($allrooms)){
                                if ($allrooms->num_rows>0 and $allroomid ->num_rows>0){
                                while($rooms = mysqli_fetch_assoc($allrooms) and $roomid = mysqli_fetch_assoc($allroomid)){
                                ?>
                                <p>room : <?= $rooms['type'];?><br>numéros de pièce : <?= $roomid['id'];?></p>
                                <?php
                                    }
                                }
                            }
                            else{
                                echo "allrooms vide";
                            }}
                ?>
                <br><br>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                <label class="titre_mon_compte">entrez le numéros de la pièce </label><br><label class="titre_mon_compte">pour voir ses capteurs :</label> <input type="text" name="fpiece" class="capteuradresse">
                <input type="submit">
                </form>
<div class="blanc"><br><br>
<?php
$url = 'http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=113C';
$timeout = 10;

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);

if (preg_match('#^https://i/#', $url))
{
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
}

curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


$page_content = curl_exec($ch);

curl_close($ch);

$data_tab = str_split($page_content,33);



$trame = $data_tab[1];
// décodage avec des substring
$t = substr($trame,0,1);
$o = substr($trame,1,4);
$r = substr($trame,5,1);
$c = substr($trame,6,1);
$n = substr($trame,7,2);
$v = substr($trame,9,4);
$a = substr($trame,13,4);
$x = substr($trame,17,2);
$year = substr($trame,19,4);
$month = substr($trame,24,2);
$day = substr($trame,27,2);
$hour = substr($trame,30,2);
$min = substr($trame,33,2);
$sec = substr($trame,35,2);




    
// ...
// décodage avec sscanf
$taille=count($data_tab);
    $taillle=$taille-2;
    $tramex = $data_tab[$taillle];
    //echo "<br />Trame $taille: $data_tab[$taillle]";
    echo("La valeur actuelle de votre capteur est : ");
    list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) =
    sscanf($tramex,"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
    $val_final = 10 * log10(($v*(0.001))/1000);
    echo("<br />$val_final dBm <br />");

?>
</div>
        </div>
<!-- AJOUT D'UN CAPTEUR --------------->        
        <div class="container_cap2" id="ajout">

            <label class="titre_mon_compte"><b>ajouter un capteur :</b></label>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <label class="titre_mon_compte">type de capteur :</label>
  <input list="capteurstype" name="ftype">
  <datalist id="capteurstype">
    <option value="température">
    <option value="lumière">
    <option value="CO2">
    <option value="monoxyde de carbone">
  </datalist>
  <br>
    <label class="titre_mon_compte">nom du capteur : </label><input type="text" name="fnom">
    <br>
  <input class="submit" type="submit" value="Submit"><br>
</form><br><br>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" and !empty($_REQUEST['ftype'])){
    $type = $_POST['ftype'];
    $nom = $_POST['fnom'];
    $sql = "INSERT INTO capteurs (id, type, nom, id_rooms)
    VALUES (NULL,'$type', '$nom',1)";

    if ($con->query($sql) === TRUE) {
    ?><label class="titre_mon_compte"> nouveau capteur créé </label>
<?php } 
    else {
    echo "Error: " . $sql . "<br>" . $con->error;
    }}
    $con->close();
?>

        </div>
        <div class="container_cap3" id="sup">

            <label class="titre_mon_compte"><b>DOMAGE, JE SAIS PAS ENCORE FAIRE</b></label>

        </div>

    </section>


</body>

</html>
                  