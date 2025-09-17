<?php

$id = 2;

require_once '../pdo.php';
require_once '../../utils.php';

$sql = 'SELECT * FROM species WHERE id=:id';
$q = $pdo->prepare($sql);
$q->bindValue(':id', $id, PDO::PARAM_INT);
$q->execute();

$result = $q->fetch();