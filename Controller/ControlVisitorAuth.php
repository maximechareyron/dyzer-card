<?php

namespace DyzerCard\Controller;

use DyzerCard\Auth\Authentication;
use DyzerCard\Config\Config;

class ControlVisitorAuth
{
    public static function logout()
    {
        Authentication::disconnection();
        //Changement de l'action
        require(Config::getVues()['default']);
    }
}