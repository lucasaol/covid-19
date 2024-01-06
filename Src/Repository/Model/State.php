<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

declare(strict_types=1);

namespace App\Repository\Model;

/**
 * Description of State
 *
 * @author lucas
 */
class State
{

    private int $id;
    private string $name;
    private string $uf;
    private int $incidence;
    private int $confirmed;
    private int $deaths;
    private float $lethality;
    private string $objectId;
    private \DateTime $updatedAt;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getUf(): string
    {
        return $this->uf;
    }

    public function setUf(string $uf): self
    {
        if (strlen($uf) > 2) {
            throw new \InvalidArgumentException('Invalid @param $uf "' . $uf . '" length on State object.');
        }

        $this->uf = strtoupper($uf);
        return $this;
    }

    public function getIncidence(): int
    {
        return $this->incidence;
    }

    public function setIncidence(int $qtd): self
    {
        if ($qtd < 0) {
            throw new \InvalidArgumentException('Invalid @param incidence $qtd "' . $qtd . '" on State object.');
        }

        $this->incidence = $qtd;
        return $this;
    }

    public function getConfirmed(): int
    {
        return $this->confirmed;
    }

    public function setConfirmed(int $qtd): self
    {
        if ($qtd < 0) {
            throw new \InvalidArgumentException('Invalid @param confirmed $qtd "' . $qtd . '" on State object.');
        }

        $this->confirmed = $qtd;
        return $this;
    }

    public function getDeaths(): int
    {
        return $this->deaths;
    }

    public function setDeaths(int $qtd): self
    {
        if ($qtd < 0) {
            throw new \InvalidArgumentException('Invalid @param deaths $qtd "' . $qtd . '" on State object.');
        }

        $this->deaths = $qtd;
        return $this;
    }

    public function getLethality(): float
    {
        return $this->lethality;
    }

    public function setLethality(float $percent): self
    {
        if ($percent < 0 || $percent > 100) {
            //throw new \InvalidArgumentException('Invalid @param lethality $qtd "' . $percent . '" on State object.');
        }

        $this->lethality = $percent;
        return $this;
    }

    public function getObjectId(): string
    {
        return $this->objectId;
    }

    public function setObjectId(string $id): self
    {
        $this->objectId = $id;
        return $this;
    }

    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(string $inputDate, $format = 'Y-m-d H:i:s'): self
    {
        $datetime = \DateTime::createFromFormat($format, $inputDate);
        if (!$datetime instanceof \DateTime) {
            throw new \InvalidArgumentException('Invalid @param $datetime "' . $inputDate . '" on State object.');
        }

        $this->updatedAt = $datetime;
        return $this;
    }

}
