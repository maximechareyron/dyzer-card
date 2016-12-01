<?php

/**
 * Created by PhpStorm.
 * User: machareyro
 * Date: 30/11/16
 * Time: 16:43
 */
class TitreGateway
{

private $con;

    public function __construct(Connection $connection)
    {
        $this->con=$connection;
    }

    private function insertTitre($nom, $nom_artiste, $id_album){
        $query = 'INSERT INTO titre VALUES(NULL, :nom, :artiste, :album, SYSDATE, 0,0)';

        $this->con->executeQuery($query, array(
            ':nom' => array($nom, PDO::PARAM_STR),
            ':artiste' => array($nom_artiste, PDO::PARAM_STR),
            ':album' => array($id_album, PDO::PARAM_INT)
        ));

    }

    public function insert($nom, $nom_Artiste, $nomAlbum){
        $ag = new AlbumGateway();

        $res=$ag->exists($nomAlbum); //Renvoie false si l'album n'existe pas, true sinon

        if($res!=false){
            $this->insertTitre($nom, $nom_Artiste, $res);
        }
        else{
            throw new ObjectNotFoundException("album inexistant");
        }
    }


    public function delete($id){
        $query = 'DELETE FROM titre WHERE idTitre=:id';

        $this->con->executeQuery($query, array(
            ':id' => array($id, PDO::PARAM_INT)
        ));
    }


}



?>
}