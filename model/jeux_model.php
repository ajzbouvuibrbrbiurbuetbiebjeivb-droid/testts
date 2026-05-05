<?php

require_once('conf/conf.inc.php');

function getJeux()
{
    $pdo = new PDO('mysql:host='.HOST.';dbname='.DBNAME, USER, PASSWORD);
    $stmt = $pdo->prepare("SELECT * FROM jeux");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getJeuxAlphabetiques()
{
    $pdo = new PDO('mysql:host='.HOST.';dbname='.DBNAME, USER, PASSWORD);
    $stmt = $pdo->prepare("SELECT * FROM jeux ORDER BY jeu_nom ASC");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getTroisJeux()
{
    $pdo = new PDO('mysql:host='.HOST.';dbname='.DBNAME, USER, PASSWORD);
    $stmt = $pdo->prepare("SELECT * FROM jeux LIMIT 3");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function enregistrement_jeu($nom, $editeur, $duree, $mini, $maxi, $photo1, $photo2, $photo3, $prix, $qte)
{
    $pdo = new PDO('mysql:host='.HOST.';dbname='.DBNAME, USER, PASSWORD);
    $stmt = $pdo->prepare("INSERT INTO jeux (jeu_nom, jeu_editeur, jeu_duree_partie, jeu_nb_joueurs_mini, jeu_nb_joueurs_maxi, jeu_photo1, jeu_photo2, jeu_photo3, jeu_prix_unit, jeu_qte_stock) VALUES (:nom, :editeur, :duree, :mini, :maxi, :photo1, :photo2, :photo3, :prix, :qte)");
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':editeur', $editeur);
    $stmt->bindParam(':duree', $duree);
    $stmt->bindParam(':mini', $mini);
    $stmt->bindParam(':maxi', $maxi);
    $stmt->bindParam(':photo1', $photo1);
    $stmt->bindParam(':photo2', $photo2);
    $stmt->bindParam(':photo3', $photo3);
    $stmt->bindParam(':prix', $prix);
    $stmt->bindParam(':qte', $qte);
    return $stmt->execute();
}

function getDernierJeu()
{
    $pdo = new PDO('mysql:host='.HOST.';dbname='.DBNAME, USER, PASSWORD);
    $stmt = $pdo->prepare("SELECT * FROM jeux ORDER BY jeu_code DESC LIMIT 1");
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}