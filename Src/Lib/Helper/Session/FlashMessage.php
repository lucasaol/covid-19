<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

declare(strict_types=1);

namespace App\Lib\Helper\Session;

/**
 * Description of FlashMessage
 *
 * @author lucas
 */
final class FlashMessage extends Session
{

    private static $instance;

    const KEY = 'flash_message';

    public static function getInstance(): FlashMessage
    {
        if (!self::$instance instanceof FlashMessage) {
            self::$instance = new FlashMessage();
        }

        return self::$instance;
    }

    public function save(string $message)
    {
        return $this->set(self::KEY, $message);
    }

    public function read(): string
    {
        $message = $this->get(self::KEY);
        return ($message ?? '');
    }

    public function clear()
    {
        return $this->clean(self::KEY);
    }

}
