<?php
//chargement config
require_once(__DIR__.'/config/config.php');

//Chargement de l'autoloader (le plus simple)
require_once(__DIR__.'/config/Autoload.php');
Autoload::charger();


// autoloader conforme norme PSR-0
// require_once(__DIR__.'/config/SplClassLoader.php');
// $myLibLoader = new SplClassLoader('controleur', './');
// $myLibLoader->register();
// $myLibLoader = new SplClassLoader('config', './');
// $myLibLoader->register();
// $myLibLoader = new SplClassLoader('modeles', './');
// $myLibLoader->register();


// Démarrage (ou reprise) de la session
session_start();


$controller = new \controleur\CtrlUser();


?> 