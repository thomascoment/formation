<?php
require_once 'connect.php';

$sql = 'SELECT * FROM client';

$query = $db->query($sql);
var_dump($query->fetchAll());