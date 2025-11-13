<?php

/**
 * Fonctions utilitaire
 */

/**
 * Affiche un tableau correctement
 *
 * @param array $array
 * @return void
 */
function pre_print_r(array $array): void
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}
