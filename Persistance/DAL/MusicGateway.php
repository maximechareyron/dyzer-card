<?php

namespace DyzerCard\Persistance\DAL;

use DyzerCard\Metier\Music;
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
        $query = 'SELECT * FROM musique ORDER BY avisfav DESC, datemaj DESC';
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

    /**
     * @return bool|mixed Id de la dernière musique ajoutée ou false.
     */
    public function getLatestID()
    {
        global $dataError;
        $query = 'SELECT MAX(idmusique) FROM musique';
        $res = $this->dbcon->prepareAndExecuteQuery($query);
        if (!$res) {
            $dataError['database'] = "Unable to recover music ID";
            return $res;
        }
        return $this->dbcon->getResults();
    }

    /** @brief Ajoute un titre dans la BD.
     * @param $title Music Titre à ajouter à la base.
     * @return bool
     */
    public function addTitle($title)
    {
        global $dataError;
        $query = 'INSERT INTO musique VALUES(DEFAULT, :titre, :artiste, :annee, 0, 0, :album_id, DEFAULT)';
        $tab = array(
            ':titre' => array($title->titre, \PDO::PARAM_STR),
            ':annee' => array($title->annee, \PDO::PARAM_INT),
            ':artiste' => array($title->artiste, \PDO::PARAM_STR),
            ':album_id' => array($title->album_id, \PDO::PARAM_INT)
        );
        try {
            $res = $this->dbcon->prepareAndExecuteQuery($query, $tab);
        } catch (\PDOException $e) {
            $dataError['db'] = $e->getMessage();
        }
        if (!$res) {
            $dataError['database'] = "Title could not be added to database.";
        }
        return $res;
    }


    public function removeTitle($music_id)
    {
        global $dataError;
        $query = 'DELETE FROM musique WHERE idmusique= :music_id';
        $tab = array(
            ':music_id' => array($music_id, \PDO::PARAM_INT)
        );
        try {
            $res = $this->dbcon->prepareAndExecuteQuery($query, $tab);
        }catch (\PDOException $e){
            $dataError['db']=$e->getMessage();
        }
        if (!$res) {
            $dataError['persistance'] = "Title couldn't not be deleted from the database" . " Music ID may not exist.";
        }
        return $res;
    }

    public function getByID($music_id)
    {
        global $dataError;
        $query = 'SELECT * from musique WHERE idmusique=:music_id';
        $tab = array(
            ':music_id' => array($music_id, \PDO::PARAM_INT)
        );
        $res = $this->dbcon->prepareAndExecuteQuery($query, $tab);
        if (!$res) {
            $dataError['persistance'] = "Query could not be executed." . " Music ID may not exist.";
        }
        return $this->dbcon->getResults();
    }
}