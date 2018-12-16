<?php

class Database extends PDO {

    public function __construct() {
        parent::__construct('mysql:host=localhost;dbname=weblog;charset=utf8mb4', 'root', '');
    }

}