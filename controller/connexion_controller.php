<?php
if (session_status() == PHP_SESSION_NONE) { session_start(); }
require('model/clients_model.php');

function connexion_index() {
    require('view/autres_pages/header.php');
    require('view/autres_pages/menu.php');
    require('view/connexion_view.php');
    require('view/autres_pages/footer.php');
}

function connexion_inscription() {
    require('view/autres_pages/header.php');
    require('view/autres_pages/menu.php');
    require('view/inscription_view.php');
    require('view/autres_pages/footer.php');
}

function connexion_verif_connexion() {
    if (isset($_POST['client_mail']) && isset($_POST['mot_de_passe'])) {
        $resultat = verif_utilisateur($_POST['client_mail']);
        if ($resultat !== null && $resultat['client_email'] == $_POST['client_mail'] && password_verify($_POST['mot_de_passe'], $resultat['client_mdp'])) {
            $_SESSION['client_nom'] = $resultat['client_nom'];
            $_SESSION['client_email'] = $resultat['client_email'];
            header('Location: /');
            exit();
        } else {
            echo 'Erreur : login ou mot de passe incorrect';
        }
    } else {
        echo 'Erreur : les champs ne sont pas remplis';
    }
}

function connexion_deconnexion() {
    session_destroy();
    header('Location: /');
    exit();
}
