<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

declare(strict_types=1);

header('Content-Type: text/html; charset=UTF-8');
date_default_timezone_set('America/Sao_Paulo');
setlocale(LC_TIME, 'pt_BR');

session_start();

require_once 'configConstants.php';
require_once 'configEnvironment.php';
require_once 'configDatabase.php';
require_once 'configErrors.php';
