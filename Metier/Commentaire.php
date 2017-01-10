<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 04/01/17
 * Time: 16:06
 */
namespace DyzerCard\Metier;

use DyzerCard\Config\Config;

class Commentaire
{
    public $idMusique;
    public $idUser;
    public $date;
    public $text;

    public function __construct($musicID, $userID, $date,$text)
    {
        $this->idMusique = $musicID;
        $this->idUser = $userID;
        $this->date = $date;
        $this->text = $text;
    }



}
