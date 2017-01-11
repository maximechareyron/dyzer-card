<?php

// Source : cours R. Malgouyres, code Source 13.7

namespace DyzerCard\Auth;

use DyzerCard\Config\Sanitize;

/**
 * @brief Permet d'initier une session après saisie du login/password.
 * Permet aussi de restaurer la session d'un utilisateur déjà authentifié. */
class Authentication
{

    /** @brief Test du login/password dans la table User et création d'une session
     * @param $login string Login de l'utilisateur
     * @param $password string Mot de passe de l'utilisateur (en clair)
     * @param $dataError array tableau d'erreurs
     * @return mixed false si problème d'authentification à partir de la session,
     * le rôle de l'utilisateur sinon.
     */
    public static function checkAndInitiateSession($email, $password, &$dataError)
    {
        // On vérifie que le mot de passe (après hashage SHA512) est bien celui de la BD
        $hashedPassword = hash("sha512", $password);
        $role = ModelUser::getRoleUser($dataError, $email, $hashedPassword);
        if ($role === false) {
            return $role;
        }
        $s = SessionHandler::getInstance();
        $s->email = Sanitize::sanitizeItem($email, "email");
        $s->role = Sanitize::sanitizeItem($role, "string");
        return $role;
    }


    public static function disconnection()
    {
        SessionUtils::endSession();
        setcookie("PHPSESSID", "", time() - 1);
    }
}

?>