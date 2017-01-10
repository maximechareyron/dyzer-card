<?php

// source : Cours de R. Malgouyres, Code Source 11.4

namespace DyzerCard\Config;

use DyzerCard\Persistance\Connection;

/** @brief Classe de configuration
 * Donne accès aux paramètres spécifique concernant l'application
 * tels que les chemins vers les vues, les vues d'erreur, les hash
 * pour les ID de sessions, etc. */
class Config
{
    /** @brief Données nécessaires à la connexion à la base de données.
     * Les valeurs pourraient être initialisées à partir d'un fichier
     * de configuration séparé (require('configuration.php'))
     * pour faciliter la maintenance par le webmaster
     * @return string DSN
     */

    public static function getAuthData(&$db_host, &$db_name, &$db_user, &$db_password)
    {
        $db_host = "mysql.hostinger.fr";
        $db_name = "u258039167_db";
        $db_user = "u258039167_krak";
        $db_password = "ivresse";
        return "mysql:host=$db_host;dbname=$db_name";
    }

    public static function createConnection()
    {
        return new Connection(Config::getAuthData($db_host, $db_name, $db_user, $db_passwd), $db_user, $db_passwd);
    }

    /** @brief retourne le tableau des (chemins vers les) Vues */
    public static function getVues()
    {
        // Racine du site
        global $rootDirectory;
        // Répertoire contenant les Vues
        $vueDirectory = $rootDirectory . "Vues/";
        return array(
            "default" => $vueDirectory . "vueAccueil.php",
            "pageAuth" => $vueDirectory . "vueForm.php",
            "pageRegister" => $vueDirectory . "vueFormRegister.php",
            "visitorAuth" => $vueDirectory . "vueVisitorAuth.php",
            "addTitle" => $vueDirectory . "vueAddTitle.php",
            "afficheMusique" => $vueDirectory . "vueAfficheMusique.php",
            //"saisieMusiqueUpdate"=>$vueDirectory."vueSaisieMusiqueUpdate.php",
        );
    }

    /** @brief retourne le tableau des (chemins vers les) Vues d'erreur */
    public static function getVuesErreur()
    {
        // Racine du site
        global $rootDirectory;
        // Répertoire contenant les Vues d'erreur
        $vueDirectory = $rootDirectory . "Vue/Vues/";
        return array(
            "default" => $vueDirectory . "vueErreurDefault.php"
        );
    }


    /** @brief retourne l'URI (sans le nom d'hôte du site et sans la query string)
     * du répertoire à la racine de notre architecture MVC.
     * Exemple : pour l'URL http://example.org/path/to/my/mvc/?action=goToSleep,
     * l'URI est : /path/to/my/mvc/
     */
    public static function getRootURI()
    {
        global $rootURI; // Variable globale initialisée dans le fichier index.php
        return $rootURI;
    }


    /** @brief retourne le tableau des (URLs vers les) feuilles de style CSS */
    public static function getStyleSheetsURL()
    {
        // Répertoire contenant les styles css
        // Le nettoyage par filter_var evite tout risque d'injection XSS
        $cssDirectoryURL = filter_var("http://" . $_SERVER['SERVER_NAME'] . self::getRootURI() . "/Vues/assets/", FILTER_SANITIZE_URL);
        return array(
            "default" => $cssDirectoryURL . "style.css",
            "animate" => $cssDirectoryURL . "animate.css",
            "bootstrap" => $cssDirectoryURL . "bootstrap/css/bootstrap.css",
        );
    }


    public static function getResources()
    {
        $javaDirectoryURL = filter_var("http://" . $_SERVER['SERVER_NAME'] . self::getRootURI() . "/Vues/assets/", FILTER_SANITIZE_URL);
        return array(
            "logo" => $javaDirectoryURL . "images/logo.svg",
            "back1" => $javaDirectoryURL . "images/back1.jpg",
            "back2" => $javaDirectoryURL . "images/back2.jpg",
            "back3" => $javaDirectoryURL . "images/back3.jpg",
            "jquery" => $javaDirectoryURL . "scripts/jquery-1.7.1.min.js",
            "bootstrap" => $javaDirectoryURL . "bootstrap/js/bootstrap.js",
            "plugins" => $javaDirectoryURL . "scripts/plugins.js",
            "script" => $javaDirectoryURL . "scripts/script.js",
        );
    }


    /** @brief Génère 10 chiffres hexa aléatoires (soit 5 octets) */
    public static function generateRandomId()
    {
        // Génération de 5 octets (pseudo-)aléatoires codés en hexa
        $cryptoStrong = false; // Variable pour le passage par référence
        $octets = openssl_random_pseudo_bytes(5, $cryptoStrong);
        return bin2hex($octets);
    }
}

?>