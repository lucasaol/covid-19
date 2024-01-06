<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

declare(strict_types=1);


define('WWW_ROOT', __DIR__ . DIRECTORY_SEPARATOR);

require_once WWW_ROOT . 'Src/Config/configInit.php';

$loader = require WWW_ROOT . '/vendor/autoload.php';
$loader->addPsr4('App\\', WWW_ROOT . '/Src/');
