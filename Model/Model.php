<?php

// Source : cours R. Malgouyres, code Source 12.3


namespace DyzerCard\Model;

use DyzerCard\Config\Config;
use DyzerCard\Metier\Commentaire;
use DyzerCard\Metier\Music;
use DyzerCard\Persistance\DAL\AlbumGateway;
use DyzerCard\Persistance\DAL\CommentGateway;
use DyzerCard\Persistance\DAL\LikeGateway;
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
            array_push($tab, new Music($l['idmusique'], $l['titre'], $l['artiste'], $l['annee'], $l['album_id'], $l['datemaj']));
        }
        return $tab;
    }

    public static function getTopTen()
    {
        $gw = new MusicGateway(Config::createConnection());
        $musiques = $gw->getAllTitles();

        if (empty($musiques)) {
            return false;
        }
        $tab = array();
        $i = 0;
        foreach ($musiques as $l) {
            array_push($tab, new Music($l['idmusique'], $l['titre'], $l['artiste'], $l['annee'], $l['album_id'], $l['datemaj']));
            $i++;
            if ($i == 10) break;
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
    public static function getAllAlbumsTitles()
    {
        $gw = new AlbumGateway(Config::createConnection());
        $res = $gw->getAllAlbums();
        if (!empty($res)) {
            $tab = array();
            foreach ($res as $l) {
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
        global $dataError;
        $gw = new MusicGateway(Config::createConnection());

        $res = $gw->getMusicByID($musicID)[0];

        if (empty($res)) {
            $dataError['persistance'] = "Query returned no result." . " Music ID may not exist.";
            return false;
        }

        return new Music($res['idmusique'], $res['titre'], $res['artiste'], $res['annee'], $res['album_id'], $res['datemaj']);
    }

    public static function getCommentMusic($musicID)
    {
        $gw = new CommentGateway(Config::createConnection());
        $res = $gw->getComments($musicID);
        if (!empty($res)) {
            $tab = array();
            foreach ($res as $l) {
                array_push($tab, new Commentaire($l['idmusique'], $l['iduser'], $l['datemodif'], $l['content']));
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

    public static function addCommentMusic($musicID, $iduser, $text)
    {
        $gw = new CommentGateway(Config::createConnection());
        return $gw->addComment($musicID, $iduser, $text);
    }

    public static function removeComment($author, $music_id, $date)
    {
        $gw = new CommentGateway(Config::createConnection());
        return $gw->removeComment($author, $music_id, $date);
    }

    public static function addLikeTitle($musicID, $author)
    {
        $gw = new LikeGateway(Config::createConnection());
        return $gw->addLike($musicID, $author);
    }

    public static function getAllLikes($musicID)
    {
        $gw = new LikeGateway(Config::createConnection());
        return $gw->getLikes($musicID);

    }

    public static function getAllNlikes($musicID)
    {
        $gw = new LikeGateway(Config::createConnection());
        return $gw->getNLikes($musicID);

    }

}

?>
