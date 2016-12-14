<?php

/**
 * Created by PhpStorm.
 * User: machareyro
 * Date: 30/11/16
 * Time: 17:31
 */
namespace DAL;

class ObjectNotFoundException extends Exception
{
    public function __construct($message, $code, Exception $previous)
    {
        parent::__construct($message, $code, $previous);
    }
}