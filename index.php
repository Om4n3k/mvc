<?php

define('FORM_ERROR_ARRAY','errorsForm');
define('FORM_INFO_ARRAY','infosForm');
require('Utils/Utils.php');

function __autoload($class) {
    require("libs/$class.php");
}
// Autoload

Session::init();
$app = new Bootstrap();
$app->init();