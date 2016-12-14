<?php

/**
 * Created by PhpStorm.
 * User: machareyro
 * Date: 30/11/16
 * Time: 16:43
 */
namespace DAL;

class TitreGateway
{

private $con;

    public function __construct(Connection $connection)
    {
        $this->con=$connection;
    }

    private function insertTitre($nom, $nom_artiste, $id_album)
    {
        $query = 'INSERT INTO titre VALUES(NULL, :nom, :artiste, :album, SYSDATE, 0,0)';

        $this->con->executeQuery($query, array(
            ':nom' => array($nom, PDO::PARAM_STR),
            ':artiste' => array($nom_artiste, PDO::PARAM_STR),
            ':album' => array($id_album, PDO::PARAM_INT)
        ));

    }

    public function insert($nom, $nom_Artiste, $nomAlbum)
    {
        $ag = new AlbumGateway();

        $res=$ag->exists($nomAlbum); //Renvoie false si l'album n'existe pas, true sinon

        if($res!=false){
            $this->insertTitre($nom, $nom_Artiste, $res);
        }
        else{
            throw new ObjectNotFoundException("album inexistant");
        }
    }


    public function delete($id)
    {
        $query = 'DELETE FROM titre WHERE idTitre=:id';

        $this->con->executeQuery($query, array(
            ':id' => array($id, PDO::PARAM_INT)
        ));
    }
    public function update($id,$nom,$nomartiste,$nomalbum)
    {
        $idalbum=searchIdByName($nomalbum);

        $query = ' UPDATE titre SET nom=:nom, nomartiste=:nomartiste, nomalbum=:nomalbum, idalbum=:idalbum WHERE idtitre=:id';

        $this->executeQuery($query, array(
            ':nom' => array($nom, PDO::PARAM_STR),
            ':nomartiste' => array($nomartiste, PDO::PARAM_STR),
            ':nomalbum' => array($nomalbum, PDO::PARAM_STR),
            ':idalbum' => array($idalbum, PDO::PARAM_INT),
            ':id' => array($id, PDO::PARAM_INT)));


    }

}



?>
}