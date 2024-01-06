<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

declare(strict_types=1);

namespace App\Controller;

/**
 * Description of Dashboard
 *
 * @author lucas
 */
class Dashboard extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index(): void
    {
        try {
            $this->setTitle('Dashboard');


            $updates = $this->business->getUpdates();
            $this->setData('updates', $updates);

            $info = $this->business->getInfo();
            $this->setData('info', $info);

            Structure::appendStyle('svg-map.css', 'local');
            Structure::appendScript('dashboard.js', 'local');
        } catch (\Exception $ex) {
            $message = \App\Lib\Helper\Alert::get($ex->getMessage(), 'danger');
            $this->setData('flash_message', $message);

            \App\Factory::getInstance('FlashMessage')->save($message);
        } finally {
            $this->setView('dashboard');
            $this->render();
        }
    }

}
