<?php
require_once('model/messagerie_model.php');

function messagerie_index() {
    if (session_status() == PHP_SESSION_NONE) { session_start(); }

    if (!isset($_SESSION['client_email'])) {
        header('Location: /connexion');
        exit();
    }

    $email = $_SESSION['client_email'];
    $messagesR = getMessagesR($email);
    $messagesE = getMessagesE($email);

    require('view/autres_pages/header.php');
    require('view/autres_pages/menu.php');
    require('view/messagerie/messages.php');
    require('view/autres_pages/footer.php');
}

function messagerie_nouveau_message() {
    if (session_status() == PHP_SESSION_NONE) { session_start(); }

    if (!isset($_SESSION['client_email'])) {
        header('Location: /connexion');
        exit();
    }

    require_once('model/clients_model.php');
    $clients = getClients();

    require('view/autres_pages/header.php');
    require('view/autres_pages/menu.php');
    require('view/messagerie/nouveau_message.php');
    require('view/autres_pages/footer.php');
}

function messagerie_envoyer_message() {
    if (session_status() == PHP_SESSION_NONE) { session_start(); }

    if (!isset($_SESSION['client_email'])) {
        header('Location: /connexion');
        exit();
    }

    if (!empty($_POST['destinataire']) && !empty($_POST['sujet']) && !empty($_POST['message'])) {
        $expediteur   = $_SESSION['client_email'];
        $destinataire = htmlspecialchars($_POST['destinataire']);
        $sujet        = htmlspecialchars($_POST['sujet']);
        $message      = htmlspecialchars($_POST['message']);

        envoyerMessage($expediteur, $destinataire, $sujet, $message);
        $_SESSION['message_flash'] = 'Message envoyé avec succès !';
    } else {
        $_SESSION['message_erreur'] = 'Veuillez remplir tous les champs.';
    }

    header('Location: /messagerie');
    exit();
}

function messagerie_afficher_message() {
    if (session_status() == PHP_SESSION_NONE) { session_start(); }

    if (!isset($_SESSION['client_email'])) {
        header('Location: /connexion');
        exit();
    }

    $id = $_GET['id'] ?? '';
    if (empty($id)) {
        header('Location: /messagerie');
        exit();
    }

    $message = getMessage($id);

    if (!$message || ($message['destinataire'] != $_SESSION['client_email'] && $message['expediteur'] != $_SESSION['client_email'])) {
        header('Location: /messagerie');
        exit();
    }

    if ($message['destinataire'] == $_SESSION['client_email'] && $message['statut'] == 'non lu') {
        marquerLu($id);
        $message['statut'] = 'lu';
    }

    require('view/autres_pages/header.php');
    require('view/autres_pages/menu.php');
    require('view/messagerie/message_affiche.php');
    require('view/autres_pages/footer.php');
}

function messagerie_supprimer_message() {
    if (session_status() == PHP_SESSION_NONE) { session_start(); }

    if (!isset($_SESSION['client_email'])) {
        header('Location: /connexion');
        exit();
    }

    $id = $_GET['id'] ?? '';
    if (!empty($id)) {
        $message = getMessage($id);
        if ($message && ($message['destinataire'] == $_SESSION['client_email'] || $message['expediteur'] == $_SESSION['client_email'])) {
            supprimerMessage($id);
            $_SESSION['message_flash'] = 'Message supprimé avec succès !';
        }
    }

    header('Location: /messagerie');
    exit();
}
