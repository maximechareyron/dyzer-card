<?php

namespace DyzerCard\Controller;


use DyzerCard\Auth\Authentication;
use DyzerCard\Auth\ModelUser;
use DyzerCard\Auth\SessionHandler;
use DyzerCard\Auth\ValidationRequest;
use DyzerCard\Config\Config;

class ControlVisitor
{
    public static function register()
    { // Vue d'inscription
        require(Config::getVues()["pageRegister"]);
    }

    public static function authenticate()
    { // Vue d'authentification
        require(Config::getVues()["pageAuth"]);
    }

    public static function validateRegister() // Validation d'inscription
    {
        global $dataError;
        // Récupération du tableau d'erreurs, de l'email et du mdp (par référence).
        // + filtrage
        ValidationRequest::validationLogin($dataError, $email, $password);
        // Si e-mail et mot de passe de la bonne forme :
        if (empty($dataError)) {
            $dataUser = array(
                'login' => $email,
                'password' => $password,
                'role' => 'visitor'
            );
            ModelUser::createUser($dataError, $dataUser);
            var_dump($dataError);
            // Si la requête a fonctionné :
            if (empty($dataError)) {
                $role = Authentication::checkAndInitiateSession($email, $password, $dataError);
                // Si l'authentification du nouvel utilisateur a fonctionné :
                if (empty($dataError)) {
                    require(Config::getVues()["visitorAuth"]);
                } // Sinon, on affiche la page d'erreur par défaut
                else {
                    require(Config::getVuesErreur()['default']);
                }
            } // Echec de la requête de création de l'utilisateur
            else {
                // Affiche la page d'erreur par défaut
                require(Config::getVuesErreur()['default']);
            }
        } // E-mail & mot de passe invalides, on affiche les erreurs, puis on affiche le formulaire
        else {
            require(Config::getVues()["pageRegister"]);
        }
    }

    /**
     * @brief à partir des données passées en POST, vérifie les identifiants
     * de l'utilisateur, créée la session de cet utilisateur et le redirige vers
     * la page d'accueil en tant qu'utilisateur connecté.
     */
    public static function validateAuth()
    { // Valider l'authentification
        global $dataError;
        $s = SessionHandler::getInstance();
        if (isset($s->role)) {
            require(Config::getVues()['default']);
            return;
        }
        // Les données seront filtrées par PDO::prepare()
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = Authentication::checkAndInitiateSession($email, $password, $dataError);
        // Si pas d'erreur
        if (empty($dataError)) {
            require(Config::getVues()["default"]);
        } else {
            // On affiche la page d'authentification, avec les erreurs.
            var_dump($_POST);
            require(Config::getVues()["pageAuth"]);
        }
    }
}