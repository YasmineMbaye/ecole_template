<?php
// Liste des pages disponibles
$routes = [
    'accueil' => 'layout.php',
    'ecole' => 'ecole.php',
    'modifier' => 'modifier.php',
    'recherche' => 'recherche.php',
    // Ajoutez d'autres pages ici
];

// Récupérer le paramètre de la page depuis l'URL
$page = isset($_GET['page']) ? $_GET['page'] : 'accueil';

// Vérifier si la page demandée existe
if (array_key_exists($page, $routes)) {
    
    include $routes[$page]; // Charger la page correspondante
    
} else {
    // Afficher une erreur si la page n'existe pas
    include 'header.php';
    echo "<h1>Erreur 404 : Page non trouvée</h1>";
    include 'footer.php';
}
