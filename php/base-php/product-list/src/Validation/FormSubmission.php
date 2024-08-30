<?php

require_once './ProductValidation.php';
require_once '../Database/Database.php';
require_once '../Models/Product.php';
$requestBody = file_get_contents('php://input');
$data = json_decode($requestBody, true);
$config = require('../Config/Config.php');
$db = new Database($config['database'],$config['user']['name'],$config['user']['password']);
$validator = new Validation\ProductValidation($data,$db);

if ($validator->validate()) {
    $product = new Models\Product($data);
    $product->__set('specialAttribute',json_encode($product->__get('specialAttribute')));

    $query = "insert into products (sku, name, price, type, special_attribute) values (:sku, :name, :price, :productType, :specialAttribute)";

    if ($db->query($query,$product->getData())) {
        $query = "select * from products";
        $products = $db->query($query)->fetchAll();

        $responseData = array(
            'status' => 'success',
            'message' => 'Data received and processed successfully',
            'redirectTo' => 'http://127.0.0.1:8000/',
            'products' => $products
        );
    } else {
        $responseData = array(
            'status' => 'error',
            'message' => 'Failed to insert data into the database'
        );
    }
} else {
    $responseData = array(
        'status' => 'error',
        'message' => 'Validation failed',
        'errors' => $validator->getErrors()
    );
}

header('Content-Type: application/json');

echo json_encode($responseData);
