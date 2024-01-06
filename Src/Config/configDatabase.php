<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

declare(strict_types=1);

if (ENVIRONMENT === 'development') {
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'covid');
} elseif (ENVIRONMENT === 'homologation') {
    define('DB_USER', '');
    define('DB_PASS', '');
    define('DB_NAME', '');
} else {
    define('DB_USER', 'devlucas_covid');
    define('DB_PASS', 'W1r3iF@Kge[~Mi');
    define('DB_NAME', DB_USER);
}

define('DB_HOST', 'localhost');
