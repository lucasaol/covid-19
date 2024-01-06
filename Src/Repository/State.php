<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

declare(strict_types=1);

namespace App\Repository;

/**
 * Description of State
 *
 * @author lucas
 */
class State extends Repository
{

    public function __construct()
    {
        parent::__construct();

        $this->setDataSource();
    }

    protected function setDataSource(): void
    {
        $this->setTable('estados');
    }

    public function update(Model\State $model): void
    {
        $db = $this->getConn();
        
        $data = [
            'confirmados' => $model->getConfirmed(),
            'obitos' => $model->getDeaths(),
            'incidencia' => $model->getIncidence(),
            'letalidade' => $model->getLethality(),
            'atualizado_em' => $model->getUpdatedAt()->format('Y-m-d H:i:s')
        ];
        
        $db->where('object_id', $model->getObjectId());
        
        if (!$db->update($this->getTable(), $data)) {
            throw new Exception('Failed to update state: ' . $db->getLastError());
        }
    }

    public function getAllConfirmedCases(): int
    {
        $db = $this->getConn();

        $sum = $db->getValue($this->getTable(), 'SUM(confirmados)');
        return (int) $sum ?? 0;
    }

    public function getAllDeaths(): int
    {
        $db = $this->getConn();

        $sum = $db->getValue($this->getTable(), 'SUM(obitos)');
        return (int) $sum ?? 0;
    }

    public function getBySlug(string $slug): Model\State
    {
        $db = $this->getConn();

        $db->where('slug', $slug);
        $data = $db->getOne($this->getTable());

        if (empty($data)) {
            throw new \App\Controller\Exception\InvalidUrlException('Invalid State url.');
        }

        $state = $this->setModelByDatabase($data);
        return $state;
    }

    private function setModelByDatabase($data): Model\State
    {
        $state = new Model\State();
        
        $state->setId($data['id'])
                ->setName($data['nome'])
                ->setUf($data['sigla'])
                ->setIncidence($data['incidencia'])
                ->setConfirmed($data['confirmados'])
                ->setDeaths($data['obitos'])
                ->setLethality($data['letalidade'])
                ->setObjectId($data['object_id'])
                ->setUpdatedAt($data['atualizado_em']);

        return $state;
    }

}
