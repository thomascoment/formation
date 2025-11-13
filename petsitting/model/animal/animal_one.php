<?php

$id = 2;

require_once __DIR__ . '/pdo.php';
require_once __DIR__ . '/utils.php';

$sql = 'SELECT * FROM animal WHERE id=:id';
$q = $pdo->prepare($sql);
$q->bindValue(':id', $id, PDO::PARAM_INT);
$q->execute();

$result = $q->fetch();

pre_print_r($result);