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

function jeux_valider_ajout() {
    echo "Traitement de l'ajout en cours...";
}
