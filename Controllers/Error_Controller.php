<?php

class Error_Controller extends Controller {
    function __construct()
    {
        parent::__construct();
    }

    public function index() {
        $this->view->title = 'Błąd';
        $this->view->render('error/index');
    }
}