<?php

// On crée une fonction pour récupérer les jeux, cette fonction est appelée par le contrôleur

function getClients()
{
    $jeux = json_decode(file_get_contents('data/clients.json'), true);
    return $jeux;
}
function getClientsAlphabetiques()
{
    $clients = getClients();
    usort($clients, function($a, $b) {
        return strcmp($a['client_nom'], $b['client_nom']);
    });
    return $clients;
}

function getQuatreClients()
{
    $clients = getClients();
    return array_slice($clients, 0, 4);
}

// cette fonction est à mettre après la fonction quatre dans le modele clients
function verif_utilisateur($client_mail)
{
    //on recupere les client avec la fonction getClients.
    $clients = getClients();

    // Parcourir les clients pour trouver une correspondance
    foreach ($clients as $client) {
        if ($client['client_email'] === $client_mail) {
            return $client; // Retourner les informations du client si trouvé
        }
    }

    return null; // Retourner null si aucun client n'est trouvé
}