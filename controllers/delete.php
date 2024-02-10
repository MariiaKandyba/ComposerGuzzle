<?php
require_once "../services/requestService.php";
require_once "../models/Product.php";
require '../vendor/autoload.php';

$id = isset($_GET['id']) ? $_GET['id'] : null;
if ($id != null) {
    $requestService = new RequestService("http://api/products");
    $data = json_decode($requestService->getEntityById($id), true);
    $product = $data['product'][0];
    if ($product != null) {
        $id = $product["id"];
        $response = $requestService->deleteEntity($id);
        header("Location: ../index.php");
        exit;
    }
}
