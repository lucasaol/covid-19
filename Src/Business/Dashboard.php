<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

declare(strict_types=1);

namespace App\Business;

/**
 * Description of Dashboard
 *
 * @author lucas
 */
class Dashboard extends Business
{

    private State $state;
    private Statistic $statistic;

    public function __construct()
    {
        parent::__construct();

        $this->state = new State();
        $this->statistic = new Statistic();
    }

    public function getUpdates(): \App\Repository\Model\Statistic
    {
        return $this->statistic->getInfo();
    }

    public function getInfo(): array
    {
        $confirmed = $this->state->getAllConfirmedCases();
        $deaths = $this->state->getAllDeaths();

        $percentage = ($deaths / $confirmed) * 100;
        $lethality = number_format($percentage, 1, ',', '.');

        return [
            'confirmed' => number_format($confirmed, 0, '', '.'),
            'deaths' => number_format($deaths, 0, '', '.'),
            'lethality' => $lethality
        ];
    }

}
