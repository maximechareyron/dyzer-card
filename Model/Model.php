<?php

// Source : cours R. Malgouyres, code Source 12.3


namespace DyzerCard\Model;

use DyzerCard\Config\Config;
use DyzerCard\Metier\Music;
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

    /**
     * @param $music Music Titre à ajouter
     * @return bool
     */
    public static function addTitle($music)
    {
        $gw = new MusicGateway(Config::createConnection());
        return $gw->addTitle($music);
        echo "sortie";
    }

    /**
     * @return bool|mixed Id de la dernière musique ajoutée ou false.
     */
    public static function getLatestID(){
        $gw=new MusicGateway(Config::createConnection());
        return $gw->getLatestID();
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
}

?>
