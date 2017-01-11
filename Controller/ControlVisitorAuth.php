<?php

namespace DyzerCard\Controller;

use DyzerCard\Auth\Authentication;
use DyzerCard\Auth\ModelUser;
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
        var_dump($_POST);
        global $dataError;
        $s = SessionHandler::getInstance();

        //Vérification du rôle
        if ($s->role != 'visitor' && $s->role != 'admin') {
            $formToDisplay='authentication';
            require(Config::getVues()['formView']);
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
        require Config::getVues()['formView'];
        return;
    }

    public static function validateComment()
    {
        global $dataError;
        $s = SessionHandler::getInstance();
        if ($s->role != 'visitor' && $s->role != 'admin') {
            $formToDisplay='authentication';
            require(Config::getVues()['formView']);
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
            require Config::getVues()['formView'];
            return;
        }


        Model::addCommentMusic($musicID, $s->email, $content);
        if (!empty($dataError)) {
            require Config::getVues()['formView'];
            return;
        }

        $_GET['musicID']=$musicID;
        ControlVisitor::afficherDetailTitre();
    }


    public static function deleteComment(){
        global $dataError;
        $s = SessionHandler::getInstance();
        if ($s->role != 'admin' && $s->role != 'visitor') {
            $formToDisplay='authentication';
            require(Config::getVues()['formView']);
            return;
        }

        if (isset($_POST['musicID'])) {
            if (!Validation::validateItem($_POST['musicID'], "int")) {
                $dataError['InvalidMusicID'] = "The music ID must be a number.";
            } else {
                $musicID = Sanitize::sanitizeItem($_POST['musicID'], "int");
            }
        } else{
            $dataError['missingMusicID']="You need to pick a song to delete";
        }

        if (isset($_POST['author'])) {
            $author=Sanitize::sanitizeItem($_POST['author'], "string");
            if($s->email != $author){
                $dataError['insuficientPermissions']="You are not allowed to edit this comment !";
            }
        }else{
            $dataError['missingAuthor'] = "You need to specify the author of the comment";
        }


        if (isset($_POST['dateComment'])) {
            $date=Sanitize::sanitizeItem($_POST['dateComment'], "string");
            if(strlen($date)!=19){
                $dataError['InvalidDate']="The specified date is invalid : $date (too short)";
            }
        }else{
            $dataError['missingDate']= "You need to specify the publication date of the comment";
        }

        if (!empty($dataError)) {
            require Config::getVuesErreur()['Default'];
            return;
        }

        Model::removeComment($author, $musicID, $date);
        if(!empty($dataError)){
            require Config::getVuesErreur()['default'];
            return;
        }

        $_GET['musicID']=$musicID;
        ControlVisitor::afficherDetailTitre();
    }


    public static function editComment(){
        global $dataError;
        $s = SessionHandler::getInstance();
        if ($s->role != 'visitor') {
            $formToDisplay='authentication';
            require(Config::getVues()['formView']);
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
        require Config::getVues()['formView'];
        return;

    }

    public static function validateEditComment(){
        global $dataError;
        $s = SessionHandler::getInstance();
        if ($s->role != 'admin' && $s->role != 'visitor') {
            $formToDisplay='authentication';
            require(Config::getVues()['formView']);
            return;
        }

        if (isset($_POST['musicID'])) {
            if (!Validation::validateItem($_POST['musicID'], "int")) {
                $dataError['InvalidMusicID'] = "The music ID must be a number.";
            } else {
                $musicID = Sanitize::sanitizeItem($_POST['musicID'], "int");
            }
        } else{
            $dataError['missingMusicID']="You need to pick a song to delete";
        }


        if (!empty($dataError)) {
            require Config::getVuesErreur()['Default'];
            return;
        }

        Model::editComment($_POST['author'], $musicID, $_POST['dateComment'], $_POST['text']);
        if(!empty($dataError)){
            require Config::getVuesErreur()['default'];
            return;
        }

        $_GET['musicID']=$musicID;
        if ($s->role != 'visitor') {
            $dataError['UnreachablePage'] = "You do not have access to this page";
            require(Config::getVuesErreur()['default']);
            return;
        }

        require(Config::getVues()['configAccount']);
    }

    public static function deleteAccount(){
        global $dataError;

        $s = SessionHandler::getInstance();
        if ($s->role != 'visitor') {
            $dataError['UnreachablePage'] = "You do not have access to this page";
            $formToDisplay='authentication';
            require(Config::getVues()['formView']);
            return;

        }
        ModelUser::deleteUser($s->email);

        if(!empty($dataError)){
            require(Config::getVuesErreur()['default']);
            return;
        }
        $s->destroy();
        FrontController::Reinit();
    }

    public static function likeTitle()
    {
        global $dataError;
        $s = SessionHandler::getInstance();
        if ($s->role != 'visitor' && $s->role != 'admin') {
            $dataError['UnreachablePage'] = "You do not have access to this page";
            require(Config::getVues()['pageAuth']);
            return;
        }
        if(isset($_GET['musicID']))
        {
            if (!Validation::validateItem($_GET['musicID'], "int")) {
                $dataError['InvalidMusicID'] = "The music ID must be a number.";
            } else {
                $musicID = Sanitize::sanitizeItem($_POST['musicID'], "int");
            }

        } else{
            $dataError['missingMusicID']="You need to pick a song to delete";
        }
        if (isset($_SESSION['email'])) {
            $author=Sanitize::sanitizeItem($_SESSION['email'], "string");
        }else {
            $dataError['missingAuthor'] = "You need to specify the author of this like";
        }

        if(!empty($dataError)){
            require(Config::getVuesErreur()['default']);
            return;
        }

        Model::addLikeTitle($musicID, $author);

        if(!empty($dataError)){
            require Config::getVuesErreur()['default'];
            return;
        }

        $_GET['musicID']=$musicID;
        ControlVisitor::afficherDetailTitre();

    }
}