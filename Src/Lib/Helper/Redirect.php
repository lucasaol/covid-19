<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

declare(strict_types=1);

namespace App\Lib\Helper;

final class Redirect
{

    public static function internal(string $url): void
    {
        self::header(URL . $url);
    }

    public static function external(string $url): void
    {
        self::header($url);
    }

    public function moved(string $url): void
    {
        header("HTTP/1.1 301 Moved Permanently");
        self::internal($url);
    }

    public function maintenance(): void
    {
        header("HTTP/1.1 503 Service Unavailable");
        self::internal('error/503');
    }

    private static function header(string $url): void
    {
        header('location: ' . $url);
        exit();
    }

}
