<?php

namespace DyzerCard\Persistance\DAL;

use DyzerCard\Persistance\Connection;

class MusicGateway
{
    private $dbcon;

    public function __construct(Connection $con)
    {
        $this->dbcon = $con;
    }

    /**
     * @return mixed Tableau associatif contenant tous les titres, triés du plus récent au plus ancien
     */
    public function getAllTitlesByLike()
    {
        global $dataError;
        $query = 'SELECT * FROM musique ORDER BY avisfav DESC';
        $res = $this->dbcon->prepareAndExecuteQuery($query);
        if (!$res) {
            $dataError['persistance'] = "No music were found.";
            return $res;
        }
        return $this->dbcon->getResults();
    }


    /**
     * @return mixed Tableau associatif contenant tous les titres, triés du plus récent au plus ancien
     */
    public function getAllTitles()
    {
        global $dataError;
        $query = 'SELECT * FROM musique ORDER BY datemaj DESC';
        $res = $this->dbcon->prepareAndExecuteQuery($query);
        if (!$res) {
            $dataError['persistance'] = "No music were found.";
            return $res;
        }
        return $this->dbcon->getResults();
    }


    /** @brief Ajoute un titre dans la BD.
     * @param $title Titre à ajouter à la base.
     * @return bool
     */
    public function addTitle($title)
    {
        global $dataError;
        $query = 'INSERT INTO musique VALUES(DEFAULT, :titre, :annee, 0, 0, :artiste, :album_id, DEFAULT)';
        $tab = array(
            ':titre' => array($title->title, \PDO::PARAM_STR),
            ':annee' => array($title->year, \PDO::PARAM_INT),
            ':artiste' => array($title->artist, \PDO::PARAM_STR),
            ':album_id' => array($title->albumID, \PDO::PARAM_INT)
        );
        $res = $this->dbcon->prepareAndExecuteQuery($query, $tab);
        if (!$res) {
            $dataError['persistance'] = "Query could not be executed.";
        }
        return $res;
    }


    public function removeTitle($music_id)
    {
        global $dataError;
        $query = 'DELETE FROM musique WHERE idmusique=:id';
        $tab = array(
            ':id' => array($music_id, \PDO::PARAM_INT)
        );
        $res = $this->dbcon->prepareAndExecuteQuery($query, $tab);
        if (!$res) {
            $dataError['persistance'] = "Query could not be executed." . " Music ID may not exist.";
        }
        return $res;
    }
}