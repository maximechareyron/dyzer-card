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

    public function getLikes()
    {
        global $dataError;
        $query = 'SELECT * FROM like WHERE idmusique=:musicID AND iduser=:iduser';
        $res = $this->dbcon->prepareAndExecuteQuery($query);
        if (!$res) {
            $dataError['persistance'] = "Query could not be executed." . " Music ID may not exist.";
        }

        return $this->dbcon->getResults();
    }

    public function addLike($musicID, $iduser)
    {
        {
            global $dataError;
            $query = 'UPDATE like SET like =like+1 where idmusique=:musicID AND iduser=:iduser';
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
                $dataError['database'] = "Comment could not be added to database.";
            }
            return $res;
        }
    }

?>