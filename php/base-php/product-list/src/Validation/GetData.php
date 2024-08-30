<?php

require_once '../Database/Database.php';
$config = require('../Config/Config.php');
$db = new Database($config['database'],$config['user']['name'],$config['user']['password']);
$query = "select * from products";
$statement = $db->query($query);
$products = $statement->fetchAll();
$responseData = array(
    'status' => 'success',
    'products' => $products
);
header('Content-Type: application/json');
echo json_encode($responseData);
