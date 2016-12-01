<?php

/**
 * Created by PhpStorm.
 * User: machareyro
 * Date: 30/11/16
 * Time: 15:54
 */
class Connection extends PDO
{
    private $stmt;
    public function __construct($dsn, $username, $password){
        parent::__construct($dsn, $username,$password);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Définition du codage en UTF8
        parent::exec("SET CHARACTER SET utf8");
    }

    public function executeQuery($query, array $parameters=[])
    {
        $this->stmt = parent::prepare($query);
        foreach ($parameters as $name => $value) {
            $this->stmt->bindValue($name, $value[0], $value[1]);
        }
        return $this->stmt->execute();
    }

    public function getResults(){
        return $this->stmt->fetchall();
    }

    public function rowCount(){
        return $this->stmt->rowCount();
    }

    public function trashResults(){
        $this->stmt=null;
    }


}