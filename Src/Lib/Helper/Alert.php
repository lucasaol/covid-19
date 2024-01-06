<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

declare(strict_types=1);

namespace App\Lib\Helper;

/**
 * Description of Alert
 *
 * @author lucas
 */
class Alert
{

    private static array $supportedTypes = [
        'primary', 'secondary', 'success', 'info', 'warning', 'danger', 'dark'
    ];

    private static function validateType(string $type): bool
    {
        if (!in_array($type, self::$supportedTypes)) {
            throw new \InvalidArgumentException('Invalid alert type "' . $type . '".');
        }

        return true;
    }

    private static function getCss(string $type): string
    {
        return 'alert alert-' . $type;
    }

    public static function get(string $message, string $type): string
    {
        self::validateType($type);

        $class = self::getCss($type);
        return '<div class="' . $class . '">' . $message . '</div>';
    }

}
