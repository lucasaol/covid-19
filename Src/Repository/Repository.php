<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

declare(strict_types=1);

namespace App\Repository;

use App\Repository\Database\Connection;

/**
 * Description of Repository
 *
 * @author lucas
 */
abstract class Repository
{
    private $conn;
    private string $table;
    private string $sufix = '';
    
    protected abstract function setDataSource(): void;

    public function __construct()
    {
        $this->conn = \App\Factory::getInstance('Connection');
    }

    protected function getConn()
    {
        return $this->conn;
    }

    protected function getTable(): string
    {
        return $this->table;
    }

    protected function setTable(string $table): self
    {
        $this->table = $table;
        return $this;
    }

    protected function getSufix(): string
    {
        return $this->sufix;
    }

    protected function setSufix(string $sufix): self
    {
        $this->sufix = $sufix;
        return $this;
    }

}
