<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

declare(strict_types=1);

namespace App\Lib\Core;

use CoffeeCode\Router\Router;

/**
 * Description of FriendlyUrl
 *
 * @author lucas
 */
class FriendlyUrl
{

    private $manager;

    public function __construct()
    {
        $this->manager = new Router(URL);

        $this->configureRoutes();
    }

    private function configureRoutes(): void
    {
        $this->manager->namespace('App\\Controller');

        $this->manager->get('/', 'General:home');
        $this->manager->get('/dashboard', 'Dashboard:index');

        $this->manager->get('/pais', 'Country:details');
        $this->manager->get('/estado/{slug}', 'State:details');
        
        $this->manager->group('error')->namespace('App\\Controller');
        $this->manager->get('/{code}', 'General:error');
        
        $this->manager->group('status')->namespace('App\\Controller\\Webservice');
        $this->manager->get('/update', 'Status:update');

    }

    public function run(): void
    {
        try {
            $this->manager->dispatch();

            if ($this->manager->error()) {
                $this->manager->redirect('error/' . $this->manager->error());
            }
        } catch (Exception $ex) {
            $this->manager->redirect('error/500');
        }
    }

}
