<?php

require_once 'UserManager.php';
$pdo = new PDO('mysql:host=localhost; dbname=reservation', 'root', '');

$client = new UserManager($pdo);

$connect = $client->connect('josette@dupont.fr', 'ch4NT*32');
echo $connect->sayHello();

if(!in_array('ROLE_DELIVERABLE', $connect->getRoles())){
    throw new Exception("Vous n'êtes pas autorisé à accèder à cette page!");
}

