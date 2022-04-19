<?php

require $_SERVER['DOCUMENT_ROOT']."/Model/conn.php";

class query extends conn {
    public function query($query){
        $query = $this->conn->prepare($query);
        $query->execute();
        return $query;
    }
}