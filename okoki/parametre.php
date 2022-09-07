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

<body onload="afficher_moncompte();" class="scrollbody">

    <script src="event.js"></script>

    <header>
        <div id="top" class="top">
            <a href="index.php" class="logo"><img src="https://i.goopics.net/kdv184.png" class="ecohome"></a>
            <div class="profil">
                <a href="profil.php"><?php echo ucwords($_SESSION['username']); ?></a>
                <a href="profil.php"><img src="https://i.goopics.net/p5sdhc.png" class="profil_picture"></a>
            </div>
        </div>
    
        <nav>
            <li id="underhead" class="underhead">
                <a href="index.php">Accueil</a>
                <a href="classement.php">Classement</a>
                <a href="glc.php">Gérer les capteurs</a>
                <a href="notification.php">Notifications</a>
                <a href="forum.php">Forum</a>
                <a href="parametre.php" style="color:#00FF00;">Paramètres</a>
            </li>
        </nav>

    </header>

    <section data-section="1">

        <div class="container-titre-param">

            <h1 class="titre_parametre"> Paramètres </h1>

            <div class="barre-de-séparation"></div>

            <br>

            <div class="btn_mon_compte_box">
                <button class="btn_mon_compte" onclick="afficher_moncompte();">Mon compte</button>
            </div>

             <br>

            <div class="btn_parametre_de_notifications_box">
                <button class="btn_parametre_de_notifications" onclick="afficher_paramnotif();">Paramètres de notifications</button>
            </div>

            <br>

            <div class="btn_mentions_legales_box">
                <button class="btn_mentions_legales" onclick="afficher_mentionslegales();">Mentions légales</button>
            </div>
            <div class="bgcolor2"></div>
        </div>


        <div class="container_2" id="MonCompte">

            <label class="titre_mon_compte"><b>Mon Compte</b></label>

            <button class="btn_modifier_mes_données" onclick="afficher_modifiermesdonnees()">
                <div class="text_modifier_mes_données">Modifier mes données</div>
            </button>

            <button class="btn_supprimer_mon_compte" onclick="afficher_supprimermoncompte();">
                <div class="text_supprimer_mon_compte">Supprimer mon compte</div>
            </button>

        </div>

        <div class="container_2_1" id="ModifierMesDonnees">

            <button class="btn_retour" onclick="afficher_moncompte();">Retour</button>


            <label class="titre_modifier_mes_données"><b>Modifier mes données</b></label><br><br><br>

            <div class="box_email">
                <label for="email" >Email : </label>
                <input class="email" type="email" name="email" id="email"><br><br>

                <label for="name">Nom : </label>
                <input class="nom" type="nom" name="nom" id="nom"><br><br>

                <label for="password">Mot de passe : </label>
                <input class="password" type="password" name="password" id="AKA">


                <input type="checkbox" onclick="Afficher2()"> <!--Afficher le mot de passe-->
                <script>
                function Afficher2()
                { 
                var input = document.getElementById("AKA"); 
                if (input.type === "password")
                { 
                input.type = "text"; 
                } 
                else
                { 
                input.type = "password"; 
                } 
                } 
                </script>
                <label class="txt_suppression">Afficher le mot de passe</label><br><br>

                <button type="submit">Valider</button>

            </div>
        </div>

        <div class="container_2_2" id="SupprimerMonCompte">

            <button class="btn_retour" onclick="afficher_moncompte();">Retour</button>
            
            <label class="titre_supprimer_mon_compte"><B>Supprimer mon compte</B></label><br><br><br>
            <div class="box_suppression_compte">
                <label class="txt_suppression">Bonjour <B><?php echo $_SESSION['username']; ?>,</B></label><br><br><br>
                <label class="txt_suppression">Nous sommes désolés d'apprendre que vous souhaitez supprimer votre compte.</label><br><br><br>
                <label class="txt_suppression"><b>Veuillez confirmer votre mot de passe avant de continuer :</b></label>
                <input type="password" class="mdp_suppression_compte" id="mdp">
                <input type="checkbox" onclick="Afficher()"> <!--Afficher le mot de passe-->
                <script>
                 function Afficher()
                 { 
                 var input = document.getElementById("mdp"); 
                 if (input.type === "password")
                 { 
                 input.type = "text"; 
                 } 
                 else
                 { 
                 input.type = "password"; 
                 } 
                 } 
                </script>
                <label class="txt_suppression">Afficher le mot de passe</label><br><br><br>
                <label class="txt_suppression">Lorsque vous cliquez sur le bouton ci-dessous, votre profil, nom, commentaires, appareils et toutes les autres données
                    seront définitivement supprimés et vous ne pourrez pas les récupérer.</label><br><br>
                <label class="txt_suppression"><b>Etes-vous sûr de votre choix ?</b></label><br><br>
                <div class="separation_suppression"></div><br>
                <form action="" method="POST">
                    <button type="submit" class="btn_suppression" name="btn_suppression">Oui, supprimer définitivement mon compte</button>
                
                <?php
                if(isset($_POST['btn_suppression'])){
                    $con;
                    
                    $id=$_SESSION['id'];
                    
                    $delete1 ="UPDATE users SET verif=1 WHERE name='" . $_SESSION['username'] . "'";

                    // on exécute la requête (mysql_query) et on affiche un message au cas où la requête ne se passait pas bien (or die)
                    $deleteacc= mysqli_query($con,$delete1) ;

                    if ($deleteacc) {

                        echo "<script>alert(\"Votre compte a bien été supprimé suprimé.\");</script>";
                        header("Location:logout.php");
                        ob_end_flush();
                    } else {
                        echo "<script>alert(\"Le compte n'a pas pu être suprimé.\");</script>";
                    }
                }  else {
                    ?>
                    <?php
                    
                    }
                    ?>
                
                </form>

            </div>

        </div>

        <div class="container_3" id="ParamNotif">
            
            <label class="titre_parametres_de_notifications"><B>Paramètres de notifications</B></label><br><br><br><br>
            <div class="activation_1">
                <label class="txt_1">Activer les notifications du capteur "Capteur 1"</label>
                <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span>
                </label>
            </div><br>
            <div class="activation_1">
                <label class="txt_1">Activer les notifications du capteur "Capteur 2"</label>
                <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span>
                </label>
            </div><br>
             
        </div>

        <div class="container_4" id="MentionsLegales">
            
            <label class="titre_mentions_legales"><b>Mentions légales et politique de confidentialité</b></label><br><br>

            <div class="container_mentions_legales">
                <div><br>
                    La société Gaatis Environnment, soucieuse des droits des individus, notamment au regard des traitements automatisés et dans
                une volonté de transparence avec ses clients, a mis en place une politique reprenant l'ensemble de ces traitements, des finalités
                poursuivies par ces derniers ainsi que des moyens d'actions à la disposition des individus afin qu'ils puissent au mieux exercer,
                leurs droits.<br><br>
                Pour toute information complémentaire sur la protection des donnes personnelles, nous vous invitons à consulter le
                site : <a href="https://www.cnil.fr/" target="_blank" target="_blank" style="color:#747cdf;">https://www.cnil.fr/</a><br><br>

                La poursuite de la navigation sur ce site vaut acceptation sans réserve des dispositions et conditions d'utilisation qui suivent.
                La version actuellement en ligne de ces conditions d'utilisation est la seule opposable pendant toute la durée d'utilisation du site
                et jusqu'à ce qu'une nouvelle version la remplace.<br><br><br><br>
                </div>
                

                <div>
                    <b>Article 1 - Mentions légales</b><br><br>
                    
                    <i>1.1 Site (ci-après « le site »):</i><br><br>

                    EcoHome<br><br>
                    
                    <i>1.2 Éditeur (ci-après « l'éditeur ») :</i><br><br>

                    Gaatis Environnent OBNL au capital de O €
                    dont le siège social est situé : <br>
                    28 Rue Notre Dame des Champs,75006 Paris.<br>
                    Représentée par Alim Ardal, en sa qualité de Directeur Général
                    immatriculée au RCS de PARIS 123456789.<br>
                    N° de téléphone : 0788204778<br>
                    Adresse mail : gaatisenv@gmail.com<br><br>
                    
                    <i>1.3 Hébergeur (ci-après « ISEP ») :</i><br><br>
                    
                    EcoHome est hébergé par ISEP , dont le siège social est situé 28 Rue Notre Dame des Champs, 75006 Paris.<br><br><br><br>
                </div>
                <div>
                    <b>Article 2 - Accès au site</b><br><br>
                    
                    L'accès au site et son utilisation sont réservés à un usage strictement personnel. Vous vous engagez à ne pas utiliser ce site et les
                    informations ou données qui y figurent à des fins commerciales, politiques, publicitaires et pour toute forme de sollicitation
                    commerciale et notamment l'envoi de courriers électroniques non sollicités.<br><br><br><br>
                </div>
                
                
                <div>
                    <b>Article 3 - Contenu du site</b><br><br>
                
                    Toutes les marques, photographies, textes, commentaires, illustrations, images animées ou non, séquences vidéo, sons, ainsi que
                    toutes les applications informatiques qui pourraient être utilisées pour faire fonctionner ce site et plus généralement tous les
                    Éléments reproduits ou utilisés sur le site sont protégés par les lois en vigueur au titre de la propriété intellectuelle.
                    Ils sont la propriété pleine et entière de l'éditeur ou de ses partenaires. Toute reproduction, représentation, utilisation ou
                    adaptation, sous quelque forme que ce soit, de tout ou partie de ces éléments, y compris les applications informatiques, sans
                    l'accord préalable et écrit de l'éditeur, sont strictement interdites. Le fait pour l'éditeur de ne pas engager de procédure dès la
                    prise de connaissance de ces utilisations non autorisées ne vaut pas acceptation desdites utilisations et renonciation aux
                    poursuites.<br><br><br> <br>
                </div>

                
                <div>
                    <b>Article 4 - Gestion du site</b><br><br>
                
                    Pour la bonne gestion du site, l'éditeur pourra à tout moment :
                    - suspendre, interrompre ou limiter l'accès à tout ou partie du site, réserver l'accès au site, ou à certaines parties du site, à une
                    catégorie déterminée d'internautes;
                    - supprimer toute information pouvant en perturber le fonctionnement ou entrant en contravention avec les lois nationales ou
                    internationales;
                    - suspendre le site afin de procéder à des mises à jour.<br><br><br><br>
                </div>

                <div>
                    <b>Article 5 - Responsabilités</b><br><br>
                
                    La responsabilité de l'éditeur ne peut être engagée en cas de défaillance, panne, difficulté ou interruption de fonctionnement,
                    empêchant l'accès au site ou à une de ses fonctionnalités.<br>
                    Le matériel de connexion au site que vous utilisez est sous votre entière responsabilité. Vous devez prendre toutes les mesures
                    appropriées pour protéger votre matériel et vos propres données notamment d'attaques virales par Internet. Vous êtes par
                    ailleurs seul responsable des sites et données que vous consultez.<br><br>
                    
                    L'éditeur ne pourra être tenu responsable en cas de poursuites judiciaires à votre encontre :<br>
                    - du fait de l'usage du site ou de tout service accessible via Internet ;<br>
                    - du fait du non-respect par vous des présentes conditions générales.<br><br>
                    
                    L'éditeur n'est pas responsable des dommages causés à vous-même, à des tiers et/ou à votre équipement du fait de votre
                    connexion ou de votre utilisation du site et vous renoncez à toute action contre lui de ce fait.<br>
                    Si l'éditeur venait à faire l'objet d'une procédure amiable ou judiciaire en raison de votre utilisation du site, il pourra se retourner
                    contre vous pour obtenir l'indemnisation de tous les préjudices, sommes, condamnations et frais qui pourraient découler de cette
                    procédure.<br><br><br><br>
                </div>
                
                
                <div>
                    <b>Article 6 - Liens hypertextes</b><br><br>
                
                    La mise en place par les utilisateurs de tous liens hypertextes vers tout ou partie du site est autoriste par l'éditeur. Tout lien
                    devra être retiré sur simple demande de l'éditeur.<br>
                    Toute information accessible via un lien vers d'autres sites n'est pas publiée par l'éditeur. L'éditeur ne dispose d'aucun droit sur
                    le contenu présent dans ledit lien.<br><br><br><br>
                </div>

                <div>
                    <b>Article 7 - Collecte et protection des données</b><br><br>
                
                    Vos données sont collectées par la société Gaatis Environnment.<br>
                    Une donnée à caractère personnel désigne toute information concernant une personne physique identifiée ou identifiable
                    (personne concernée) ; est réputée identifiable une personne qui peut être identifiée, directement ou indirectement, notamment
                    par référence à un nom, un numéro d'identification ou à un ou plusieurs éléments spécifiques, propres à son identité physique,
                    physiologique, génétique, psychique, économique, culturelle ou sociale.<br>
                    Les informations personnelles pouvant être recueillies sur le site sont principalement utilisées par l'éditeur pour la gestion des
                    relations avec vous, et le cas échéant pour le traitement de vos commandes.<br><br>
                    
                    Les données personnelles collectées sont les suivantes:<br>
                    - nom et prénom<br>
                    - adresse<br>
                    - adresse mail<br>
                    - Données sur l'environnement<br><br><br><br>
                </div>
                
                
                <div>
                    <b>Article 8 - Droit d'accès, de rectification et de déréférencement de vos données</b><br><br>
                
                    application de la réglementation applicable aux données à caractère personnel, les utilisateurs disposent des droits suivants :
                    • le droit d'accès : ils peuvent exercer leur droit d'accès, pour connaître les données personnelles les concernant, en écrivant
                    à l'adresse électronique ci-dessous mentionnée, Dans ce cas, avant la mise en œuvre de ce droit, la Plateforme peut
                    demander une preuve de l'identité de l'utilisateur afin d'en vérifier l'exactitude ;<br>
                    • le droit de rectification : si les données à caractère personnel détenues par la Plateforme sont inexactes, ils peuvent
                    demander la mise à jour des informations ;<br>
                    • le droit de suppression des données : les utilisateurs peuvent demander la suppression de leurs données à caractère
                    personnel, conformément aux lois applicables en matière de protection des données ;<br>
                    • le droit à la limitation du traitement : les utilisateurs peuvent de demander à la Plateforme de limiter le traitement des
                    données personnelles conformément aux hypothèses prévues par le RGPD;<br>
                    • le droit de s'opposer au traitement des données : les utilisateurs peuvent s'opposer à ce que leurs données soient traitées
                    conformément aux hypothèses prévues par le RGPD;<br>
                    • le droit à la portabilité : ils peuvent réclamer que la Plateforme leur remette les données personnelles qu'ils ont
                    fournies pour les transmettre à une nouvelle Plateforme.<br><br>
                    
                    Vous pouvez exercer ce droit en nous contactant, à l'adresse suivante :<br>
                    28 Rue Notre Dame des Champs, 75006 Paris.<br><br>
                    Ou par email, à l'adresse:<br>
                    gaatisenv@gmail.com<br><br>
                    
                    Toute demande doit être accompagnée de la photocopie d'un titre d'identité en cours de validité signé et faire mention de
                    l'adresse à laquelle l'éditeur pourra contacter le demandeur. La réponse sera adressée dans le mois suivant la réception de la
                    demande. Ce délai d'un mois peut être prolongé de deux mois si la complexité de la demande et/ou le nombre de demandes
                    l'exigent.<br><br>
                    
                    Toute demande doit être accompagnée de la photocopie d'un titre d'identité en cours de validité signé et faire mention de
                    l'adresse à laquelle l'éditeur pourra contacter le demandeur. La réponse sera adressée dans le mois suivant la réception de la
                    demande. Ce délai d'un mois peut être prolongé de deux mois si la complexité de la demande et/ou le nombre de demandes
                    l'exigent.<br>
                    De plus, et depuis la loi n°2016-1321 du 7 octobre 2016, les personnes qui le souhaitent, ont la possibilité d'organiser le sort de
                    leurs données après leur décès. Pour plus d'information sur le sujet, vous pouvez consulter le site Internet de la
                    CNIL : <a href="https://www.cnil.fr/" target="_blank" style="color:#747cdf;">https://www.cnil.fr/</a>.<br><br>
                    
                    Les utilisateurs peuvent aussi introduire une réclamation auprès de la CNIL sur le site de la CNIL <a href="https://www.cnil.fr/" target="_blank" style="color:#747cdf;">https://www.cnil.fr/</a>.<br><br>
                    
                    Nous vous recommandons de nous contacter dans un premier temps avant de déposer une réclamation auprès de la CNIL, car
                    nous sommes à votre entière disposition pour régler votre problème.<br><br><br><br>
                </div>
                
                
                <div>
                    <b>Article 9 - Utilisation des données</b><br><br>
                
                    Les données personnelles collectées auprès des utilisateurs ont pour objectif la mise à disposition des services de la Plateforme,
                    leur amélioration et le maintien d'un environnement sécurisé. La base légale des traitements est l'exécution du contrat entre
                    l'utilisateur et la Plateforme. Plus précisément, les utilisations sont les suivantes:<br><br>
                    
                    - accès et utilisation de la Plateforme par l'utilisateur ;<br>
                    - gestion du fonctionnement et optimisation de la Plateforme ;<br>
                    - mise en œuvre d'une assistance utilisateurs ;<br>
                    - vérification, identification et authentification des données transmises par l'utilisateur :<br>
                    - personnalisation des services en affichant des publicités en fonction de l'historique de navigation de l'utilisateur, selon ses
                    préférences;<br>
                    - prévention et détection des fraudes, malwares (malicious softwares ou logiciels malveillants) et gestion des incidents de
                    sécurité;<br>
                    - gestion des éventuels litiges avec les utilisateurs ;<br>
                    - envoi d'informations commerciales et publicitaires, en fonction des préférences de l'utilisateur.<br><br><br><br>
                </div>

                <div>
                    <b>Article 10 - Politique de conservation des données</b><br><br>
                
                    La Plateforme conserve vos données pour la durée nécessaire pour vous fournir ses services ou son assistance.<br>
                    Dans la mesure raisonnablement nécessaire ou requise pour satisfaire aux obligations légales ou réglementaires, régler des
                    litiges, empêcher les fraudes et abus ou appliquer nos modalités et conditions, nous pouvons également conserver certaines de
                    vos informations si nécessaire, même après que vous ayez fermé votre compte ou que nous n'ayons plus besoin pour vous
                    fournir nos services.<br><br><br><br>
                </div>
                
                
                <div>
                    <b>Article 11-Partage des données personnelles avec des tiers</b><br><br>
                
                    Les données personnelles peuvent être partagées avec des sociétés tierces dans l’Union européenne, dans les cas suivants :<br><br>
                    
                    - lorsque l'utilisateur publie, dans les zones de commentaires libres de la Plateforme, des informations accessibles au public ;<br>
                    - quand l'utilisateur autorise le site web d'un tiers à accéder à ses données ;<br>
                    - quand la Plateforme recourt aux services de prestataires pour fournir l'assistance utilisateurs, la publicité et les services de
                    paiement. Ces prestataires disposent d'un accès limité aux données de l'utilisateur, dans le cadre de l'exécution de ces
                    prestations, et ont l'obligation contractuelle de les utiliser en conformité avec les dispositions de la réglementation applicable en
                    matière protection des données à caractère personnel ;<br>
                    - si la loi l'exige, la Plateforme peut effectuer la transmission de données pour donner suite aux réclamations présentées contre
                    la Plateforme et se conformer aux procédures administratives et judiciaires.<br><br><br><br>
                </div>
                
                
                <div>
                    <b>Article 12 - Offres commerciales</b><br><br>
                
                    Vous êtes susceptible de recevoir des offres commerciales de l'éditeur, Si vous ne le souhaitez pas, veuillez clíquer sur le lien
                    suivant:gaatisenv@gmail.com<br>
                    Vos données sont susceptibles d'être utilisées par les partenaires de l'éditeur à des fins de prospection commerciale, sí vous ne le
                    souhaitez pas, veuillez cliquer sur le lien suivant: gaatisenv@gmail.com<br>
                    Si, lors de la consultation du site, vous accédez à des données à caractère personnel, vous devez vous abstenir de toute collecte,
                    de toute utilisation non autorisée et de tout acte pouvant constituer une atteinte à la vie privée ou à la réputation des personnes.
                    L'éditeur décline toute responsabilité à cet égard.<br>
                    Les données sont conservées et utilisées pour une durée conforme à la législation en vigueur.<br><br><br><br>
                </div>

                <div>
                    <b>Article 13 - Cookies</b><br><br>
                
                    Qu'est-ce qu'un « cookie » ?<br>
                    Un « Cookie » ou traceur est un fichier électronique déposé sur un terminal (ordinateur, tablette, smartphone,...) et lu par
                    exemple lors de la consultation d'un site internet, de la lecture d'un courrier électronique, de l'installation ou de l'utilisation d'un
                    logiciel ou d'une application mobile et ce, quel que soit le type de terminal utilisé (source: <a href="https://www.cnil.fr/" target="_blank" style="color:#747cdf;">https://www.cnil.fr/fr/cookies-traceurs-que-dit-la-loi</a>).<br><br>
                    
                    Le site peut collecter automatiquement des informations standards. Toutes les informations collectées indirectement ne seront utilisées que pour
                    suivre le volume, le type et la configuration du trafic utilisant ce site, pour en développer la conception et l'agencement et à d'autres fins
                    administratives et de planification et plus généralement pour améliorer le service que nous vous offrons.<br><br>
                    
                    Le cas échéant, des « cookies » émanant de l'éditeur du site et/ou des sociétés tiers pourront être déposés sur votre terminal,
                    avec votre accord. Dans ce cas, lors de la première navigation sur ce site, une bannière explicative sur l'utilisation des
                    « cookies » apparaîtra. Avant de poursuivre la navigation, le client et/ou le prospect devra accepter ou refuser l'utilisation
                    desdits « cookies ». Le consentement donné sera valable pour une période de treize (13) mois. L'utilisateur a la possibilité de
                    désactiver les cookies à tout moment.<br><br>
                    
                    Les cookies suivants sont présents sur ce site :<br>
                    Cookies Google :<br>
                    - Google analytics: permet de mesurer l'audience du site ;<br>
                    - Google tag manager : facilite l'implémentation des tags sur les pages et permet de gérer les balises Google ;<br>
                    - Google Adsense : régie publicitaire de Google utilisant les sites web ou les vidéos YouTube comme support pour ses annonces;<br>
                    - Google Dynamic Remarketing: permet de vous proposer de la publicité dynamique en fonction des précédentes recherches<br>
                    - Google Adwords Conversion : outil de suivi des campagnes publicitaires adwords;<br>
                    - DoubleClick : cookies publicitaires de Google pour diffuser des bannières.<br><br>
                    
                    La durée de vie de ces cookies est de treize mois.<br><br><br><br>
                </div>
                
                
                <div>
                    <b>Article 14 - Photographies et représentation des produits</b><br><br>
                
                    Les photographies de produits, accompagnant leur description, ne sont pas contractuelles et n'engagent pas l'éditeur.<br><br><br><br>
                </div>

                <div>
                    <b>Article 15 - Loi applicable</b><br><br>
                
                    Les présentes conditions d'utilisation du site sont régies par la loi française et soumises à la compétence des tribunaux du siège
                    social de l'éditeur, sous réserve d'une attribution de compétence spécifique découlant d'un texte de loi ou réglementaire
                    particulier.<br><br><br><br>
                </div>
                
                
                <div>
                    <b>Article 16 - Contactez-nous</b><br><br>
                
                    Pour toute question, information sur les produits présentés sur le site, ou concernant le site lui-même, vous pouvez laisser un
                    message à l'adresse suivante : <u>gaatisenv@gmail.com</u>
                </div>
                
            </div>
        </div>


    </section>

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