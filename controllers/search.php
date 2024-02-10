<?php
require_once "../services/requestService.php";
require_once "../models/Product.php";
require '../vendor/autoload.php';

$nameSearch = isset($_POST['nameSearch']) ? $_POST['nameSearch'] : null;
if ($nameSearch != null) {
    $requestService = new RequestService("http://api/products");
    $data = json_decode($requestService->getEntityById($nameSearch), true);
    $product = $data['product'][0];
    if ($product != null) {
        header("Location: ../index.php?id=" . $product['id']);
        exit;
    } else {
        header("Location: /views/notFound.php");
        exit;
    }
}


