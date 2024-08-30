<?php
require_once './src/Pages/ProductListPage.php';
require_once './src/Pages/ProductAddPage.php';

$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);


switch ($request) {
    case '/':
        $page = new Pages\ProductListPage();
        break;
    case '/product-add':
        $page = new Pages\ProductAddPage();
        break;
}

$page->render();