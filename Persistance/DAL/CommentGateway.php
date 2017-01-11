<?php
/**
 * Created by PhpStorm.
 * User: krak
 * Date: 10/01/17
 * Time: 22:38
 */

namespace DyzerCard\Persistance\DAL;

use DyzerCard\Persistance\Connection;


class CommentGateway
{
    private $dbcon;

    public function __construct(Connection $con)
    {
        $this->dbcon = $con;
    }

    public function getComments($musicID)
    {
        global $dataError;
        $query = 'SELECT * FROM comment WHERE idmusique=:musicID ORDER BY datemodif';
        $tab = array(
            ':musicID' => array($musicID, \PDO::PARAM_INT)
        );
        $res = $this->dbcon->prepareAndExecuteQuery($query, $tab);
        if (!$res) {
            $dataError['persistance'] = "Query could not be executed." . " Music ID may not exist.";
        }
        return $this->dbcon->getResults();
    }

    public function addComment($musicID, $iduser, $text)
    {
        {
            global $dataError;
            $query = 'INSERT INTO comment VALUES(:music_id, :iduser, :text, DEFAULT)';
            $tab = array(
                ':music_id' => array($musicID, \PDO::PARAM_INT),
                ':iduser' => array($iduser, \PDO::PARAM_STR),
                ':text' => array($text, \PDO::PARAM_STR),
            );
            try {
                $res = $this->dbcon->prepareAndExecuteQuery($query, $tab);
            } catch (\PDOException $e) {
                $dataError['db'] = $e->getMessage();
            }
            if (!$res) {
                $dataError['database'] = "Comment could not be added to database.";
            }
            return $res;
        }
    }

    public function removeComment($author, $music_id, $date)
    {
        global $dataError;
        $query = 'DELETE FROM comment WHERE idmusique= :music_id AND datemodif=:date_comment AND iduser=:auteur';
        $tab = array(
            ':music_id' => array($music_id, \PDO::PARAM_INT),
            ':auteur' => array($author, \PDO::PARAM_STR),
            ':date_comment' => array($date, \PDO::PARAM_STR)
        );
        try {
            $res = $this->dbcon->prepareAndExecuteQuery($query, $tab);
        } catch (\PDOException $e) {
            $dataError['db'] = $e->getMessage();
        }
        if (!$res) {
            $dataError['persistance'] = "Comment couldn't not be deleted from the database" . " Music ID or User or Comment may not exist.";
        }
        return $res;
    }
}

?>