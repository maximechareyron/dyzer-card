<?php

// Source : cours R. Malgouyres, code Source 12.3


namespace DyzerCard\Model;

use DyzerCard\Config\Config;
use DyzerCard\Metier\Commentaire;
use DyzerCard\Metier\Music;
use DyzerCard\Persistance\DAL\AlbumGateway;
use DyzerCard\Persistance\DAL\CommentGateway;
use DyzerCard\Persistance\DAL\MusicGateway;

class Model
{

    /**@brief donne un tableau avec les 10 dernières musiques mises à jour sur le site.
     * Renvoie false si aucune musique n'a été trouvée, un tableau de musiques sinon
     */
    public static function getLatestMusics()
    {
        $gw = new MusicGateway(Config::createConnection());
        $musiques = $gw->getAllTitles();

        if (empty($musiques)) {
            return false;
        }
        $tab = array();
        foreach ($musiques as $l) {
            array_push($tab, new Music($l['idmusique'], $l['titre'], $l['artiste'], $l['annee'], $l['avisfav'], $l['avisdefav'], $l['album_id'], $l['datemaj']));
        }
        return $tab;
    }

    public static function getTopTen(){
        $gw = new MusicGateway(Config::createConnection());
        $musiques = $gw->getAllTitlesByLike();

        if (empty($musiques)) {
            return false;
        }
        $tab = array();
        $i=0;
        foreach ($musiques as $l) {
            array_push($tab, new Music($l['idmusique'], $l['titre'], $l['artiste'], $l['annee'], $l['avisfav'], $l['avisdefav'], $l['album_id'], $l['datemaj']));
            $i++;
            if($i==10) break;
        }
        return $tab;
    }

    /**
     * @param $music Music Titre à ajouter
     * @return bool
     */
    public static function addTitle($music)
    {
        $gw = new MusicGateway(Config::createConnection());
        return $gw->addTitle($music);
    }

    /**
     * @return mixed Tableau des titres des albums de la BD
     */
    public static function getAllAlbumsTitles(){
        $gw = new AlbumGateway(Config::createConnection());
        $res = $gw->getAllAlbums();
        if(!empty($res)){
            $tab=array();
            foreach ($res as $l){
                array_push($tab, array($l['idalbum'], $l['titre']));
            }
            return $tab;
        }
        return $res;
    }

    /**
     * @return bool|mixed Id de la dernière musique ajoutée ou false.
     */
    public static function getLatestID()
    {
        $gw = new MusicGateway(Config::createConnection());
        return $gw->getLatestID()[0]["MAX(idmusique)"];
    }

    /**
     * @return mixed
     */
    public static function getLatestAlbumID()
    {
        $gw = new AlbumGateway(Config::createConnection());
        return $gw->getLatestID()[0]["MAX(idalbum)"];
    }

    /**
     * @param $music_id int Indentifiant de la musique à supprimer
     * @return bool
     */
    public static function removeTitle($music_id)
    {
        $gw = new MusicGateway(Config::createConnection());
        return $gw->removeTitle($music_id);
    }

    public static function getMusicByID($musicID)
    {
        $gw = new MusicGateway(Config::createConnection());

        $res = $gw->getByID($musicID)[0];
        $music = new Music($res['idmusique'], $res['titre'], $res['artiste'], $res['annee'], $res['avisfav'], $res['avisdefav'], $res['album_id'], $res['datemaj']);
        return $music;
    }

    public static function getCommentMusic($musicID)
    {
        $gw = new CommentGateway(Config::createConnection());
        $res = $gw->getComments($musicID);
        if(!empty($res)){
            $tab=array();
            foreach ($res as $l){
                array_push($tab, new Commentaire($l['idmusique'], $l['iduser'], $l['date'], $l['text']));
            }
            return $tab;
        }
        return $res;
    }

    public static function addAlbum($title)
    {
        $gw = new AlbumGateway(Config::createConnection());
        return $gw->addAlbum($title);
    }

    public static function addCommentMusic($musicID,$iduser,$text)
    {
        $gw = new CommentGateway(Config::createConnection());
        return $gw->addComment($musicID,$iduser,$text);

    }
}

?>
