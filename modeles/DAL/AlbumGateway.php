<?php
/**
 * Created by PhpStorm.
 * User: tadetaxisd
 * Date: 30/11/16
 * Time: 16:48
 */
namespace DAL;

class AlbumGateway{

    private $con;

    public function __construct(Connection $con)
    {
        $this->con=$con;

    }

    public function insert($nom,$idartiste,$infos,$couverture,$annee){
        $query= 'INSERT INTO album VALUES(NULL,:nom,:idartiste,:infos,:couverture,:annee)';

        $this ->executeQuery($query, array(
                                            ':nom' => array($nom,PDO::PARAM_STR),
                                            ':idartiste' => array($idartiste,PDO::PARAM_INT),
                                            ':infos' => array($infos,PDO::PARAM_STR),
                                            ':couverture' => array($couverture,PDO::PARAM_STR),
                                            ':annee' => array($annee,PDO::PARAM_INT)
            )
        );
    }
    public function searchIdByName($name){
        $query = 'SELECT id from album where nom=:$name';

        $this->executeQuery($query, array(':name' => array($name,PDO::PARAM_STR)));

        $res = $this->con->getResults();

        return $res;
    }


    public function delete($nom){
        $query = ' DELETE FROM album WHERE nom=:nom';

        $this->executeQuery($query, array(':nom' => array($nom,PDO::PARAM_STR)));
    }


    public function delete_verification($nom){

        $id=$this->searchIdByName($nom);
        $query = ' SELECT titre from titre where idalbum=:id';

        $this->executeQuery($query, array(':id' => array($id,PDO::PARAM_INT)));

        $res = $this ->con->getResults(); // SAVOIR SI IL Y A DES TITRES CONTENUS DANS L'ALBUM


        if($res != NULL){
            //Il y a des titres.
            $query = 'DELETE FROM titre where idalbum=:id';

            $this -> executeQuery($query, array(':id' => array($id,PDO::PARAM_INT)));

        }

        delete($nom);
    }

    public function update($id,$nom,$nomartiste,$infos,$couverture,$annee){

        $query = ' UPDATE album SET nom=:nom, nomartiste=:nomartiste, infos=:infos, couverture=:couverture, annee=:annee WHERE idalbum=:id';

        $this->executeQuery($query, array(
                                            ':id' => array($id, PDO::PARAM_INT),
                                            ':nom' => array($nom, PDO::PARAM_STR),
                                            ':nomartiste' => array($nomartiste, PDO::PARAM_STR),
                                            ':infos' => array($infos, PDO::PARAM_STR),
                                            ':couverture' => array($couverture, PDO::PARAM_STR),
                                            ':annee' => array($annee, PDO::PARAM_INT)));

        $res = $this->con->getResults();
        
    }





}

?>