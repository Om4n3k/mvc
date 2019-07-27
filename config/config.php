<?php
return [
    'paths' => [
        'base_path'             => 'http://'.$_SERVER['SERVER_NAME'].'/mvc/',//"http://localhost/mvc/",
        'controllers'           => "Controllers/",
        'models'                => "Models/",
        'views'                 => "Views/",
        'upload'                => "public/upload/"
    ],
    'database' => [
        'host'                  => 'localhost',
        'user'                  => 'root',
        'password'              => '',
        'database'              => 'ticket'
    ],
    'main' => [
        'cookie_expire_time'    => 3600,
        'dev_mode'              => true
    ]
];