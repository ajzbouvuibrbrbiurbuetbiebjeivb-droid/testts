<?php
// ETAPE 1:
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$items = explode('/', $path);

// ETAPE 2:
if (empty($items[1])) {
    $controller = 'accueil';
} else {
    $controller = $items[1];
}

// ETAPE 3:
if (empty($items[2])) {
    $action = 'index';
} else {
    $action = $items[2];
}

// ETAPE 4:
$controllerFile = 'controller/' . $controller . '_controller.php';

if (!file_exists($controllerFile)) {
    http_response_code(404);
    die('Erreur 404 : Contrôleur "' . $controller . '" introuvable.');
}

require_once($controllerFile);

// Le nom de la fonction = controller_action (ex: jeux_index, demo_coucou)
$functionName = $controller . '_' . $action;

if (!function_exists($functionName)) {
    http_response_code(500);
    die('Erreur 500 : Action "' . $functionName . '" introuvable.');
}

$functionName();
