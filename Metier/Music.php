<?php

namespace DyzerCard\Metier;

use DyzerCard\Config\Config;
use DyzerCard\Model\Model;

class Music
{
    public $idMusique;
    public $titre;
    public $artiste;
    public $annee;
    public $avisfav;
    public $avisdefav;
    public $album_id;
    public $dateMaj;
    public $coverPath;
    public $musicPath;

    public function __construct($musicID, $title, $artist, $year, $albumID, $dateOnline)
    {
        $this->idMusique = $musicID;
        $this->titre = $title;
        $this->artiste = $artist;
        $this->annee = $year;
        $this->album_id = $albumID;
        if ($dateOnline != "") {
            $d = date_parse($dateOnline);
            $this->dateMaj = $d['year'] . "-" . $d['month'] . "-" . $d['day'];
        }

        $this->avisfav = Model::getAllLikes($this->idMusique)[0]["COUNT(*)"];
        $this->avisdefav = Model::getAllNlikes($this->idMusique)[0]["COUNT(*)"];


        if ($musicID != "") {
            $this->musicPath = $this->getAudio($musicID);
        }
        if (isset($albumID)) {
            $this->coverPath = $this->getCover($albumID);
        } else {
            $this->coverPath = "";
        }
    }

    public static function getAudio($musicID)
    {
        return Config::getRootURI() . "/Media/Music/" . $musicID . ".mp3";
    }

    public static function getCover($album)
    {
        return Config::getRootURI() . "/Media/Cover/" . $album . ".png";
    }

    public static function getFullPathCover($albumID)
    {
        global $rootDirectory;
        return $rootDirectory . "Media/Cover/" . $albumID . ".png";
    }

    public static function getFullPathAudio($musicID)
    {
        global $rootDirectory;
        return $rootDirectory . "Media/Music/" . $musicID . ".mp3";
    }


}

?>