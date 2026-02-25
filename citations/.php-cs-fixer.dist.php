<?php

declare(strict_types=1);

use PhpCsFixer\Config; 
use PhpCsFixer\Finder; 

$finder = Finder::create()
    ->in(__DIR__ . '/app') 
    ->in(__DIR__ . '/config')
    ->name('*.php') 
    ->ignoreDotFiles(true) 
    ->ignoreVCS(true);

return (new Config())
    ->setFinder($finder) 
    ->setRiskyAllowed(true) 
    ->setRules([
        '@PSR12' => true, 
        'declare_strict_types' => true, 
        'array_syntax' => ['syntax' => 'short'], 
        'strict_comparison' => true, 
        'strict_param' => true,
        'no_unused_imports' => true, 
        'single_quote' => true,
        'trailing_comma_in_multiline' => true, 
        'ordered_imports' => ['sort_algorithm' => 'alpha'],
    ]);

    