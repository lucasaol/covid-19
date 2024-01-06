<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

declare(strict_types=1);

namespace App\Business;

/**
 * Description of State
 *
 * @author lucas
 */
class State extends Business
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getBySlug(string $slug): \App\Repository\Model\State
    {
        return $this->repository->getBySlug($slug);
    }

    public function getAllConfirmedCases(): int
    {
        return $this->repository->getAllConfirmedCases();
    }

    public function getAllDeaths(): int
    {
        return $this->repository->getAllDeaths();
    }

    public function updateByModel(\App\Repository\Model\State $model): void
    {
        $this->repository->update($model);
    }

}
