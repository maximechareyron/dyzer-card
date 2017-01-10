<?php

namespace DyzerCard\Controller;

use DyzerCard\Auth\Authentication;
use DyzerCard\Config\Config;
use DyzerCard\Config\Sanitize;

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
        if ($s->role != 'user' || $s->role != 'admin') {
            require(Config::getVues()['pageAuth']);
            return;
        }

        // Si l'utilisateur a déjà choisi un album :
        if(isset($_POST['text'])) {
            Sanitize::sanitizeItem($_POST['text'],"string");
                $dataError['Invalidtext'] = "The comment must be a text.";
        }

        // Si l'utilisateur n'a pas choisi d'album
        if(!isset($albumID)){
            $formToDisplay='select_album';
            $AlbumsList=Model::getAllAlbumsTitles();
        }else if($albumID==-1){
            $formToDisplay='add_album';
        }
        else{
            $formToDisplay='add_title';
        }
        require(Config::getVues()['addTitle']);
    }
}