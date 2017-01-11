<?php
/**
 * Created by PhpStorm.
 * User: krak
 * Date: 10/01/17
 * Time: 22:38
 */

namespace DyzerCard\Persistance\DAL;

use DyzerCard\Metier\Commentaire;
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
        $query = 'SELECT * FROM comment WHERE idmusique=:musicID';
        $tab = array(
            ':musicID' => array($musicID, \PDO::PARAM_INT)
        );
        $res = $this->dbcon->prepareAndExecuteQuery($query, $tab);
        if (!$res) {
            $dataError['persistance'] = "Query could not be executed." . " Music ID may not exist.";
        }
        return $this->dbcon->getResults();
    }
    
    public function addComment($musicID,$iduser,$text)
    {
        {
            global $dataError;
            $query = 'INSERT INTO comment VALUES(:music_id, :iduser, DEFAULT, :text)';
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
}

?>