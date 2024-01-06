<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

declare(strict_types=1);

namespace App\Controller\Webservice;

/**
 * Description of Status
 *
 * @author lucas
 */
class Status extends Endpoint
{

    public function __construct()
    {
        parent::__construct();
        
        $this->business = new \App\Business\Status();
    }

    public function update(): void
    {
        try {
            $this->business->run();
            $this->setData('message', 'OK');
        } catch (\Exception $ex) {
            $this->setStatus($ex->getCode());
            $this->setData('message', $ex->getMessage());
        } finally {
            $this->response();
        }
    }

}
