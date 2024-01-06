<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

declare(strict_types=1);

namespace App\Controller;

/**
 * Description of State
 *
 * @author lucas
 */
class State extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function details(array $params): void
    {
        try {
            $this->validateParams($params);

            $state = $this->business->getBySlug($params['slug']);

            $this->setStatisticsData();

            $this->setData('state', $state);
            $this->setTitle($state->getName());
        } catch (\Exception $ex) {
            $message = \App\Lib\Helper\Alert::get($ex->getMessage(), 'danger');
            $this->setData('flash_message', $message);

            \App\Factory::getInstance('FlashMessage')->save($message);
        } finally {
            $this->setView('state');
            $this->render();
        }
    }

    private function setStatisticsData(): void
    {
        $dashboard = new \App\Business\Statistic();
        $statistics = $dashboard->getInfo();
        
        $this->setData('dashboard', $statistics);
    }

    private function validateParams(array $params): void
    {
        if (!is_array($params) || empty($params)) {
            throw new Exception\InvalidUrlException('Invalid @params State details.');
        }

        if (!isset($params['slug']) || empty($params['slug']) || is_numeric($params['slug'])) {
            throw new Exception\InvalidUrlException('Invalid state slug.');
        }
    }

}
