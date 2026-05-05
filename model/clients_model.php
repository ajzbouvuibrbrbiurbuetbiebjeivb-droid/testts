<?php
require_once('conf/conf.inc.php');

function getClients()
{
    $pdo = new PDO('mysql:host='.HOST.';dbname='.DBNAME, USER, PASSWORD);
    $stmt = $pdo->prepare("SELECT * FROM clients");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getClientsAlphabetiques()
{
    $pdo = new PDO('mysql:host='.HOST.';dbname='.DBNAME, USER, PASSWORD);
    $stmt = $pdo->prepare("SELECT * FROM clients ORDER BY client_nom ASC");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getQuatreClients()
{
    $pdo = new PDO('mysql:host='.HOST.';dbname='.DBNAME, USER, PASSWORD);
    $stmt = $pdo->prepare("SELECT * FROM clients LIMIT 4");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function verif_utilisateur($client_mail)
{
    $pdo = new PDO('mysql:host='.HOST.';dbname='.DBNAME, USER, PASSWORD);
    $stmt = $pdo->prepare("SELECT * FROM clients WHERE client_email = :email");
    $stmt->bindParam(':email', $client_mail);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
