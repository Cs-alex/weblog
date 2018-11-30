<?php

class Dashboard extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $token = md5($_SERVER['REMOTE_ADDR'].gethostbyaddr($_SERVER['REMOTE_ADDR']));
        $visitor = $this->model->checkUserToken($token);
        if ($visitor == false) {
            $this->model->insertUserToken($token);
        } else {
            $this->model->updateUserLogin($token);
        }
        $this->view->articles = $this->model->autoLoadArticles(NULL);
        $this->view->render('dashboard/index');
    }

    public function search() {
        $token = md5($_SERVER['REMOTE_ADDR'].gethostbyaddr($_SERVER['REMOTE_ADDR']));
        $visitor = $this->model->checkUserToken($token);
        if ($visitor == false) {
            $this->model->insertUserToken($token);
        } else {
            $this->model->updateUserLogin($token);
        }
        $this->view->articles = $this->model->autoLoadArticles($_GET['q']);
        $this->view->render('dashboard/index');
    }

}