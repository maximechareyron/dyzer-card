<?php

// Source : cours R. Malgouyres, code Source 13.8

namespace DyzerCard\Controller;

use DyzerCard\Auth\SessionHandler;
use DyzerCard\Config\Config;
use DyzerCard\Config\Sanitize;
use DyzerCard\Model\Model;

/**
 * @brief Identifie l'action et le rôle de l'utilisateur.
 * Dans le cas où l'utilisateur a des droits insuffisants pour l'action,
 * le frontController affiche une vue d'authentification ou une vue d'erreur.
 * Sinon, frontController instancie le contrôleur adapté pour les rôles et actions
 * de l'utilisateur
 * Il gère aussi les exceptions et appelle, le cas échéant, une vue d'erreur.
 */
class FrontController
{
    /**
     * @brief C'est dans le constructeur que le front fait son travail.
     */
    function __construct()
    {
        try {
            // L'utilisateur est il identifié ?
            $sess = SessionHandler::getInstance();

            // Récupération de l'action
            $action = Sanitize::sanitizeItem($_REQUEST['action'], "string");

            // On distingue des cas d'utilisation, suivant l'action
            switch ($action) {
                // 1) actions accessibles à tout le monde
                // 1. a) actions concernant l'authentification
                case "login": // Vue de saisie du login/password
                    ControlVisitor::authenticate();
                    break;
                case "validateLogin": // Validation du login/password
                    ControlVisitor::validateAuth();
                    break;
                case "register": // Vue de création d'un compte utilisateur
                    ControlVisitor::register();
                    break;
                case "validateRegister": // Validation de la création d'un compte utilisateur
                    ControlVisitor::validateRegister();
                    break;

                // 2) actions accessibles uniquement aux utilisateurs authentifiés
                /*
                case "like": // Avis favorable
                case "nlike": // Avis défavorable
                case "addComment": // Ajouter un commentaire
                */

                // 3) actions accessibles uniquement aux administrateurs :
                // 3. a) concernant les musiques :
                case "addTitle": // Ajouter un titre
                    ControlAdmin::addTitle();
                    break;
                case "validateTitle": //Validation d'un nouveau titre
                    ControlAdmin::validateTitle();
                    break;
                case "validateAlbum":
                    ControlAdmin::validateAlbum();
                    break;
                // case "editTitle": //Modifier les informations d'un titre
                case "deleteTitle": // Supprimer un titre
                    ControlAdmin::deleteTitle();
                    break;
                    // 3. b) concernant les commentaires :
                    /*case "deleteComment": // Supprimer un commentaire
                        if ($role == "admin") {
                            $adminCtrl = new ControleurAdmin($action);
                        } else {
                            require(Config::getVues()["authentication"]);
                        }
                        break;
    */
                    // 4) actions accessibles aux administrateurs et aux utilisateurs authentifiés
                case "detailTitre": // Afficher le détail d'un titre
                    ControlVisitor::afficherDetailTitre();
                    break;
                case "addComment":
                    ControlVisitorAuth::addComment();
                    break;
                case "validateComment":
                    ControlVisitorAuth::validateComment();
                    break;
                case "logout": // Se déconnecter
                    ControlVisitorAuth::logout();
                    break;

                // 5) pas d'action (premier appel)
                case NULL:
                    $this->Reinit();
                    break;

                // 6) action invalide
                default :
                    global $dataError;
                    $dataError['error'] = "Wrong php call";
                    require(Config::getVuesErreur()["default"]);
            }
        } catch (\Exception $e) {
            global $dataError;
            $dataError['Exception'] = $e->getMessage();
            require(Config::getVuesErreur()["default"]);
        } catch (\PDOException $e) {
            global $dataError;
            $dataError['PDOException'] = $e->getMessage();
            require(Config::getVuesErreur()["default"]);
        } catch (\Error $e) {
            global $dataError;
            $dataError['PHPError'] = $e->getMessage();
            require(Config::getVuesErreur()["default"]);
        }
    }

    public static function Reinit()
    {
        global $dataError;
        $musiques = Model::getTopTen();
        require(Config::getVues()["default"]);
    }
}

?>