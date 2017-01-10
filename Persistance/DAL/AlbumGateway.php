<?php

namespace DyzerCard\Persistance\DAL;

use DyzerCard\Persistance\Connection;

class AlbumGateway{
    private $dbcon;

    public function __construct(Connection $con)
    {
        $this->dbcon = $con;
    }

    public function getAllAlbums(){
        global $dataError;
        $query = 'SELECT * FROM album ORDER BY titre ASC';
        $res = $this->dbcon->prepareAndExecuteQuery($query);
        if (!$res) {
            $dataError['persistance'] = "No album were found.";
            return $res;
        }
        return $this->dbcon->getResults();
    }
}

