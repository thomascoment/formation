<?php

require_once '../pdo.php';
require_once '../../utils.php';

$id = 3;

$sql = 'DELETE FROM species WHERE id=:id';
$q = $pdo->prepare($sql);
$q->bindValue(':id', $id, PDO::PARAM_INT);
$success = $q->execute();

var_dump($success);