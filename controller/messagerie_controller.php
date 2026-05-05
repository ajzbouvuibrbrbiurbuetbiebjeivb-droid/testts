<?php
// controller/messagerie_controller.php
require_once('model/messagerie_model.php');

function messagerie_index() {
    if (session_status() == PHP_SESSION_NONE) { session_start(); }
    
    if (isset($_SESSION['client_email'])) {
        $email = $_SESSION['client_email'];
    } else {
        header('Location: /connexion');
        exit();
    }

    $messagesE = getMessages($email, 'envoyes');
    $messagesR = getMessages($email, 'recus');

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
    $clients = getClients(); // Récupère les destinataires

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

    // Sécurisation du traitement des données (champs obligatoires)
    if (!empty($_POST['destinataire']) && !empty($_POST['sujet']) && !empty($_POST['message'])) {
        $expediteur = $_SESSION['client_email'];
        $destinataire = htmlspecialchars($_POST['destinataire']);
        $sujet = htmlspecialchars($_POST['sujet']);
        $message = htmlspecialchars($_POST['message']);

        envoyerMessage($expediteur, $destinataire, $sujet, $message);
        $_SESSION['message_flash'] = "Message envoyé avec succès !";
    } else {
        $_SESSION['message_erreur'] = "Veuillez remplir tous les champs.";
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
    if (!empty($id)) {
        $message = getMessage($id);
        
        // Sécurité : l'utilisateur ne peut voir le message que s'il en est l'expéditeur ou le destinataire
        if ($message && ($message['destinataire'] == $_SESSION['client_email'] || $message['expediteur'] == $_SESSION['client_email'])) {
            
            // BONUS : Marquer comme lu si le message est destiné à la personne connectée
            if ($message['destinataire'] == $_SESSION['client_email'] && $message['statut'] == 'non lu') {
                marquerLu($id);
                $message['statut'] = 'lu';
            }

            require('view/autres_pages/header.php');
            require('view/autres_pages/menu.php');
            require('view/messagerie/message_affiche.php');
            require('view/autres_pages/footer.php');
        } else {
            header('Location: /messagerie');
            exit();
        }
    } else {
        header('Location: /messagerie');
        exit();
    }
}

function messagerie_supprimer_message() {
    if (session_status() == PHP_SESSION_NONE) { session_start(); }
    
    $id = $_GET['id'] ?? '';
    if (!empty($id)) {
        $message = getMessage($id);
        
        // Sécurité : vérifier l'autorisation de supprimer
        if ($message && ($message['destinataire'] == $_SESSION['client_email'] || $message['expediteur'] == $_SESSION['client_email'])) {
            supprimerMessage($id);
            $_SESSION['message_flash'] = "Message supprimé avec succès !";
        }
    }
    header('Location: /messagerie');
    exit();
}
?>