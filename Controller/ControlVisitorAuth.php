<?php

namespace DyzerCard\Controller;

use DyzerCard\Auth\Authentication;
use DyzerCard\Auth\SessionHandler;
use DyzerCard\Config\Config;
use DyzerCard\Config\Sanitize;
use DyzerCard\Config\Validation;
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
        $s = SessionHandler::getInstance();

        //Vérification du rôle
        if ($s->role != 'visitor' && $s->role != 'admin') {
            require(Config::getVues()['pageAuth']);
            return;
        }


        if (Validation::validateItem($_POST['musicID'], "int")) {
            $musicID = Sanitize::sanitizeItem($_POST['musicID'], "int");
        } else {
            $dataError['InvalidMusicID'] = "Wrong music ID.";
        }

        if (!empty($dataError)) {
            require Config::getVuesErreur()['default'];
            return;
        }

        $formToDisplay = "add_comment";
        require Config::getVues()['addTitle'];
        return;
    }

    public static function validateComment()
    {
        global $dataError;
        $s = SessionHandler::getInstance();
        if ($s->role != 'visitor' && $s->role != 'admin') {
            require(Config::getVues()['pageAuth']);
            return;
        }

        if (isset($_POST['text'])) {
            $content = Sanitize::sanitizeItem($_POST['text'], "string");
            if ($content != $_POST['text']) {
                $dataError['Invalidtext'] = "The comment must be a text.";
            }
        }
        if (Validation::validateItem($_POST['musicID'], "int")) {
            $musicID = Sanitize::sanitizeItem($_POST['musicID'], "int");
        } else {
            $dataError['InvalidMusicID'] = "Wrong music ID.";
        }

        $formToDisplay = "add_comment";
        if (!empty($dataError)) {
            require Config::getVues()['addTitle'];
            return;
        }


        Model::addCommentMusic($musicID, $s->email, $content);
        if (!empty($dataError)) {
            require Config::getVues()['addTitle'];
            return;
        }
        FrontController::Reinit();

    }
}