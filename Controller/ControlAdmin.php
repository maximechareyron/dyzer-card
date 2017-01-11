<?php

namespace DyzerCard\Controller;

use DyzerCard\Auth\SessionHandler;
use DyzerCard\Auth\ValidationRequest;
use DyzerCard\Config\Config;
use DyzerCard\Config\Sanitize;
use DyzerCard\Config\Validation;
use DyzerCard\Metier\Music;
use DyzerCard\Model\Model;

class ControlAdmin
{
    /**
     * @brief Affiche la vue d'ajout d'un titre
     */
    public static function addTitle()
    {
        global $dataError;
        $s = SessionHandler::getInstance();

        //Vérification du rôle
        if ($s->role != 'admin') {
            $formToDisplay='authentication';
            require(Config::getVues()['formView']);
            return;
        }

        // Si l'utilisateur a déjà choisi un album :
        if (isset($_POST['albumID'])) {
            if (!Validation::validateItem($_POST['albumID'], "int")) {
                $dataError['InvalidAlbumID'] = "The album ID must be a number.";
            } else {
                $albumID = Sanitize::sanitizeItem($_POST['albumID'], "int");
            }
        }

        // Si l'utilisateur n'a pas choisi d'album
        if (!isset($albumID)) {
            $formToDisplay = 'select_album';
            $AlbumsList = Model::getAllAlbumsTitles();
        } else if ($albumID == -1) {
            $formToDisplay = 'add_album';
        } else {
            $formToDisplay = 'add_title';
        }
        require(Config::getVues()['addTitle']);
    }

    /**
     * @brief Valide la saisie d'un titre, et réalise l'ajout en BD
     * Affiche les erreurs en cas de problème de saisie.
     */
    public static function validateTitle()
    {
        global $dataError;
        $s = SessionHandler::getInstance();
        if ($s->role != 'admin') {
            $formToDisplay='authentication';
            require(Config::getVues()['formView']);
            return;
        }
        $res = ValidationRequest::validationTitle($albumID);
        if (!$res) {
            $formToDisplay = 'add_title';
            require(Config::getVues()["addTitle"]);
            return;
        }

        Model::addTitle($res);
        if (!empty($dataError)) {
            $formToDisplay = 'add_title';
            require Config::getVues()['addTitle'];
            return;
        }
        $idMusic = Model::getLatestID();
        if ($idMusic === false) {
            $dataError['InternalError'] = "Unable to add the audio file of your title. Try to re-upload it.";
            require Config::getVuesErreur()['default'];
        }

        $filename = $_FILES['audio']['tmp_name'];
        if (!move_uploaded_file($filename, Music::getFullPathAudio($idMusic))) {
            $dataError['InternalError'] = "Problem encountered while copying files. Please try again.";
        }

        if (empty($dataError)) {
            FrontController::Reinit();
            return;
        } else {
            require Config::getVuesErreur()['default'];
        }
    }

    /**
     * Valide la saisie d'un album
     */
    public static function validateAlbum()
    {
        global $dataError;
        $s = SessionHandler::getInstance();
        if ($s->role != 'admin') {
            $formToDisplay='authentication';
            require(Config::getVues()['formView']);
            return;
        }

        $albumTitle = Sanitize::sanitizeItem($_POST['album_title'], "string");
        if (!$albumTitle) {
            $dataError["Invalid album name"] = "The album title is a required field.";
        }

        // Si pas de fichier uploadé ou fichier non reçu :
        $filename = $_FILES['albumCover']['tmp_name'];
        if (empty($_FILES['albumCover']) || !is_uploaded_file($filename)) {
            $dataError['InvalidAlbumCover'] = "No album cover were found for the album. <br/> Please upload one.";
        } // Le fichier a été correctement uploadé
        else {
            // Si le fichier n'a pas la bonne extension chez le client
            $fileformat = end(explode('.', $_FILES['albumCover']['name']));
            if ($fileformat != "png") {
                $dataError['WrongFormat'] = "Invalid file format : Got .$fileformat while .png was expected.";
            }
        }

        if (!empty($dataError)) {
            $formToDisplay = 'add_album';
            require Config::getVues()['addTitle'];
            return;
        }

        Model::addAlbum($albumTitle);
        if (!empty($dataError)) {
            $formToDisplay = 'add_album';
            require Config::getVues()['addTitle'];
            return;
        }
        $idAlbum = Model::getLatestAlbumID();
        if ($idAlbum === false) {
            $dataError['InternalError'] = "Unable to add the audio file of your title. Try to re-upload it.";
            require Config::getVuesErreur()['default'];
        }

        // On copie la couverture d'album dans son répertoire en testant:
        var_dump($filename);
        var_dump(Music::getFullPathCover($idAlbum));
        if (!move_uploaded_file($filename, Music::getFullPathCover($idAlbum))) {
            // Pour que la copie fonctionne, il faut que apache ait les droits d'écriture sur le répertoire...
            $dataError['InternalError'] = "Problem encountered while copying files. Please try again.";
        }

        if (empty($dataError)) {
            $_REQUEST['action'] = 'addTitle';
            $_POST['albumID'] = $idAlbum;
            ControlAdmin::addTitle();
            return;
        } else {
            require Config::getVuesErreur()['default'];
        }
    }

    /**
     * Supprime un titre de la base de données et son fichier en local.
     */
    public static function deleteTitle()
    {
        global $dataError;
        $s = SessionHandler::getInstance();
        if ($s->role != 'admin') {
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
        }

        if (!empty($dataError)) {
            require Config::getVuesErreur()['Default'];
            return;
        }

        Model::removeTitle($musicID);
        if (!empty($dataError)) {
            require Config::getVuesErreur()['default'];
            return;
        }

        $res = unlink(Music::getFullPathAudio($musicID));
        if (!$res) {
            $dataError['rmError'] = "Could not delete the audio file for music $musicID";
            require Config::getVuesErreur()['default'];
            return;
        }
        FrontController::Reinit();
        return;
    }

}