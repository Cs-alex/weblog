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

    public function checkUserToken($token) {
        $sql = "SELECT id FROM visitors WHERE token = :token";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':token', $token, PDO::PARAM_STR);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public function insertUserToken($user) {
        $sql = "INSERT INTO visitors (token) VALUES (:user)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':user', $user, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function updateUserLogin($user) {
        $sql = "UPDATE visitors SET last_login = NOW() WHERE token = :user";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':user', $user);
        $stmt->execute();
    }

    public function getColorScheme($user) {
        $sql = "SELECT color_scheme FROM visitors WHERE token = :user";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':user', $user);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public function setColorScheme($user, $scheme) {
        $sql = "UPDATE visitors SET color_scheme = :scheme WHERE token = :user";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':user', $user);
        $stmt->bindparam(':scheme', $scheme);
        $stmt->execute();
    }

}