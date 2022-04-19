<?php

require $_SERVER['DOCUMENT_ROOT']."/config.php";

class conn extends config {
    public $conn;
    public function __construct($db){
        $this->conn = new PDO(self::DBENGN.":host=".self::DBHOST.";dbname=".$db, "root", "");
    }
}