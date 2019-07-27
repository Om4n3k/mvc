<?php

class Model {
    public $db;
    public $config;
    public $base_path;

    function __construct()
    {
        $this->db = new Database('mysql','localhost','ticket','root','');
        $this->config = Config::getConfig();
        $this->base_path = $this->config['paths']['base_path'];
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