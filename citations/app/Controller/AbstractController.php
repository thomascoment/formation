<?php

declare(strict_types=1);

namespace App\Controller;

abstract class AbstractController
{
    /**
     * Summary of render
     * @param string $view
     * @param array $param
     * @return void
     */
    protected function render(string $view, array $params = []): void
    {
        require_once(ROOT_PATH . '/view/' . $view . '.php');
    }
}
