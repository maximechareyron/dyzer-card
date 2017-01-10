<?php

namespace DyzerCard\Persistance\DAL;

use DyzerCard\Persistance\Connection;

class AlbumGateway{
    private $dbcon;

    public function __construct(Connection $con)
    {
        $this->dbcon = $con;
    }

    public function getAllAlbums(){
        global $dataError;
        $query = 'SELECT * FROM album ORDER BY titre ASC';
        $res = $this->dbcon->prepareAndExecuteQuery($query);
        if (!$res) {
            $dataError['persistance'] = "No album were found.";
            return $res;
        }
        return $this->dbcon->getResults();
    }


    public function addAlbum($title)
    {
        global $dataError;
        $query = 'INSERT INTO album VALUES(DEFAULT, :titre)';
        $tab = array(
            ':titre' => array($title, \PDO::PARAM_STR),
        );
        try {
            $res = $this->dbcon->prepareAndExecuteQuery($query, $tab);
        } catch (\Exception $e) {
            $dataError['db'] = $e->getMessage();
        }
        if (!$res) {
            $dataError['database'] = "Title could not be added to database.";
        }
        return $res;
    }

    public function getLatestID()
    {
        global $dataError;
        $query = 'SELECT MAX(idalbum) FROM album';
        $res = $this->dbcon->prepareAndExecuteQuery($query);
        if (!$res) {
            $dataError['database'] = "Unable to recover music ID";
            return $res;
        }
        return $this->dbcon->getResults();
    }
}

