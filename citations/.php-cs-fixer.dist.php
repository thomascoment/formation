<?php

declare(strict_types=1); //pas de transtypage

use PhpCsFixer\Config;  //on connait
use PhpCsFixer\Finder; //con connait

$finder = Finder::create()
    ->in(__DIR__ . '/app') //les dossiers qui seront analysés
    ->in(__DIR__ . '/config')
    ->name('*.php') //l'extension des fichiers qui seront analysé
    ->ignoreDotFiles(true) //on analyse pas les fichiers commencant par des points
    ->ignoreVCS(true);// je ne sais pas

return (new Config())
    ->setFinder($finder) // fais reference à plus haut
    ->setRiskyAllowed(true) // obligatoire pour certaines règles comme declare_strict_types
    ->setRules([
        '@PSR12' => true, //les différente regles PSR
        'declare_strict_types' => true, // ajoute automatiquement declare(strict_types=1)
        'array_syntax' => ['syntax' => 'short'], // pas array()
        'strict_comparison' => true, // des === et pas des ==
        'strict_param' => true, //exiger des type dans les parametres
        'no_unused_imports' => true, //je ne sais pas
        'single_quote' => true, //C clair je pense
        'trailing_comma_in_multiline' => true, // j'arrive pas à expliquer
        'ordered_imports' => ['sort_algorithm' => 'alpha'], //on trie les listes par ordre alphanumerique 
    ]);
//on pourra mettre d'autres regles