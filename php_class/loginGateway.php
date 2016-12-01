<?php

/**
 * Created by PhpStorm.
 * User: krak
 * Date: 01/12/16
 * Time: 15:32
 */
class loginGateway
{
    private $con;

    public function __construct(Connection $con)
    {
        $this->con=$con;

    }

    public function insert($login, $password){



        $query= 'INSERT INTO user VALUES(:login, :password)';

        $this ->executeQuery($query, array(
                ':login' => array($login,PDO::PARAM_STR),
                ':password' => array($password,PDO::PARAM_STR),
                )
        );


    }

    public function delete($login){
        $query = ' DELETE FROM user WHERE login=:login';

        $this->executeQuery($query, array(':login' => array($login, PDO::PARAM_STR)));

    }

    public function update($login,$password){

        $query = ' UPDATE user SET :password WHERE login=:login';

        $this ->executeQuery($query, array(
                                            ':login' => array($login,PDO::PARAM_STR),
                                            ':password' => array($password,PDO::PARAM_STR),
                                            )
            );


    }
}