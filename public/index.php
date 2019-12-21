<?php

namespace PHPMVC;
use PHPMVC\LIB\FrontController;
use PHPMVC\LIB\Language;
use PHPMVC\LIB\Template;

session_start();

if (!defined('DS')){
    define('DS',DIRECTORY_SEPARATOR);
}

require '..' . DS . 'app' . DS . 'config' . DS . 'config.php';
require APP_PATH . DS . 'lib' . DS . 'autoload.php';

if (!isset($_SESSION['lang'])){
    $_SESSION['lang'] = APP_DEFAULT_LANGUAGE;
}

$template_parts = require '..' . DS . 'app' . DS . 'config' . DS . 'templateconfig.php';

$template = new Template($template_parts);
$language = new Language();

$frontcontroller = new FrontController($template,$language);
$frontcontroller->dispatch();