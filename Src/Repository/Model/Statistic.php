<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

declare(strict_types=1);

namespace App\Repository\Model;

/**
 * Description of Statistic
 *
 * @author lucas
 */
class Statistic
{

    private \DateTime $updatedAt;
    private \DateTime $verifiedAt;

    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt($datetime, string $format = 'Y-m-d H:i:s'): self
    {
        $datetimeObj = $this->getValidDateTime($datetime, $format);

        $this->updatedAt = $datetimeObj;
        return $this;
    }

    public function getVerifiedAt(): \DateTime
    {
        return $this->verifiedAt;
    }

    public function setVerifiedAt($datetime, string $format = 'Y-m-d H:i:s'): self
    {
        $datetimeObj = $this->getValidDateTime($datetime, $format);

        $this->verifiedAt = $datetimeObj;
        return $this;
    }

    private function getValidDateTime(string $inputDate, string $format = 'Y-m-d H:i:s'): \DateTime
    {
        $datetime = \DateTime::createFromFormat($format, $inputDate);
        if (!$datetime instanceof \DateTime) {
            throw new \InvalidArgumentException('Invalid @param $datetime "' . $inputDate . '" on Statistic object.');
        }

        return $datetime;
    }

}
