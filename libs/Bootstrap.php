<?php

class Bootstrap {

    function __construct() {
        $url = isset($_GET['url']) ? explode('/', trim($_GET['url'], '/')) : null;

        if (empty($url[0])) {
            require 'controllers/Dashboard.php';
            $controller = new Dashboard();
            return false;
        }

        $file = 'controllers/'.$url[0].'.php';

        if (file_exists($file)) {
            require $file;
        } else {
            require 'controllers/Errors.php';
            $controller = new Errors();
            return false;
        }

        $controller = new $url[0];
        $controller->loadModel($url[0]);

        if (isset($url[2])) {
            $controller->{$url[1]}($url[2]);
        } else {
            if (isset($url[1])) {
                $controller->{$url[1]}();
            } else {
                $controller->index();
            }
        }
    }

}