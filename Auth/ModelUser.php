<?php

// Source : cours R. Malgouyres, code Source 13.5

namespace DyzerCard\Auth;
use DyzerCard\Config\Config;

/** @brief Classe Modèle pour les données de l'utilisateur
 * e-mail (qui sert ici de login), rôle (visiteur, admin, etc.)
 * Les données peuvent venir d'une session ou d'un accès à la BD. */
class ModelUser
{

    /** @brief Donne le role de l'utilisateur si il existe dans la base
     * @param $email string e-mail de l'utilisateur servant d'ID unique
     * @param $hashedPassword string mot de passe après hashage.
     * @return mixed Role de l'utilisateur ou false si le user n'existe pas dans la base
     * ou si problème avec la base.*/
    public static function getRoleUser(&$dataError, $email, $hashedPassword)
    {
        $gw = new UserGateway(Config::createConnection());
        // Appel de la couche d'accès aux données :
        $role = $gw->getRoleByPassword($dataError, $email, $hashedPassword);
        // Si le couple login/password n'existe pas en base :
        if ($role === false) {
            return false;
        }
        if (empty($role)) {
            $dataError['login'] = "Invalid login or password.";
            return false;
        }
        return $role[0]['role'];
    }


    /** @brief Créée un nouvel utilisateur
     * @param $inputArray array Tableau d'entrée contenant les données d'un user
     * @return bool contenant les données du nouveau user
     */
    public static function createUser(&$dataError, $inputArray)
    {
        $gw = new UserGateway((Config::createConnection()));
        return $gw->createUser($dataError, $inputArray);
    }
}

?>

