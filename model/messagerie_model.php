<?php

function getMessagesR($email) {
    $pdo = new PDO('mysql:host='.HOST.';dbname='.DBNAME, USER, PASSWORD);
    $stmt = $pdo->prepare("SELECT * FROM message WHERE destinataire = :email ORDER BY date_envoi DESC");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getMessagesE($email) {
    $pdo = new PDO('mysql:host='.HOST.';dbname='.DBNAME, USER, PASSWORD);
    $stmt = $pdo->prepare("SELECT * FROM message WHERE expediteur = :email ORDER BY date_envoi DESC");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function envoyerMessage($expediteur, $destinataire, $sujet, $message) {
    $pdo = new PDO('mysql:host='.HOST.';dbname='.DBNAME, USER, PASSWORD);
    $stmt = $pdo->prepare("INSERT INTO message (expediteur, destinataire, sujet, message) VALUES (:expediteur, :destinataire, :sujet, :message)");
    $stmt->bindParam(':expediteur', $expediteur);
    $stmt->bindParam(':destinataire', $destinataire);
    $stmt->bindParam(':sujet', $sujet);
    $stmt->bindParam(':message', $message);
    return $stmt->execute();
}

function getMessage($id) {
    $pdo = new PDO('mysql:host='.HOST.';dbname='.DBNAME, USER, PASSWORD);
    $stmt = $pdo->prepare("SELECT * FROM message WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function supprimerMessage($id) {
    $pdo = new PDO('mysql:host='.HOST.';dbname='.DBNAME, USER, PASSWORD);
    $stmt = $pdo->prepare("DELETE FROM message WHERE id = :id");
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
}

function marquerLu($id) {
    $pdo = new PDO('mysql:host='.HOST.';dbname='.DBNAME, USER, PASSWORD);
    $stmt = $pdo->prepare("UPDATE message SET statut = 'lu' WHERE id = :id");
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
}
