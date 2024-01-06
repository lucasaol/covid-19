<?php

declare(strict_types=1);

if ($_SERVER['HTTP_HOST'] === 'localhost') {
    define('ENVIRONMENT', 'development');
    define('URL', 'http://localhost/covid-19/');
    define('DEBUG', 2);
} else {
    define('ENVIRONMENT', 'production');
    define('URL', 'http://covid-19.devlucas.com/');
    define('DEBUG', 0);
}