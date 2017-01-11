<?php

namespace DyzerCard\Persistance\DAL;

use DyzerCard\Persistance\Connection;


class LikeGateway
{
    private $dbcon;

    public function __construct(Connection $con)
    {
        $this->dbcon = $con;
    }

    public function getLikes($musicID)
    {
        global $dataError;
        $query = 'SELECT COUNT(*) FROM jaime WHERE idmusique=:musicID';
        $tab = array(
            ':musicID' => array($musicID, \PDO::PARAM_INT)
        );
        $res = $this->dbcon->prepareAndExecuteQuery($query, $tab);
        if (!$res) {
            $dataError['persistance'] = "Query could not be executed." . " Music ID may not exist.";
        }

        return $this->dbcon->getResults();
    }

    public function getNLikes($musicID)
    {
        global $dataError;
        $query = 'SELECT COUNT(*) FROM jaimepas WHERE idmusique=:musicID';
        $tab = array(
            ':musicID' => array($musicID, \PDO::PARAM_INT)
        );
        $res = $this->dbcon->prepareAndExecuteQuery($query, $tab);
        if (!$res) {
            $dataError['persistance'] = "Query could not be executed." . " Music ID may not exist.";
        }
        return $this->dbcon->getResults();
    }

    public function addLike($musicID, $iduser)
    {
        {
            global $dataError;
            $query = 'INSERT INTO jaime VALUES(idmusique=:musicID, iduser=:iduser)';
            $tab = array(
                ':musicID' => array($musicID, \PDO::PARAM_INT),
                ':iduser' => array($iduser, \PDO::PARAM_STR),
            );
            try {
                $res = $this->dbcon->prepareAndExecuteQuery($query, $tab);
            } catch (\PDOException $e) {
                $dataError['db'] = $e->getMessage();
            }
            if (!$res) {
                $dataError['database'] = "Title could not be liked.";
            }
            return $res;
        }
    }
}
?>