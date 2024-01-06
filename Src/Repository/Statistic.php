<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

declare(strict_types=1);

namespace App\Repository;

/**
 * Description of Statistic
 *
 * @author lucas
 */
class Statistic extends Repository
{

    public function __construct()
    {
        parent::__construct();

        $this->setDataSource();
    }

    protected function setDataSource(): void
    {
        $this->setTable('estatisticas');
    }

    public function update(Model\Statistic $model): void
    {
        $db = $this->getConn();
        
        $data = [
            'verificado_em' => $model->getVerifiedAt()->format('Y-m-d H:i:s'),
            'atualizado_em' => $model->getUpdatedAt()->format('Y-m-d H:i:s')
        ];
        
        $db->where('id', 1);
        
        if (!$db->update($this->getTable(), $data)) {
            throw new Exception('Failed to update state: ' . $db->getLastError());
        }
    }

    public function getInfo(): Model\Statistic
    {
        $conn = $this->getConn();

        $conn->where('id', 1);
        $data = $conn->getOne($this->getTable());

        if (empty($data)) {
            throw new Database\DatabaseException();
        }

        $state = $this->setModelByDatabase($data);
        return $state;
    }

    private function setModelByDatabase($data): Model\Statistic
    {
        $sufix = $this->getSufix();

        $state = new Model\Statistic();
        $state->setVerifiedAt($data['verificado_em'])
                ->setUpdatedAt($data['atualizado_em']);

        return $state;
    }

}
