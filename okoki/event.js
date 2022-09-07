/*
function sectionsetting() {
    var paramètres_connect = document.getElementById("settingssection");
    if (paramètres_connect.style.display == "none")
        paramètres_connect.style.display = "block";
    else
        paramètres_connect.style.display = "block"
    container_connect.style.display = "none"


};

function loginsetting() {
    var container_connect = document.getElementById("connectsection");
    if (container_connect.style.display == "none")
        container_connect.style.display = "block";
    else
        container_connect.style.display = "block"
    paramètres_connect.style.display = "none"



};
*/

/*
function toggleHTML(idHTML) {
    let id = document.getElementById(idHTML);
    id.classList.toggle("d-none");
}

function login() {

}

function logout() {

}
*/
function wronglogin() {
    window.alert(" Identifiant ou mot de passe incorrecte. Veuillez réessayer. ");
}

let sections = document.getElementsByTagName('section');
// tracks index of current section
let currentSectionIndex = 0;

function change(z) {
    sections[currentSectionIndex].className = '';
    currentSectionIndex = z;
    sections[currentSectionIndex].className = 'active';
}

function accueilzz() {
    document.getElementById("container").style.display = "block";
    document.getElementById("containeracc").style.display = "none";
}


//Paramètre js//

function afficher_moncompte() {
    document.getElementById("MonCompte").style.display = "block";
    document.getElementById("ParamNotif").style.display = "none";
    document.getElementById("MentionsLegales").style.display = "none";
    document.getElementById("ModifierMesDonnees").style.display = "none";
    document.getElementById("SupprimerMonCompte").style.display = "none";
}

function afficher_paramnotif() {
    document.getElementById("MonCompte").style.display = "none";
    document.getElementById("ParamNotif").style.display = "block";
    document.getElementById("MentionsLegales").style.display = "none";
    document.getElementById("ModifierMesDonnees").style.display = "none";
    document.getElementById("SupprimerMonCompte").style.display = "none";
}

function afficher_mentionslegales() {
    document.getElementById("MonCompte").style.display = "none";
    document.getElementById("ParamNotif").style.display = "none";
    document.getElementById("MentionsLegales").style.display = "block";
    document.getElementById("ModifierMesDonnees").style.display = "none";
    document.getElementById("SupprimerMonCompte").style.display = "none";
}

function afficher_modifiermesdonnees() {
    document.getElementById("MonCompte").style.display = "none";
    document.getElementById("ParamNotif").style.display = "none";
    document.getElementById("MentionsLegales").style.display = "none";
    document.getElementById("ModifierMesDonnees").style.display = "block";
    document.getElementById("SupprimerMonCompte").style.display = "none";
}

function afficher_supprimermoncompte() {
    document.getElementById("MonCompte").style.display = "none";
    document.getElementById("ParamNotif").style.display = "none";
    document.getElementById("MentionsLegales").style.display = "none";
    document.getElementById("ModifierMesDonnees").style.display = "none";
    document.getElementById("SupprimerMonCompte").style.display = "block";
}



function ajouter_capteur() {


    document.getElementById("container_ajouter_capteur").style.display = "block"
    document.getElementById("container_ajouter_capteur").style.display = "flex"
    document.getElementById("container_supprimer_capteur").style.display = "none"
    document.getElementById("gros_glc").style.display = "flex";

}

function retour_gérer_capteurs() {
    document.getElementById("modifier_capteur").style.display = "block"
    document.getElementById("div_btn_retour_glc").style.display = "none"
    document.getElementById("container_ajouter_capteur").style.display = "none"
    document.getElementById("container_supprimer_capteur").style.display = "none"

}

function supprimer_capteur() {
    document.getElementById("container_supprimer_capteur").style.display = "flex"
    document.getElementById("container_ajouter_capteur").style.display = "none"

    document.getElementById("gros_glc").style.display = "flex";

}


function afficher_classement_hebdomadaire() {
    document.getElementById("pagecl1").style.display = "block";
    document.getElementById("pagecl2").style.display = "none";

}
function afficher_classement_mensuel() {
    document.getElementById("pagecl1").style.display = "none";
    document.getElementById("pagecl2").style.display = "block";

}

function afficher_capteur() {
    document.getElementById("capteurs").style.display = "block";
    document.getElementById("ajout").style.display = "none";
    document.getElementById("sup").style.display = "none";
}
function ajouter_cap() { 
    document.getElementById("capteurs").style.display = "none";
    document.getElementById("ajout").style.display = "block";
    document.getElementById("sup").style.display = "none";
}
function supprimer_cap() {
    document.getElementById("capteurs").style.display = "none";
    document.getElementById("ajout").style.display = "none";
    document.getElementById("sup").style.display = "block";
}



const all = document.querySelectorAll('.visible-pannel img');
console.log(all);

all.forEach(element => {
    element.addEventListener('click', function(){

        console.log(this.src)

        const height = this.parentNode.parentNode.childNodes[3].scrollHeight; //Prend tout ce qu'il y a dans la div parent/parent

        const currentChoice = this.parentNode.parentNode.childNodes[3];

        if(this.src.includes('8at6il')){  //la source contient 'croix' 8at6il->plus
            this.src='https://i.goopics.net/1cpqeq.png'
            //gsap.to(currentChoice, {duration: 0.2, height: height + 40, opacity: 1, padding: '20px 15px'})
        } else if (this.src.includes('1cpqeq')){ //la source contient 'minus' 1cpqeq->minus
            this.src='https://i.goopics.net/8at6il.png';
            //gsap.to(currentChoice, {duration: 0.2, height: 0, opacity: 0, padding: '0px 15px'})
        }
    })
})