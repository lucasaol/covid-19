<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

declare(strict_types=1);

namespace App\Controller;

/**
 * Description of General
 *
 * @author lucas
 */
class General extends Controller
{

    private static array $errors;

    public function __construct($page = null)
    {
        parent::__construct();

        self::setPossibleErrors();
    }

    public function home(): void
    {
        \App\Lib\Helper\Redirect::internal('dashboard');
    }

    public function error($params): void
    {
        try {
            $this->validateParams($params);

            $error = $this->getError((int) $params['code']);
            $this->handleFlashMessage();

            $this->setData('error', $error);
            $this->setTitle($error['title']);

            $this->setView('error');
            $this->render();
        } catch (\InvalidArgumentException $ex) {
            \App\Lib\Helper\Redirect::internal('error/404');
        }
    }

    private function handleFlashMessage(): void
    {
        $message = \App\Factory::getInstance('FlashMessage');
        $this->setData('flash_message', $message->read());
        
        $message->clear();
    }

    private function validateParams(array $params): void
    {
        if (!is_array($params) || empty($params)) {
            throw new \InvalidArgumentException('Invalid @params Error Page.');
        }

        if (!isset($params['code']) || empty($params['code']) || !is_numeric($params['code'])) {
            throw new \InvalidArgumentException('Invalid param error code.');
        }


        if (!in_array($params['code'], array_keys(self::$errors))) {
            throw new \InvalidArgumentException('Invalid error code.');
        }
    }

    private function getError(int $code): array
    {
        return self::$errors[$code];
    }

    private static function setPossibleErrors(): void
    {
        $possibleErrors = array(
            404 => [
                'title' => 'Página não Encontrada',
                'banner' => 'microscope.svg',
                'description' => 'A página que você está procurando foi removida'
                . ' ou está temporariamente indisponível para acesso,'
                . ' recomendamos que você retorne à  página principal.'
            ],
            500 => [
                'title' => 'Ops!',
                'banner' => 'virus.svg',
                'description' => 'Ocorreu um erro interno, tente novamente mais tarde.'
            ],
            503 => [
                'title' => 'Em Manutenção',
                'banner' => 'bacteria.svg',
                'description' => 'A página atualmente está em manutenção para melhor atendê-lo.'
                . ' Por favor aguarde.<br>Para mais informações, entre em contato.'
            ]
        );

        self::$errors = $possibleErrors;
    }

}
