<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

declare(strict_types=1);

namespace App\Lib\Helper\Session;

/**
 * Description of Security
 *
 * @author lucas
 */
class Security extends Session
{

    private $instance;

    const KEY = 'regen';

    public static function getInstance(): Security
    {
        if (!self::$instance instanceof Security) {
            self::$instance = new Security();
        }

        return self::$instance;
    }

    public function verify()
    {
        if (session_status() === PHP_SESSION_ACTIVE) {
            if (!isset($this->getTime())) {
                $this->setTime();
            }

            $this->regenerate();
        }
    }

    private function regenerate()
    {
        $regen = 60 * 5;

        if ($this->getTime() + $regen < time()) {
            $this->setTime();
            session_regenerate_id(true);
        }
    }

    private function getTime()
    {
        return $this->get(self::KEY);
    }

    private function setTime()
    {
        $this->set(self::KEY, time());
    }

}
