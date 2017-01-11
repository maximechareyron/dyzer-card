<?php

namespace DyzerCard\Controller;


use DyzerCard\Auth\Authentication;
use DyzerCard\Auth\ModelUser;
use DyzerCard\Auth\SessionHandler;
use DyzerCard\Auth\ValidationRequest;
use DyzerCard\Config\Config;
use DyzerCard\Config\Sanitize;
use DyzerCard\Config\Validation;
use DyzerCard\Model\Model;

class ControlVisitor
{
    public static function register()
    { // Vue d'inscription
        $formToDisplay='registration';
        require(Config::getVues()['formView']);
    }

    public static function authenticate()
    { // Vue d'authentification
        $formToDisplay='authentication';
        require(Config::getVues()['formView']);
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
            ModelUser::createUser($dataUser);
            if (!empty($dataError)) {
                $formToDisplay='registration';
                require(Config::getVues()['formView']);
                return;
            }
            Authentication::checkAndInitiateSession($email, $password, $dataError);
            if (!empty($dataError)) {
                require(Config::getVuesErreur()['default']);
                return;
            }
            FrontController::Reinit();
            return;
        } // E-mail & mot de passe invalides, on affiche les erreurs, puis on affiche le formulaire
        $formToDisplay='registration';
        require(Config::getVues()['formView']);
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
            FrontController::Reinit();
            return;
        }
        // Les données seront filtrées par PDO::prepare()
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = Authentication::checkAndInitiateSession($email, $password, $dataError);
        // Si pas d'erreur
        if (empty($dataError)) {
            //FrontController::Reinit();
            FrontController::Reinit();
        } else {
            // On affiche la page d'authentification, avec les erreurs.
            $formToDisplay='authentication';
            require(Config::getVues()['formView']);
        }
    }

    public static function afficherDetailTitre()
    {
        global $dataError;
        $s = SessionHandler::getInstance();
        $role = $s->role;
        if (Validation::validateItem($_GET['musicID'], "int")) {
            $musicID = Sanitize::sanitizeItem($_GET['musicID'], "int");
            $music = Model::getMusicByID($musicID);
            $comments = Model::getCommentMusic($musicID);

            if(!empty($dataError)){
                require(Config::getVuesErreur()['default']);
                return;
            }

            require(Config::getVues()["afficheMusique"]);
        } else {
            $dataError["InvalidMusicID"] = "The requested MusicID is invalid.";
        }
    }
}