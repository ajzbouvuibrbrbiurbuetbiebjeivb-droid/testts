<?php
require('model/jeux_model.php');

function jeux_index() {
    $jeux = getJeux();
    $titre = "liste des jeux";
    require('view/autres_pages/header.php');
    require('view/autres_pages/menu.php');
    require('view/jeux_view.php');
    require('view/autres_pages/footer.php');
}

function jeux_alpha() {
    $jeux = getJeuxAlphabetiques();
    $titre = "liste des jeux par ordre alphabétique";
    require('view/autres_pages/header.php');
    require('view/autres_pages/menu.php');
    require('view/jeux_view.php');
    require('view/autres_pages/footer.php');
}

function jeux_trois() {
    $jeux = getTroisJeux();
    $titre = "liste de trois jeux";
    require('view/autres_pages/header.php');
    require('view/autres_pages/menu.php');
    require('view/jeux_view.php');
    require('view/autres_pages/footer.php');
}

function jeux_ajouter() {
    require('view/autres_pages/header.php');
    require('view/autres_pages/menu.php');
    require('view/ajout_jeux_view.php');
    require('view/autres_pages/footer.php');
}

function jeux_ajout_jeu() {
    require('view/autres_pages/header.php');
    require('view/autres_pages/menu.php');
    require('view/ajout_jeux_view.php');
    require('view/autres_pages/footer.php');
}

function jeux_valider_ajout() {
    $nom     = $_POST['jeu_nom'];
    $editeur = $_POST['jeu_editeur'];
    $duree   = $_POST['jeu_duree_partie'];
    $mini    = $_POST['jeu_nb_joueurs_mini'];
    $maxi    = $_POST['jeu_nb_joueurs_maxi'];
    $photo1  = $_POST['jeu_photo1'];
    $photo2  = $_POST['jeu_photo2'];
    $photo3  = $_POST['jeu_photo3'];
    $prix    = $_POST['jeu_prix_unit'];
    $qte     = $_POST['jeu_qte_stock'];

    $resultat = enregistrement_jeu($nom, $editeur, $duree, $mini, $maxi, $photo1, $photo2, $photo3, $prix, $qte);

    if ($resultat) {
        $dernier_jeu = getDernierJeu();
        require('view/autres_pages/header.php');
        require('view/autres_pages/menu.php');
        require('view/valide_jeu_view.php');
        require('view/autres_pages/footer.php');
    } else {
        echo "Erreur : le jeu n'a pas pu être enregistré.";
    }
}

function jeux_valide_jeu() {
    jeux_valider_ajout();
}
