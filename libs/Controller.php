<?php

class Controller {

    function __construct() {
        $this->view = new View();
    }

    public function loadModel($name) {
        $path = 'models/'.$name.'Model.php';
        if (file_exists($path)) {
            require $path;
            $modelName = $name.'Model';
            $this->model = new $modelName;
        }
    }

    public function users() {
        $token = md5($_SERVER['REMOTE_ADDR'].gethostbyaddr($_SERVER['REMOTE_ADDR']));
        $visitor = $this->model->checkUserToken($token);
        if ($visitor == false) {
            $this->model->insertUserToken($token);
        } else {
            $this->model->updateUserLogin($token);
        }
        $this->view->scheme = $this->model->getColorScheme($token);
    }

    public function setScheme() {
        $scheme = $_POST['data'];
        $token = md5($_SERVER['REMOTE_ADDR'].gethostbyaddr($_SERVER['REMOTE_ADDR']));
        $this->model->setColorScheme($token, $scheme);
    }

}