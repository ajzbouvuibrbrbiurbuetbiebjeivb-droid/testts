<?php
require_once('model/clients_model.php');

function clients_index() {
    $clients = getClients();
    require('view/autres_pages/header.php');
    require('view/autres_pages/menu.php');
    require('view/clients_view.php');
    require('view/autres_pages/footer.php');
}

function clients_alpha() {
    $clients = getClientsAlphabetiques();
    require('view/autres_pages/header.php');
    require('view/autres_pages/menu.php');
    require('view/clients_view.php');
    require('view/autres_pages/footer.php');
}

function clients_quatre() {
    $clients = getQuatreClients();
    require('view/autres_pages/header.php');
    require('view/autres_pages/menu.php');
    require('view/clients_view.php');
    require('view/autres_pages/footer.php');
}
