<?php

class Database extends PDO {

    public function __construct() {
        parent::__construct('mysql:host=b14a62853801ce:b0fd6c40@eu-cdbr-west-02.cleardb.net;dbname=heroku_0236e2be96e9508;charset=utf8mb4', 'b14a62853801ce', 'b0fd6c40');
    }

}