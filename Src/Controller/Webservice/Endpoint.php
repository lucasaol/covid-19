<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller\Webservice;

use App\Controller\Controller;

/**
 * Description of Endpoint
 *
 * @author lucas
 */
class Endpoint extends Controller
{

    private int $status = 200;

    public function __construct()
    {
        parent::__construct();

        $this->setOnlyCenter(true);
        $this->setView('json-response');
    }

    protected function setStatus(int $code): self
    {
        $this->status = $code;
        return $this;
    }

    protected function response(): void
    {
        header('Content-Type: application/json; charset=UTF-8');
        http_response_code($this->status);

        $this->setData('status', $this->status);
        $this->render();
    }

}
