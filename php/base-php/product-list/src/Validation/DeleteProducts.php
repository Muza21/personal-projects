<?php
require_once '../Database/Database.php';

$requestBody = file_get_contents('php://input');
$data = json_decode($requestBody, true);
$productIds = $data['productIds'];

$config = require('../Config/Config.php');
$db = new Database($config['database'],$config['user']['name'],$config['user']['password']);

$productIdList = implode(', ', $productIds);
$deleteQuery = "delete from products where id in ($productIdList)";
$db->query($deleteQuery);
$selectQuery = "select * from products";
$products = $db->query($selectQuery)->fetchAll();
$responseData = array(
    'status' => 'success',
    'message' => 'Products removed successfully',
    'products' => $products
);
echo json_encode(['products' => $products]);
