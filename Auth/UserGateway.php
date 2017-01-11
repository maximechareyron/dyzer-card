<?php

namespace DyzerCard\Auth;

use DyzerCard\Persistance\Connection;

/** @brief Permet d'accéder et de mettre à jour les données de la table User
 * dans la base de données (au moins les opérations CRUD). */
class UserGateway
{
    private $dbcon;

    public function __construct(Connection $con)
    {
        $this->dbcon = $con;
    }

    /** @brief Permet d'obtenir le rôle d'un utilisateur à partir de son login et son mot de passe.
     * Renvoie false si echec lors de l'authentification
     * @param $dataError array Tableau d'erreur
     * @param $login string Identifiant de l'utilisateur sur le site
     * @param $hashedPassword string Mot de passe de l'utilisateur crypté
     * @return mixed Array vide si identifiants invalide, données de l'utilisteur sinon
     */
    public function getRoleByPassword(&$dataError, $login, $hashedPassword)
    {
        $query = 'SELECT role FROM admin WHERE iduser=:login AND passwd=:passwd';
        $tab = array(
            ':login' => array($login, \PDO::PARAM_STR),
            ':passwd' => array($hashedPassword, \PDO::PARAM_STR)
        );
        $res = $this->dbcon->prepareAndExecuteQuery($query, $tab);
        if (!$res) {
            $dataError['persistance'] = "Query could not be executed. Wrong login or password.";
            return $res;
        }
        return $this->dbcon->getResults();
    }


    /** @brief Créée un utilisateur dans la BD
     * @param $dataError array Tableau d'erreurs à remplir en cas de besoin
     * @param $inputArray array Tableau d'entrée contenant un login (e-mail), un mot de passe (non crypté), et un rôle
     * @return bool
     */
    public function createUser($inputArray)
    {
        global $dataError;
        $inputArray['password'] = hash("sha512", $inputArray['password']);
        $query = 'INSERT INTO admin VALUES (:login,:passwd,:role)';
        $tab = array(
            ':login' => array($inputArray['login'], \PDO::PARAM_STR),
            ':passwd' => array($inputArray['password'], \PDO::PARAM_STR),
            ':role' => array($inputArray['role'], \PDO::PARAM_STR)
        );
        try {
            $res = $this->dbcon->prepareAndExecuteQuery($query, $tab);
        } catch (\PDOException $e) {
            $dataError['db'] = $e->getMessage();
        }
        if (!$res) {
            $dataError['persistance'] = "Query could not be executed. Login may already exist in database.";
        }
        return $res;
    }


    /** @supprime un utilisateur de la table admin
     * @param $login string login de l'utilisateur
     * @return bool
     */
    public function deleteUser($login){
        global $dataError;
        $query = 'DELETE FROM admin WHERE iduser=:login';
        $tab = array(
            ':login' => array($login, \PDO::PARAM_STR)
        );
        try{
            $res = $this->dbcon->prepareAndExecuteQuery($query, $tab);
        } catch (\PDOException $e){
            $dataError['db'] = $e->getMessage();
        }
        if(!$res){
            $dataError['persistance']= "Query could not be executed. Login may not exist in database.";
        }
        return $res;
    }
}

?>