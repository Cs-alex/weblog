<?php

class Errors extends Controller {

    public function __construct() {
        parent::__construct();
        $this->view->render('errors/index');
    }

}