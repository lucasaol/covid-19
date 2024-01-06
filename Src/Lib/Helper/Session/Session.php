<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

declare(strict_types=1);

namespace App\Lib\Helper\Session;

/**
 * Description of Session
 *
 * @author lucas
 */
abstract class Session
{
    const INDEX_TO_SET = '';

    public function get(string $key)
    {
        if (isset($_SESSION[self::INDEX_TO_SET][$key])) {
            return unserialize($_SESSION[self::INDEX_TO_SET][$key]);
        }

        return null;
    }

    protected function set(string $key, $content)
    {
        $save = $_SESSION[self::INDEX_TO_SET][$key] = serialize($content);
        return ($save);
    }

    public function clean($key): bool
    {
        $_SESSION[self::INDEX_TO_SET][$key] = null;
        return true;
    }

    public function cleanAll(): bool
    {
        $_SESSION[self::INDEX_TO_SET] = null;
        return true;
    }

}
