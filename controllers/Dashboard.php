<?php

class Dashboard extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->users();
        $this->view->articles = $this->model->autoLoadArticles(NULL, 0);
        $this->view->render('dashboard/index');
    }

    public function order() {
        $this->view->articles = $this->model->autoLoadArticles(NULL, $_POST['data']);
    }

    public function search() {
        $this->users();
        $this->view->articles = $this->model->autoLoadArticles($_GET['q'], $_POST['data']);
        $this->view->render('dashboard/index');
    }

}