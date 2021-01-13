<?php
require_once 'dbconfig.php';
require_once 'config.php';
require_once '../lib/functions.php';
spl_autoload_register(function ($class) {
    include '../class/' . $class . '.php';
});
