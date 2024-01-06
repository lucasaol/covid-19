<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

declare(strict_types=1);

namespace App\Business;

/**
 * Description of Statistic
 *
 * @author lucas
 */
class Statistic extends Business
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getInfo(): \App\Repository\Model\Statistic
    {
        return $this->repository->getInfo();
    }

    public function updateByModel(\App\Repository\Model\Statistic $model): void
    {
        $this->repository->update($model);
    }

}
