<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

declare(strict_types=1);

namespace App\Controller;

/**
 * Description of Structure
 *
 * @author lucas
 */
class Structure extends Controller
{

    private static array $styles = array();
    private static array $scripts = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function header(): string
    {
        self::appendStyle('https://fonts.googleapis.com/css?family=Poppins:300,400,800', 'external');
        self::appendStyle('https://use.fontawesome.com/releases/v5.6.0/css/all.css', 'external');

        $this->setData('title', $this->getHeader()->getTitle());
        $this->setData('styles', $this->getStyles());

        $this->setView('layout/header');
        return $this->view();
    }

    public function footer(): string
    {
        $this->setData('scripts', $this->getScripts());

        $this->setView('layout/footer');
        return $this->view();
    }

    public function getStyles(): string
    {
        $out = '';

        if (!empty(self::$styles['external'])) {
            foreach (self::$styles['external'] as $key => $src) {
                $out .= '<link rel="stylesheet" href="' . $src . '" />';
            }
        }

        $localStyles = array(
            'bootstrap.min.css',
            'style.default.css',
            'all.css'
        );
        if (!empty(self::$styles['local'])) {
            $localStyles = array_merge($localStyles, self::$styles['local']);
        }

        foreach ($localStyles as $key => $src) {
            $out .= '<link rel="stylesheet" href="view/css/' . $src . '" />';
        }

        return $out;
    }

    public static function appendStyle($src, $type): void
    {
        if (!in_array($type, array('local', 'external'))) {
            throw new \InvalidArgumentException('Invalid type "' . $type . '" of style "' . $src . '".');
        }

        self::$styles[$type][] = $src;
    }

    public function getScripts(): string
    {
        $out = '';

        if (!empty(self::$scripts['external'])) {
            foreach (self::$scripts['external'] as $key => $src) {
                $out .= '<script src="' . $src . '"></script>';
            }
        }

        $localScripts = array(
            'jquery.min.js',
            'popper.min.js',
            'bootstrap.min.js',
            'general.js'
        );
        if (!empty(self::$scripts['local'])) {
            $localScripts = array_merge($localScripts, self::$scripts['local']);
        }

        foreach ($localScripts as $key => $src) {
            $out .= '<script src="view/js/' . $src . '"></script>';
        }

        return $out;
    }

    public static function appendScript($src, $type): void
    {
        if (!in_array($type, array('local', 'external'))) {
            throw new \InvalidArgumentException('Invalid type "' . $type . '" of script "' . $src . '".');
        }

        self::$scripts[$type][] = $src;
    }

}
