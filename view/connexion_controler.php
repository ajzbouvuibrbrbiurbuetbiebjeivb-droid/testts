<?php

// Un contrôleur pour la connexion

// On appelle le modèle des clients
require('model/clients_model.php');

// La fonction index nous permet d'afficher la page de connexion, elle appellera la vue ???_view.php
function index()
{
    require('view/autres_pages/header.php');
    require('view/autres_pages/menu.php');
    require('view/connexion_view.php');
    require('view/autres_pages/footer.php');
}

// Fonction pour afficher la page d'inscription
function inscription()
{
    require('view/autres_pages/header.php');
    require('view/autres_pages/menu.php');
    require('view/inscription_view.php');
    require('view/autres_pages/footer.php');
}