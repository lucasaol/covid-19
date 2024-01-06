<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

declare(strict_types=1);

namespace App;

/**
 * Description of Factory
 *
 * @author lucas
 */
class Factory
{
    private static array $classes = [
        'Header' => '\App\Lib\Helper\Header',
        'Connection' => '\App\Repository\Database\Connection',
        'FlashMessage' => '\App\Lib\Helper\Session\FlashMessage',
        'Security' => '\App\Lib\Helper\Session\Security',
    ];

    public static function getInstance(string $class)
    {
        self::isValidInstance($class);

        $namespace = self::getClassWithNamespace($class);
        return $namespace::getInstance();
    }

    private static function getClassWithNamespace(string $class)
    {
        return self::$classes[$class];
    }

    private static function isValidInstance(string $class): bool
    {
        if (!array_key_exists($class, self::$classes)) {
            throw new \InvalidArgumentException('Invalid @param $class "' . $class . '" Factory::getInstance();');
        }

        return true;
    }

}
