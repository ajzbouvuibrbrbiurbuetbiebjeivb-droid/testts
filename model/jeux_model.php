<?php

// On crée une fonction pour récupérer les jeux, cette fonction est appelée par le contrôleur
require_once('conf/conf.inc.php');
function getJeux()
{
    $jeux = json_decode(file_get_contents('data/jeux.json'), true);
    return $jeux;
}
function getJeuxAlphabetiques()
{
    $jeux = getJeux();
    usort($jeux, function($a, $b) {
        return strcmp($a['jeu_nom'], $b['jeu_nom']);
    });
    return $jeux;
}

function getTroisJeux()
{
    $jeux = getJeux();
    return array_slice($jeux, 0, 3);
}