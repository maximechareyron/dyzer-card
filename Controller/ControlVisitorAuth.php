<?php

namespace DyzerCard\Controller;

use DyzerCard\Auth\Authentication;
use DyzerCard\Auth\SessionHandler;
use DyzerCard\Config\Config;
use DyzerCard\Config\Sanitize;
use DyzerCard\Model\Model;

class ControlVisitorAuth
{
    public static function logout()
    {
        Authentication::disconnection();
        FrontController::Reinit();
    }

    public static function addComment()
    {
        global $dataError;
        $s=SessionHandler::getInstance();

        //Vérification du rôle
        if ($s->role != 'user' && $s->role != 'admin') {
            require(Config::getVues()['pageAuth']);
            return;
        }

        // Si l'utilisateur a déjà choisi un album :
        if(isset($_POST['text'])) {
            Sanitize::sanitizeItem($_POST['text'],"string");
                $dataError['Invalidtext'] = "The comment must be a text.";
        }
        $formToDisplay = 'add_comment';
        require(Config::getVues()['addTitle']);
    }

    public static function validateComment()
    {
        global $dataError;
        $s=SessionHandler::getInstance();
        if ($s->role != 'user' || $s->role != 'admin') {
            require(Config::getVues()['pageAuth']);
            return;
        }

        Sanitize::sanitizeItem($_POST['text'],"string");

        Model::addCommentMusic($_GET['musicID'],$_SESSION['email'],$_POST['text']);

    }
}