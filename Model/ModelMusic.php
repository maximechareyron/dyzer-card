<?php

namespace DyzerCard\Model;

class ModelMusique extends Model
{
    private $musique;
    private $modelTitle;
    private $commentaires;

    public function getData()
    {
        return $this->musique;
    }

    public function getTitle()
    {
        return $this->modelTitle;
    }

    public function getCommentaires()
    {
        return $this->commentaires;
    }

    public static function getModelDefaultMusique()
    {
        $model = new self(array());
        $model->musique = \DyzerCard\Metier\Music::getDefaultInstance();
        $model->modelTitle = "Saisie d'une musique";
        return $model;
    }

    public static function getModelMusique($idmusique)
    {
        $model = new self (array());
        $model->musique = \DyzerCard\Persistance\MusiqueGateway::getMusiqueById($model->dataError, $idmusique);
        $model->commentaires = \DyzerCard\Model\ModelCollectionCommentaire::getModelCommentaireMusique($idmusique);
        $model->modelTitle = "Affichage d'une musique";
        return $model;
    }

    public static function getModelMusiqueCreate($inputArray)
    {
        $model = new self(array());
        $model->musique = \DyzerCard\Persistance\MusiqueGateway::createMusique($model->dataError, $inputArray);
        $model->modelTitle = "La musique a été insérée";
        return $model;
    }

    public static function getModelMusiqueUpdate($inputArray)
    {
        $model = new self (array());
        $model->musique = \DyzerCard\Persistance\MusiqueGateway::updateMusique($model->dataError, $inputArray);
        $model->modelTitle = "La musique a été mise à jour";
        return $model;
    }

    public static function deleteMusique($idMusique)
    {
        $model = new self (array());
        @$model->musique = \DyzerCard\Persistance\MusiqueGateway::deleteMusique($model->dataError, $idMusique);
        $model->modelTitle = "Musique supprimée";
        return $model;
    }


    public static function addAvisFavorable($idMusique)
    {
        $model = new self (array());
        $verif = true;
        // Pour tester si l'avis a déjà été donné par cet utilisateur sur cette musique
        \DyzerCard\Persistance\MusiqueUserGateway::addAvis($_SESSION['email'], $idMusique, $model->dataError);
        if (!empty($model->dataError)) {
            $verif = false;
        }
        $model->musique = \DyzerCard\Persistance\MusiqueGateway::addAvisFavorable($model->dataError, $idMusique, $verif);
        $model->modelTitle = "Avis positif ajouté";
        return $model;

    }

    public static function addAvisDefavorable($idMusique)
    {
        $model = new self (array());
        $verif = true;
        // Pour tester si l'avis a déjà été donné par cet utilisateur sur cette musique
        \DyzerCard\Persistance\MusiqueUserGateway::addAvis($_SESSION['email'], $idMusique, $model->dataError);
        if (!empty($model->dataError)) {
            $verif = false;
        }
        $model->musique = \DyzerCard\Persistance\MusicGateway::addAvisDefavorable($model->dataError, $idMusique, $verif);
        $model->modelTitle = "Avis Négatif ajouté";
        return $model;
    }

    public static function addAvisIndifferent($idMusique)
    {
        $model = new self (array());
        $verif = true;
        // Pour tester si l'avis a déjà été donné par cet utilisateur sur cette musique
        \DyzerCard\Persistance\MusicUserGateway::addAvis($_SESSION['email'], $idMusique, $model->dataError);
        if (!empty($model->dataError)) {
            $verif = false;
        }
        //si la vérif est false l'incrémentation ne se fera pas
        $model->musique = \DyzerCard\Persistance\MusicGateway::addAvisIndifferent($model->dataError, $idMusique, $verif);
        $model->modelTitle = "Avis Indifférent ajouté";
        return $model;
    }
}
