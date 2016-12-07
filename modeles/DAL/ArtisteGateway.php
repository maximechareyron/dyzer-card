<?php

/**
 * Created by PhpStorm.
 * User: machareyro
 * Date: 30/11/16
 * Time: 16:59
 */
class AuteurGateway
{
    private $con;

    public function __construct(Connection $connection)
    {
        $this->con=$connection;
    }

    public function insert($nom){
        $query = 'INSERT INTO artiste VALUES(:nom)';

        $this->con->executeQuery($query, array(
                ':nom' => array($nom, PDO::PARAM_STR)
        ));
    }

    //Retourne 1 si l'artiste existe, 0 sinon

    public function exists($nom){
        $query = 'SELECT  COUNT(*) FROM artiste WHERE nom=:nom';

        $this->con->executeQuery($query, array(
            ':nom' => array($nom, PDO::PARAM_STR)
        ));

        $res=$this->con->getResults();
        return $res['COUNT(*)'];
    }



}