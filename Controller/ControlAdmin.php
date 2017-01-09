<?php

namespace DyzerCard\Controller;

use DyzerCard\Auth\Authentication;
use DyzerCard\Config\Config;
use DyzerCard\Config\Sanitize;
use DyzerCard\Config\Validation;
use DyzerCard\Metier\Music;
use DyzerCard\Model\Model;

class ControlAdmin
{

    public static function addTitle()
    {
        global $dataError;
        if ($_SESSION['role'] != 'admin') {
            require(Config::getVues()['pageAuth']);
        }
        else{
            require (Config::getVues()['addTitle']);
        }
    }

    public static function validateTitle(){
        global $dataError;
        $title=Sanitize::sanitizeItem($_POST["title"], "string");
        if($title===false){
            $dataError['InvalidTitle']="The title of the song must be a simple string.";
        }
        $artist=Sanitize::sanitizeItem($_POST["artist"], "string");
        if($artist===false){
            $dataError['InvalidArtist']="The artist of the song must be a simple string.";
        }
        if(!Validation::validateItem($_POST['year'], "int")){
            $dataError['InvalidYear']="The year must be a number.";
        }else{
            $year=Sanitize::sanitizeItem($_POST['year'], "int");
        }
        if(!Validation::validateItem($_POST['albumID'], "int")){
            $dataError['InvalidAlbumID']="The albumID is a required field and must be a number";
        }else{
            $albumID=Sanitize::sanitizeItem($_POST['albumID'], "int");
        }

        // Si pas de pochette d'album pour $albumID
        if(isset($albumID) && !file_exists(Music::getFullPathCover($albumID))){
            // Si pas de fichier uploadé ou fichier non reçu :
            $filename = $_FILES['albumCover']['tmp_name'];
            if (empty($_FILES['albumCover']) || !is_uploaded_file($filename)) {
                $dataError['InvalidAlbumCover']="No album cover were found for the album id $albumID. <br/> Please upload one.";
            }
            // Le fichier a été correctement uploadé
            else{
                // Si le fichier n'a pas la bonne extension chez le client
                $fileformat=end(explode('.', $_FILES['albumCover']['name']));
                if($fileformat != "png"){
                    $dataError['WrongFormat']="Invalid file format : $fileformat. png expected.";
                }
                // On le copie dans son répertoire en testant:
                else if(!move_uploaded_file($filename, Music::getFullPathCover($albumID))){
                    // Pour que la copie fonctionne, il faut que apache ait les droits d'écriture sur le répertoire...
                    $dataError['InternalError']="Problem encountered while copying files. Please try again.";
                }
            }
        }

        // Si pas de fichier uploadé ou fichier non reçu :
        // Pour que la copie fonctionne, il faut que apache ait les droits d'écriture sur le répertoire...
        /** Attention, par défaut, php limite la taille d'upload des fichiers à 2M. Cela peut poser
         * problème pour les fichiers audios. Modifier la valeur de upload_max_filesize dans le php.ini pour
         * remédier à ce problème. */

        $filename = $_FILES['audio']['tmp_name'];
        if (empty($_FILES['audio']) || !is_uploaded_file($filename)) {
            $dataError['InvalidAudioFile']="No audio file were found. Please upload one.";
            $dataError['Sizefile']="If you did upload an audio file, please check that its size does not exceeds ".ini_get('upload_max_filesize') .".";
        }
        // Le fichier a été correctement uploadé
        else {
            // Si le fichier n'a pas la bonne extension chez le client
            $fileformat = end(explode('.', $_FILES['audio']['name']));
            if ($fileformat != "mp3") {
                $dataError['WrongFormat'] = "Invalid file format : $fileformat. mp3 expected.";
            }
        }

        // Si il y a des erreurs
        if(!empty($dataError)){
            require(Config::getVues()["addTitle"]);
            return;
        }
        $music=new Music("", $title,$artist, $year, 0, 0, $albumID, "");
        Model::addTitle($music);
        if(!empty($dataError)){
            require Config::getVuesErreur()['default'];
            return;
        }
        $idMusic=Model::getLatestID();
        if($idMusic===false){
            $dataError['InternalError']="Unable to add the audio file of your title. Try to re-upload it.";
            require Config::getVuesErreur()['default'];
        }

        if(!move_uploaded_file($filename, Music::getFullPathAudio($idMusic))){
            $dataError['InternalError']="Problem encountered while copying files. Please try again.";
        }

        require(Config::getVues()['default']);
    }

}