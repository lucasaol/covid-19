<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

declare(strict_types=1);

namespace App\Controller;

use App\Lib\Helper\Header;
use App\Business\Business;

/**
 * Description of Controller
 *
 * @author lucas
 */
class Controller
{

    private string $template;
    private string $output;
    private array $data = array();
    private bool $onlyCenter = false;
    protected Business $business;

    public function __construct()
    {
        $this->setDefaultBusiness();
    }

    protected function setDefaultBusiness(): self
    {
        $nameClass = get_class($this);
        $business = str_replace('App\\Controller', 'App\\Business', $nameClass);

        if (class_exists($business)) {
            $this->business = new $business;
        }

        return $this;
    }

    public function getHeader(): Header
    {
        return Header::getInstance();
    }

    protected function setData(string $key, $value): self
    {
        if (isset($this->data[$key])) {
            throw new \Exception('Key "' . $key . '" is already setted up on Controller data.');
        }

        $this->data[$key] = $value;
        return $this;
    }

    protected function getData(string $key = null)
    {
        if (!empty($key)) {
            if (!isset($this->data[$key])) {
                throw new \Exception('Not data configured on key "' . $key . '".');
            }

            return $this->data[$key];
        }

        if (!isset($this->data)) {
            throw new \Exception('Not data configured.');
        }

        return $this->data;
    }

    public function setTitle(string $title): self
    {
        $this->setData('title', $title);
        $this->getHeader()->setTitle($title);

        return $this;
    }

    protected function setView(string $view): self
    {
        $this->template = $view;
        return $this;
    }

    protected function setOnlyCenter(bool $cond): self
    {
        $this->onlyCenter = $cond;
        return $this;
    }

    private function getView(): string
    {
        if (empty($this->template)) {
            throw new \Exception('View template not configured.');
        }

        return WWW_ROOT . 'view' . DIRECTORY_SEPARATOR . $this->template . '.php';
    }

    protected function view(): string
    {
        $data = $this->getData();
        if (is_array($data) && count($data) > 0) {
            extract($data, EXTR_SKIP);
        }

        $view = $this->getView();
        if (!file_exists($view)) {
            throw new \Exception('View file "' . $view . '" not found.');
        }

        ob_start();
        require_once $view;
        $this->setOutput(ob_get_clean());

        return $this->getOutput();
    }

    protected function render(): void
    {
        $content = '';
        $main = $this->view();
        if ($this->onlyCenter) {
            $content = $main;
        } else {
            $structure = new Structure();
            $content .= $structure->header();
            $content .= $main;
            $content .= $structure->footer();
        }

        echo $content;
    }

    private function getOutput(): string
    {
        return $this->output;
    }

    private function setOutput(string $html): self
    {
        $output = str_replace("\n", '', $html);
        $this->output = preg_replace("/\s\s+/", ' ', $output);

        return $this;
    }

}
