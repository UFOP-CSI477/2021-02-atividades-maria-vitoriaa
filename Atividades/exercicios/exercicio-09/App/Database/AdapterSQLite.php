<?php

namespace App\Database;

use Exception;
use PDO;

class AdapterSQLite implements AdapterInterface {
  
    private $dbfile = __DIR__ . "/database.sqlite";

    private $strConnection = "sqlite:";

    private $connection = null;

    public function open() {

        try {

            $this->connection = new PDO($this->strConnection . $this->dbfile);       
        
        } catch(Exception $e) {
            die("Database error: " . $e->getMessage());
        }

    }

    public function close() {
        $this->connection = null;
    }

    public function get() {
        $this->connection;
    }

}