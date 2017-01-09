<?php

namespace DyzerCard\Controller;

use DyzerCard\Auth\Authentication;
use DyzerCard\Config\Config;

class ControlAdmin
{
    public static function addTitle()
    {
        global $dataError;
        if ($_SESSION['role'] != 'admin') {
            require(Config::getVues()['pageAuth']);
        }
        else{
            require (Config::getVues()['addTitle']);
        }
    }
}