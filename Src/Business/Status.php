<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

declare(strict_types=1);

namespace App\Business;

/**
 * Description of Status
 *
 * @author lucas
 */
class Status extends Business
{

    public function __construct()
    {
        parent::__construct();
    }

    public function run(): void
    {
        $states = $this->requestStates();
        $this->runUpdateStates($states);

        $verified = $this->requestGeneral();
        $this->runUpdateVerified($verified);
    }

    private function requestGeneral(): \stdClass
    {
        $client = new \App\Lib\Saude\Client(TOKEN_API);
        return $client->getGeneral();
    }

    private function runUpdateVerified(\stdClass $verified): void
    {
        $statisticsBusiness = new Statistic();

        $now = new \DateTime();

        $model = new \App\Repository\Model\Statistic();
        $model->setVerifiedAt($now->format('Y-m-d H:i:s'))
                ->setUpdatedAt($verified->updatedAt, DATE_RFC3339_EXTENDED);

        $statisticsBusiness->updateByModel($model);
    }

    private function requestStates(): array
    {
        $client = new \App\Lib\Saude\Client(TOKEN_API);
        return $client->getStates();
    }

    private function runUpdateStates(array $data): void
    {
        $stateBusiness = new State();
        foreach ($data as $key => $item) {

            $state = $this->setModelStateByResponseObject($item);
            $stateBusiness->updateByModel($state);

            unset($state);
        }
    }

    private function setModelStateByResponseObject(\stdClass $item)
    {
        $state = new \App\Repository\Model\State();

        $state->setName($item->nome)
                ->setObjectId($item->objectId)
                ->setConfirmed($item->qtd_confirmado)
                ->setDeaths($item->qtd_obito)
                ->setIncidence($item->qtd_incidencia)
                ->setLethality(floatval($item->letalidade))
                ->setUpdatedAt($item->updatedAt, DATE_RFC3339_EXTENDED);

        return $state;
    }

}
