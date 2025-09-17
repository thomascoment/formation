<?php

require_once '../pdo.php';
require_once '../../utils.php';

$sql = 'SELECT * FROM species';

$q = $pdo->query($sql);
$species = $q->fetchAll();

pre_print_r($species);