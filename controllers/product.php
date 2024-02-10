<?php
if ($id === null) {
    $requestService = new RequestService("http://api/products");
    $productList = $requestService->getAllEntities();
    $data = json_decode($productList, true);

    $products = $data['products'];

    foreach ($products as $product) {
        $product = new Product($product['title'], $product['price'],  $product['id']);
        $product->getCardUi();
    }
} else {
    $requestService = new RequestService("http://api/products");
    $data = json_decode($requestService->getEntityById($id), true);
    $product = $data['product'][0];
    if ($product != null) {
        $productObj = new Product($product['title'], $product['price'], $product['id']);
        $productObj->getCardUi();
    } else {
        header("Location: /productPart/views/notFound.php");
        exit;
    }
}
