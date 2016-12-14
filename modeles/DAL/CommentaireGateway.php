<?php

/**
 * Created by PhpStorm.
 * User: krak
 * Date: 01/12/16
 * Time: 15:18
 */
namespace DAL;

class CommentaireGateway
{
    private $con;

    public function __construct(Connection $con)
    {
        $this->con=$con;

    }

    public function insert($nom, $text, $interet){
        $query= 'INSERT INTO commentaire VALUES(NULL,:nom,:text,:interet)';

        $this ->executeQuery($query, array(
                ':nom' => array($nom,PDO::PARAM_STR),
                ':text' => array($text,PDO::PARAM_STR),
                ':interet' => array($interet,PDO::PARAM_INT)
            )
        );


    }

    public function delete($id){
        $query = ' DELETE FROM commentaire WHERE id=:id';

        $this->executeQuery($query, array(':id' => array($id, PDO::PARAM_INT)));

    }

    public function update($id,$nom,$text,$interet){

        $query = ' UPDATE commentaire SET idcommentaire=:id, nom=:nom, text=:text, interet=:interet WHERE idcommentaire=:id';

        $this->executeQuery($query, array(
            ':id' => array($id, PDO::PARAM_INT),
            ':nom' => array($nom, PDO::PARAM_STR),
            ':text' => array($text, PDO::PARAM_STR),
            ':interet' => array($interet, PDO::PARAM_STR)));


    }

}

?>