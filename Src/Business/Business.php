<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

declare(strict_types=1);

namespace App\Business;

/**
 * Description of Business
 *
 * @author lucas
 */
class Business
{

    protected $repository;

    public function __construct()
    {
        $this->setRepository();
    }

    private function setRepository(): self
    {
        $nameClass = get_class($this);
        $repository = str_replace('App\\Business', 'App\\Repository', $nameClass);
        
        if (class_exists($repository)) {
            $this->repository = new $repository;
        }

        return $this;
    }

}
