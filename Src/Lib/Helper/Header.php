<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

declare(strict_types=1);

namespace App\Lib\Helper;

/**
 * Description of Header
 *
 * @author lucas
 */
class Header
{

    private string $title = '';
    private string $description = '';
    private static $instance;

    public static function getInstance(): Header
    {
        if (!self::$instance instanceof Header) {
            self::$instance = new Header();
        }

        return self::$instance;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title): self
    {
        $this->title = $title . ' - ' . APP_NAME;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription($str): self
    {
        $this->description = $str;
        return $this;
    }

}
