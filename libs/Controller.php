<?php

class Controller {
    function __construct()
    {
        $this->view = new View();
        $this->config = Config::getConfig();
        $this->base_path = $this->config['paths']['base_path'];
        $this->loadStructure('User');
        $this->User->init(Session::get('userToken'));
        if($this->userLoggedIn = $this->User->logged){
            $this->view->username = $this->User->name;
            $this->view->login = $this->User->login;
            $this->view->userid = $this->User->id;
            $this->view->role = $this->User->role;
            $this->view->logged = true;
        } else {
            $this->view->logged = false;
            $this->view->username = "Gość";
            $this->view->login = "Gość";
        }
    }

    public function loadModel($name) {
        $path = 'Models/'.$name.'.php';

        if(file_exists($path)) {
            require($path);
            $modelName = $name;
            $this->model = new $modelName();
        }
    }

    public function loadStructure($name) {
        $path = 'Utils/'.$name.'.php';

        if(file_exists($path)) {
            require($path);
            $modelName = $name;
            $this->$name = new $modelName();
        }
    }
}