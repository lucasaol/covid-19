<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

declare(strict_types=1);

namespace App\Controller\Exception;

/**
 * Description of InvalidUrlException
 *
 * @author lucas
 */
class InvalidUrlException extends \Exception
{
    public function __construct(string $message = "", int $code = 404, \Throwable $previous = NULL)
    {
        $error = \App\Lib\Helper\Alert::get('Error: ' . $code . ' - ' . $message, 'danger');
        \App\Factory::getInstance('FlashMessage')->save($error);
        
        \App\Lib\Helper\Redirect::internal('error/404');

        parent::__construct($message, $code, $previous);
    }

}
