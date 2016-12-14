<?php

namespace modeles;
/**
 * Created by PhpStorm.
 * User: tadetaxisd
 * Date: 07/12/16
 * Time: 16:50
 */
class Modele
{
    function ajouterTitre($nom,$nomartiste,$nomalbum)
    {
        if (!isExist($nomalbum)) { // méthode dans AlbumGateway
            echo "L'album n'existe pas ";
            //rediriger pour créer un album
        }


        insert($nom, $nomartiste, $nomalbum); //Methode INSERER dans TitreGateway
        $id=searchIdByName($nom);
        $ret = afficherTitre($id);

        return $ret;
    }
    function supprimerTitre($nom)
    {

        $id=searchIdByName($nom); //Méthode de recherche dans TitreGateway
        delete($id); //Méthode delete dans TitreGateway

    }

    function modifierTitre($nom,$nomartiste,$nomalbum)
    {
        $id=searchIdByName($nom); //Méthode dans TitreGateway
        update($id,$nom,$nomartiste,$nomalbum); // Méthode UPDATE dans TitreGateway
    }


    function ajouterAlbum($nom,$nomartiste,$infos,$couverture,$annee)
    {
        if(!isExist($nomartiste)) // Méthode dans ArtisteGateway
        {
            //Rediriger vers création artiste
        }
        insert($nom,$nomartiste,$infos,$couverture,$annee); //Méthode INSERER dans AlbumGateway
        $id=searchIdByName($nom); // Méthode dans AlbumGateway
        $ret = afficherAlbum($id); // Méthode dans AlbumGateway

        return $ret;
    }


    function supprimerAlbum($nom)
    {
        $id=searchIdByName($nom); // Méthode dans AlbumGateway
        delete($id); // Méthode dans AlbumGateway
    }

    function modifierAlbum($nom,$nomartiste,$infos,$couverture,$annee)
    {

        $id=searchIdByName($nom); // Méthode dans AlbumGateway
        update($id,$nom,$nomartiste,$infos,$couverture,$annee);

    }

    
}

?>