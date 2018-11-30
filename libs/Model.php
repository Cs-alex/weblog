<?php

class Model {

    function __construct() {
        $this->db = new Database();
    }

    public function load($name) {
        require 'models/'.$name.'.php';
        $model = new $name;
        return $model;
    }

}